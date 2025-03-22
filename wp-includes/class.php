<?php

include 'DATABASE/db.php';

//COUNT DATA 
function getRowCount_class($tableName, $conn) {
    $sql = "SELECT COUNT(*) as total FROM $tableName";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return "Error: " . $conn->error; // Return error message if query fails
    }
}


// RETRIEVE
function searchClass($conn, $search)
{
    $sql = "SELECT `no`, `course`, `year_level`, `Set` FROM `class`";
    
    if (!empty($search)) {
        $sql .= " WHERE `course` LIKE ? OR `year_level` LIKE ? OR  `Set` LIKE ? ";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("sss", $searchTerm, $searchTerm,  $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close(); // Close statement to free resources
        return $result;
    } 
    
    return $conn->query($sql);
}

// DISPLAY
function displayClass($result)
{
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td style='text-align:center'>" . htmlspecialchars($row['no']) . "</td>
                    <td>" . htmlspecialchars($row['course']) . "</td>
                    <td>" . htmlspecialchars($row['year_level']) . "</td>
                     <td>" . htmlspecialchars($row['Set']) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3' style='text-align:center'>No results found</td></tr>";
    }
}



?>