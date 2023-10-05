<?php
include_once('../layout/header.php');
// Modal
$table = "doctor";
// List
$list_title = "Doctor's";
$list_header = ['ID', "Doctor's Name", "Email", "Contact Number"];
$list_column = ['id', "fullname", "email", "cn"];
$list_sql = "SELECT *,concat('Dr. ',fname,' ', mname, ' ',lname ) as fullname,concat('+63',cn) as cn  FROM $table";
$list_del_msg = "Doctor Deleted Successfully!";
$list_enable_actions = true;
$list_actions = [
  "view" => "view_user.php?type=doctor&",
  "edit" => false,
  "delete" => false
];
$_SESSION['back_url'] = "list_doctor.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  include_once('modal_create_user.php');
  include_once('../layout/list.php');
  include_once('../layout/footer.php');
  ?>