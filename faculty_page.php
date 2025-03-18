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
    * {
        margin: 0px;
        padding: 0px;
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
        background:#F6F1F4;
    }

    .box {
        width: 100%;
        height: 100vh;
        margin-left: 40px;
    }

    h4 {
        padding-top: 8px;
        padding-left: 20px;

    }
</style>

<body>
    <div class="container">

        <?php
        include 'side_con-fac.php';
        ?>
    </div><br>

    <div class="box">
        <?php
        include 'fac_navigation.php';
        ?>


        <?php
        include 'stud-eval.php';
        ?>
    </div>

</body>

</html>