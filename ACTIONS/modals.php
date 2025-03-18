<?php
// Get the current file name
$current_page = basename($_SERVER['PHP_SELF'], '.php');

// Handle the root "/" case as "index"
if ($current_page == 'dashboard' || $_SERVER['REQUEST_URI'] == '/') {
    $current_page = 'dashboard';
}

?>
<style>
    .modal-header{
        background: linear-gradient(#FFBF78,white);
    }
</style>
<!-- MAJORS--->
<!-- ADD-->

    <form action="ACTIONS/add_query.php" method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 h1" id="exampleModalLabel"><b>Add Major</b></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputMajor" class="form-label">Major</label>
                            <input style="width:100%; height:5vh" type="text" class="form-control" name="department"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add_depart" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- UPDATE-->
    <form action="ACTIONS/update_query.php" method="POST">
        <div class="modal fade" id="major_updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel"><b>Update Major</b></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="no" id="updateNo">
                        <div class="mb-3">
                            <label for="updateInputMajor" class="form-label">Major</label>
                            <input type="text" class="form-control" name="department" id="updateDepartment" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="update_department" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


<!-- SUBJECTS -->
<!-- ADD -->
<form action="ACTIONS/add_query.php" method="POST">
    <div style="width:300px; margin-left:500px" class="modal fade" id="addSubject" tabindex="-1"
        aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel"><b>Add Subject</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="input_class form-control" name="code" placeholder="Code" required>
                        <input type="text" class="input_class form-control" name="subject" placeholder="Subject"
                            required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_subject" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- UPDATE -->
<form action="ACTIONS/update_query.php" method="POST">
    <div style="width:300px; margin-left:500px" class="modal fade" id="editSubject" tabindex="-1"
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
                        <input type="text" class="input_class form-control" name="code" id="updateCode" required>
                        <label for="updateSubject" class="form-label">Subject:</label>
                        <input type="text" class="input_class form-control" name="subject" id="updateSubject" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_subject" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- CLASS --------------->
<!-- ADD Modal -->
<form action="ACTIONS/add_query.php" method="POST">
    <div class="modal fade" id="addClass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Add Class</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for=""><b>Course:</b></label>
                        <select name="course" id="" class="input_class form-control">
                            <option value=""></option>
                            <?php
                            include 'DATABASE/db.php';
                            $query = "SELECT * FROM class";
                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['course'] . "'>" . $row['course'] . "</option>";
                                }
                            }
                            ?>
                        </select><br>
                        <label for=""><b>Year Level:</b></label>
                        <select name="year_level" id="" class="input_class form-control">
                            <option value=""></option>
                            <?php
                            include 'DATABASE/db.php';
                            $query = "SELECT * FROM class";
                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['year_level'] . "'>" . $row['year_level'] . "</option>";
                                }
                            }
                            ?>
                        </select><br>
                        <label for=""><b>Set:</b></label>
                        <select name="Set" id="" class="input_class form-control">
                            <option value=""></option>
                            <?php
                            include 'DATABASE/db.php';
                            $query = "SELECT * FROM class";
                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['Set'] . "'>" . $row['Set'] . "</option>";
                                }
                            }
                            ?>
                        </select><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_class" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!--UPDATE-->
<form action="ACTIONS/update_query.php" method="POST">
    <div style="width:300px; margin-left:500px" class="modal fade" id="classUpdateModal" tabindex="-1"
        aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel"><b>Update Class</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="no" id="updateNo">
                    <div class="mb-3">
                        <label for=""><b>Course:</b></label>
                        <select name="course" id="updateCourse" class="input_class form-control">
                            <option value=""></option>
                            <?php
                            include 'DATABASE/db.php';
                            $query = "SELECT * FROM class";
                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['course'] . "'>" . $row['course'] . "</option>";
                                }
                            }
                            ?>
                        </select><br>
                        <label for=""><b>Year Level:</b></label>
                        <select name="year_level" id="updateYrLevel" class="input_class form-control">
                            <option value=""></option>
                            <?php
                            include 'DATABASE/db.php';
                            $query = "SELECT * FROM class";
                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['year_level'] . "'>" . $row['year_level'] . "</option>";
                                }
                            }
                            ?>
                        </select><br>
                        <label for=""><b>Set:</b></label>
                        <select name="Set" id="updateSet" class="input_class form-control">
                            <option value=""></option>
                            <?php
                            include 'DATABASE/db.php';
                            $query = "SELECT * FROM class";
                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['Set'] . "'>" . $row['Set'] . "</option>";
                                }
                            }
                            ?>
                        </select><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_class" class="btn btn-primary">Submit</button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</form>


