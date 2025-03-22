<?php

require_once 'DATABASE/db.php';
include_once 'ACTIONS/modals.php';

function getQuest1($conn)
{
    $sql = "SELECT `no`, `question` FROM `planning_and_lesson_implementation`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $quest1 = [];
        while ($row = $result->fetch_assoc()) {
            $quest1[] = $row; // Store each row in an array
        }
        return $quest1;
    } else {
        return []; // Return an empty array if no records found
    }
}

function getQstn2($conn)
{
    $sql ="SELECT  `no`, `question` FROM `classroom_management`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $quest2 = [];
        while ($row = $result->fetch_assoc()) {
            $quest2[] = $row; // Store each row in an array
        }
        return $quest2;
    } else {
        return []; // Return an empty array if no records found
    }
}

function getQuest3($conn)
{
    $sql ="SELECT `no`, `question` FROM `interpersonal_skills`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $quest3 = [];
        while ($row = $result->fetch_assoc()) {
            $quest3[] = $row; // Store each row in an array
        }
        return $quest3;
    } else {
        return []; // Return an empty array if no records found
    }
}
?>
