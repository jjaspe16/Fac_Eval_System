<?php

include 'DATABASE/db.php';

//COUNT DATA 
function getRowCount_subj($tableName, $conn) {
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
function searchSubjects($conn, $search)
{
    $sql = "SELECT `no`, `code`, `subject` FROM `subjects`";
    
    if (!empty($search)) {
        $sql .= " WHERE `code` LIKE ? OR `subject` LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close(); // Close statement to free resources
        return $result;
    } 
    
    return $conn->query($sql);
}

// DISPLAY
function displaySubjects($result)
{
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td style='text-align:center'>" . htmlspecialchars($row['no']) . "</td>
                    <td>" . htmlspecialchars($row['code']) . "</td>
                    <td>" . htmlspecialchars($row['subject']) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3' style='text-align:center'>No results found</td></tr>";
    }
}

?>