<!-- ACADEMIC YEAR -->
<!-- ADD -->
<form action="ACTIONS/add_query.php" method="POST">
    <div class="modal fade" id="addAcad_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Add Academic Year</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Year : </label><br>
                        <input type="text" name="year" placeholder="ex. 2023-2024" class="input_class form-control"
                            required>

                        <label> Semester : </label><br>
                        <input class="inp_radio" type="radio" name="semester" value="1st"
                            class="input_class form-control">1st </input>
                        <input class="inp_radio" type="radio" name="semester" value="2nd"
                            class="input_class form-control">2nd </input> <br>


                        <label> System Default : </label><br>
                        <input class="inp_radio" type="radio" name="sys_default" class="input_class form-control"
                            value="Yes">Yes</input>
                        <input class="inp_radio" type="radio" name="sys_default" class="input_class form-control"
                            value="No">No </input>

                        <br> <label> Evaluation Status : </label><br>
                        <input class="inp_radio" type="radio" name="eval_status" class="input_class form-control"
                            value="Starting">Starting </input>
                        <input class="inp_radio" type="radio" name="eval_status" class="input_class form-control"
                            value="Not Yet Started">Not Yet Started </input>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_acadyear" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<!-- UPDATE -->
<form action="ACTIONS/update_query.php" method="POST">
    <div style="width:390px; margin-left:500px" class="modal fade" id="acad_UpdateModal" tabindex="-1"
        aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel"><b>Update Academic Year</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no" id="updateNo">

                    <div class="mb-3">
                        <label for="update-Year" class="form-label">Year:</label>
                        <input type="text" class="input_class form-control" name="year" id="update-Year" required><br>

                        <label for="update-semester" class="form-label">Semester:</label>
                        <input class="inp_radio" type="radio" name="semester" value="1st" id="update-semester1"
                            required> 1st
                        <input class="inp_radio" type="radio" name="semester" value="2nd" id="update-semester2"
                            required> 2nd <br>

                        <label for="update-sysDefault" class="form-label">Sys Default:</label>
                        <input class="inp_radio" type="radio" name="sys_default" value="Yes" id="update-sysDefaultYes"
                            required> Yes
                        <input class="inp_radio" type="radio" name="sys_default" value="No" id="update-sysDefaultNo"
                            required> No <br>

                        <label for="update-evalStatus" class="form-label">Eval. Status:</label>
                        <input class="inp_radio" type="radio" name="eval_status" value="Starting"
                            id="update-evalStatusStarting" required> Starting
                        <input class="inp_radio" type="radio" name="eval_status" value="Not Yet Started"
                            id="update-evalStatusNotYetStarted" required> Not Yet Started<br>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_acadyear" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- FACULTY-->
<!-- ADD -->
<form action="ACTIONS/add_query.php" method="POST">
    <div class="modal fade" id="addFac" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div style="width:28%" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Add Faculty</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <div class="div_form">

                            <input type="text" name="faculty_id" class="input_class form-control" placeholder="ID"
                                required><br>
                            <input type="text" name="firstname" class="input_class form-control" placeholder="Firstname"
                                required><br>
                            <input type="text" name="lastname" class="input_class form-control" placeholder="Lastname"
                                required> <br>
                            <select name="subject" id="" class="input_class form-control" required>
                                <option value="">Subject</option>
                                <?php
                                include 'DATABASE/db.php';
                                $var = "SELECT * FROM subjects";
                                $res = mysqli_query($conn, $var);
                                if ($res->num_rows > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['subject'] ?>">
                                            <?php echo $row['subject'] ?>
                                        </option>
                                        <?php
                                    }
                                } ?>

                            </select><br>
                            <input type="email" name="email" class="input_class form-control" placeholder="Email"
                                required>
                            <br>
                            <input type="password" name="f_password" class="input_class form-control"
                                placeholder="Password" required>
                            <br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="add_faculty" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- UPDATE  -->
