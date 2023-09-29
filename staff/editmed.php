<?php
include('../includes/header.php');
include('../includes/navbar.php');
include('../staff/sidebar.php');
include('../staff/topbar.php');
include('../config/conn.php');
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Medicine
            </h6>
            <hr>
            <div class="card-body">
                <?php
                if (isset($_GET['id'])) {
                    $med_id = $_GET['id'];
                    $med = "SELECT * FROM medicine WHERE id = '$med_id'";
                    $med_run = mysqli_query($conn, $med);

                    if (mysqli_num_rows($med_run) > 0) {

                        foreach ($med_run as $med) {

                ?>

                            <form action="../config/code.php" method="post">
                                <input type="hidden" name="med_id" value="<?= $med['id']; ?>">

                                <div class="form-group">
                                    <label>Medicine Name:</label>
                                    <input type="text" name="mn" value="<?= $med['mn']; ?>" class=" form-control" id="recipient-name" required>
                                </div>

                                <div class="form-group">
                                    <label>Description:</label>
                                    <input type="text" name="disc" value="<?= $med['disc']; ?>" class=" form-control" id="recipient-name" required>
                                </div>


                                <div class="form-group">
                                    <label>Medicine Type:</label>
                                    <select type="text" name="mt" class=" form-control" id="recipient-name" required>
                                        <option value="Tablet" <?= $med['mt'] == 1 ? 'selected' : 'Tablet' ?>>Tablet</option>
                                        <option value="Capsule" <?= $med['mt'] == 2 ? 'selected' : 'Capsule' ?>>Capsule</option>
                                        <option value="Bottle" <?= $med['mt'] == 3 ? 'selected' : 'Bottle' ?>>Bottle</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Price:</label>
                                    <input type="text" name="price" value="<?= $med['price']; ?>" class=" form-control" id="recipient-name checking_email" required>
                                </div>

                                <div class="form-group">
                                    <label>Stock:</label>
                                    <input type="text" name="stock" value="<?= $med['stock']; ?>" class=" form-control" id="" required>
                                </div>
                                <div class="form-group">
                                    <label>Expiration Date:</label>
                                    <input type="date" name="ed" value="<?= $med['ed']; ?>" class=" form-control" id="" required>
                                </div>

                                <button type="submit" name="supdate_btn" style="display:inline-block;" class="btn btn-primary">Update</button>
                                <a style="display:inline-block;" href="medicine.php" type="button" class="btn btn-secondary">Back</a>

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