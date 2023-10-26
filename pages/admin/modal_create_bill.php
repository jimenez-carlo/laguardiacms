<div class="modal fade" id="createBillModal" tabindex="-1" role="dialog" aria-labelledby="createBillModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createBillModalLabel">Paybill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $_GET['id']?>">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <?php
                if (isset($_POST['add_stock'])) {
                  // echo "<script> $('#medicineModalStock').modal('show');</script>";
                  echo add_stock();
                }
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <?php $tmp_price = 0 ?>
                    <tbody>
                      <?php foreach (get_all("select s.*,ss.price,ss.name from tbl_appointment_services s inner join tbl_services ss on ss.id = s.service_id where s.appointment_id = $id") as $row) { ?>
                      <tr>
                        <td style="text-wrap:nowrap"><?= $row['name'] ?></td>
                        <td>Service</td>
                        <td><?= $row['qty']??0 ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'],2) ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'] *( $row['qty']??0),2) ?></td>
                      </tr>
                      <?php $tmp_price += $row['price'] *( $row['qty']??0) ?>
                      <?php } ?>
                      <?php foreach (get_all("select s.*,ss.price,ss.name from tbl_appointment_equipment s inner join tbl_equipment ss on ss.id = s.equipment_id where s.appointment_id = $id") as $row) { ?>
                      <tr>
                        <td style="text-wrap:nowrap"><?= $row['name'] ?></td>
                        <td>Equipment</td>
                        <td><?= $row['qty']??0 ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'],2) ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'] *( $row['qty']??0),2) ?></td>
                      </tr>
                      <?php $tmp_price += $row['price'] *( $row['qty']??0) ?>
                      <?php } ?>
                      <?php foreach (get_all("select s.*,m.price,m.name from tbl_appointment_medicine s inner join tbl_medicine_stock ms on ms.id = s.medicine_stock_id inner join tbl_medicine m on m.id = ms.medicine_id where s.appointment_id = $id order by m.id asc") as $row) { ?>
                      <tr>
                        <td style="text-wrap:nowrap"><?= $row['name'] ?></td>
                        <td>Medicine</td>
                        <td><?= $row['qty']??0 ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'],2) ?></td>
                        <td style="text-align: right;"><?= number_format($row['price'] *( $row['qty']??0),2) ?></td>
                      </tr>
                      <?php $tmp_price += $row['price'] *( $row['qty']??0) ?>
                      <?php } ?>
                      <tr>
                        <td colspan="4"><b>Total</b></td>
                        <td style="text-align: right;"><?= number_format($tmp_price,2) ?></td>
                      </tr>
                      <tr>
                        <td colspan="4"><b>Amount</b></td>
                        <td style="text-align: right;">
                          <input type="number" name="amount" class="form-control" id="amount"
                            value="<?= $appointment->amount ?>" min="<?= $tmp_price ?>" style="text-align: right;">
                          <input type="hidden" id="total" value="<?= $tmp_price ?>">
                        </td>
                      </tr>
                      <tr>
                        <td colspan="4"><b>Change</b></td>
                        <td style="text-align: right;" id="change"><?= $appointment->change ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" name="add_stock" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
let amount = document.getElementById('amount');
amount.addEventListener('change', function(e) {
  let total = document.getElementById('total');
  let change = document.getElementById('change');
  let sum = parseFloat(total.value) - parseFloat(this.value)
  change.innerText = sum.toLocaleString("en-US", {
    style: 'decimal',
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  });
});
</script>