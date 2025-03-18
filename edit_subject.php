<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    
    <title>Add_subject_modal</title>
</head>
<style>
     * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }
    body {
        width: 30%;
        height: 50vh;
        font-family: aachen;
        position: fixed;
        background-image: url("IMAGES/bg1.png");
        background-repeat: no-repeat;
        background-size: cover;
        
    }
    .container{
        width:70%;
        height:45vh;
        background-color: #F8F6F0;
        box-shadow:0 0 10px #121212;
        border-radius: 10%;
        margin-left: 500px;
        margin-top: 30%;
    }
    h3{
        padding-top:10px;
        text-align:center;
    }
    label{
        font-size: 15px;
        font-weight:bold;
    }
    .div_form{
        margin-left: 30px;
    }
    button{
        text-align: center;
        width:90%;
        height:5vh;
        border-radius: 5%;
    }
    input{
        text-align: center;
        width:90%;
        height:5vh;
        border-radius: 5%;
    }
    select{
        text-align: center;
        width:90%;
        height:5vh;
        border-radius: 5%;
    }
    .submit_btn{
        background-color:rgb(141, 141, 235);
        font-weight: bold;
        color:white;  
    }
    .cancel_btn{
        background-color:grey;
        font-weight: bold;
        color:white; 
        margin-top: 5px;
    }
    i{
        font-size: 16px;
        padding-top: 40px;
        margin-left:240px ;
        color:red;
    }
</style>
<body>
    <div class="container"> <br>
        <a href="subjects.php"><i class="bi bi-x-lg"></i></a>
        
        <h3>Edit Subject</h3> <br> <hr><br>
        <form action="update_query.php" method="POST">
           
                     <?php 
                            include 'DATABASE/db.php';

                            $txtno =$_GET['no'];

                            $sql="SELECT * FROM `subjects` WHERE no= '$txtno' LIMIT 1";
                            $result= $conn->query($sql);

                            $row =mysqli_fetch_assoc($result);
                      ?>
            <div class="div_form">
                <label>Code : </label><br>
            </div>

            <div class="div_form">
                <input type="text" name="code" value="<?php echo $row['code'] ?> "required>
            </div>

            <div class="div_form">
                <label>Subject : </label><br>
            </div>

            <div class="div_form">
                <input type="text" name="subject" value="<?php echo $row['subject'] ?> "required>
            </div><br>

            <div class="div_form">
                <button class="submit_btn" type="submit" name="update_subject">Update</button>
            </div>


        </form>
    </div>
</body>
</html>

//might delete later