<style>
    .h4_nav {
        padding-top: 5px;
        padding-left: 10px;
        font-size: 19px;
        font-weight: bold;
        width: 100%;
        height: 6vh;
        background: linear-gradient(#F6F1F4, white);

        top: 0px;
    }

    h6 {
        padding-left: 25px;

    }
</style>


<h4 class="h4_nav">&nbsp;&nbsp;Faculty Evaluation System
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    <i class="fa-solid fa-user-tie"></i>
    <?php
    include 'DATABASE/db.php';

    // Check if the faculty_id is set in the session
    if (isset($_GET['faculty_id'])) {
        $faculty_id = $_GET['faculty_id'];

        // Query to fetch faculty details based on the logged-in faculty_id
        $qry = "SELECT `firstname`, `lastname` FROM `faculties` WHERE `faculty_id` = '$faculty_id'";
        $connects = $conn->query($qry);

        // Check if the query returns any results
        if ($connects->num_rows > 0) {
            while ($row = $connects->fetch_assoc()) {
                echo $row['firstname'] . " " . $row['lastname'];
            }
        } else {
            echo "No data found for this faculty.";
        }
    } else {
        echo "User not logged in.";
    }
    ?>
</h4>

<?php

include 'DATABASE/db.php';

// Check if the faculty_id is set in the session
if (isset($_GET['faculty_id'])) {
    $faculty_id = $_GET['faculty_id'];

    // Query to fetch faculty details based on the logged-in faculty_id
    $qry = "SELECT `firstname`, `lastname` FROM `faculties` WHERE `faculty_id` = '$faculty_id'";
    $connects = $conn->query($qry);

    // Check if the query returns any results
    if ($connects->num_rows > 0) {
        while ($row = $connects->fetch_assoc()) {
            ?>
            <h6><b>Name:</b>&nbsp; <?php echo $row['firstname'] . " " . $row['lastname']; ?> </h6>
        <?php }
    } else {
        echo "No data found for this faculty.";
    }
} else {
    echo "User not logged in.";
}
?>


<?php
include 'DATABASE/db.php';

if (isset($_GET['faculty_id'])) {
    $faculty_id = $_GET['faculty_id'];
    $txtsys_default = $_POST['sys_default'];

    $sel = "SELECT `no`, `year`, `semester`, `sys_default`, `eval_status` FROM `academic_year` WHERE `sys_default`='Yes' ";
    $res = $conn->query($sel);

    // Check if the query returned any rows
    if ($res && $res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            ?>
            <h6><b>Academic Year:</b>&nbsp; <?php echo htmlspecialchars($row['year'], ENT_QUOTES, 'UTF-8'); ?> </h6>
            <h6><b>Semester:</b> &nbsp; <?php echo htmlspecialchars($row['semester'], ENT_QUOTES, 'UTF-8'); ?> </h6>
            <h6><b>Evaluation Status:</b>&nbsp; <?php echo htmlspecialchars($row['eval_status'], ENT_QUOTES, 'UTF-8'); ?></h6>
            <?php
        }
    }
} else {
    echo "<p>No academic year data found.</p>";
}
?>
<hr>