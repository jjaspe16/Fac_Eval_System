<?php
session_start(); // Start the session

include '../DATABASE/db.php';

// ADMIN VERF
if (isset($_POST['admin_login'])) {
    $txtnumvalid = $_POST['num_valid'];

    if ($txtnumvalid == 'Td4eVa') {
        $txtid = $_POST['user_id'];
        $txtpassword = $_POST['u_password'];

        if ($txtid == '2020-001' && $txtpassword == 'admin123') {
            header('location:adminPage.php');
        } else {
            header('location:admin_login.php?error=1');

        }
    } else {
        header('location:admin_login.php?error_input=1');
    }
}
//fac pass&uname .GLOBAL VARIABLE
//  $fac_id=$_POST['faculty_id'];
//$fac_pass=$_POST['f_password'];

//faculty
if (isset($_POST['login'])) {

    $txtnumvalid = $_POST['num_valid'];
    $txtusertype = $_POST['usertype'];

    // Validate captcha
    if ($txtnumvalid == 'Td4eVa') {
        $txtid = $_POST['faculty_id'];
        $txtpassword = hash(algo: "md5", data: $_POST['f_password'], binary: false);
        $txtusertype = $_POST['usertype'];

        $qry = "SELECT `faculty_id`, `f_password` FROM `faculties` WHERE `faculty_id`='$txtid' AND `f_password`='$txtpassword' ";
        $connects = $conn->query($qry);

        //if the user is found
        if ($connects->num_rows > 0) {
            while ($row = $connects->fetch_assoc()) {
                // Store the faculty_id in session
                $_SESSION['faculty_id'] = $row['faculty_id'];

                if ($txtusertype == 'Faculty') {

                    header('location:../faculty_page.php');

                    exit();
                }
                if ($txtusertype == 'Student') {
                    header('location:student_page.php');
                }
                if ($txtusertype == 'Admin' && $txtid == '2020-001' && $txtpassword == 'admin123') {
                    $txtid = $_POST['user_id'];
                    $txtpassword = $_POST['u_password'];

                   
            }
        }

        /*   if ($connects->num_rows > 0) {
        while ($row = $connects->fetch_assoc()) {
            // Store the faculty_id in session
            $_SESSION['faculty_id'] = $row['faculty_id'];
            
            // Redirect based on usertype
            if ($txtusertype === 'Faculty') {
                header('Location: faculty_page.php');
                exit();
            }        else { */
            //echo"Unregistered  User Id and Password !";
            header('location:homepage.php?error=1');
        }

    } else {
        //echo "Check if all the inputs are correct! ";
        //header('location:mssg_xcaptcha.html');
        header('location:homepage.php?invalid_input=1');

    }
}

