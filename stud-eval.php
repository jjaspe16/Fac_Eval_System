<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & FontAwesome -->
    <link href="assets/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
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

    table, th, td {
        border: 1px solid #ddd;
        border-collapse: collapse;
        text-align: center;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    th {
        position: sticky;
        top: 0;
        background: linear-gradient(#F6F1F4, white);
        font-weight: bold;
    }

    th, td {
        width: 120px;
        height: 4vh;
    }

    h4 {
        padding-left: 20px;
    }

    .btn_add {
        margin-top: 30px;
        margin-left: 20px;
        width: 70px;
        height: 5vh;
    }

    .btn_add:hover {
        background-color: #FFBF78;
    }

    .add-search {
        display: flex;
        height: 8vh;
    }

    .btn_search {
        margin-left: 798px;
        margin-top: 35px;
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
        text-align: center;
    }

    .btn_delete, .btn_edit {
        border-style: none;
        width: 28px;
        cursor: pointer;
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
        table, th, td {
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

    @media (max-width: 576px) {
        .btn_add, .btn_search {
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

        th, td {
            font-size: 10px;
        }
    }
</style>

<body>

    <h5>Total Student Evaluated:</h5>
    <div class="add-search">
        <button type="button" class="btn_add btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStud">
            Add
        </button>

        <form action="" method="POST">
            <button type="submit" name="search_stud" class="btn_search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <input type="text" name="search" placeholder="input text...">
        </form>
    </div>

    <!-- Delete Form -->
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
            include 'ACTIONS/modals.php';

            $search = isset($_POST['search_stud']) ? $_POST['search'] : '';
            $sql = "SELECT `no`, `stud_id`, `firstname`, `lastname`,`subject`,`className`,`password` FROM `fac_students`";
            if ($search) {
                $sql .= " WHERE `stud_id` LIKE '%$search%' OR `firstname` LIKE '%$search%' OR `lastname` LIKE '%$search%' 
                                OR `subject` LIKE '%$search%' OR `className` LIKE '%$search%' OR `password` LIKE '%$search%'";
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
                        <td><?php echo $row['className']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td>
                            
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <input type="hidden" name="del_stud" id="deleteStud_input">
    </form>

</body>
</html>
