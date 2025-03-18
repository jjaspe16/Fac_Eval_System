<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap.bundle.min.js">
    <script src="assets/jquery.min.js"></script>
    <script src="assets/bootstrap.bundle.min.js"></script>

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

    .conflex {}

    input {
        width: 560px;
        text-align: center;
        height: 5vh;
        margin-top: 5px;
        background-color: beige;
    }

    button {
        width: 70px;
        height: 5vh;
    }

    .btn {
        width: 130px;
        font-weight: bold;
        color: white;
        
    }

    .btn_add {
        width: 150px;
        background-color: royalblue;
        margin-left: 10px;
        box-shadow: 0 0px 5px black;
        color:white;
    }
    .btn_add:hover{
        background-color: #FFBF78;
    }
    .pic_tab {
        margin-left: 110px;
    }

    .pic_tab_2nd {
        margin-left: 360px;
        margin-top: 0px;
    }

    table {
        border-collapse: collapse;
        margin-left: 10px;
        max-height: 220px;
        overflow: auto;
        display: inline-block;
        margin-top: 5px;
        background:linear-gradient( #F6F1F4, white);
        box-shadow: 0 2px 5px black;
    }

    th {
        position: sticky;
        top: 0;
        width: 70px;
        text-align: center;
        background:linear-gradient( #F6F1F4, white);
    }

    td {
        padding-left: 10px;
        height: 6vh;
        border: 1px solid #ddd;
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

        <h4 style="padding-top:30px; padding-left: 20px;font-weight:bold">Questionnaire</h4> <br>
        <hr>

        <div class="conflex">
            <!-- Section for PLANNING & LESSON IMPLEMENTATION -->
            <div class="pic_tab">
                <form action="ACTIONS/add_query.php" method="POST">
                    <button type="submit" class="btn_add" name="ques1">Add</button>
                    <input type="text" name="question" placeholder="ask question here" required><br>
                </form>

                <table style="max-height: 200px; overflow: auto; display:inline-block;">
                    <tr>
                        <th style="width:100px;text-align:center">#</th>
                        <th style="width:530px;height:8vh">PLANNING & LESSON IMPLEMENTATION</th>
                        <th style="width:20px" colspan="2">Action</th>
                    </tr>

                    <?php
                    include 'DATABASE/db.php';
                    $sql_conn = "SELECT `no`, `question` FROM `planning_and_lesson_implementation`";
                    $qry = $conn->query($sql_conn);

                    if ($qry->num_rows > 0) {
                        while ($row = $qry->fetch_assoc()) {
                            ?>
                            <tr>
                                <td style="text-align:center"><?php echo $row['no'] ?></td>
                                <td><?php echo $row['question'] ?></td>
                                <td>
                                    <button class="btn_edit" type="button"
                                        onClick="openUpdateModal1('<?php echo $row['no']; ?>', '<?php echo $row['question']; ?>', 'Ques1')">
                                        <i class="i_edit fa-solid fa-pen-to-square"></i>
                                    </button>


                                    <form action="ACTIONS/delete_query.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="del_q1" value="<?php echo $row['no']; ?>">
                                        <button type="button" class="btn_delete" onclick="confirmDelete(this.form)">
                                            <i class="i_delete fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div> <br><br>

            <!-- Section for CLASSROOM MANAGEMENT -->
            <div class="pic_tab">
                <form action="ACTIONS/add_query.php" method="POST">
                    <button type="submit" class="btn_add" name="ques2">Add</button>
                    <input type="text" name="question" placeholder="ask question here" required><br>
                </form>

                <table style="max-height: 200px; overflow: auto; display:inline-block;">
                    <tr>
                        <th style="width:100px;text-align:center">#</th>
                        <th style="width:530px;height:8vh">CLASSROOM MANAGEMENT</th>
                        <th style="width:20px" colspan="2">Action</th>
                    </tr>

                    <?php
                    $sql_conn = "SELECT `no`, `question` FROM `classroom_management`";
                    $qry = $conn->query($sql_conn);

                    if ($qry->num_rows > 0) {
                        while ($row = $qry->fetch_assoc()) {
                            ?>
                            <tr>
                                <td style="text-align:center"><?php echo $row['no'] ?></td>
                                <td><?php echo $row['question'] ?></td>
                                <td>
                                    <button class="btn_edit" type="button"
                                        onClick="openUpdateModal2('<?php echo $row['no']; ?>', '<?php echo $row['question']; ?>', 'Ques2')">
                                        <i class="i_edit fa-solid fa-pen-to-square"></i>
                                    </button>



                                    <form action="ACTIONS/delete_query.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="del_q2" value="<?php echo $row['no']; ?>">
                                        <button type="button" class="btn_delete" onclick="confirmDelete(this.form)"><i
                                                class="i_delete fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div> <br> <br>

            <!-- Section for INTERPERSONAL -->
            <div class="pic_tab">
                <form action="ACTIONS/add_query.php" method="POST">
                    <button type="submit" class="btn_add" name="ques3">Add</button>
                    <input type="text" name="question" placeholder="ask question here" required><br>
                </form>

                <table style="max-height: 200px; overflow: auto; display:inline-block;">
                    <tr>
                        <th style="width:100px;text-align:center">#</th>
                        <th style="width:530px;height:8vh">INTERPERSONNAL</th>
                        <th style="width:20px" colspan="2">Action</th>
                    </tr>

                    <?php
                    $sql_conn = "SELECT `no`, `question` FROM `interpersonal_skills`";
                    $qry = $conn->query($sql_conn);

                    if ($qry->num_rows > 0) {
                        while ($row = $qry->fetch_assoc()) {
                            ?>
                            <tr>
                                <td style="text-align:center"><?php echo $row['no'] ?></td>
                                <td><?php echo $row['question'] ?></td>
                                <td>
                                    <button class="btn_edit" type="button"
                                        onClick="openUpdateModal3('<?php echo $row['no']; ?>', '<?php echo $row['question']; ?>', 'Ques3')">
                                        <i class="i_edit fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <form action="ACTIONS/delete_query.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="del_q3" value="<?php echo $row['no']; ?>">
                                        <button type="button" class="btn_delete" onclick="confirmDelete(this.form)"><i
                                                class="i_delete fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>

        </div> <br><br>

        <br>
        <hr>
    </div>

    <script>
        function confirmDelete(form) {
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
                    form.submit();
                }
            })
        }

        function openUpdateModal1(no, question) {
            $('#updateNoQues1').val(no);
            $('#updateQues1').val(question); 
            $('#updateModalQues1').modal('show');
        }
        function openUpdateModal2(no, question) {
            $('#updateNoQues2').val(no);
            $('#updateQues2').val(question); 
            $('#updateModalQues2').modal('show');
        }
        function openUpdateModal1(no, question) {
            $('#updateNoQues1').val(no);
            $('#updateQues1').val(question); 
            $('#updateModalQues1').modal('show');
        }
        function openUpdateModal3(no, question) {
            $('#updateNoQues3').val(no);
            $('#updateQues3').val(question); 
            $('#updateModalQues3').modal('show');
        }


    </script>

</body>

</html>