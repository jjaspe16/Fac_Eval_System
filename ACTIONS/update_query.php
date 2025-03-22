<?php

include '../DATABASE/db.php';

//acad yr
if (isset($_POST['update_acadyear'])) {


    $txtno = trim($_POST['no']);
    $txtyear = trim($_POST['year']);
    $txtsemester = trim($_POST['semester']);
    $txtsys_default = trim($_POST['sys_default']);
    $txteval_status = trim($_POST['eval_status']);

    // Validate 'no' as an integer
    if (!ctype_digit($txtno)) {
        die("Invalid academic year ID!");
    }

    // Ensure required fields are not empty
    if (empty($txtyear) || empty($txtsemester) || empty($txtsys_default) || empty($txteval_status)) {
        die("All fields are required!");
    }

    // Validate 'year' format (YYYY-YYYY)
    if (!preg_match("/^\d{4}-\d{4}$/", $txtyear)) {
        die("Invalid year format! Use YYYY-YYYY.");
    }

    // Use prepared statement to prevent SQL Injection
    $sql = "UPDATE academic_year SET year = ?, semester = ?, sys_default = ?, eval_status = ? WHERE no = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $txtyear, $txtsemester, $txtsys_default, $txteval_status, $txtno);

    if ($stmt->execute()) {
        header('location:../academic_year.php?success_updated=1');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}


// Update class securely
if (isset($_POST['update_class'])) {

    $txtno = trim($_POST['no']);
    $txtcourse = trim($_POST['course']);
    $txtyearlevel = trim($_POST['year_level']);
    $txtblock = trim($_POST['Set']);

    if (empty($txtcourse) || empty($txtyearlevel) || empty($txtblock)) {
        die("All fields are required!");
    }

    $sql = "UPDATE class SET course = ?, year_level = ?, `Set` = ? WHERE no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $txtcourse, $txtyearlevel, $txtblock, $txtno);

    if ($stmt->execute()) {
        header('location:../class.php?success_updated=1');
    } else {
        echo "Error updating class: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

//subject  
if (isset($_POST['update_subject'])) {
    $txtno = trim($_POST['no']);
    $txtcode = trim($_POST['code']);
    $txtsubject = trim($_POST['subject']);

    if (empty($txtcode) || empty($txtsubject) || empty($txtno)) {
        die("All fields are required!");
    }

    $sql = "UPDATE subjects SET code=?, subject=? WHERE no=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $txtcode, $txtsubject, $txtno);
    
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }


    if ($stmt->execute()) {
        header('Location: ../subjects.php?success_updated=1');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}


//faculty
if (isset($_POST['update_faculty'])) {

    //print_r($_POST); // Debugging
    //exit;

    // Validate 'no'
    if (!isset($_POST['no']) || empty($_POST['no'])) {
        die("Error: Missing faculty ID for update.");
    }

    $txtno = trim($_POST['no']);
    $txtid = trim($_POST['faculty_id']);
    $newfname = trim($_POST['firstname']);
    $txtlastname = trim($_POST['lastname']);
    $newsub = trim($_POST['subject']);
    $newemail = trim($_POST['email']);
    $newpass = md5($_POST['f_password']);

    if (empty($txtid) || empty($newfname) || empty($txtlastname) || empty($newsub) || empty($newemail) || empty($newpass)) {
        die("All fields are required!");
    }

    $sql = "UPDATE `faculties` SET `firstname`=? ,`lastname`=? ,`subject`=? ,`email`=?, `f_password`=?  WHERE `no`=? ";
    $result = $conn->prepare($sql);
    $result->bind_param("sssssi", $newfname, $txtlastname, $newsub, $newemail, $newpass);

    if ($result->execute()) {
        header('location:../faculty.php?success_updated=1');
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $result->close();
    $conn->close();
}


//fac_students
if (isset($_POST['update_fac-student'])) {
    require_once '../DATABASE/db.php'; // Ensure DB connection is included

    $txtno = trim($_POST['no']);
    $txtStud_id = trim($_POST['stud_id']);
    $txtfname = trim($_POST['firstname']);
    $txtlname = trim($_POST['lastname']);
    $txtsubject = trim($_POST['subject']);
    $txtclass = trim($_POST['class']); // Fix class name
    $txtpassword = md5(trim($_POST['password'])); // Fix hashing

    if (empty($txtStud_id) || empty($txtfname) || empty($txtlname) || empty($txtsubject) || empty($txtclass) || empty($txtpassword)) {
        die("All fields are required!");
    }

    // Check if the student exists
    $check_sql = "SELECT no FROM fac_students WHERE no = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $txtno);
    $check_stmt->execute();
    $check_stmt->store_result();
    if ($check_stmt->num_rows == 0) {
        die("Student not found!");
    }
    $check_stmt->close();

    // Update student data
    $sql = "UPDATE `fac_students` SET `stud_id`=?, `firstname`=?, `lastname`=?, `subject`=?, `class`=?, `password`=? WHERE `no`=?";
    $result = $conn->prepare($sql);
    $result->bind_param("ssssssi", $txtStud_id, $txtfname, $txtlname, $txtsubject, $txtclass, $txtpassword, $txtno);

    if ($result->execute()) {
        header('location:../students.php?success_updated=1');
        exit();
    } else {
        die("Error executing query: " . $conn->error);
    }

    $result->close();
    $conn->close();
}


//majors
if (isset($_POST['update_department'])) {
    $txtno = trim($_POST['no']);
    $txtdepartment = trim($_POST['department']); // Correct input name

    if (empty($txtdepartment)) {
        die("All fields are required!");
    }

    $sql = "UPDATE department SET department=? WHERE no=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $txtdepartment, $txtno);

    if ($stmt->execute()) {
        header('location:../majors.php?success_updated=1');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}


//criteria
if (isset($_POST['update_criteria'])) {
    $txtno = trim($_POST['no']);
    $txtcriteria = trim($_POST['criteria']);

    if (empty($txtcriteria)) {
        die("All fields are required!");
    }

    $sql = "UPDATE `criterias` SET `criteria`=? WHERE `no`=? ";
    $result = $conn->prepare($sql);
    $result->bind_param("si", $txtcriteria, $txtno);

    if ($result->execute()) {
        header('location:../criteria.php?success_updated=1');
    } else
        echo "Error :" . $conn->error;

    $result->close();
    $conn->close();
}

//questionnaires
if (isset($_POST['update_ques1'])) {
    $txtno = trim($_POST['no']);
    $txtques1 = trim($_POST['question']);

    if (empty($txtques1)) {
        die("All fields are required!");
    }

    $sql = "UPDATE `planning_and_lesson_implementation` SET `question`=? WHERE `no`=? ";
    $result = $conn->prepare($sql);
    $result->bind_param("is", $txtno, $txtques1);

    if ($result->execute()) {
        header('location:../questionnaires.php?success_updated=1');
    } else
        echo "Error: " . $conn->error;

    $stmt->close();
    $conn->close();
}
if (isset($_POST['update_ques2'])) {
    $txtno = trim($_POST['no']);
    $txtques1 = trim($_POST['question']);

    if (empty($txtques1)) {
        die("All fields are required!");
    }

    $sql = "UPDATE `classroom_management` SET `question`=? WHERE `no`=?";
    $result = $conn->prepare($sql);
    $result->bind_param("si", $txtques1, $txtno);

    if ($result->execute()) {
        header('location:../questionnaires.php?success_updated=1');
    } else
        echo "Error: " . $conn->error;

    $stmt->close();
    $conn->close();
}
if (isset($_POST['update_ques3'])) {
    $txtno = trim($_POST['no']);
    $txtques1 = trim($_POST['question']);

    if (empty($txtques1)) {
        die("All fields are required!");
    }

    $sql = "UPDATE `interpersonal_skills` SET `question`=? WHERE `no`= ? ";
    $result = $conn->prepare($sql);
    $result->bind_param("is", $txtno, $txtques1);

    if ($result->execute()) {
        header('location:../questionnaires.php?success_updated=1');
    } else
        echo "Error: " . $conn->error;

    $stmt->close();
    $conn->close();
}
?>