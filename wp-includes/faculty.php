<?php
include 'DATABASE/db.php';

function getRowCount_fac($table_name, $conn)
{
    $sql = "SELECT COUNT(*) as total FROM $table_name";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else
        return "Error: " . $conn->error;
}

function searchFac($conn, $search)
{
    $sql = "SELECT no, faculty_id, firstname, lastname, subject, email, f_password  FROM faculties";

    if (!empty($search)) {
        $sql .= " WHERE `faculty_id` LIKE ? OR `firstname` LIKE ? OR  `lastname` LIKE ? OR `subject`LIKE ?  OR `email` LIKE ?  OR `f_password` LIKE ? ";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("ssssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close(); // Close statement to free resources
        return $result;
    }

    return $conn->query($sql);
}

// DISPLAY
function displayFac($result)
{
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td style='text-align:center'>" . htmlspecialchars($row['no']) . "</td>
                    <td>" . htmlspecialchars($row['faculty_id']) . "</td>
                    <td>" . htmlspecialchars($row['firstname']) . "</td>
                     <td>" . htmlspecialchars($row['lastname']) . "</td>
                    <td>" . htmlspecialchars($row['subject']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                     <td>" . htmlspecialchars($row['f_password']) . "</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3' style='text-align:center'>No results found</td></tr>";
    }
}






?>