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


    <title>Faculty</title>
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
        background-color: rgb(141, 141, 235);
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
        width: 200px;
        height: 5vh;
        
    }

    button:hover {
        background-color: white;
    }

    .btn_add {
        margin-left: 10px;
        margin-top: 20px;
        height: 5vh;
        width: 120px;
        font-weight: bold;
        box-shadow: 0 0px 5px black;
        background-color: royalblue;
    }
    .btn_add:hover{
        background-color: #FFBF78;
    }
    .btn_search {
        margin-left: 750px;
        height: 5vh;
        margin-top: 20px;
        border-style: none;
        background-color: white;
    }

    .btn_search:hover {
        transition: all ease-in .1s;
    }

    input {
        height: 4vh;
        width: 200px;
        font-weight: normal;
        text-align: center;
        margin-top: 20px;
    }

    .input_class {
        width: 310px;
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
    <?php include 'ACTIONS/modals.php'; ?>
    <?php include 'sideNavBar.php'; ?>

    <div class="nav_box">

        <?php include 'topNav.html'; ?>


        <h4 style="padding-top:30px; padding-left: 20px;font-weight:bold">Faculties</h3>
            <br>
            <hr>


            <div class="add-search">

                <button type="button" name="added" class=" btn_add btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addFac">
                    Add
                </button>

                <form action="" method="POST">
                    <button type="submit" name="search_fac" class="btn_search"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                    <input type="text" name="search" placeholder="input text...">
                </form>
            </div>

            <form action="ACTIONS/delete_query.php" id="deleteForm" method="POST">
                <table>
                    <tr>
                        <th><b>#</b></th>
                        <th style="width:40px">ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Subject</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th style="width:10px" colspan="2">Action</th>
                    </tr>
                    <tr>
                        <?php
                        include 'wp-includes/faculty.php';

                        $search = "";
                        if (isset($_POST['search_fac'])) {
                            $search = $_POST['search'];
                        }
                        $result=searchFac($conn, $search);

                        if($result->num_rows>0)
                        {
                            while($row=$result->fetch_assoc()){
                                ?>

                            <tr>
                                <td><?php echo $row['no'] ?></td>
                                <td><?php echo $row['faculty_id'] ?></td>
                                <td><?php echo $row['firstname'] ?></td>
                                <td><?php echo $row['lastname'] ?></td>
                                <td><?php echo $row['subject'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['f_password'] ?></td>

                                <td>
                                    <button class="btn_edit" type="button" onclick="facUpdateModal(
                                        '<?php echo htmlspecialchars($row['no'], ENT_QUOTES, 'UTF-8'); ?>',
                                        '<?php echo htmlspecialchars($row['faculty_id'], ENT_QUOTES, 'UTF-8'); ?>',
                                        '<?php echo htmlspecialchars($row['firstname'], ENT_QUOTES, 'UTF-8'); ?>', 
                                        '<?php echo htmlspecialchars($row['lastname'], ENT_QUOTES, 'UTF-8'); ?>',
                                        '<?php echo htmlspecialchars($row['subject'], ENT_QUOTES, 'UTF-8'); ?>',
                                        '<?php echo htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8'); ?>',
                                        '<?php echo htmlspecialchars($row['f_password'], ENT_QUOTES, 'UTF-8'); ?>'
                                    )">
                                        <i class="i_edit fa-solid fa-pen-to-square"></i>
                                    </button>


                                    <button type="button" class="btn_delete"
                                        onclick="confirmDelete(<?php echo $row['no']; ?>)"><i
                                            class="i_delete fa-solid fa-trash"></i>
                                    </button>
                                </td>

                            </tr>
                            <?php
                            }
                        }
                        ?>
                </table>
                <input type="hidden" name="fac_delete" id="deleteInput">
            </form>


    </div>


    <!-- JS and jQuery -->
    <script src="assets/bootstrap.bundle.min.js"></script>
    <script src="assets/jquery.min.js"></script>



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
                    document.getElementById('deleteInput').value = no;
                    document.getElementById('deleteForm').submit();
                }
            })
        }

        function facUpdateModal(no, faculty_id, firstname, lastname, subject, email, f_password) {
            console.log("Updating faculty with No:", no); // Debugging output

            $('#updateNo').val(no);
            $('#updateID').val(faculty_id);
            $('#updateFname').val(firstname);
            $('#updateLname').val(lastname);
            $('#updateSubject').val(subject);
            $('#updateEmail').val(email);
            $('#updatePassword').val(f_password);

            $('#facUpdateModal').modal('show');
        }


    </script>


</body>

</html>