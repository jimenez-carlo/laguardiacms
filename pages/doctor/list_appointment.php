<?php
include_once('../layout/header.php');
// Modal
$table = "tbl_appointment";
// List
$list_title = "Appointment's";
$list_header = ['ID',"Status", "Patient Name", "Doctor", "Appointment Date"];
$list_column = ['id','status', "patient_name", "doctor_name", "appointment_date"];
$list_sql = "SELECT a.*,date_format(appointment_date, '%M %d, %Y') as appointment_date , concat(ifnull(p.fname,''), ' ', ifnull(p.mname,''), ' ', ifnull(p.lname,'')) as patient_name,concat(ifnull(d.fname,''), ' ', ifnull(d.mname,''), ' ', ifnull(d.lname,'')) as doctor_name FROM tbl_appointment a left join patient p on p.id = a.patient_id left join doctor d on d.id = a.doctor_id order by a.appointment_date asc";
$list_del_msg = "Appointment Deleted Successfully!";
$list_enable_actions = true;
$list_actions = [
  "view" => "view_appointment.php?&",
  "edit" => "edit_appointment.php?&",
  "delete" => true
];
$_SESSION['back_url'] = "list_appointment.php";
?>
<button type="button" style="margin-left: 30px; " class="btn btn-primary" data-toggle="modal"
  data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa-solid fa-calendar"></i> Create
  Appointment</button>
<br> <br>

<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_appointment.php');
  include_once('../layout/list.php');
  include_once('../layout/footer.php');
  ?>