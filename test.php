<?php
require_once('config/conn.php');
require_once('config/functions.php');

$a = get_count("select * from admin where id =123");
print_r($a);
