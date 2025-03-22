
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="assets/sweetalert2@11"></script>


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
        background-image: url("black_bg.jpg");
        display: fixed;
    }

    .container {
        width: 100%;
        height: 90vh;
    }

    .box_con {
        width: 100%;
        height: 90vh;
    }

    .box1 {
        width: 10%;
        height: 20vh;
        margin-top: 5px;
        margin-left: 500px;
        background-image: url("IMAGES/seeait_logo-removebg-preview.png");
        background-size: contain;
        background-repeat: no-repeat;
    }

    h4 {
        text-align: center;
        font-weight: bold;
        color: black;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .box2 {
        width: 25%;
        height: 65vh;
        margin-left: 430px;
        padding-left: 40px;
        padding-top: 10px;
        background:linear-gradient( #F6F1F4, white);
        border-radius: 15px;
        box-shadow: 0 5px 15px black;
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
        background-color: royalblue;
        border-radius: 5px;
    }

    .btn_submit:hover {
        background-color: orange;
    }

    img {
        height: 7vh;
        width: 90%;
    }

    .input-2 {
        color: black;
        font-weight: bold;
        font-family: saachen;
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
    .btn_adminlog{
        margin-left: 20px;
        margin-top: 10px;
        border: none;
        background:none;
    }
    a:hover{
        color: blue;
    }
</style>

<body>

    <div class="container">
     <div class="box_con">

            <div class="box1">
                
            </div>

            <h4>Faculty Evaluation System</h4>
            <div class="box2">

                <form  id="loginForm">
                    <label for="faculty_id"><i class="bi bi-person-fill"></i>&nbsp;User ID:</label>
                    <div class="div_input">
                        <input type="text" name="faculty_id" id="faculty_id" required>
                    </div>

                    <label for="f_password"><i class="bi bi-lock-fill"></i>&nbsp;Password:</label>
                    <div class="div_input">
                        <input type="password" name="f_password" id="f_password" required>
                    </div>

                    <label for="usertype"><i class="bi bi-person-fill"></i>&nbsp;Usertype:</label>
                    <div class="div_input">
                        <select class="select_clss" name="usertype" id="usertype" required>
                            <option value=""></option>
                            <option value="Admin">Admin</option>
                            <option value="Student">Student</option>
                            <option value="Faculty">Faculty</option>
                            
                        </select>
                    </div>

                    <br>

                    <div class="otp-button">
                        <p class="p-otp">
                            Type the characters below:
                            <img src="IMAGES/captcha.png" alt="Captcha Image">
                            <input type="text" name="num_valid" class="input-2" maxlength="6" required>
                            <button type="submit" name="login" class="btn_submit"><b>Log In</b></button>
                        </p>
                        <button type="button" name="adminlog" class="btn_adminlog">
                            <a href="admin_login.php" >Log in as Administrator </a></button>
      
                    </div>
                </form>

                <script>
                    document.getElementById('loginForm').onsubmit = function (event) {
                        event.preventDefault(); // Prevent form submission
                        var facultyId = document.getElementById('faculty_id').value;

                        // Redirect to the page that displays faculty data
                        window.location.href = "faculty_page.php?faculty_id=" + encodeURIComponent(facultyId);
                    };
                </script>  


            </div>
        </div>

        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <script>
                Swal.fire({
                    title: 'Unregistered User ID & Password ',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                    timer: 3000
                });
            </script>
        <?php endif; ?>

        <?php if (isset($_GET['invalid_input']) && $_GET['invalid_input'] == 1): ?>
            <script>
                Swal.fire({
                    title: 'Invalid Input Characters!',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                    timer: 3000
                });
            </script>
        <?php endif; ?>

    </div>

</body>

</html>