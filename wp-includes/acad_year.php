<?php

include 'DATABASE/db.php';
include 'ACTIONS/modals.php';

//COUNT DATA 
function getRowCount_acadyr($tableName, $conn) {
    $sql = "SELECT COUNT(*) as total FROM $tableName";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return "Error: " . $conn->error; // Return error message if query fails
    }
}

function getYear($conn)
{
    $sql = "SELECT `no`, `year`, `semester`, `sys_default`, `eval_status` FROM `academic_year`  ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $acadYr = [];
        while ($row = $result->fetch_assoc()) {
            $acadYr[] = $row; // Store each row in an array
        }
        return $acadYr;
    } else {
        return []; // Return an empty array if no records found
    }
}


?>