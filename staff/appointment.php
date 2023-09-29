<?php
session_start();
include('../includes/header.php');
include('../includes/navbar.php');
include('../staff/sidebar.php');
include('../staff/topbar.php');
include('../config/conn.php');
?>
<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
    <i class="fa-solid fa-user-plus"></i> Add Patient</button>
<br> <br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Patient's List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../config/code.php" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Full Name:</label>
                        <input type="text" name="fname" class="form-control" id="recipient-name" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contact Number:</label>
                        <input type="text" name="cn" class="form-control" id="recipient-name" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Address:</label>
                        <input type="text" name="addrss" class="form-control" id="recipient-name" required>
                    </div>

                    <h6 class="m-0 font-weight-bold text-primary">
                        Login Credentials
                    </h6>
                    <br>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Username:</label>
                        <input type="text" name="uname" class="form-control" id="recipient-name" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="text" name="eml" class="form-control" id="recipient-name" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Password:</label>
                        <input type="password" name="pass" class="form-control" id="Show" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Confirm Password:</label>
                        <input type="password" name="cpass" class="form-control" id="show" required>
                    </div>
                    <div style="display: flex;">
                        <label>Show Password <input type="checkbox" onclick="myFunction()"> </label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="add_staff" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>


<!-- Begin Page Content -->
<div class="container-fluid">
    <?php include('../msg.php'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Patient's List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Appointment Schedule</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <?php

    include('../includes/scripts.php');
    include('../includes/footer.php');

    ?>