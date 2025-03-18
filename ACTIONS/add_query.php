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
                    
                   // header('location:fac_navigation.php');
                   header('location:../faculty_page.php');
                   
                    
                    exit();
                }

                if ($txtusertype == 'Student') {
                    header('location:student_page.php');
                }

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
            }        */ else {
            //echo"Unregistered  User Id and Password !";
            header('location:homepage.php?error=1');
        }

    } else {
        //echo "Check if all the inputs are correct! ";
        //header('location:mssg_xcaptcha.html');
        header('location:homepage.php?invalid_input=1');

    }
}

// ADD faculty
if (isset($_POST['add_faculty'])) {

    $txtid = $_POST['faculty_id'];
    $txtfirstname = $_POST['firstname'];
    $txtlastname = $_POST['lastname'];
    $txtsubject = $_POST['subject'];
    $txtemail = $_POST['email'];
    $txtfpassword = hash(algo: "md5", data: $_POST['f_password'], binary: false);



    $qry = "INSERT INTO `faculties`(`faculty_id`, `firstname`, `lastname`,`subject`, `email`, `f_password`) 
            VALUES ('$txtid','$txtfirstname','$txtlastname', '$txtsubject','$txtemail','$txtfpassword')";
    $connects = $conn->query($qry);

    if ($connects) {
        header('location:../faculty.php?success=1');
    }
}

//student
if (isset($_POST['add_student'])) {
    $txtno = $_POST['no'];
    $txtStud_id = $_POST['stud_id'];
    $txtfname = $_POST['firstname'];
    $txtlname = $_POST['lastname'];
    $txtsubject = $_POST['subject'];
    $txtclass = $_POST['class'];
    $txtpassword = hash(algo: "md5", data: $_POST['password'], binary: false);

    $qry = "INSERT INTO `fac_students`(`no`, `stud_id`, `firstname`, `lastname`, `subject`, `class`,`password`) 
            VALUES ('$txtno','$txtStud_id',' $txtfname',' $txtlname','$txtsubject',' $txtclass','$txtpassword')";
    $connect = $conn->query($qry);

    if ($connect) {
        header('location:../faculty_page.php?success=1');
    }
}

//class
if (isset($_POST['add_class'])) {
    $txtno = $_POST['no'];
    $txtcourse = $_POST['course'];
    $txtyearlevel = $_POST['year_level'];
    $txtblock = $_POST['Set'];

    $qry = "INSERT INTO `class`(`no`, `course`, `year_level`, `Set`) 
        VALUES ('$txtno','$txtcourse','$txtyearlevel','$txtblock')";
    $connect = $conn->query($qry);

    if ($connect) {
        header('location:../class.php?success=1');
    }
}

// fac_class
if (isset($_POST['add_fac_class'])) {
    $txtno = $_POST['no'];
    $txtcourse = $_POST['course'];
    $txtyearlevel = $_POST['year_level'];
    $txtblock = $_POST['Set'];

    $qry = "INSERT INTO `class`(`no`, `course`, `year_level`, `Set`) 
        VALUES ('$txtno','$txtcourse','$txtyearlevel','$txtblock')";
    $connect = $conn->query($qry);

    if ($connect) {
        header('location:../fac_class.php?success=1');
    }
}

// ADD SUBJECT
if (isset($_POST['add_subject'])) {
    $txtno = $_POST['no'];
    $txtcode = $_POST['code'];
    $txtsubject = $_POST['subject'];

    $qry = "INSERT INTO `subjects`(`no`, `code`, `subject`) VALUES ('$txtno','$txtcode','$txtsubject')";
    $connect = $conn->query($qry);

    if ($connect) {
        // Redirect back to the form page with a success flag
        header('location:../subjects.php?success=1');
        exit;
    }
}
// FACULTY ADD SUBJECT
if (isset($_POST['add_fac_subject'])) {
    $txtno = $_POST['no'];
    $txtcode = $_POST['code'];
    $txtsubject = $_POST['subject'];

    $qry = "INSERT INTO `subjects`(`no`, `code`, `subject`) VALUES ('$txtno','$txtcode','$txtsubject')";
    $connect = $conn->query($qry);

    if ($connect) {
        header('location:../fac_subject.php?success=1');
    }
}

// academic year
if (isset($_POST['add_acadyear'])) {

    $txtno = $_POST['no'];
    $txtyear = $_POST['year'];
    $txtsemester = $_POST['semester'];
    $txtsys_default = $_POST['sys_default'];
    $txteval_status = $_POST['eval_status'];


    $sql = "INSERT INTO `academic_year`(`no`, `year`, `semester`, `sys_default`, `eval_status`) 
            VALUES ('$txtno','$txtyear','$txtsemester',' $txtsys_default','$txteval_status') ";
    $connect = $conn->query($sql);

    if ($connect) {
        header('location:../academic_year.php?success=1');
    }
}

//major
if (isset($_POST['add_depart'])) {
    $txtno = $_POST['no'];
    $txtdepart = $_POST['department'];

    $sql = "INSERT INTO `department`(`no`, `department`) VALUES ('$txtno','$txtdepart')";
    $connect = $conn->query($sql);

    if ($connect) {
        header('location:../majors.php?success=1');
    }
}

//criteria
if (isset($_POST['add_criteria'])) {
    $txtno = $_POST['no'];
    $txtcriteria = $_POST['criteria'];

    $sql = "INSERT INTO `criterias`(`no`, `criteria`) VALUES ('$txtno',' $txtcriteria')";
    $connect = $conn->query($sql);


    if ($connect) {
        header('location:../criteria.php?success=1');
    }
}

//criteria 1
if (isset($_POST['ques1'])) {
    $txtno = $_POST['no'];
    $txtquestion = $_POST['question'];

    $sql = "INSERT INTO `planning_and_lesson_implementation`(`question`) VALUES ('$txtquestion')";
    $connect = $conn->query($sql);

    if ($connect) {
        header('location:../questionnaires.php?success=1');
    }
}

//criteria 2
if (isset($_POST['ques2'])) {
    $txtno = $_POST['no'];
    $txtquestion = $_POST['question'];

    $sql = "INSERT INTO `classroom_management`(`question`) VALUES ('$txtquestion')";
    $connect = $conn->query($sql);

    if ($connect) {
        header('location:../questionnaires.php?success=1');
    }
}

//criteria 3
if (isset($_POST['ques3'])) {
    $txtno = $_POST['no'];
    $txtquestion = $_POST['question'];

    $sql = "INSERT INTO `interpersonal_skills`(`question`) VALUES ('$txtquestion')";
    $connect = $conn->query($sql);

    if ($connect) {
        header('location:../questionnaires.php?success=1');
    }
}

//question ?
if (isset($_POST['question'])) {
    $txtno = $_POST['no'];
    $txtquestion = $_POST['question'];

    $sql = "INSERT INTO `others`(`question`) VALUES ('$txtquestion')";
    $connect = $conn->query($sql);

    if ($connect) {
        header('location:../questionnaires.php?success=1');
    }
}

?>