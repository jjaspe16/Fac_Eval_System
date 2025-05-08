<?php

include 'DATABASE/db.php';
include 'ACTIONS/modals.php';

//COUNT DATA 
function getRowCount_depart($tableName, $conn)
{

    $sql = "SELECT COUNT(*) as total FROM `$tableName`";
    $result = $conn->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        return $row['total'];
    } else {
        return "Error: " . $conn->error;
    }
}



//RETRIEVE
function getDepartments($conn)
{
    $sql = "SELECT `no`, `department` FROM `department`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $departments = [];
        while ($row = $result->fetch_assoc()) {
            $departments[] = $row; // Store each row in an array
        }
        return $departments;
    } else {
        return []; // Return an empty array if no records found
    }
}


?>