<?php

$host = "localhost";
$uname = "root";
$pass = "";
$dbname = "laguardiacms";

$conn = mysqli_connect("$host", "$uname", "$pass", "$dbname");

if (!$conn) {
    header("Location: errors/dberror.php");
    die();
}
?>