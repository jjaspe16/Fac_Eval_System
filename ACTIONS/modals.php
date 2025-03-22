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
                            <input style="width:300px;height:6vh" type="text" class="form-control" name="department"
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
                            <input type="text"style="width:300px;height:6vh"  class="form-control" name="department" id="updateDepartment" required>
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
                        <label for=""><b>Class:</b></label>
                        <input type="text" name="course" id="" class="input_class form-control">
                       <!-- <select name="course" id="" class="input_class form-control">
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
                        </select><br>-->
                        <label for=""><b>Year Level:</b></label>
                        <input type="text" name="year_level" id="" class="input_class form-control">
                       
                        <label for=""><b>Set:</b></label>
                        <input type="text" name="Set" id="" class="input_class form-control">
                        
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
                        <input type="text" name="course" id="updateCourse" class="input_class form-control">
                        
                        <label for=""><b>Year Level:</b></label>
                        <input type="text" name="year_level" id="updateYrLevel" class="input_class form-control">
                    
                        <label for=""><b>Set:</b></label>
                        <input type="text" name="Set" id="updateSet" class="input_class form-control">
                    
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
    <div style="width:400px; margin-left:500px"  class="modal fade"  id="addAcad_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Add Academic Year</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Year : </label><br>
                        <input style="height:5vh" type="text" name="year"  class="input_class form-control"
                            required>

                        <label> Semester : </label><br>
                        <input class="inp_radio" type="radio" name="semester"  style="margin-left:50px"  value="1st"
                            class="input_class form-control">1st </input>
                        <input class="inp_radio" type="radio" name="semester"  style="margin-left:40px"  value="2nd"
                            class="input_class form-control">2nd </input> <br>


                        <label> System Default : </label><br>
                        <input class="inp_radio" type="radio" name="sys_default" style="margin-left:50px" class="input_class form-control"
                            value="Yes">Yes</input>
                        <input class="inp_radio" type="radio" name="sys_default"  style="margin-left:40px" style="margin-left:40px" class="input_class form-control"
                            value="No">No </input>

                        <br> <label> Evaluation Status : </label><br>
                        <input class="inp_radio" type="radio" name="eval_status" style="margin-left:50px" class="input_class form-control"
                            value="Starting">Starting </input>
                        <input class="inp_radio" type="radio" name="eval_status"  style="margin-left:10px" class="input_class form-control"
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
    <div style="width:400px; margin-left:500px" class="modal fade" id="acad_UpdateModal" tabindex="-1"
        aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel"><b>Update Academic Year</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no" id="updateNo">      
                       
                    <label>Year : </label><br>
                        <input style="height:5vh" type="text" name="year"  id="update-Year"class="input_class form-control"
                            required>

                        <label> Semester : </label><br>
                        <input class="inp_radio" type="radio" name="semester"  style="margin-left:50px"  id="update-semester1"
                            class="input_class form-control">1st </input>
                        <input class="inp_radio" type="radio" name="semester"  style="margin-left:40px"  id="update-semester2"
                            class="input_class form-control">2nd </input> <br>


                        <label> System Default : </label><br>
                        <input class="inp_radio" type="radio" name="sys_default" style="margin-left:50px" class="input_class form-control"
                        id="update-sysDefaultYes" >Yes</input>
                        <input class="inp_radio" type="radio" name="sys_default"  style="margin-left:40px" style="margin-left:40px" class="input_class form-control"
                        id="update-sysDefaultNo"  >No </input>

                        <br> <label> Evaluation Status : </label><br>
                        <input class="inp_radio" type="radio" name="eval_status" style="margin-left:50px" class="input_class form-control"
                        id="update-evalStatusStarting" >Starting </input>
                        <input class="inp_radio" type="radio" name="eval_status"  style="margin-left:10px" class="input_class form-control"
                        id="update-evalStatusNotYetStarted" >Not Yet Started </input>
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
                                required>
                            <input type="text" name="firstname" class="input_class form-control" placeholder="Firstname"
                                required>
                            <input type="text" name="lastname" class="input_class form-control" placeholder="Lastname"
                                required> 
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

                            </select>
                            <input type="email" name="email" class="input_class form-control" placeholder="Email"
                                required>
                            
                            <input type="password" name="f_password" class="input_class form-control"
                                placeholder="Password" required>
                            

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
                        <input type="text" name="stud_id" style="height:5vh" class="input_class form-control" placeholder="ID"
                            required><br>
                        <input type="text" name="firstname" style="height:5vh"class="input_class form-control" placeholder="Firstname"
                            required><br>
                        <input type="text" name="lastname" style="height:5vh" class="input_class form-control" placeholder="Lastname"
                            required><br>
                        <select name="subject"  style="height:5vh;text-align:center" class="input_class form-control" required>
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
                        <select name="className" style="height:5vh" class="input_class-class form-control"
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


                        <input type="password" name="password" style="height:5vh" class="input_class form-control" placeholder="Password"
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
                    <h1 class="modal-title fs-5" id="stud_updateModalLabel"><b>Update Student</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no" id="updateNo">
                    <div class="mb-3">
                        <div class="div_form">
                            <input type="text" name="stud_id" id="update-studID" style="height:5vh" class="input_class input_class form-control"required><br>
                            <input type="text" name="firstname"  id="update-studFname"  style="height:5vh" class="input_class input_class form-control" required><br>
                            <input type="text" name="lastname" id="update-studLname"  style="height:5vh" class="input_class form-control" required><br>
                            <select name="subject" id="update-studSubject" style="height:6vh;text-align:center" class="input_class form-control" required>
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
                            <select name="className" id="update-studClass" style="height:5vh"
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
                            <input type="password" name="password" id="update-studPassword" style="height:5vh" class="input_class form-control" required><br>
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