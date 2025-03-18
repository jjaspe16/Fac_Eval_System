<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="assets/sweetalert2@11"></script>
    <script src="assets/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">


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
        height: 100vh;
    }

    table {
        background:linear-gradient( #F6F1F4, white);
        margin: 10px auto;
        /* Center the table with automatic margins */
        max-height: 390px;
        overflow: auto;
        display: block;
        /* Block display to handle overflow */
        box-shadow: 0 2px 5px black;
        width: 80%;
        /* Use relative width for responsiveness */
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
        width: 150px;
        /* Adjusted to be more responsive */
        height: 5vh;
        padding: 5px;
        /* Added padding for better readability */
    }
    .btn_add {
        margin-left: 110px;
        height: 5vh;
        width: 130px;
        font-weight: bold;
        box-shadow: 0 0 5px black;
        border: none;
        /* Removed default border */
        border-radius: 5px;
        /* Rounded corners */
        cursor: pointer;
        /* Pointer cursor on hover */
    }
    .btn_add:hover{
        background-color: #FFBF78;
    }

    input {
        height: 4vh;
        width: 100%;
        /* Full width for responsiveness */
        max-width: 200px;
        /* Maximum width */
        font-weight: bold;
        text-align: center;
        margin: 10px 0;
        /* Vertical margin for spacing */
        padding: 5px;
        /* Added padding for better readability */
        box-sizing: border-box;
        /* Include padding in width/height */
    }

    .btn_delete,
    .btn_edit {
        border-style: none;
        width: 28px;
        height: 28px;
        /* Ensure buttons are square */
        cursor: pointer;
        /* Pointer cursor on hover */
    }

    .i_edit {
        color: green;
        font-size: 18px;
    }

    .i_delete {
        color: red;
        font-size: 18px;
    }

    /* Responsive styles */
    @media (max-width: 1200px) {

        table,
        .btn_add {
            width: 100%;
            /* Full width for smaller screens */
            margin: 10px;
            /* Consistent margin */
        }
    }

    @media (max-width: 768px) {

        th,
        td {
            width: 120px;
            /* Adjust column width for smaller screens */
            font-size: 14px;
            /* Adjust font size */
        }

        .btn_add {
            width: 100%;
            /* Full width buttons */
            height: 6vh;
            /* Adjust height */
            font-size: 14px;
            /* Adjust font size */
        }

        input {
            width: 100%;
            /* Full width input fields */
            max-width: none;
            /* Remove max width restriction */
        }
    }

    @media (max-width: 576px) {

        th,
        td {
            width: 100px;
            /* Further adjust column width */
            font-size: 12px;
            /* Further adjust font size */
            padding: 3px;
            /* Adjust padding */
        }

        .btn_add {
            height: 5vh;
            /* Adjust height */
            font-size: 12px;
            /* Adjust font size */
        }
    }
</style>

<body>
  
    <?php include 'sideNavBar.php'; ?>
    <div class="nav_box">

        <?php include 'topNav.html'; ?>


        <h4 style="padding-top:30px; padding-left: 20px;font-weight:bold">Majors</h4>
        <hr>

        <!-- Button trigger modal for Adding a Major -->
        <button type="button" class="btn_add btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add
        </button><br>

        <!-- Table to display the data -->
        <form action="ACTIONS/delete_query.php" method="POST" id="deleteForm">
            <table>
                <tr>
                    <th>#</th>
                    <th style="width:570px">Majors</th>
                    <th style="width:10px" colspan="2">Action</th>
                </tr>
                <?php 
                include 'DATABASE/db.php';
                include 'ACTIONS/modals.php'; 
                $sql = "SELECT `no`, `department` FROM `department` ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['no'] ?></td>
                            <td><?php echo $row['department'] ?></td>
                            <td>
                                <button class="btn_edit" type="button" onclick="major_updateModal(<?php echo $row['no']; ?>, 
                                        '<?php echo $row['department']; ?>')">
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
            <input type="hidden" name="major_delete" id="deleteInput">
        </form>

    </div>


    <script>
        function major_updateModal(no, department) {
            $('#updateNo').val(no);
            $('#updateDepartment').val(department);
            $('#major_updateModal').modal('show');
        }

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
            })
        }
    </script>

</body>

</html>