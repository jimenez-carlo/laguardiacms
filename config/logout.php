<?php
session_start();
session_destroy();
header('location:../login.php');

// if(isset($_POST['logout_btn'])) {
// 	session_start();
// 	session_destroy();
// 	header('location:../login.php');
// }