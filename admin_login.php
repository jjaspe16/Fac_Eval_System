<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"  rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        background-color: #F8F6F0;
       display:fixed;
    }

    .container {
        width: 100%;
        height: 100vh;
    }

    .box_con {
        width: 100%;
        height: 100vh;
     
    }

    .box1 {
        width: 10%;
        height: 20vh;
        margin-top: 40px;
        margin-left: 500px;
        background-image: url("IMAGES/seeait_logo-removebg-preview.png");
        background-size: contain;
        background-repeat: no-repeat;
    }
    h2{
        text-align: center;
        font-weight: bold;
        color: black;
    }
    .box2 {
        width: 25%;
        height: 45vh;
        margin-top: 20px;
        margin-left:430px;
        padding-left: 40px;
        padding-top: 10px;
        background: linear-gradient(#FFBF78, #FEFAE0);
        border-radius: 15px;
        box-shadow: 0 2px 5px black;
    }

    .div_input {
        padding-top: 2px;
    }

    label {
        font-weight: bold;
        font-size: 18px;
    }

    input {
        padding-left: 10px;
        border-radius: 10px;
        border-color: orange;
        padding-top: 5px;
        text-align: center;
        width: 210px;
        height: 4.5vh;
    }

    .select_clss {
        width: 210px;
        height: 4.5vh;
        padding-left: 10px;
        border-radius: 10px;
        border-color: orange;
        margin-top: 2px;
        text-align: center;
    }
    .btn_submit {
        width: 200px;
        height: 6vh;
        margin-top: 15px;
        background-color: rgb(154, 154, 232);
        border-radius: 5px;
    }

    .btn_submit:hover {
        background-color: orange;
    }
	img{
		height: 7vh;
		width:90%;
	}
    .input-2 {
		color: white;
		font-weight: bold;
		outline-style: none;
		border-style: none;
		display: block;
		margin-left: 40px;
		padding: 0;
		width: 10.5ch;
		background: repeating-linear-gradient(90deg, dimgrey 0, dimgrey 1ch, transparent 0, transparent 1.5ch) 0 100%/ 10ch 2px no-repeat;
		font: 3ch droid sans mono, consolas, monospace;
		letter-spacing: 0.5ch;
	}

</style>

<body>
    <div class="container">

        <div class="box_con">

            <div class="box1">
            </div>

            <h2>Faculty Evaluation System</h2>
            <div class="box2">

               <form action="ACTIONS/add_query.php" method="POST">
               
               <?php 
               // echo '<script>alert("ID or Password is incorrect!") </script>'; ?>
                    <label for="input"><i class="bi bi-person-fill"></i>&nbsp;Admin ID:</label>
                    <div class="div_input">
                        <input type="text" name="user_id" required>
                    </div>

                    <label for="input"><i class="bi bi-lock-fill"></i>&nbsp;Password:</label>
                    <div class="div_input">
                        <input type="password" name="u_password" required>
                    </div>

                    <div class="otp-button">
                            <p class="p-otp">Type the characters below:
                                <img src="IMAGES/captcha.png" ></img>
                        <input type="text" name="num_valid" class="input-2" max-lenght=6 required ></input>
                        <button type="submit" name="admin_login" class="btn_submit"><b>Log In</b></button> </p>

                    </div>
                    </form>
            </div>


        </div>

    </div>
    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <script>
            Swal.fire({
                title: 'User ID or Password is incorrect! ',
                icon: 'error',
                confirmButtonText: 'Ok',
                timer: 3000
            });
        </script>
    <?php endif; ?>

    <?php if (isset($_GET['error_input']) && $_GET['error_input'] == 1): ?>
        <script>
            Swal.fire({
                title: 'Invalid Input Characters! ',
                icon: 'error',
                confirmButtonText: 'Ok',
                timer: 3000
            });
        </script>
    <?php endif; ?>
    
</body>

</html>