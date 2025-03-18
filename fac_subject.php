<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="assets/sweetalert2@11"></script>


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
        margin: auto;
        background-color:#F6F1F4;
    }

    .box {
        width: 100%;
        height: 100vh;
        margin-left: 30px;
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

    button:hover {
        background-color: white;
    }

    .add-search {
        display: flex;

    }

    .btn_add {
        margin: 5px;
        height: 5vh;
        width: 120px;
        font-weight: bold;
        box-shadow: 0 0px 5px black;
    }
    .btn_add:hover{
        background-color: #FFBF78;
    }
    .btn_search {
        margin-left: 10px;
        margin-top:10px;
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
        .container {
            width: 240px;
        }

        .box {
            margin-left: 45px;
        }

        table {
            margin-left: 100px;
            display: inline-block;
        }

        .btn_add {
            margin-left: 100px;
        }

        .btn_search {
            margin-left: 440px;
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
        .container {
            width: 180px;
        }

        .box {
            margin-left: 10px;
        }

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
        body {
            flex-direction: column;
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
            text-transform: capitalize;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
            margin-top: 10px;
        }

    }
</style>

<body>

    <div class="container">

        <?php
        include 'side_con-fac.php';
        ?>
    </div>

    <div class="box">
        <?php

        include 'fac_navigation.php';
        ?>
        <!-- subject page here. -->

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

        <!-- Modal to Add Data -->
        <form action="ACTIONS/add_query.php" method="POST">
            <div class="modal fade" id="addSubject" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="background: linear-gradient(#FFBF78, white)">
                            <h1 class="modal-title fs-5" id="addModalLabel"><b>Add Subject</b></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                            <select name="code" id="" class="input_class form-control">
                                    <option value="">Subject Code</option>
                                    <?php
                                    include 'DATABASE/db.php';
                                    $query = "SELECT * FROM subjects";
                                    $result = mysqli_query($conn, $query);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['code'] . "'>" . $row['code'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select><br>
                               <!-- <input type="text" class="input_class form-control" name="subject" placeholder="Subject"
                                    required>-->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add_fac_subject" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal to Update Data -->
      <!--  <form action="ACTIONS/update_query.php" method="POST">
            <div style="width:300px; margin-left:500px" class="modal fade" id="updateFacSubject" tabindex="-1"
                aria-labelledby="updateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="updateModalLabel"><b>Update Subject</b></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="no" id="updateNo">
                            <div class="mb-3">
                                <label for="updateCode" class="form-label">Code:</label>
                                <input type="text" class="input_class form-control" name="code" id="updateCode"
                                    required>
                                <label for="updateSubject" class="form-label">Subject:</label>
                                <input type="text" class="input_class form-control" name="subject" id="updateSubject"
                                    required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update_fac_subject" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>-->


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


                    $sql = "SELECT `no`, `code`, `subject` FROM `subjects` ";
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
                                <td><?php echo htmlspecialchars($row['no'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['code'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['subject'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <!--<button class="btn_edit" type="button" onclick="updateFacSubject(<?php echo $row['no']; ?>,
                                                  '<?php echo addslashes($row['code']); ?>',
                                                  '<?php echo addslashes($row['subject']); ?>')">
                                        <i class="i_edit fa-solid fa-pen-to-square"></i>
                                    </button>-->
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
            <input type="hidden" name="fac_sub_delete" id="deleteInput">
        </form>

        <!-- Success Alerts -->
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

       <!-- <?php if (isset($_GET['success_updated']) && $_GET['success_updated'] == 1): ?>
            <script>
                Swal.fire({
                    title: 'Data Updated!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                    timer: 3000
                });
            </script>
        <?php endif; ?>-->
    </div>



    <!-- JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <script>

       /* function updateFacSubject(no, code, subject) {
            $('#updateNo').val(no);
            $('#updateCode').val(code);
            $('#updateSubject').val(subject);
            
            $('#updateFacSubject').modal('show');

        }*/

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

    </script>
    </div>

</body>
</html>