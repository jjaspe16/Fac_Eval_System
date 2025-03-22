<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Department</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        width: 100%;
        font-family: Georgia, 'Times New Roman', Times, serif;
        display: flex;
    }

    .nav_box {
        width: 100%;
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
        background: url("seeait_logo-removebg-preview.png") no-repeat center;
        background-size: contain;
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
        background: linear-gradient(#F6F1F4, white);
        margin-left: 10px;
        margin-top: 5px;
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
        background: linear-gradient(#F6F1F4, white);
        font-weight: bold;
    }

    th,
    td {
        width: 180px;
        height: 5vh;
    }

    .btn_add {
        margin-left: 20px;
        width: 80px;
        height: 5vh;
    }

    .btn_add:hover {
        background-color: #FFBF78;
    }

    .add-search {
        display: flex;
        align-items: center;
        height: 8vh;
        gap: 10px;
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

    .btn_delete,
    .btn_edit {
        border: none;
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

        <h4 style="padding: 30px 20px 10px; font-weight: bold">Students</h4>
        <hr>


        <div class="add-search">

            <button type="button" name="added" class=" btn_add btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#addStud">
                Add
            </button>

            <form action="" method="POST">
                <button type="submit" name="search_stud" class="btn_search"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
                <input type="text" name="search" placeholder="input text...">
            </form>
        </div>

        <!-- Student List -->
        <form action="ACTIONS/delete_query.php" method="POST" id="delete_stud_form">
            <table>
                <tr>
                    <th>#</th>
                    <th style="width:40px">ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Class</th>
                    <th>Password</th>
                    <th style="width:10px" colspan="2">Action</th>
                </tr>

                <?php
                include 'wp-includes/students.php';

                $search = isset($_POST['search']) ? $_POST['search'] : "";
                $result = searchStud($conn, $search);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['no']) . "</td>
                                <td>" . htmlspecialchars($row['stud_id']) . "</td>
                                <td>" . htmlspecialchars($row['firstname']) . "</td>
                                <td>" . htmlspecialchars($row['lastname']) . "</td>
                                <td>" . htmlspecialchars($row['className']) . "</td>
                                <td>" . htmlspecialchars($row['password']) . "</td>
                                <td>
                                    <button class='btn_edit' type='button' onClick='stud_updateModal(
                                        \"" . addslashes($row['no']) . "\",
                                        \"" . addslashes($row['stud_id']) . "\",
                                        \"" . addslashes($row['firstname']) . "\", 
                                        \"" . addslashes($row['lastname']) . "\",
                                        \"" . addslashes($row['className']) . "\",
                                        \"" . addslashes($row['password']) . "\")'>
                                        <i class='i_edit fa-solid fa-pen-to-square'></i>
                                    </button>

                                    <button type='button' class='btn_delete' onclick='confirmDelete(" . htmlspecialchars($row['no']) . ")'>
                                        <i class='i_delete fa-solid fa-trash'></i>
                                    </button>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' style='text-align:center'>No students found</td></tr>";
                }
                ?>
            </table>
            <input type="hidden" name="del_stud" id="deleteStud_input">
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/bootstrap.bundle.min.js"></script>

    <script>
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
            });
        }
    </script>
</body>

</html>