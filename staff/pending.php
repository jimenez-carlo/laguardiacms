<?php
include('../includes/header.php');
include('../includes/navbar.php');
include('../staff/sidebar.php');
include('../staff/topbar.php');
include('../config/conn.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <?php include('../msg.php'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Staff's List</h6>
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