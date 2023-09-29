<?php
include('../includes/header.php');
include('../includes/navbar.php');
include('../admin/sidebar.php');
include('../admin/topbar.php');
include('../config/conn.php');
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Doctor Information
            </h6>
            <hr>
            <div class="card-body">
                <?php
                if (isset($_GET['id'])) {
                    $doctors_id = $_GET['id'];
                    $doctor = "SELECT * FROM doctor WHERE id = '$doctors_id'";
                    $doctor_run = mysqli_query($conn, $doctor);

                    if (mysqli_num_rows($doctor_run) > 0) {

                        foreach ($doctor_run as $doctor) {

                ?>

                            <form action="" method="post">

                                <div class="form-group">
                                    <label>Full Name:</label>
                                    <input type="text" name="fname" value="<?=$doctor['fname'];?>" class=" form-control" id="recipient-name" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Contact Number:</label>
                                    <input type="text" name="cn" value="<?=$doctor['cn'];?>" class=" form-control" id="recipient-name" disabled>
                                </div>


                                <h6 class="m-0 font-weight-bold text-primary">
                                    Login Credentials
                                </h6>
                                <br>

                                <div class="form-group">
                                    <label>Username:</label>
                                    <input type="text" name="uname" value="<?=$doctor['uname'];?>" class=" form-control" id="recipient-name" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" name="eml" value="<?=$doctor['email'];?>" class=" form-control" id="recipient-name checking_email" disabled>
                                    <small class="error_email" style="color: red;"></small>
                                </div>

                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="text" name="pass" value="<?=$doctor['password'];?>" class=" form-control" id="Show"  disabled>

                                    <br>
                                <!-- <button type="submit" name="updatebtn" style="display:inline-block;" class="btn btn-primary">View</button> -->
                                <a style="display:inline-block;" href="doctor.php" type="button" class="btn btn-secondary">Back</a>

                            </form>
                        <?php
                        }
                    } else {
                        ?>
                        <h4>No Records Found</h4>
                <?php
                    }
                }
                ?>

                <?php

                include('../includes/scripts.php');
                include('../includes/footer.php');

                ?>