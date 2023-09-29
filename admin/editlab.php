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
                Laboratory Instrument's
            </h6>
            <hr>
            <div class="card-body">
                <?php
                if (isset($_GET['id'])) {
                    $lab_id = $_GET['id'];
                    $lab = "SELECT * FROM lab WHERE id = '$lab_id'";
                    $lab_run = mysqli_query($conn, $lab);

                    if (mysqli_num_rows($lab_run) > 0) {

                        foreach ($lab_run as $lab) {

                ?>

                            <form action="../config/code.php" method="post">
                                <input type="hidden" name="lab_id" value="<?= $lab['id']; ?>">

                                <div class="form-group">
                                    <label>Surgical Instrument's:</label>
                                    <input type="text" name="si" value="<?= $lab['si']; ?>" class=" form-control" id="recipient-name" required>
                                </div>

                                <div class="form-group">
                                    <label>Description:</label>
                                    <input type="text" name="disc" value="<?= $lab['disc']; ?>" class=" form-control" id="recipient-name" required>
                                </div>

                                <div class="form-group">
                                    <label>Price:</label>
                                    <input type="text" name="price" value="<?= $lab['price']; ?>" class=" form-control" id="recipient-name" required>
                                </div>

                                <button type="submit" name="lupdate_btn" style="display:inline-block;" class="btn btn-primary">Update</button>
                                <a style="display:inline-block;" href="lab.php" type="button" class="btn btn-secondary">Back</a>

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