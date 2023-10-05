<?php
include_once('../layout/header.php');
// Modal
$table = "patient";
// List
$list_title = "Patient";
$list_header = ['ID', "Patient's Name", "Email", "Contact Number"];
$list_column = ['id', "fullname", "email", "cn"];
$list_sql = "SELECT *,concat(fname,' ', mname, ' ',lname ) as fullname,concat('+63',cn) as cn  FROM $table";
$list_del_msg = "Patient Deleted Successfully!";
$list_enable_actions = true;
$list_actions = [
  "view" => "view_user.php?type=patient&",
  "edit" => false,
  "delete" => false
];
$_SESSION['back_url'] = "list_patient.php";
?>


<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_user.php');
  include_once('../layout/list.php');
  include_once('../layout/footer.php');
  ?>