<?php

include 'DATABASE/db.php';

//COUNT DATA 
function getRowCount_stud($tableName, $conn) {
    $sql = "SELECT COUNT(*) as total FROM $tableName";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return "Error: " . $conn->error; // Return error message if query fails
    }
}


function searchStud($conn, $search)
{
    $sql = "SELECT `no`, `stud_id`, `firstname`, `lastname`, `className`, `password` FROM `fac_students`";
    
    if (!empty($search)) {
        $sql .= " WHERE `stud_id` LIKE ? OR `firstname` LIKE ? OR `lastname` LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close(); // Free resources
        return $result;
    } 
    
    return $conn->query($sql);
}


function displayStud($result)
{
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td style='text-align:center'>" . htmlspecialchars($row['no']) . "</td>
                    <td>" . htmlspecialchars($row['stud_id']) . "</td>
                    <td>" . htmlspecialchars($row['firstname']) . "</td>
                     <td>" . htmlspecialchars($row['lastname']) . "</td>
                    <td>" . htmlspecialchars($row['subject']) . "</td>
                    <td>" . htmlspecialchars($row['className']) . "</td>
                     <td>" . htmlspecialchars($row['password']) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3' style='text-align:center'>No results found</td></tr>";
    }
}


?>