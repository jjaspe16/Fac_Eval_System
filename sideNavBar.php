<?php
// Get the current file name
$current_page = basename($_SERVER['PHP_SELF'], '.php');

// Handle the root "/" case as "index"
if ($current_page == 'dashboard' || $_SERVER['REQUEST_URI'] == '/') {
    $current_page = 'dashboard';
}

?>
    <link rel="stylesheet" href="assets/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">


<style>
    /* Base styles */

.side_con {
    width: 30%; /* Set width to 30% of the viewport width */
    max-width: 300px; /* Maximum width for larger screens */
    height: auto;
    background-color: #F6F1F4;
    
    top: 0;
    left: 0;
}

.img_box {
    width: 80%;
    height: 20vh;
    margin-top: 10px;
    background-image: url("IMAGES/seeait_logo-removebg-preview.png");
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

ul {
    margin-top: 20px;
    padding-left: 0; /* Remove default padding */
}

li {
    list-style: none;
    height: 6vh;
    font-weight: bold;
    padding-top: 8px;
    border-radius: 5px;
    transition: background-color 0.3s ease; /
}

li:hover {
    background-color: #FFBF78;
}

a {
    text-decoration: none;
    color: black;
    display: flex; /* Ensure icons and text align properly */
    align-items: center;
    padding: 0 15px; /* Add horizontal padding */
    cursor: pointer;
    font-family: Georgia, 'Times New Roman', Times, serif;
    font-weight:normal;
}

i {
    color: black;
    padding-left: 10px; /* Add space between icon and text */
}

/* Media queries for responsiveness */

/* For larger screens (desktops and laptops) */
@media (min-width: 1200px) {
    .side_con {
        width: 300px;
    }
}

/* For medium screens (tablets in landscape mode) */
@media (min-width: 768px) and (max-width: 1199px) {

}

/* For small screens (tablets and large phones) */
@media (min-width: 576px) and (max-width: 767px) {
    .side_con {
        width: 200px;
    }
}

/* For extra small screens (phones) */
@media (max-width: 575px) {
    .side_con {
        width: 100%;
        max-width: none; /* Remove max-width restriction on very small screens */
        position: relative; /* Change to relative positioning */
    }
    .img_box {
        width: 100%;
        margin-left: 0; /* Remove margin for smaller screens */
    }
    li {
        height: auto; /* Adjust height for better fit */
        padding-top: 10px;
    }
}

</style>
<div class="side_con">
            <div class="img_box">

            </div>
            <br><hr>

            <ul>
                <li class="nav-item" class="li-class" <?php echo ($current_page == 'dashboard') ? 'active bg-active rounded' : ''; ?>>
                    <a href="adminPage.php"><i class="fa-solid fa-chart-line"></i>&nbsp;&nbsp;Dashboards</a></li>
                <li <?php echo ($current_page == 'majors') ? 'active bg-active rounded' : ''; ?>>
                    <a href="majors.php"><i class="fa-solid fa-building-columns"></i>&nbsp;&nbsp;Majors</a></li>                               
                <li>
                    <a href="subjects.php"><i class="fa-solid fa-clipboard"></i>&nbsp;&nbsp;Subjects</a>
                </li>
                <li><a href="class.php"><i class="fa-solid fa-chalkboard"></i>&nbsp;&nbsp;Classes</a></li>
                <li>
                    <a href="academic_year.php"><i class="fa-solid fa-calendar-check"></i>&nbsp;&nbsp;Academic Year</a>
                </li>
                <li><a href="faculty.php"><i class="fa-solid fa-person-chalkboard"></i>
                    &nbsp; &nbsp;Faculty </a></li>
                <li>
                    <a href="students.php"> <i class="fa-solid fa-user-graduate"></i> &nbsp;&nbsp;Students</a></li>
                <li>
                    <a href="questionnaires.php"><i class="fa-solid fa-circle-question"></i>&nbsp;&nbsp;Questionnaires</a></li>
                <li>
                    <a href="criteria.php"> <i class="fa-solid fa-list-ul"></i>&nbsp;&nbsp;Eval. Criteria </a></li>
               <br><br><br><br>
            </ul>
        </div><hr>