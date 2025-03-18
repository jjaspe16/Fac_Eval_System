<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="assets/sweetalert2@11"></script>
    

    <title>Department</title>
</head>
<style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }


    body {
        width: 100%;
        font-family: aachen;
        display: flex;
    }

    .nav_box {
        width: 120%;
        height: 90vh;
    }

    .div_nav {
        width: 85%;
        height: 6vh;
        background-color: #F6F1F4;
    }

    .img_box {
        width: 65%;
        height: 20vh;
        margin-top: 10px;
        background-image: url("seeait_logo-removebg-preview.png");
        background-size: contain;
        background-repeat: no-repeat;
        margin-left: 40px;
    }

    ul {
        margin-top: 20px;


    }

    li {
        list-style: none;
        height: 6vh;
        font-weight: bold;
        padding-top: 8px;
        border-radius: 5px;
    }

    li:hover {
        background-color: rgb(141, 141, 235)
    }

    a {
        text-decoration: none;
        color: black;
    }

    table {
        background:linear-gradient( #F6F1F4, white);
        margin-left: 10px;
        margin-top: 5px;
        max-height: 390px;
        overflow: auto;
        display: inline-block;
        box-shadow: 0 2px 5px black;
    }

    table,
    th,
    td {
        border-collapse: collapse;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        position: sticky;
        top: 0;
        background:linear-gradient( #F6F1F4, white);
        font-weight: bold;
    }

    th,
    td {
        width: 180px;
        height: 5vh;
    }

    button:hover {
        background-color: white;
    }

    .btn_search {
        margin-left: 10px;
        height: 5vh;
        margin-top: 0px;
        border-style: none;
        background-color: white;
    }

    .btn_search:hover {
        font-size: 20px;
        transition: all ease-in .1s;
    }

    input {
        height: 4vh;
        width: 150px;
        font-weight: normal;
        text-align: center;
    }
</style>

<body>
    <?php
    include 'sideNavBar.php';
    ?>

    <div class="nav_box">

        <?php
        include 'topNav.html';
        ?>


        <h4 style="padding-top:30px; padding-left: 20px;font-weight:bold">Students</h4>
        <hr>

        <form action="" method="POST">

            <button type="submit" name="search_stud" class="btn_search"><i
                    class="fa-solid fa-magnifying-glass"></i>&nbsp;</button>
            <input type="text" name="search" placeholder="input text">
        </form>

        <form action="" method="POST">
            <table>
                <tr>
                    <th>#</th>
                    <th style="width:40px">ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Class</th>
                    <th>Password</th>
                    <!-- <th style="width:10px" colspan="2">Action</th> -->
                </tr>
                <?php
                include 'DATABASE/db.php';
                $search = "";
                if (isset($_POST['search_stud'])) {
                    $search = $_POST['search'];
                }

                $sql = "SELECT `no`, `stud_id`, `firstname`, `lastname`, `subject`, 
                                        `class`, `password` FROM `fac_students` ";
                if ($search != "") {
                    $sql .= " WHERE `stud_id` LIKE '%$search%' OR `firstname` LIKE '%$search%' OR 
                                        `lastname` LIKE '%$search%' OR `subject` LIKE '%$search%' OR `class` LIKE '%$search%' OR `password` LIKE '%$search'";
                }
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['no'] ?></td>
                            <td><?php echo $row['stud_id'] ?></td>
                            <td><?php echo $row['firstname'] ?></td>
                            <td><?php echo $row['lastname'] ?></td>
                            <td><?php echo $row['class'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <!-- <td>
                            <button style="background-color:green"><a href="edit_student.php?no=<?php echo $row['no']; ?>"  style="color:white">EDIT</a></button>
                            <button style="background-color:red" ><a href="delete_student.php?no=<?php echo $row['no']; ?> " style="color:white">DELETE</a></button>
                        </td>-->
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </form>

    </div>
</body>

</html>