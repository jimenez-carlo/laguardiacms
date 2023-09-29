<?php
include ('../includes/header.php');
include ('../includes/navbar.php');
include ('../patient/sidebar.php');
include ('../patient/topbar.php');
?>


                    <!-- Begin Page Content -->
                    <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Perscription Records</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Reason</th>
                        <th>Doctor</th>
                        <th>Review</th>
                        <th>Perscription Date</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>headache</td>
                        <td>alfredo</td>
                        <td>61</td>
                        <td>2023/6/28</td>
                        <td>pending</td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>



            <?php
    
            include ('../includes/scripts.php');
            include ('../includes/footer.php');
    
            ?>