<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Custom Scripts -->
    <link href="assets/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/all.min.css">

    <script src="assets/sweetalert2@11"></script>
    <title>Fac_Students</title>
</head>
<style>
    table {
        background-color: #F6F1F4;
        margin: 20px;
        max-height: 250px;
        overflow: auto;
        display: block;
    }

    h5 {
        font-weight: bold;
        margin: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
        border-collapse: collapse;
        text-align: center;
    }
    th {
        position: sticky;
        top: 0;
        background:linear-gradient(#F6F1F4,white);
        font-weight: bold;
    }
    th,
    td {
        width: 120px;
        height: 4vh;
    }
    h4 {
        padding-left: 20px;
    }
    .btn_add {
        margin-top:30px;
        margin-left:20px;
        width: 70px;
        height: 5vh;
    }
    .btn_add:hover{
        background-color: #FFBF78;
    }
    .add-search {
        display: flex;
        height: 8vh;
    }

    .btn_search {
        margin-left: 790px;
        margin-top:30px;
        height: 5vh;
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
        font-weight: nomal;
        text-align: center;
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

    @media (max-width: 768px) {

        table,
        th,
        td {
            width: auto;
            font-size: 12px;
        }

        .btn_search {
            margin-left: 0;
            width: auto;
        }

        input {
            width: 100%;
        }

        .add-search {
            flex-direction: column;
        }
    }

    .input_class-class,
    td {
        text-transform: Sentence;
    }

    @media (max-width: 576px) {

        .btn_add,
        .btn_search {
            width: 100%;
            margin: 10px 0;
        }

        input {
            width: 100%;
            margin-top: 10px;

        }

        table {
            margin: 10px;
        }

        th,
        td {
            font-size: 10px;
        }
    }
</style>

<body>
    <?php include 'ACTIONS/modals.php'; ?>
    <h5>Total Student Evaluated:</h5>
    <div class="add-search">

        <button type="button" name="added" class="btn_add btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#addStud"> Add
        </button>

        <form action="" method="POST">
            <button type="submit" name="search_stud" class="btn_search">
                <i class="fa-solid fa-magnifying-glass"></i>&nbsp;</button>
            <input type="text" style="text-align:center" name="search" placeholder="input text...">
        </form>
    </div>


    <!--delete form -->
    <form action="ACTIONS/delete_query.php" id="delete_stud_form" method="POST">
        <table>
            <tr>
                <th>#</th>
                <th style="width:40px">ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th style="width:220px">Subject</th>
                <th>Class</th>
                <th>Password</th>
                <th style="width:10px" colspan="2">Action</th>
            </tr>

            <?php
            $search = isset($_POST['search_stud']) ? $_POST['search'] : '';
            $sql = "SELECT `no`, `stud_id`, `firstname`, `lastname`,`subject`,`class`,`password` FROM `fac_students`";
            if ($search) {
                $sql .= " WHERE `stud_id` LIKE '%$search%' OR `firstname` LIKE '%$search%' OR `lastname` LIKE '%$search%' 
                                OR `subject` LIKE '%$search%' OR `class` LIKE '%$search%' OR `password` LIKE '%$search%'  ";
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['no']; ?></td>
                        <td><?php echo $row['stud_id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td <?php echo $row['class']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td>
                            <button class="btn_edit" type="button" onClick="stud_updateModal(
                                     <?php echo $row['no']; ?>,                                   
                                     '<?php echo $row['stud_id']; ?>', 
                                     '<?php echo $row['firstname']; ?>', 
                                     '<?php echo $row['lastname']; ?>',
                                     '<?php echo $row['subject']; ?>',
                                     '<?php echo $row['class']; ?>',
                                     '<?php echo $row['password']; ?>' )">

                                <i class="i_edit fa-solid fa-pen-to-square"></i>
                            </button>

                            <button type="button" class="btn_delete" name="del_stud"
                                onclick="confirmDelete(<?php echo $row['no']; ?>)">
                                <i class="i_delete fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
        <input type="hidden" name="del_stud" id="deleteStud_input">
    </form>


    <script>

        function stud_updateModal(no, stud_id, firstname, lastname, subject, class, password)
        {
            $('#updateNo').val(no);
            $('#updateID').val(stud_id);
            $('#updateFname').val(firstname);
            $('#updateLname').val(lastname);
            $('#updateSubject').val(subject);
            $('#updateClass').val(class);
            $('#updatePassword').val(password);
            $('#stud_updateModal').modal('show');
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
                    document.getElementById('deleteStud_input').value = no;
                    document.getElementById('delete_stud_form').submit();
                }
            })
        }

    </script>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>