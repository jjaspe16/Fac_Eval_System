<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title></title>
    <style>
        /* Base styles */

        .side_con {
            width: 50%;
            height: 100vh;
            background-color:#F6F1F4;
            top: 0;
            margin-left: 0px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .img_box {
            width: 80%;
            height: 20vh;
            padding-top: 10px;
            background-image: url("IMAGES/seeait_logo-removebg-preview.png");
            background-size: contain;
            background-repeat: no-repeat;
            margin-left: 20px;
        }

        ul {
            margin-top: 20px;
            padding-left: 0;
            list-style: none;
            width: 100%;
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
            display: flex;
            /* Ensure icons and text align properly */
            align-items: center;
            padding: 0 15px;
            /* Add horizontal padding */
            height: 100%;
            /* Full height for better click area */
            box-sizing: border-box;
            /* Include padding in width/height */
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        i {
            margin-right: 10px;
            /* Space between icon and text */
        }

        /* Media queries for responsiveness */

        /* For larger screens (desktops and laptops) */
        @media (min-width: 1200px) {
            .side_con {
                width: 130%;
            }

            .img_box {
                width: 65%;
                margin-left: 40px;
            }

            li {
                height: 7vh;
                /* Slightly increase the height for larger screens */
            }
        }

        /* For medium screens (tablets in landscape mode) */
        @media (min-width: 768px) and (max-width: 1199px) {
            .side_con {
                width: 110%;
            }

            .img_box {
                width: 70%;
                margin-left: 30px;
            }

            li {
                height: 6.5vh;
            }
        }

        /* For small screens (tablets and large phones) */
        @media (min-width: 576px) and (max-width: 767px) {
            .side_con {
                width: 100%;
            }

            .img_box {
                width: 75%;
                margin-left: 20px;
            }

            li {
                height: 6vh;
            }
        }

        /* For extra small screens (phones) */
        @media (max-width: 575px) {
            .side_con {
                width: 100%;
            }

            .img_box {
                width: 90%;
                margin-left: 10px;
            }

            li {
                height: 5.5vh;
            }
        }
    </style>
</head>

<body>
    <div class="side_con">
        <div class="img_box"></div>
        <ul>
            <li>
                <a href="faculty_page.php"><i class="fa-solid fa-chart-line"></i> Dashboards</a>
            </li>
            <li>
                <a href="fac_subject.php"><i class="fa-solid fa-clipboard"></i> My Subjects</a>
            </li>
            <li>
                <a href="fac_class.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> My Class</a>
            </li>

            <li>
                <a href=""><i class="fa-solid fa-file-contract"></i> Evaluation Report</a>
            </li>
            <li>
                <a href="homepage.html"><i class="fa-solid fa-power-off"></i> Logout</a>
            </li>
        </ul>

    </div>

</body>

</html>