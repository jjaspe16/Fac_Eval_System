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

    <title>Faculty Page</title>
</head>

<style>
    /* Base styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        width: 100%;
        height: 100vh;
        font-family: aachen;
        display: flex;

    }

    .container {
        width: 240px;
        background-color:#F6F1F4;
    }

    .box {
        width: 100%;
        height: 100vh;
        margin-left: 40px;
    }

    table {
        background-color: #F6F1F4;
        margin: 5px auto;
        max-height: 360px;
        overflow: auto;
        display: block;
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

    .add-search {
        display: flex;

    }

    .btn_add {
        margin-left: 20px;
        margin-top: 30px;
        height: 5vh;
        width: 120px;
        font-weight: bold;
        box-shadow: 0 0px 5px black;
    }
    .btn_add:hover{
        background-color: #FFBF78;
    }
    .btn_search {
        margin-left: 450px;
        height: 5vh;
        margin-top: 30px;
        border-style: none;
        background-color: white;
    }

    .btn_search:hover {
        font-size: 20px;
        transition: all ease-in .1s;
    }

    input {
        height: 4vh;
        width: 175px;
        font-weight: normal;
        text-align: center;
 
    }

    .input_class {
        height: 6vh;
        text-align: center;
        margin: 5px auto;
        text-transform: uppercase;
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

    /* Media queries for responsiveness */

    /* For larger screens (desktops and laptops) */
    @media (min-width: 1200px) {
        .container {
            width: 240px;
        }

        .box {
            margin-left: 45px;
        }

        table {
            margin-left: 190px;
            display: inline-block;
        }

        .btn_add {
            margin-left: 190px;
        }

        .btn_search {
            margin-left: 450px;
        }
    }

    /* For medium screens (tablets in landscape mode) */
    @media (min-width: 768px) and (max-width: 1199px) {
        .container {
            width: 200px;
        }

        .box {
            margin-left: 20px;
        }

        table {
            margin-left: 100px;
            display: inline-block;
        }

        .btn_add {
            margin-left: 100px;
        }

        .btn_search {
            margin-left: 180px;
        }
    }

    /* For small screens (tablets and large phones) */
    @media (min-width: 576px) and (max-width: 767px) {
        .container {
            width: 180px;
        }

        .box {
            margin-left: 10px;
        }

        table {
            margin-left: 50px;
            display: inline-block;
        }

        .btn_add {
            margin-left: 50px;
        }

        .btn_search {
            margin-left: 100px;
        }
    }

    /* For extra small screens (phones) */
    @media (max-width: 575px) {
        body {
            flex-direction: column;
            display: flex;
        }

        .container {
            width: 100%;
        }

        .box {
            margin-left: 0;
            padding: 10px;
        }

        table {
            margin: 5px auto;
            width: 100%;
        }

        .btn_add {
            margin: 10px auto;
        }

        .btn_search {
            margin: 5px auto;
        }

        input {
            width: 100%;
        }
    }
</style>

<body>
<?php include 'ACTIONS/modals.php'; ?>
    <div class="container">

        <?php
        include 'side_con-fac.php';
        ?>
    </div><br>

    <div class="box">
        <?php
        include 'fac_navigation.php';
        ?>

        <div class="add-search">
            <button type="button" name="added" class=" btn_add btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#addFacClass">
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
            <input type="hidden" name="class_fac_delete" id="deleteInput">
        </form>

        <!-- Success Alert Scripts -->
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <script>
                Swal.fire({
                    title: 'Data Added!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                    timer: 3000
                });
            </script>
        <?php endif; ?>

    </div>

    <!-- JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>


    <script>

    /*  function classUpdateModal(no, course, yearLevel, set) {

            $('#updateNo').val(no);
            $('#updateCourse').val(course);
            $('#updateYrLevel').val(year_level);
            $('#updateSet').val(Set);
            $('#classUpdateModal').modal('show');
        }*/
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