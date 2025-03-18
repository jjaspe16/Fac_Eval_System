<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="assets/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">


    <title>Class</title>
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

    .nav_box {

        width: 120%;
        height: 90vh;

    }

    .add-search {
        display: flex;
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
        margin-left: 190px;
        margin-top: 5px;
        max-height: 420px;
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
        width: 120px;
        height: 5vh;
    }

    button:hover {
        background-color: white;
    }

    .btn_add {
        margin-left: 190px;
        margin-top: 0px;
        height: 5vh;
        width: 120px;
        font-weight: bold;
        box-shadow: 0 0px 5px black;
    }
    .btn_add:hover{
        background-color: #FFBF78;
    }
    .btn_search {
        margin-left: 440px;
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
        width: 180px;
        font-weight: normal;
        text-align: center;
        margin-top: 20px;
    }

    .input_class {
        height: 6vh;
        text-align: center;
        margin-top: 5px;
    }

    .btn_delete,
    .btn_edit {
        border-style: none;
        width: 28px;
    }

    .i_edit {
        color: green;
        font-size: 18px;
    }

    .i_delete {
        color: red;
        font-size: 18px;
    }
</style>

<body>

    <?php include 'sideNavBar.php'; ?>

    <div class="nav_box">
        <?php include 'topNav.html'; ?>

        <h4 style="padding-top:30px; padding-left: 20px;font-weight:bold">Classes</h3>
            <hr>

            <div class="add-search">
                <button type="button" name="added" class=" btn_add btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addClass">
                    Add
                </button>

                <form action="" method="POST">
                    <button type="submit" name="search_class" class="btn_search">
                        <i class="fa-solid fa-magnifying-glass"></i>&nbsp;</button>
                    <input type="text" style="text-align:center" name="search" placeholder="input text...">
                </form>
            </div>


            <form action="ACTIONS/delete_query.php" id="deleteForm" method="POST">
                <table>
                    <tr>
                        <th>#</th>
                        <th style="width:300px">Course/Majors</th>
                        <th>Year Level</th>
                        <th>Set</th>
                        <th style="width:40px" colspan="2">Action</th>
                    </tr>
                    <?php
                         include 'ACTIONS/modals.php';
                    $search = "";
                    if (isset($_POST['search_class'])) {
                        $search = $_POST['search'];
                    }

                    $sql = "SELECT `no`, `course`, `year_level`, `Set` FROM `class`";
                    if ($search != "") {
                        $sql .= " WHERE `course` LIKE '%$search%' OR `year_level` LIKE '%$search%' OR `Set` LIKE '%$search%'";
                    }
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['no']; ?></td>
                                <td><?php echo $row['course']; ?></td>
                                <td><?php echo $row['year_level']; ?></td>
                                <td><?php echo $row['Set']; ?></td>
                                <td>
                                    <button class="btn_edit" type="button"
                                    onclick="classUpdateModal(
                                                                 <?php echo $row['no']; ?>,
                                                                 '<?php echo $row['course']; ?>', 
                                                                 '<?php echo $row['year_level']; ?>', 
                                                                 '<?php echo $row['Set']; ?>')">
                                        <i class="i_edit fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn_delete" onclick="confirmDelete(<?php echo $row['no']; ?>)">
                                        <i class="i_delete fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                <input type="hidden" name="class_delete" id="deleteInput">
            </form>

    </div>
    <script>
        function classUpdateModal(no, course, year_level, Set) {

            $('#updateNo').val(no);
            $('#updateCourse').val(course);
            $('#updateYrLevel').val(year_level);
            $('#updateSet').val(Set);
            $('#classUpdateModal').modal('show');
        }

        function confirmDelete(no) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteInput').value = no;
                    document.getElementById('deleteForm').submit();
                }
            })
        }
    </script>

</body>

</html>