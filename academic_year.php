<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="assets/sweetalert2@11"></script>


    <title>Acad year</title>
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
        width: 100%;
        height: 4vh;
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
        background-color: white;
        margin-left: 90px;
        margin-top: 5px;
        max-height: 330px;
        overflow: auto;
        display: inline-block;
        background:linear-gradient( #F6F1F4, white);
        box-shadow: 0 2px 5px black;
    }

    table,
    th,
    td {
        border-collapse: collapse;
        text-align: center;
        border: 1px solid #ddd;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    th {
        position: sticky;
        top: 0;
        background:linear-gradient( #F6F1F4, white);
        font-weight: bold;
    }

    th,
    td {
        width: 150px;
        height: 5vh;
    }

    .eval_td {
        width: 225px;
    }

    button:hover {
        background-color: white;
    }

    .btn_add {
        margin-left: 90px;
        margin-top: 20px;
        height: 5vh;
        width: 150px;
        font-weight: bold;
        box-shadow: 0 0px 5px black;
    }
    .btn_add:hover{
        background-color: #FFBF78;
    }
    input {
        height: 4vh;
        width: 150px;
        font-weight: bold;
        text-align: center;
    }

    .inp_radio {
        width: 20%;
        height: 3vh;
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

    label {
        font-weight: bold;
    }
</style>

<body>
    <?php include 'sideNavBar.php'; ?>
    <div class="nav_box">
        <div class="div_nav">
            <?php include 'topNav.html'; ?>
        </div>

        <h4 style="padding-top:30px; padding-left: 20px;font-weight:bold">Academic Year</h4>
        <hr>

        <!--Button trigger modal  -->
        <button type="button" class=" btn_add btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAcad_Modal">
            Add
        </button>

        <form action="ACTIONS/delete_query.php" id="deleteForm" method="POST">
            <table>
                <tr>
                    <th style="width:5px">#</th>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>System Default</th>
                    <th class="eval_td">Evaluation Status</th>
                    <th style="width:10px" colspan="2">Action</th>
                </tr>
                <tr>
                <?php
                include 'wp-includes/acad_year.php';

                $acad_year = getYear($conn);

                foreach ($acad_year as $row) {
                    ?>
                    <tr>

                            <td><?php echo $row['no'] ?> </td>
                            <td><?php echo $row['year'] ?> </td>
                            <td> <?php echo $row['semester'] ?></td>
                            <td> <?php echo $row['sys_default'] ?> </td>
                            <td><?php echo $row['eval_status'] ?>
                            <td>
                                <button class="btn_edit" type="button" onclick="acad_UpdateModal(
                                                '<?php echo $row['no']; ?>', 
                                                '<?php echo $row['year']; ?>',
                                                '<?php echo $row['semester']; ?>',
                                                '<?php echo $row['sys_default']; ?>', 
                                                '<?php echo $row['eval_status']; ?>' )">
                                    <i class="i_edit fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn_delete" onclick="confirmDelete(<?php echo $row['no']; ?>)"><i
                                        class="i_delete fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php
                        }
                    ?>
            </table>
            <input type="hidden" name="acad_delete" id="deleteInput">
        </form>

    </div>

    <script>
        function confirmDelete(no) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteInput').val(no);
                    $('#deleteForm').submit();
                }
            });
        }

        function acad_UpdateModal(no, year, semester, sys_default, eval_status) {
            $('#updateNo').val(no);
            $('#update-Year').val(year);

            // Set the semester radio button
            if (semester === "1st") {
                $('#update-semester1').prop('checked', true);
            } else if (semester === "2nd") {
                $('#update-semester2').prop('checked', true);
            }

            // Set the sys_default radio button
            if (sys_default === "Yes") {
                $('#update-sysDefaultYes').prop('checked', true);
            } else if (sys_default === "No") {
                $('#update-sysDefaultNo').prop('checked', true);
            } else {
                // Clear both radio buttons if neither matches
                $('#update-sysDefaultYes').prop('checked', true);
                $('#update-sysDefaultNo').prop('checked', true);
            }

            // Set the eval_status radio button
            if (eval_status === "Starting") {
                $('#update-evalStatusStarting').prop('checked', true);
            } else if (eval_status === "Not Yet Started") {
                $('#update-evalStatusNotYetStarted').prop('checked', true);
            }

            $('#acad_UpdateModal').modal('show');
        }
    </script>

</body>

</html>