// ADD faculty securely
if (isset($_POST['add_faculty'])) {

    $txtid = trim($_POST['faculty_id']);
    $txtfirstname = trim($_POST['firstname']);
    $txtlastname = trim($_POST['lastname']);
    $txtsubject = trim($_POST['subject']);
    $txtemail = trim($_POST['email']);
    $txtfpassword = hash(algo: "md5", data: $_POST['f_password'], binary: false);
    // Validate email format
    if (!filter_var($txtemail, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format!");
    }

    // Hash password securely
   // $hashed_password = password_hash($txtfpassword, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL Injection
    $qry = "INSERT INTO faculties (faculty_id, firstname, lastname, subject, email, f_password) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($qry);
    $stmt->bind_param("ssssss", $txtid, $txtfirstname, $txtlastname, $txtsubject, $txtemail, $txtfpassword);

    if ($stmt->execute()) {
        header('location:../faculty.php?success=1');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}


//student
if (isset($_POST['add_student'])) {
    // $txtno =trim($_POST['no']);
    $txtStud_id = trim($_POST['stud_id']);
    $txtfname = trim($_POST['firstname']);
    $txtlname = trim($_POST['lastname']);
    $txtsubject = trim($_POST['subject']);
    $txtclass = trim($_POST['className']);
    $txtpassword = hash(algo: "md5", data: $_POST['password'], binary: false);

   // $passHash = password_hash($txtpassword, PASSWORD_DEFAULT);

    $qry = "INSERT INTO `fac_students`( `stud_id`, `firstname`, `lastname`, `subject`, `className`,`password`) 
            VALUES (?,?,?,?,?,?)";
    $connect = $conn->prepare($qry);
    $connect->bind_param("ssssss", $txtStud_id, $txtfname, $txtlname, $txtsubject, $txtclass, $txtpassword);

    if ($connect->execute()) {
        header('location:../students.php?success=1');
    } else {
        echo "Error: " . $connect->error;
    }
}

//class
if (isset($_POST['add_class'])) {
    // $txtno = trim($_POST['no']);
    $txtcourse = trim($_POST['course']);
    $txtyearlevel = trim($_POST['year_level']);
    $txtblock = trim($_POST['Set']);

    $qry = "INSERT INTO `class`(`course`, `year_level`, `Set`) 
        VALUES (?,?,?)";
    $connect = $conn->prepare($qry);
    $connect->bind_param("sss", $txtcourse, $txtyearlevel, $txtblock);

    if ($connect->execute()) {
        header('location:../class.php?success=1');
    } else {
        echo "Error: " . $connect->error;
    }
}

// ADD SUBJECT
if (isset($_POST['add_subject'])) {
    $txtno = trim($_POST['no']);
    $txtcode = trim($_POST['code']);
    $txtsubject = trim($_POST['subject']);

    $qry = "INSERT INTO `subjects`(`no`, `code`, `subject`) VALUES (?,?,?)";
    $connect = $conn->prepare($qry);
    $connect->bind_param("sss", $txtno, $txtcode, $txtsubject);
    if ($connect->execute()) {

        header('location:../subjects.php?success=1');
    } else {
        echo "Error:" . $connect->error;
    }
}

// academic year
if (isset($_POST['add_acadyear'])) {

    $txtno = trim($_POST['no']);
    $txtyear = trim($_POST['year']);
    $txtsemester = trim($_POST['semester']);
    $txtsys_default = trim($_POST['sys_default']);
    $txteval_status = trim($_POST['eval_status']);


    $sql = "INSERT INTO `academic_year`(`no`, `year`, `semester`, `sys_default`, `eval_status`) 
            VALUES (?,?,?,?,?) ";
    $connect = $conn->prepare($sql);
    $connect->bind_param("sssss", $txtno, $txtyear, $txtsemester, $txtsys_default, $txteval_status);

    if ($connect->execute()) {
        header('location:../academic_year.php?success=1');
    } else
        echo "Error: " . $connect->error;
}

//major
if (isset($_POST['add_depart'])) {
    $txtno = trim($_POST['no']);
    $txtdepart = trim($_POST['department']);

    $sql = "INSERT INTO `department`(`no`, `department`) VALUES (?,?)";
    $connect = $conn->prepare($sql);
    $connect->bind_param("ss", $txtno, $txtdepart);

    if ($connect->execute()) {
        header('location:../majors.php?success=1');
    } else
        echo "Error: " . $connect->error;
}

//criteria
if (isset($_POST['add_criteria'])) {
    $txtno = trim($_POST['no']);
    $txtcriteria = trim($_POST['criteria']);

    $sql = "INSERT INTO `criterias`(`no`, `criteria`) VALUES (?,?)";
    $connect = $conn->prepare($sql);
    $connect->bind_param("ss", $txtno, $txtcriteria);

    if ($connect->execute()) {
        header('location:../criteria.php?success=1');
    } else
        echo "Error: " . $connect->error;
}

//criteria 1
if (isset($_POST['ques1'])) {
    // $txtno =trim($_POST['no']);
    $txtquestion = trim($_POST['question']);

    $sql = "INSERT INTO `planning_and_lesson_implementation`(`question`) VALUES (?)";
    $connect = $conn->prepare($sql);
    $connect->bind_param("s", $txtquestion);
    if ($connect->execute()) {
        header('location:../questionnaires.php?success=1');
    } else
        echo "Error: " . $connect->error;
}

//criteria 2
if (isset($_POST['ques2'])) {
    // $txtno =trim($_POST['no']);
    $txtquestion = trim($_POST['question']);

    $sql = "INSERT INTO `classroom_management`(`question`) VALUES (?)";
    $connect = $conn->prepare(query: $sql);
    $connect->bind_param("s", $txtquestion);
    if ($connect->execute()) {
        header('location:../questionnaires.php?success=1');
    } else
        echo "Error: " . $connect->error;
}

//criteria 3
if (isset($_POST['ques3'])) {
    //$txtno = trim($_POST['no']);
    $txtquestion = trim($_POST['question']);

    $sql = "INSERT INTO `interpersonal_skills`(`question`) VALUES (?)";
    $connect = $conn->prepare($sql);
    $connect->bind_param("s", $txtquestion);


    if ($connect->execute()) {
        header('location:../questionnaires.php?success=1');
    } else
        echo "Error: " . $connect->error;
}
//question ?
if (isset($_POST['question'])) {
    // $txtno = trim($_POST['no']);
    $txtquestion = trim($_POST['question']);

    $sql = "INSERT INTO `others`(`question`) VALUES (?)";
    $connect = $conn->prepare($sql);
    $connect->bind_param("s", $txtquestion);
    if ($connect->execute()) {
        header('location:../questionnaires.php?success=1');
    } else
        echo "Error: " . $connect->error;
}

?>