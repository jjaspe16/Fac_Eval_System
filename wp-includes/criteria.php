<?php

include 'DATABASE/db.php';

//COUNT DATA 
function getRowCount_criteria($tableName, $conn) {
    $sql = "SELECT COUNT(*) as total FROM $tableName";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return "Error: " . $conn->error; // Return error message if query fails
    }
}


function getCriteria($conn)
{
    $sql = " SELECT `no`, `criteria` FROM `criterias`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $Criteria = [];
        while ($row = $result->fetch_assoc()) {
            $Criteria[] = $row; // Store each row in an array
        }
        return $Criteria;
    } else {
        return []; // Return an empty array if no records found
    }
}

?>