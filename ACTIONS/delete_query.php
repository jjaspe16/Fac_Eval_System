<?php

include '../DATABASE/db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['major_delete'])) {
    // Deletion for department
    $txtno = $_POST['major_delete'];

    $stmt = $conn->prepare("DELETE FROM `department` WHERE `no` = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $txtno);

    if ($stmt->execute()) {
        header('Location: ../majors.php?delete_success=1');
        exit;
    } else {
        echo 'Data cannot be deleted';
    }

    $stmt->close();
} 
// Deletion for subjects
elseif (isset($_POST['sub_delete'])) {
    $txtno = $_POST['sub_delete'];

    $stmt = $conn->prepare("DELETE FROM `subjects` WHERE `no` = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $txtno);

    if ($stmt->execute()) {
        header('Location: ../subjects.php?delete_success=1');
        exit;
    } else {
        echo 'Data cannot be deleted';
    }

    $stmt->close();
} 
// Deletion for fac_subjects
elseif (isset($_POST['fac_sub_delete'])) {
    $txtno = $_POST['fac_sub_delete'];

    $stmt = $conn->prepare("DELETE FROM `subjects` WHERE `no` = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $txtno);

    if ($stmt->execute()) {
        header('Location: ../fac_subject.php?delete_success=1');
        exit;
    } else {
        echo 'Data cannot be deleted';
    }

    $stmt->close();
} 
// Deletion for class
elseif (isset($_POST['class_delete'])) {
    $txtno = $_POST['class_delete'];

    $stmt = $conn->prepare("DELETE FROM `class` WHERE `no` = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $txtno);

    if ($stmt->execute()) {
        header('Location: ../class.php?delete_success=1');
        exit;
    } else {
        echo 'Data cannot be deleted';
    }

    $stmt->close();
} 
// Deletion for fac-class
elseif (isset($_POST['class_fac_delete'])) {
    $txtno = $_POST['class_fac_delete'];

    $stmt = $conn->prepare("DELETE FROM `class` WHERE `no` = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $txtno);

    if ($stmt->execute()) {
        header('Location: ../fac_class.php?delete_success=1');
        exit;
    } else {
        echo 'Data cannot be deleted';
    }

    $stmt->close();
} 


//Deletion for faculty
elseif (isset($_POST['fac_delete'])) {
    $txtno = $_POST['fac_delete'];

    $stmt = $conn->prepare("DELETE FROM `faculties` WHERE `no` = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $txtno);

    if ($stmt->execute()) {
        header('Location:../faculty.php?delete_success=1');
        exit;
    } else {
        echo 'Data cannot be deleted';
    }

    $stmt->close();
} 

//Deletion of acad-year
elseif(isset($_POST['acad_delete']))
{
    $txtno=$_POST['acad_delete'];

    $stmt=$conn->prepare("DELETE FROM `academic_year` WHERE `no`=?");
    if(!$stmt)
    {
        die("Error preparing statement".$conn->error);
    }
    $stmt->bind_param("i", $txtno);
    if($stmt->execute())
    {
        header("Location:../academic_year.php?delete_success=1");
        exit();
    }
    else {
        echo 'Data cannot be deleted';
    }

    $stmt->close();
}

//Deletion of criteria
elseif(isset($_POST['deleteCri']))
{
    $txtno=$_POST['deleteCri'];

    $stmt=$conn->prepare("DELETE FROM `criterias` WHERE `no`=?");
    if(!$stmt)
    {
        die("Error preparing statement".$conn->error);
    }
    $stmt->bind_param("i", $txtno);
    if($stmt->execute())
    {
        header("Location:../criteria.php?delete_success=1");
        exit();
    }
    else {
        echo 'Data cannot be deleted';
    }

    $stmt->close();
}

//Deletion of q1
elseif(isset($_POST['del_q1']))
{
    $txtno = $_POST['del_q1'];

    $stmt = $conn->prepare("DELETE FROM `planning_and_lesson_implementation` WHERE `no` = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("i", $txtno);
    if ($stmt->execute()) {
        header("Location:../questionnaires.php?delete_success=1");
        exit();
    } else {
        echo 'Data cannot be deleted. Error: ' . $stmt->error;
    }

    $stmt->close();
}

//Deletion of q2
elseif(isset($_POST['del_q2']))
{
    $txtno = $_POST['del_q2'];

    $stmt = $conn->prepare("DELETE FROM `classroom_management` WHERE `no` = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("i", $txtno);
    if ($stmt->execute()) {
        header("Location:../questionnaires.php?delete_success=1");
        exit();
    } else {
        echo 'Data cannot be deleted. Error: ' . $stmt->error;
    }

    $stmt->close();
}

//Deletion of q3
elseif(isset($_POST['del_q3']))
{
    $txtno = $_POST['del_q3'];

    $stmt = $conn->prepare("DELETE FROM `interpersonal_skills` WHERE `no` = ?");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("i", $txtno);
    if ($stmt->execute()) {
        header("Location:../questionnaires.php?delete_success=1");
        exit();
    } else {
        echo 'Data cannot be deleted. Error: ' . $stmt->error;
    }

    $stmt->close();
}
//Deletion of students
elseif(isset($_POST['del_stud']))
{
    $txtno=$_POST['del_stud'];

    $stmt=$conn->prepare("DELETE FROM `fac_students` WHERE `no`=?");
    if(!$stmt)
    {
        die("Error preparing statement".$conn->error);
    }
    $stmt->bind_param("i", $txtno);
    if($stmt->execute())
    {
        header("location:../faculty_page.php?delete_success=1");
        exit();
    }
    else {
        echo 'Data cannot be deleted. Error: ' . $stmt->error;
    }

    $stmt->close();
}

// --------------------No valid POST data provided--------------------
else {
    die("Error: No valid delete action set.");
}
// Close the database connection
$conn->close();
?>
