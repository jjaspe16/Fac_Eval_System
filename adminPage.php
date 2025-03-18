<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--     <link rel="stylesheet" href="assets/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="assets/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">-->

    <title>Admin Page</title>
</head>
<style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    body {
        width: 100%;
        height: 100vh;
        font-family: aachen;
        display: flex;
    }


    .div_nav {
        width:120%;
        height: 6vh; 
        background-color: #F6F1F4;

    }

    .boxes {
        width: 100%;
        height: 95vh;
        background-color: #F8F4FF;
    }

    .row1 {
        width: 100%;
        height: 30vh;
        display: flex;
    }

    .row2 {
        width: 100%;
        height: 30vh;
        display: flex;
    }

    .box {
        width: 23%;
        height: 27vh;
        margin-top: 20px;
        margin-left: 10px;
        box-shadow: 0 2px 5px black;
        border-radius: 5px;
    }

    .box:hover {
        transition: all .6s ease-in-out;
        transform: scale(1.1);
    }

    h4 {
        padding-top: 15px;
        padding-left: 15px;
        font-weight: bold;
        text-align: center;
    }

    .h5_div {
        height: 7vh;
        margin-left: 5px;
    }

    .icon_div {
        height: 10vh;
    }

    h3 {
        text-align: left;
        font-weight: normal;
        margin-top: 15px;
    }
</style>

<body>

    <?php
    include 'sideNavBar.php';
    ?>

    <div class="div_nav">
        <?php
        include 'topNav.html';
        ?>

        <div class="boxes">

            <div class="row1">
                <div class="box">
                    <div class="h5_div">
                        <h5>Majors</h5>
                    </div>
                    <div class="icon_div">
                        <i style="font-size: 68px; margin-left: 100px;" class="fa-solid fa-building-columns"></i>
                    </div>
                    <h4>
                        <?php
                        include 'DATABASE/db.php';

                        $sql = "SELECT COUNT(*) as no FROM department";
                        $result = $conn->query($sql);

                        if ($result) {
                            // Fetch the result as an associative array
                            $row = $result->fetch_assoc();

                            echo $row['no'];
                        }
                        ?>
                    </h4>
                </div>
                <div style="background-color: rgb(242, 102, 102);" class="box">
                    <div class="h5_div">
                    <h5>Subjects</h5>
                    </div>
                    <div class="icon_div">
                        <i style="font-size: 68px; margin-left: 100px;" class="bi bi-journal-album"></i>
                    </div>
                    <h4>
                        <?php
                        include 'DATABASE/db.php';

                        $sql = "SELECT COUNT(*) as no FROM subjects";
                        $result = $conn->query($sql);

                        if ($result) {
                            // Fetch the result as an associative array
                            $row = $result->fetch_assoc();

                            echo $row['no'];
                        }
                        ?>
                    </h4>
                </div>
                <div style="background-color: rgb(239, 239, 124);" class="box">
                    <div class="h5_div">
                    <h5>Classes</h5>
                    </div>
                    <div class="icon_div">
                        <i style="font-size: 68px; margin-left: 100px;" class="fa-solid fa-chalkboard"></i>
                    </div>
                    <h4>
                        <?php
                        include 'DATABASE/db.php';

                        $sql = "SELECT COUNT(*) as no FROM class";
                        $result = $conn->query($sql);

                        if ($result) {
                            // Fetch the result as an associative array
                            $row = $result->fetch_assoc();

                            echo $row['no'];
                        }
                        ?>
                    </h4>
                </div>
                <div style="background-color: rgb(247, 24, 210)" class="box">
                    <div class="h5_div">
                    <h5>Academic Year</h5>
                    </div>
                    <div class="icon_div">
                        <i style="font-size: 68px; margin-left: 100px;" class="fa-solid fa-calendar-check"></i>
                    </div>
                    <h4>
                        <?php
                        include 'DATABASE/db.php';

                        $sql = "SELECT COUNT(*) as no FROM academic_year";
                        $result = $conn->query($sql);

                        if ($result) {
                            // Fetch the result as an associative array
                            $row = $result->fetch_assoc();

                            echo $row['no'];
                        }
                        ?>
                    </h4>
                </div>
            </div>
            <div class="row2">
                <div style="background-color: rgb(252, 187, 131);" class="box">
                    <div class="h5_div">
                    <h5>Faculties</h5>
                    </div>
                    <div class="icon_div">
                        <i style="font-size: 68px; margin-left: 100px;" class="fa-solid fa-person-chalkboard"></i>
                    </div>
                    <h4>
                        <?php
                        include 'DATABASE/db.php';

                        $sql = "SELECT COUNT(*) as no FROM faculties";
                        $result = $conn->query($sql);

                        if ($result) {
                            // Fetch the result as an associative array
                            $row = $result->fetch_assoc();

                            echo $row['no'];
                        }
                        ?>
                    </h4>
                </div>
                <div style="background-color: lightgreen;" class="box">
                    <div class="h3_div">
                    <h5>Students</h5>
                    </div>
                    <div class="icon_div">
                        <i style="font-size: 68px; margin-left: 100px;" class="fa-solid fa-user-graduate"></i>
                    </div>
                    <h4>
                        <?php
                        include 'DATABASE/db.php';

                        $sql = "SELECT COUNT(*) as no FROM fac_students";
                        $result = $conn->query($sql);

                        if ($result) {
                            // Fetch the result as an associative array
                            $row = $result->fetch_assoc();

                            echo $row['no'];
                        }
                        ?>
                    </h4>
                </div>
                <div style="background-color: rgb(22, 220, 220);" class="box">
                    <div class="h5_div">
                    <h5>Evaluation Criteria</h5>
                    </div>
                    <div class="icon_div">
                        <i style="font-size: 68px; margin-left: 100px;" class="bi bi-list-check"></i>
                    </div>
                    <h4> <?php
                    include 'DATABASE/db.php';

                    $sql = "SELECT COUNT(*) as no FROM criterias";
                    $result = $conn->query($sql);

                    if ($result) {
                        // Fetch the result as an associative array
                        $row = $result->fetch_assoc();

                        echo $row['no'];
                    }
                    ?></h4>
                </div>
                <div style="background-color: orange;" class="box">
                    <div class="h5_div">
                    <h5>Evaluation Reports</h5>
                    </div>
                    <div class="icon_div">
                        <i style="font-size: 68px; margin-left: 100px;" class="fa-solid fa-file-contract"></i>
                    </div>
                <h5></h5>
                        </h1>
                </div>

            </div><!--boxes-->
        </div> <!--nav-->



</body>

</html>