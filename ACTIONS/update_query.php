<?php

include '../DATABASE/db.php';

//acad yr
if (isset($_POST['update_acadyear'])) {

    $txtno = $_POST['no'];
    $txtyear = $_POST['year'];
    $txtsemester = $_POST['semester'];
    $txtsys_default = $_POST['sys_default'];
    $txteval_status = $_POST['eval_status'];


    $sql = "UPDATE `academic_year` SET `year`='$txtyear',`semester`='$txtsemester',
        `sys_default`='$txtsys_default',`eval_status`='$txteval_status' WHERE `no` ='$txtno' ";

    $result = $conn->query($sql);

    if ($result) {
        header('location:../academic_year.php?success_updated=1');
    }
}


//class
if (isset($_POST['update_class'])) {
    $txtno = $_POST['no'];

    $txtcourse = $_POST['course'];
    $txtyearlevel = $_POST['year_level'];
    $txtblock = $_POST['Set'];

    $sql = "UPDATE `class` SET `course`='$txtcourse',
            `year_level`='$txtyearlevel',`Set`='$txtblock' WHERE `no`='$txtno' ";

    $result = $conn->query($sql);

    if ($result) {
        header('location:../class.php?success_updated=1');
    }
}
//subject  
if (isset($_POST['update_subject'])) {
    $txtno = $_POST['no'];
    $txtcode = $_POST['code'];
    $txtsubject = $_POST['subject'];

    $sql = "UPDATE `subjects` SET `code`='$txtcode',`subject`='$txtsubject' WHERE `no` ='$txtno' ";
    $result = $conn->query($sql);

    if ($result) {
        header('location:../subjects.php?success_updated=1');
    }
}
//faculty
if (isset($_POST['update_faculty'])) {

    //print_r($_POST); // Debugging
    //exit;

    // Validate 'no'
    if (!isset($_POST['no']) || empty($_POST['no'])) {
        die("Error: Missing faculty ID for update.");
    }

    // Get values from the form
    $txtno = $_POST['no'];
    $txtid = $_POST['faculty_id'];
    $newfname = $_POST['firstname'];
    $txtlastname = $_POST['lastname'];
    $newsub = $_POST['subject'];
    $newemail = $_POST['email'];
    $newpass = md5($_POST['f_password']); // Corrected hash function

    // SQL Update Query
    $sql = "UPDATE `faculties` SET 
                `firstname`='$newfname',
                `lastname`='$txtlastname',
                `subject`='$newsub',
                `email`='$newemail',
                `f_password`='$newpass' 
            WHERE `no`='$txtno'";

    $result = $conn->query($sql);

    if ($result) {
        header('location:../faculty.php?success_updated=1');
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


//fac_students
if (isset($_POST['update_fac-student'])) {
    $txtno = $_POST['no'];
    $txtStud_id = $_POST['stud_id'];
    $txtfname = $_POST['firstname'];
    $txtlname = $_POST['lastname'];
    $txtsubject = $_POST['subject'];
    $txtclass = $_POST['class'];
    $txtpassword = hash(algo: "md5", data: $_POST['password'], binary: false);

    $sql = "UPDATE `fac_students` SET `stud_id`='$txtStud_id',`firstname`='$txtfname',
                `lastname`='$txtlname',`subject`='$txtsubject',`class`='$txtclass,`password`='$txtpassword' 
                WHERE `no` ='$txtno' ";

    $result = $conn->query($sql);

    if ($result) {
        header('location:../faculty_page.php?success_updated=1');
    }
}

//majors
if (isset($_POST['update_department'])) {
    $txtno = $_POST['no']; // Assuming 'no' is passed as a hidden input
    $txtdepart = $_POST['department']; // Assuming 'department' is the name of the input field

    // Correct SQL query
    $sql = "UPDATE `department` SET `department` = '$txtdepart' WHERE `no` = '$txtno'";
    $result = $conn->query($sql);

    if ($result) {
        header('Location: ../majors.php?success_updated=1');
    } else {
        echo "Error: " . $conn->error;
    }
}

//criteria
if (isset($_POST['update_criteria'])) {
    $txtno = $_POST['no'];
    $txtcriteria = $_POST['criteria'];


    $sql = "UPDATE `criterias` SET `criteria`='$txtcriteria' WHERE `no`= '$txtno' ";
    $result = $conn->query($sql);

    if ($result) {
        header('location:../criteria.php?success_updated=1');
    }
}
//questionnaires
if (isset($_POST['update_ques1'])) {
    $txtno = $_POST['no'];
    $txtques1 = $_POST['question'];

    $sql = "UPDATE `planning_and_lesson_implementation` SET `question`='$txtques1' WHERE `no`= '$txtno' ";
    $result = $conn->query($sql);

    if ($result) {
        header('location:../questionnaires.php?success_updated=1');
    }
}
if (isset($_POST['update_ques2'])) {
    $txtno = $_POST['no'];
    $txtques1 = $_POST['question'];

    $sql = "UPDATE `classroom_management` SET `question`='$txtques1' WHERE `no`= '$txtno' ";
    $result = $conn->query($sql);

    if ($result) {
        header('location:../questionnaires.php?success_updated=1');
    }
}
if (isset($_POST['update_ques3'])) {
    $txtno = $_POST['no'];
    $txtques1 = $_POST['question'];

    $sql = "UPDATE `interpersonal_skills` SET `question`='$txtques1' WHERE `no`= '$txtno' ";
    $result = $conn->query($sql);

    if ($result) {
        header('location:../questionnaires.php?success_updated=1');
    }
}
?>