<form action="ACTIONS/update_query.php" id="updateForm" method="POST">
    <div class="modal fade" id="facUpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true">
        <div style="width:28%" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="UpdateModalLabel"><b>Update Faculty</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no" id="updateNo">
                    <div class="mb-3">
                        <div class="div_form">

                            <input type="text" name="faculty_id" class="input_class input_class form-control"
                                id="updateID" required><br>
                            <input type="text" name="firstname" class="input_class input_class form-control"
                                id="updateFname" required><br>
                            <input type="text" name="lastname" class="input_class form-control" id="updateLname"
                                required> <br>
                            <select name="subject" id="updateSubject" class="input_class form-control" required>
                                <option value="Subject"></option>
                                <?php
                                include 'DATABASE/db.php';
                                $var = "SELECT * FROM subjects";
                                $res = mysqli_query($conn, $var);
                                if ($res->num_rows > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['subject'] ?>">
                                            <?php echo $row['subject'] ?>
                                        </option>
                                        <?php
                                    }
                                } ?>

                            </select><br>
                            <input type="email" name="email" class="input_class form-control" id="updateEmail" required>
                            <br>
                            <input type="password" name="f_password" class="input_class form-control"
                                id="updatePassword" required>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="update_faculty" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>


<!-- STUDENTS-->
 <!-- ADD-->
<form action="ACTIONS/add_query.php" method="POST">
    <div class="modal fade" id="addStud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient( #FFBF78, white)">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Add Student</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" name="stud_id" class="input_class form-control" placeholder="ID"
                            required><br>
                        <input type="text" name="firstname" class="input_class form-control" placeholder="Firstname"
                            required><br>
                        <input type="text" name="lastname" class="input_class form-control" placeholder="Lastname"
                            required><br>
                        <select name="subject" style="text-align:center" class="input_class form-control" required>
                            <option value="" style="text-align:center">Subject</option>
                            <?php
                            include 'DATABASE/db.php';
                            $var = "SELECT * FROM subjects";
                            $res = mysqli_query($conn, $var);
                            if ($res->num_rows > 0) {
                                while ($row = $res->fetch_assoc()) {
                                    echo "<option value='{$row['subject']}'>{$row['subject']}</option>";
                                }
                            }
                            ?>
                        </select><br>
                        <select name="class" style="text-align:center" class="input_class-class form-control"
                            placeholder="Class" required>
                            <option value="" style="text-align:center;text-transform:Sentence">Class</option>
                            <?php
                            include 'DATABASE/db.php';
                            $var = "SELECT * FROM class";
                            $res = mysqli_query($conn, $var);
                            if ($res->num_rows > 0) {
                                while ($row = $res->fetch_assoc()) {
                                    echo "<option value={$row['course']}  {$row['year_level']} - {$row['Set']}'>
                                    {$row['course']}  {$row['year_level']} - {$row['Set']}
                                        </option>";
                                }
                            }
                            ?>
                        </select> <br>


                        <input type="password" name="password" class="input_class form-control" placeholder="Password"
                            required><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add_student" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- UPDATE  -->
