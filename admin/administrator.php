<?php

include('../includes/header.php');
include('../includes/navbar.php');
include('../admin/sidebar.php');
include('../admin/topbar.php');
include('../config/conn.php');
?>
<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
  <i class="fa-solid fa-user-plus"></i> Add Administrator</button>
<br> <br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admin Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../config/code.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Name:</label>
            <input type="text" name="fname" class="form-control" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Middle Name:</label>
            <input type="text" name="mname" class="form-control" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Last Name:</label>
            <input type="text" name="lname" class="form-control" id="recipient-name" required>
          </div>


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Contact Number:</label>
            <input type="number" name="cn" class="form-control" id="recipient-name" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">House #:</label>
            <input type="text" name="house_no" class="form-control" id="recipient-name" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Province:</label>
            <select name="province_id" id="province_id" class="form-control">
              <?php foreach (mysqli_query($conn, "SELECT * from tbl_province order by name asc") as $row) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">City:</label>
            <select name="city_id" id="city_id" class="form-control">
              <?php foreach (mysqli_query($conn, "SELECT * from tbl_city where province_id = '1401' order by name asc") as $row) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Barangay:</label>
            <select name="barangay_id" id="barangay_id" class="form-control">
              <?php foreach (mysqli_query($conn, "SELECT * from tbl_barangay where city_id = '0' order by name asc") as $row) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Zip Code:</label>
            <input type="number" name="zip_code" class="form-control" id="recipient-name" required minlength="4" maxlength="4">
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
            <button type="submit" name="add_admin" class="btn btn-primary">Submit</button>
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
      <h6 class="m-0 font-weight-bold text-primary">Doctor's List</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <thead>
            <tr>
              <th>ID</th>
              <th>Admin's Name</th>
              <th>Email</th>
              <th>Contact Number</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            <?php

            $query = "SELECT * FROM admin";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {

              foreach ($query_run as $row) {
            ?><tr>
                  <td><?= $row['id']; ?></td>
                  <td><?= $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']; ?></td>
                  <td><?= $row['email']; ?></td>
                  <td><?= $row['cn']; ?></td>
                  <td class="d-flex"><a href="vadmin.php?id=<?= $row['id']; ?>" class="btn btn-success">View</a>
                    <form action="../config/code.php" method="post">
                      <button type="submit" name="del_admin" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </form>
                  </td>
              <?php
              }
            }

              ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>



  <script>
    let province_dropdown = document.getElementById('province_id');
    let city_dropdown = document.getElementById('city_id');
    let barangay_dropdown = document.getElementById('barangay_id');

    province_dropdown.addEventListener('change', function() {
      get_psgc(city_dropdown, "province_id", province_dropdown.value);
      get_psgc(barangay_dropdown, "city_id", city_dropdown.value);
    });

    city_dropdown.addEventListener('change', function() {
      get_psgc(barangay_dropdown, "city_id", city_dropdown.value);
    });


    function get_psgc(element, target, value) {
      return fetch("../get_psgc.php?" + target + "=" + value).then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.text();
        })
        .then(data => {
          element.innerHTML = data;
        })
        .catch(error => {
          console.error('There was a problem with the fetch operation:', error);
        });
    }
  </script>
  <?php

  include('../includes/scripts.php');
  include('../includes/footer.php');

  ?>