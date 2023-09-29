<?php
include ('../includes/header.php');
include ('../includes/navbar.php');
include ('../doctor/sidebar.php');
include ('../doctor/topbar.php');
?>

<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
<i class="fa-solid fa-user-plus"></i> Add Patient</button>
    <br> <br>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">doctor Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form action="" method="post">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Full Name:</label>
                <input type="text" name="fullname" class="form-control" id="recipient-name" required>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Contact Number:</label>
                <input type="text" name="phone" class="form-control" id="recipient-name" required>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Age:</label>
                <input type="text" name="age" class="form-control" id="recipient-name" required>
              </div>

              <h6 class="m-0 font-weight-bold text-primary">
                Login Credentials
              </h6>
              <br>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Username:</label>
                <input type="text" name="username" class="form-control" id="recipient-name" required>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" name="email" class="form-control" id="recipient-name" required>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Password:</label>
                <input type="password" name="password" class="form-control" id="Show" required>
              </div>
              <div style="display: flex;">
                <label>Show Password <input type="checkbox" onclick="myFunction()"> </label>
              </div>

              <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>

            </form>
          </div>

        </div>
      </div>
    </div>

        <!-- Begin Page Content -->
    <div class="container-fluid">

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
                        <th>ID</th>
                        <th>Patient's Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Spongebob Squarepants</td>
                        <td>Spongebob@gmail.com</td>
                        <td>093792131</td>
                        <td>123 Main St.</td>
                        <td><a href="" class="btn btn-success">View</a></td>
                        <td><a href="" class="btn btn-danger">Delete</a></td>
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