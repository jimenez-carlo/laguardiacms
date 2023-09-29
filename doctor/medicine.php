<?php
include('../includes/header.php');
include('../includes/navbar.php');
include('../doctor/sidebar.php');
include('../doctor/topbar.php');

?>
<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
  <i class="fa-solid fa-plus"></i> Add Medicine</button>
<br> <br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Medicine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="../config/code.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Medicine Name:</label>
            <input type="text" name="mn" class="form-control" id="recipient-name" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Discription:</label>
            <input type="text" name="disc" class="form-control" id="recipient-name" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Medicine Type:</label>
            <select type="text" name="mt" class="form-control" id="recipient-name" required>
              <option value="1">Tablet</option>
              <option value="2">Capsule</option>
              <option value="3">Bottle</option>
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Price:</label>
            <input type="text" name="price" class="form-control" id="recipient-name" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Stock:</label>
            <input type="text" name="stock" class="form-control" id="recipient-name" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="add_smed" class="btn btn-primary">Submit</button>
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
      <h6 class="m-0 font-weight-bold text-primary">Medicine's List</h6>
    </div>


    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Medicine Name</th>
              <th>Description</th>
              <th>Medicine Type</th>
              <th>Price (₱)</th>
              <th>Stock</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <?php
          include('../config/conn.php');
          $query = "SELECT * FROM medicine";
          $query_run = mysqli_query($conn, $query);

          if (mysqli_num_rows($query_run) > 0) {

            foreach ($query_run as $row) {
          ?><tr>
                <td><?= $row['mn']; ?></td>
                <td><?= $row['disc']; ?></td>
                <td><?= $row['mt']; ?></td>
                <td>₱ <?= $row['price']; ?></td>
                <td><?= $row['stock']; ?></td>
                <td><a href="editmed.php?id=<?= $row['id']; ?>" class="btn btn-success">Update</a></td>
                <td>
                  <form action="../config/code.php" method="post">
                    <button type="submit" name="del_smed" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</a>
                  </form>
                </td>
              </tr>
          <?php
            }
          }

          ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>



  <?php

  include('../includes/scripts.php');
  include('../includes/footer.php');

  ?>