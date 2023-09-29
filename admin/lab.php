<?php
session_start();
include('../includes/header.php');
include('../includes/navbar.php');
include('../admin/sidebar.php');
include('../admin/topbar.php');
?>

<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
  <i class="fa-solid fa-plus"></i> Add Laboratory Instrument</button>
<br> <br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Laboratory Instrument</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="../config/code.php" method="post">



          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Surgical Instrument:</label>
            <input type="text" name="si" class="form-control" id="recipient-name" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description:</label>
            <textarea type="text" name="disc" class="form-control" id="recipient-name" required></textarea>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Price:</label>
            <input type="text" name="price" class="form-control" id="recipient-name" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="submit" name="add_lab" class="btn btn-primary">Submit</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
<?php include('msg.php'); ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laboratory Instruments</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Surgical Instrument</th>
              <th>Description</th>
              <th>View</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
          include('../config/conn.php');
          $query = "SELECT * FROM lab";
          $query_run = mysqli_query($conn, $query);

          if (mysqli_num_rows($query_run) > 0) {

            foreach ($query_run as $row) {
          ?><tr>
                <td><?= $row['si']; ?></td>
                <td><?= $row['disc']; ?></td>
                <td><a href="editlab.php?id=<?=$row['id'];?>" class="btn btn-success">Update</a></td>
                <td>
                  <form action="../config/code.php" method="post">
                  <button type="submit" name="del_lab" value="<?=$row['id'];?>" class="btn btn-danger">Delete</a>
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