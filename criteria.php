<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="assets/sweetalert2@11"></script>


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
        height: 90vh;
    }

    .div_nav {
        width: 100%;
        height: 6vh;
        background-color: #F6F1F4;
    }

    .h4_nav {

        padding-top: 10px;

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

    .con {
        background-color: #F8F6F0;
        box-shadow: 0 0 10px #121212;
        border-radius: 10%;
        width: 300px;
        height: 25vh;
        margin-top: 30px;
        margin-left: 20px;

    }

    label {

        padding-left: 15px;
        font-weight: bold;
    }

    input {
        width: 175px;
        height: 5vh;
    }

    .btn_div {
        margin-left: 80px;
    }

    button {
        font-weight: bold;
        width: 90px;
        height: 5vh;
        color: white;
    }

    .btn_add:hover {
        background-color: #FFBF78;
    }

    .btn_edit {
        margin-top: 20px;
        border-style: none;
        width: 23px;
    }

    .btn_cri,
    .btn_cri_edit {
        width: 28px;
        height: 4vh;
        margin-top: 10px;
        border-style: none;
        background-color: none;
    }

    .i_edit {
        color: green;
        font-size: 18px;
    }

    .i_delete {
        color: red;
        font-size: 18px;
    }

    h3 {

        padding-left: 50px;
        margin-top: 30px;
    }

    .conflex {
        display: flex;
    }

    table {
        border-collapse: collapse;
        margin-left: 50px;
        max-height: 390px;
        overflow: auto;
        display: inline-block;
        background: linear-gradient(#F6F1F4, white);
        box-shadow: 0 0px 5px black;
    }

    th {
        position: sticky;
        padding-left: 10px;
        top: 0;
        width: 60px;
        background: linear-gradient(#F6F1F4, white);
        text-align: center;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    td {
        padding-left: 10px;
        text-align: center;

    }

    th,
    td {
        border: 1px solid #ddd;
    }
</style>

<body>

    <?php
    include 'sideNavBar.php';
    ?>

    <div class="nav_box">
        <?php
        include 'topNav.html';
        ?>


        <h4 style="padding-top:30px; padding-left: 20px;font-weight:bold">Evaluation Criteria</h4>
        <hr>

        <div class="conflex">


            <div class="con">
                <br>
                <form action="ACTIONS/add_query.php" method="POST">
                    <label for="">Criteria: &nbsp;</label>
                    <textarea name="criteria" required style="text-align:center"></textarea>


                    <br>

                    <div class="btn_div">
                        <button name="add_criteria" class="btn_add" type="submit"
                            style="background-color: royalblue">Add</button>
                        <button type="reset" style="background-color: gray;">Cancel</button>
                    </div>

                </form>
            </div>

            <div class="pic_tab">

                <form action="ACTIONS/delete_query.php" id="deleteForm" method="POST">

                    <table>
                        <tr>
                            <th style="width:100px;">#</th>
                            <th style="width:410px;">Criteria</th>
                            <th style="width:20px" colspan="2">Action</th>
                        </tr>

                        <?php
                        include_once 'wp-includes/criteria.php';

                        $funct = getCriteria($conn);
                        foreach ($funct as $row) {
                            ?>

                            <td><?php echo $row['no'] ?></td>
                            <td><?php echo $row['criteria'] ?></td>
                            <td>
                                <button class="btn_edit" type="button" onclick="editCriteriamodal(<?php echo $row['no']; ?>,
                                             '<?php echo $row['criteria']; ?>')"><i
                                        class="i_edit fa-solid fa-pen-to-square"></i>
                                </button>

                                <button type="button" class="btn_cri" onclick="confirmDelete(<?php echo $row['no']; ?>)">
                                    <i class="i_delete fa-solid fa-trash"></i></button>
                            </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </table>
                    <input type="hidden" name="deleteCri" id="deleteInput">
                </form>

                <!-- Modal for Updating a Criteria -->
                <form action="ACTIONS/update_query.php" method="POST">
                    <div class="modal fade" id="updateCriteriamodal" tabindex="-1" aria-labelledby="updateModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="updateModalLabel"><b>Update Criteria</b></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="no" id="updateNo">
                                    <div class="mb-3">
                                        <label for="updateInputCriteria" class="form-label">Criteria</label>
                                        <input type="text" class="form-control" name="criteria" id="updateCriteria"
                                            required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="update_criteria"
                                            class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>


        <script>
            function editCriteriamodal(no, criteria) {
                $('#updateNo').val(no);
                $('#updateCriteria').val(criteria);
                $('#updateCriteriamodal').modal('show');
            }
            function confirmDelete(no) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
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