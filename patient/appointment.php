<?php
session_start();

include('../includes/header.php');
include('../includes/navbar.php');
include('../patient/sidebar.php');
include('../patient/topbar.php');
include('../config/conn.php');

?>
<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
    <i class="fa-solid fa-user-plus"></i> Add Appointment</button>
<br> <br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../config/code.php" method="post">
                    <div class="form-group">

                        <input type="hidden" name="fname" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Date of Appointment:</label>
                        <input type="date" name="date" class="form-control" id="recipient-name" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">time of Appointment:</label>
                        <input type="time" name="time" class="form-control" id="recipient-name" required>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Reason:</label>
                        <textarea type="text" name="remark" class="form-control" id="recipient-name" required></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="add_app" class="btn btn-primary">Submit</button>
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
            <h6 class="m-0 font-weight-bold text-primary">Appointment's</h6>
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
                        </tr>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>



                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <?php

    include('../includes/scripts.php');
    include('../includes/footer.php');

    ?>