<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--     <link rel="stylesheet" href="assets/bootstrap-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="assets/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">-->

    <title>Admin Page</title>
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

@media(max-width:768px)
{
    .div_nav,
    .boxes,
    .row1,
    .row2,
    .box,
    .h5_div
    {  
        justify-content: center;
        align-items: center;
    }
}
    .div_nav {
        width: 120%;
        height: 6vh;
        background-color: #F6F1F4;
    }

    .boxes {
        width: 100%;
        height: auto;
       
       flex-wrap: wrap;
    }

    .row1 {
        width: 100%;
        height: 30vh;
        display:flex;
    }

    .row2 {
        width: 100%;
        height: 30vh;
        display: flex;
    }

    .box {
        width: 23%;
        height: 27vh;
        margin-top: 20px;
        margin-left: 10px;
        box-shadow: 0 2px 5px black;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* pushes content top to bottom */
        align-items: center;
        padding: 10px;
        position: relative;
    }
    

    .box:hover {
        transition: all .6s ease-in-out;
        transform: scale(1.1);
    }


    h4 {
        font-weight: bold;
        margin: 0;
        text-align: center;
    }

    .h5_div {
        height: 7vh;
        margin-left: 5px;
    }

    .icon_div {
        height: 10vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon_div i {
        font-size: 5vh;
    }


    h3 {
        text-align: left;
        font-weight: normal;
        margin-top: 15px;
    }
    .box1 {
        background-color: rgb(84, 169, 239);
    }
    .box2 {
        background-color: rgb(242, 102, 102);
        
    }

    .box3 {
        background-color: rgb(239, 239, 124);
    }

    .box4 {
        background-color: rgb(247, 24, 210);
    }

    .box5 {
        background-color: rgb(252, 187, 131);
    }

    .box6 {
        background-color: lightgreen;
    }

    .box7 {
        background-color: rgb(22, 220, 220);
    }

    .box8 {
        background-color: orange;
    }
</style>

<body>

    <?php
    include 'sideNavBar.php';
    ?>

    <div class="div_nav">
        <?php include 'topNav.html'; ?>

        <div class="boxes">

            <!-- Row 1 -->
            <div class="row1">
                <!-- Majors -->
                <div class="box box1">
                    <div class="h5_div">
                        <h5>Majors</h5>
                    </div>

                    <div class="icon_div"><i class="fa-solid fa-building-columns"> </i> 
                   
                    </div>
                </div>

                <!-- Subjects -->
                <div class="box box2">
                    <div class="h5_div">
                        <h5>Subjects</h5>
                    </div>
                  
                    <h4>
                        <?php
                        include 'wp-includes/subjects.php';
                        echo getRowCount_subj("subjects", $conn);
                        ?>
                    </h4>
                </div>

                <!-- Classes -->
                <div class="box box3">
                    <div class="h5_div">
                        <h5>Classes</h5>
                    </div>
                    <div class="icon_div"><i class="fa-solid fa-chalkboard"></i></div>
                    <h4>
                        <?php
                        include 'wp-includes/class.php';
                        echo getRowCount_class("class", $conn);
                        ?>
                    </h4>
                </div>

                <!-- Classes -->
                <div class="box box3">
                    <div class="h5_div">
                        <h5>Acad Year</h5>
                    </div>
                    <div class="icon_div"><i class="fa-solid fa-chalkboard"></i>
                    <h4>
                        <?php
                        include 'wp-includes/acad_year.php';
                        echo getRowCount_acadyr("academic_year", $conn);
                        ?>
                    </h4>
                    </div>
                </div>


                <!-- Row 2 -->
                <div class="row2">
                    <!-- Faculties -->
                    <div class="box box5">
                        <div class="h5_div">
                            <h5>Faculties</h5>
                        </div>
                        <div class="icon_div"><i class="fa-solid fa-person-chalkboard"></i></div>
                        <h4>
                            <?php
                            include 'wp-includes/faculty.php';
                            echo getRowCount_fac("faculties", $conn);
                            ?>
                        </h4>
                    </div>

                    <!-- Students -->
                    <div class="box box6">
                        <div class="h5_div">
                            <h5>Students</h5>
                        </div>
                        <div class="icon_div"><i class="fa-solid fa-user-graduate"></i></div>
                        <h4>
                            <?php
                            include 'wp-includes/students.php';
                            echo getRowCount_stud("fac_students", $conn);
                            ?>
                        </h4>
                    </div>

                    <!-- Evaluation Criteria -->
                    <div class="box box7">
                        <div class="h5_div">
                            <h5>Evaluation Criteria</h5>
                        </div>
                        <div class="icon_div"><i class="bi bi-list-check"></i></div>
                        <h4>
                            <?php
                            include 'wp-includes/criteria.php';
                            echo getRowCount_criteria("criterias", $conn);
                            ?>
                        </h4>
                    </div>

                    <!-- Reports -->
                    <div class="box box8">
                        <div class="h5_div">
                            <h5>Evaluation Reports</h5>
                        </div>
                        <div class="icon_div"><i class="fa-solid fa-file-contract"></i></div>
                        <h4>--</h4>
                    </div>
                </div>







            </div>
        </div>



</body>

</html>