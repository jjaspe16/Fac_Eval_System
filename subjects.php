<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="assets/sweetalert2@11"></script>

    <title>Subjects</title>
    <style>
        /* Custom styles */
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

        .nav_box {
            width: 120%;
            height: 90vh;
        }

        .add-search {
            display: flex;
        }

        /* table styles */
        table {
            background:linear-gradient( #F6F1F4, white);
            margin: 5px auto;
            max-height: 420px;
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
            width: 130px;
            height: 5vh;
        }

        .add-search {
            display: flex;
        }

        .btn_add {
            margin-top: 20px;
            height: 5vh;
            width: 120px;
            font-weight: bold;
            box-shadow: 0 0px 5px black;
        }
        .btn_add:hover{
            background-color: #FFBF78;
    }
        .btn_search {
            margin-top: 20px;
            height: 5vh;
            border-style: none;
            background-color: white;
        }

        .btn_search:hover {
            font-size: 20px;
            transition: all ease-in .1s;
        }

        .input_class {
            height: 6vh;
            text-align: center;
            margin: 10px auto;
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
            table {
                margin-left: 100px;
                display: inline-block;
            }

            .btn_add {
                margin-left: 100px;
            }

            .btn_search {
                margin-left: 465px;
            }
        }

        /* For medium screens (tablets in landscape mode) */
        @media (min-width: 768px) and (max-width: 1199px) {
            table {
                margin-left: 50px;
                display: inline-block;
            }

            .btn_add {
                margin-left: 50px;
            }

            .btn_search {
                margin-left: 200px;
            }
        }

        /* For small screens (tablets and large phones) */
        @media (min-width: 576px) and (max-width: 767px) {

            table {
                margin-left: 30px;
                display: inline-block;
            }

            .btn_add {
                margin-left: 30px;
            }

            .btn_search {
                margin-left: 150px;
            }
        }

        /* For extra small screens (phones) */
        @media (max-width: 575px) {
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

            .modal-dialog {
                max-width: 90%;
                margin: auto;
            }

            @media (min-width: 768px) {
                .modal-dialog {
                    max-width: 600px;
                    /* Adjusts for larger screens */
                }

            }

            .input_class {
                height: 6vh;
                text-align: center;
                margin-top: 5px;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                margin-top: 10px;
            }
    </style>
</head>

<body>
    <?php include 'ACTIONS/modals.php'; ?>
    <?php include 'sideNavBar.php'; ?>
    <div class="nav_box">
        <?php include 'topNav.html'; ?>
        <h4 style="padding-top:30px; padding-left: 20px;font-weight:bold">Subjects</h4>
        <hr>
        <div class="add-search">
            <button type="button" name="added" class="btn_add btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Add
            </button>

            <form action="" method="POST">
                <button type="submit" name="search_sub" class="btn_search">
                    <i class="fa-solid fa-magnifying-glass"></i>&nbsp;</button>
                <input type="text" style="text-align:center" name="search" placeholder="input text...">
            </form>

        </div>

        <!-- Table to Display Data -->
        <form action="ACTIONS/delete_query.php" method="POST" id="deleteForm">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th style="width:400px">Subject</th>
                        <th style="width:80px" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'DATABASE/db.php';
                    $search = "";
                    if (isset($_POST['search_sub'])) {
                        $search = $_POST['search'];
                    }
                    $sql = "SELECT `no`, `code`, `subject` FROM `subjects`";
                    if ($search != "") {
                        $sql .= " WHERE `code` LIKE ? OR `subject` LIKE ?";
                        $stmt = $conn->prepare($sql);
                        $searchTerm = "%$search%";
                        $stmt->bind_param("ss", $searchTerm, $searchTerm);
                        $stmt->execute();
                        $result = $stmt->get_result();
                    } else {
                        $result = $conn->query($sql);
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['no']); ?></td>
                                <td><?php echo htmlspecialchars($row['code']); ?></td>
                                <td><?php echo htmlspecialchars($row['subject'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <button class="btn_edit" type="button" onclick="openUpdateModal(<?php echo $row['no']; ?>,
                                                 '<?php echo addslashes($row['code']); ?>',
                                                 '<?php echo addslashes($row['subject']); ?>')">
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
                </tbody>
            </table>
            <input type="hidden" name="sub_delete" id="deleteInput">
        </form>

    </div>

    <!-- JS and jQuery -->
    <script src="assets/bootstrap.bundle.min.js"></script>
    <script src="assets/query.min.js"></script>

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

        function openUpdateModal(no, code, subject) {
            $('#updateNo').val(no);
            $('#updateCode').val(code);
            $('#updateSubject').val(subject);
            $('#openUpdateModal').modal('show');
        }
    </script>
</body>

</html>