<form action="ACTIONS/update_query.php" method="POST">
    <div style="width:300px; margin-left:500px" class="modal fade" id="stud_updateModal" tabindex="-1"
        aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="UpdateModalLabel"><b>Update Student</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no" id="updateNo">
                    <div class="mb-3">
                        <div class="div_form">
                            <input type="text" name="stud_id" class="input_class input_class form-control" id="updateID"
                                required><br>
                            <input type="text" name="firstname" class="input_class input_class form-control"
                                id="updateFname" required><br>
                            <input type="text" name="lastname" class="input_class form-control" id="updateLname"
                                required><br>
                            <select name="subject" id="updateSubject" class="input_class form-control" required>
                                <option value="">Subject</option>
                                <?php
                                include 'DATABASE/db.php';
                                $var = "SELECT * FROM subjects";
                                $res = mysqli_query($conn, $var);
                                if ($res->num_rows > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                        echo "<option value='{$row['subject']}'>{$row['subject']}</option>";
                                    }
                                }
                                ?>
                            </select><br>
                            <select name="class" id="updateClass" style="text-align:center"
                                class="input_class-class form-control" placeholder="Class" required>
                                <option value="" style="text-align:center">Class</option>
                                <?php
                                include 'DATABASE/db.php';
                                $var = "SELECT * FROM class";
                                $res = mysqli_query($conn, $var);
                                if ($res->num_rows > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                        echo "<option value={$row['course']}  {$row['year_level']} - {$row['Set']}'>
                                    {$row['course']}  {$row['year_level']} - {$row['Set']}
                                        </option>";
                                    }
                                }
                                ?>
                            </select> <br>
                            <input type="password" name="password" class="input_class form-control" id="updatePassword"
                                required><br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update_fac-student" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- CRITERIA-->
<!-- UPDATE -->


<!--====================================================================================================->
 faculty_class-->
<!-- ADD  -->
<form action="ACTIONS/add_query.php" method="POST">
    <div class="modal fade" id="addFacClass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Add Class</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for=""><b>Course:</b></label>
                        <select name="course" id="" class="input_class form-control">
                            <option value=""></option>
                            <?php
                            include 'DATABASE/db.php';
                            $query = "SELECT * FROM class";
                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['course'] . "'>" . $row['course'] . "</option>";
                                }
                            }
                            ?>
                        </select><br>
                        <label for=""><b>Year Level:</b></label>
                        <select name="year_level" id="" class="input_class form-control">
                            <option value=""></option>
                            <?php
                            include 'DATABASE/db.php';
                            $query = "SELECT * FROM class";
                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['year_level'] . "'>" . $row['year_level'] . "</option>";
                                }
                            }
                            ?>
                        </select><br>
                        <label for=""><b>Set:</b></label>
                        <select name="Set" id="" class="input_class form-control">
                            <option value=""></option>
                            <?php
                            include 'DATABASE/db.php';
                            $query = "SELECT * FROM class";
                            $result = mysqli_query($conn, $query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['Set'] . "'>" . $row['Set'] . "</option>";
                                }
                            }
                            ?>
                        </select><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_fac_class" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<!-- QUESTIONNAIRES _UPDATE MODAL -->
<!--ques1 -->
<form action="ACTIONS/update_query.php" method="POST">
    <div class="modal fade" id="updateModalQues1" tabindex="-1" aria-labelledby="updateModalLabelQues1"
        aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabelQues1"><b>Update </b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no" id="updateNoQues1">
                    <div class="mb-3">
                        <label for="updateQues1" class="form-label">Question:</label>
                        <input type="text" class="input_class form-control" name="question" id="updateQues1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update_ques1" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--ques2 -->
<form action="ACTIONS/update_query.php" method="POST">
    <div class="modal fade" id="updateModalQues2" tabindex="-1" aria-labelledby="updateModalLabelQues2"
        aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabelQues2"><b>Update</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no" id="updateNoQues2">
                    <div class="mb-3">
                        <label for="updateQues2" class="form-label">Question:</label>
                        <input type="text" class="input_class form-control" name="question" id="updateQues2" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update_ques2" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!--  ques3 -->
<form action="ACTIONS/update_query.php" method="POST">
    <div class="modal fade" id="updateModalQues3" tabindex="-1" aria-labelledby="updateModalLabelQues3"
        aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabelQues3"><b>Update</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no" id="updateNoQues3">
                    <div class="mb-3">
                        <label for="updateQues3" class="form-label">Question:</label>
                        <input type="text" class="input_class form-control" name="question" id="updateQues3" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update_ques3" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<!-- Success Alert Scripts -->
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

<?php if (isset($_GET['success_updated']) && $_GET['success_updated'] == 1): ?>
    <script>
        Swal.fire({
            title: 'Data Updated!',
            icon: 'success',
            confirmButtonText: 'Ok',
            timer: 3000
        });
    </script>
<?php endif; ?>