<?php
session_start();

include '../includes/navbar.php';
include '../includes/header.php';
include '../patient/sidebar.php';
include '../patient/topbar.php';

?>


        <!-- Begin Page Content -->

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                <!-- Digital Clock Start -->
                <div class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ">
                    <div class="time"></div>
                    <div class="date"></div>
                </div>
                <!-- Digital Clock End -->

            </div>


            <!-- Content Row -->
            <div class="row">


                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Appointment</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-calendar-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php

include '../includes/scripts.php';
include '../includes/footer.php';

?>





