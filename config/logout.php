<?php
session_start();
session_destroy();
header('location:../index.php');

// if(isset($_POST['logout_btn'])) {
// 	session_start();
// 	session_destroy();
// 	header('location:../index.php');
// }