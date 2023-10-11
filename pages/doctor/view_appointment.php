<?php
include_once('../layout/header.php');


?>
<div class="container-fluid">
  <form action="" method="post">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <?= isset($_POST['change_status']) ?  change_status() : '' ?>
        <?= isset($_POST['update_appointment']) ?  update_appointment() : '' ?>
        <?php

extract($_GET);
$appointment = get_one("select * from tbl_appointment where id = $id");
 ?>
        <h6 class="m-0 font-weight-bold text-primary">
          Appointment ID: <?= $id ?>
          <input type="hidden" name="id" value="<?= $id ?>">

          <div class="d-flex float-right" style="width:fit-content">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <button type="button" class="form-control btn btn-primary" disabled> Change Status</button>
              </div>
              <select name="status" id="status" class="form-control float-right" style="width:fit-content" disabled>
                <option value="pending" <?= $appointment->status == 'pending' ? 'selected' : '' ?>>PENDING</option>
                <option value="cancelled" <?= $appointment->status == 'cancelled' ? 'selected' : '' ?>>CANCELLED
                </option>
                <option value="reschedule" <?= $appointment->status == 'reschedule' ? 'selected' : '' ?>>RESCHEDULE
                </option>
                <option value="rejected" <?= $appointment->status == 'rejected' ? 'selected' : '' ?>>REJECTED</option>
                <option value="approved" <?= $appointment->status == 'approved' ? 'selected' : '' ?>>APPROVED</option>
                <option value="completed" <?= $appointment->status == 'completed' ? 'selected' : '' ?>>COMPLETED
                </option>
              </select>
            </div>
          </div>
        </h6>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-md-12">

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>*Patient:</label>
                <select name="patient_id" id="patient_id" class="form-control" disabled>
                  <?php foreach (mysqli_query($conn, "SELECT * from patient") as $row) { ?>
                  <option value="<?= $row['id'] ?>" <?= $appointment->patient_id == $row['id'] ? 'selected' : '' ?>>
                    <?= strtoupper($row['fname'].' '.$row['mname'].' '.$row['lname']) ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>*Doctor:</label>
                <select name="doctor_id" id="doctor_id" class="form-control" disabled>
                  <?php foreach (mysqli_query($conn, "SELECT * from doctor") as $row) { ?>
                  <option value="<?= $row['id'] ?>" <?= $appointment->doctor_id == $row['id'] ? 'selected' : '' ?>>
                    <?= strtoupper($row['fname'].' '.$row['mname'].' '.$row['lname']) ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>*Appointment Date:</label>
                <input type="date" name="appointment_date" value="<?= $appointment->appointment_date ?>"
                  class="form-control" id="recipient-name" disabled>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>*Remarks:</label>
                <textarea name="remarks" class="form-control" id="" cols="3" rows="3"
                  disabled><?= $appointment->remarks ?></textarea>
              </div>
            </div>

          </div>

        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Services</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0" id="tbl_service">
                    <thead>
                      <tr>
                        <th>Result</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach (get_all("select s.*,ss.price,ss.name from tbl_appointment_services s inner join tbl_services ss on ss.id = s.service_id where s.appointment_id = $id") as $row) { ?>
                      <tr>
                        <td class="text-uppercase"><?= strtoupper($row['result']??'')?></td>
                        <td><?= dynamic_dropdown('tbl_services', 'sservice[]', $row['service_id'], true) ?></td>
                        <td style="text-align: right;" class="text-uppercase"><?= $row['qty']??0 ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'] *( $row['qty']??0),2) ?></td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Medicine</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0" id="tbl_medicine">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach (get_all("select s.*,m.price,m.name from tbl_appointment_medicine s inner join tbl_medicine_stock ms on ms.id = s.medicine_stock_id inner join tbl_medicine m on m.id = ms.medicine_id where s.appointment_id = $id order by m.id asc") as $row) { ?>
                      <tr>
                        <td><?= medicine_dropdown( 'mmedicine[]', $row['id'] ,true) ?></td>
                        <td style="text-align: right;" class="text-uppercase"><?= $row['qty']??0 ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'] *( $row['qty']??0),2) ?></td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lab/Equipment</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0" id="tbl_equipment">
                    <thead>
                      <tr>
                        <th>Result</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach (get_all("select s.*,ss.price,ss.name from tbl_appointment_equipment s inner join tbl_equipment ss on ss.id = s.equipment_id where s.appointment_id = $id") as $row) { ?>
                      <tr>
                        <td class="text-uppercase"><?= strtoupper($row['result']??'')?></td>
                        <td><?= dynamic_dropdown('tbl_equipment', 'eequipment[]', $row['equipment_id'], true) ?></td>
                        <td style="text-align: right;" class="text-uppercase"><?= $row['qty']??0 ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'] *( $row['qty']??0),2) ?></td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Status History</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Date</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach (get_all("select x.*,date_format(x.created_date, '%M %d, %Y') as created_date  from tbl_appointment_status_history x where x.appointment_id = $id") as $row) { ?>
                      <tr>
                        <td><?= strtoupper($row['status']) ?></td>
                        <td><?= strtoupper($row['remarks']) ?></td>
                        <td><?= strtoupper($row['created_date']) ?></td>
                      </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <button type="submit" name="updatebtn" style="display:inline-block;" class="btn btn-primary">View</button> -->
        <div class="d-flex">
          <a style="margin-left:5px" href="<?= $_SESSION['back_url'] ?>" type="button" class="btn btn-primary">Back</a>
        </div>
  </form>

  <?php
                include_once('../layout/footer.php');

                ?>