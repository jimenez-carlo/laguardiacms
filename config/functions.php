<?php
require_once('conn.php');

$_SESSION['conn'] = $conn;

function query($sql)
{
  return mysqli_query($_SESSION['conn'], $sql);
}
function get_insert_id($sql)
{
  mysqli_query($_SESSION['conn'], $sql);
  return mysqli_insert_id($_SESSION['conn']);
}

function exists($sql)
{
  return query($sql)->num_rows;
}

function get_count($sql)
{
  return mysqli_num_rows(query($sql));
}

function get_one($sql)
{
  $excute = query($sql);
  return mysqli_fetch_object($excute);
}

function get_all($sql)
{
  $data = [];
  foreach (query($sql) as $res) {
    $data[] = $res;
  }
  return $data;
}

function get_fields($sql){
  $fields = [];
 foreach (mysqli_fetch_fields(query($sql)) as $res) {
    $fields[] = $res->name;
 }
  return $fields;
}

function field_replacer($value, $sql, $array){
  $replace = [];
  foreach (get_fields($sql) as $res) {
    $replace[':'.$res] = $array[$res]; 
  }

  return strtr($value, $replace);
}

function format_date($date){
  return date_format($date,"F d, Y");
}

function upload($file, $delete_file = "", $path = "../../files/")
{
  // if (!empty($delete_file)) delete_file($delete_file);

  $name = $file['name'];
  $name = (explode(".", $name));
  $ext = end($name);
  $img = 'img_' . date('mdYHis') . "." . $ext;
  move_uploaded_file($file["tmp_name"], $path . $img);
  return $img;
}

function delete_file($file)
{
  if (!empty($file)) {
    unlink("files/" . $file);
  };
}

function delete($msg = "Deleted Successfully!")
{
  extract($_POST);
  query("DELETE from $table where id = $delete");
  return success($msg);
}

function create_user()
{
  extract(array_merge($_POST, $_FILES));


  // if (check_username($uname)) {
    // return error("Username Already In-Use!");
  // }

  if (check_email($eml)) {
    return error("Email Already In-Use!");
  }

  $pic = "default.png";
  if (isset($image)) {
    $pic = upload($image);
  }
  query("INSERT INTO $table (fname, mname, lname, cn, house_no, province_id, city_id, barangay_id, zip_code, email, password, pic) 
                     VALUES ('$fname', '$mname', '$lname', '$cn', '$house_no', '$province_id', '$city_id', '$barangay_id', '$zip_code', '$eml', '$pass', '$pic')");
  unset($_POST);
  return success("User Created Successfully!");
}

function update_user()
{
  extract(array_merge($_POST, $_FILES));


  // if (check_username($uname, $id)) {
  //   return error("Username Already In-Use!");
  // }

  if (check_email($eml, $id)) {
    return error("Email Already In-Use!");
  }
  
  $pic = get_one("select pic from ".($old_type ? $old_type : $table)." where id = $id")->pic ?? "default.png";
  if (!empty($image['name'])) {
    $pic = upload($image);
  }
//   echo '<pre>';
// echo "delete from $table where id = $id";
// print_r($pic);die;
  if(isset($old_type) && $old_type != $table){
    query("delete from $old_type where id = $id");
    $new_id = get_insert_id("INSERT INTO $table (fname,mname,lname,cn,house_no,province_id, city_id,barangay_id, zip_code, email, password, pic) VALUES(
      '$fname','$mname','$lname','$cn','$house_no','$province_id','$city_id','$barangay_id','$zip_code', '$eml','$pass', '$pic'
    )");
return '<script> alert("'.ucfirst($table).' Updated Successfully!"); window.location.href = window.location.href+"&type='.$table.'&id='.$new_id.'"; </script>';
    unset($_POST);

  }else{
    query("UPDATE $table set fname = '$fname', mname = '$mname', lname = '$lname', cn = '$cn', house_no = '$house_no', province_id =  '$province_id', city_id =  '$city_id', barangay_id = '$barangay_id', zip_code = '$zip_code', email = '$eml', password = '$pass', pic = '$pic' where id = $id");
    return success(ucfirst($table)." Updated Successfully!");
    unset($_POST);
  }
}

function insert_appointment_history($id, $status = 'pending', $remarks = null){
  query("INSERT INTO tbl_appointment_status_history (appointment_id, status, remarks) VALUES ('$id', '$status', '$remarks')");
}

function create_appointment(){
  extract($_POST);

  $id = get_insert_id("INSERT INTO tbl_appointment (patient_id, doctor_id, appointment_date) VALUES ('$patient_id', '$doctor_id', '$appointment_date')");
  insert_appointment_history($id);
  unset($_POST);
  return success("Appointment Created Successfully!");
}

function update_appointment(){
  extract($_POST);
  query("UPDATE tbl_appointment set patient_id = '$patient_id', doctor_id = '$doctor_id', appointment_date = '$appointment_date', remarks = '$remarks' where id = $id ");
  if(!empty($sservice)){
    query("DELETE from tbl_appointment_services where appointment_id = $id ");
    foreach ($sservice as $i => $result) {
      query("INSERT INTO tbl_appointment_services (appointment_id, service_id, qty, result) VALUES ($id,'".$sservice[$i]."','".$sqty[$i]."','$sresult[$i]' )");
    }
  }
  if(!empty($eequipment)){
    query("DELETE from tbl_appointment_equipment where appointment_id = $id ");
    foreach ($eequipment as $i => $result) {
      query("INSERT INTO tbl_appointment_equipment (appointment_id, equipment_id, qty, result) VALUES ($id,'".$eequipment[$i]."','".$eqty[$i]."','$eresult[$i]' )");
    }
  }
  if(!empty($mmedicine)){
    query("DELETE from tbl_appointment_medicine where appointment_id = $id ");
    foreach ($mmedicine as $i => $result) {
      query("INSERT INTO tbl_appointment_medicine (appointment_id, medicine_stock_id, qty) VALUES ($id,'".$mmedicine[$i]."','".$mqty[$i]."' )");
    }
  }
  unset($_POST);
  return success("Appointment Updated Successfully!");
}

function change_status(){
  extract($_POST);
  query("UPDATE tbl_appointment set status = '$status', remarks = '$remarks', appointment_date = '$appointment_date' where id = $id");
  insert_appointment_history($id, $status, $remarks);
  unset($_POST);
  return success("Appointment Changed Status!");
}

function create_medicine()
{
  extract($_POST);

  if (check_exists("tbl_medicine", "name", $name)) {
    return error("Medicine Already Exists!");
  }
  $id = get_insert_id("INSERT INTO tbl_medicine (type, name, description, price) VALUES ('$type','$name', '$description', '$price')");
  if(!empty($stock)){
    $sub_id = get_insert_id("INSERT into tbl_medicine_stock (medicine_id, stock, expiration_date) VALUES ('$id','$stock','$expiration_date')");
    $user_id = $_SESSION['user']->id;
    $access_id = $_SESSION['auth'];
    query("INSERT into tbl_medicine_stock_history (stock_id, qty, user_id, access_id) VALUES ('$sub_id','$stock','$user_id','$access_id')");
  }
  unset($_POST);
  return success("Medicine Created Successfully!");
}

function create_medicine_batch(){
  extract($_POST);
  if(get_one("SELECT count(IFNULL(expiration_date,0)) as result from tbl_medicine_stock where expiration_date = '$expiration_date' and medicine_id = $id ")->result){
    return error("Medicine Batch Expiration Date Already Exists!");
  }
  if(!empty($stock)){
    $sub_id = get_insert_id("INSERT into tbl_medicine_stock (medicine_id, stock, expiration_date) VALUES ('$id','$stock','$expiration_date')");
    $user_id = $_SESSION['user']->id;
    $access_id = $_SESSION['auth'];
    query("INSERT into tbl_medicine_stock_history (stock_id, qty, user_id, access_id) VALUES ('$sub_id','$stock','$user_id','$access_id')");
  }else{
    query("INSERT into tbl_medicine_stock (medicine_id, stock, expiration_date) VALUES ('$id','0','$expiration_date')");
  }
  unset($_POST);
  return success("Medicine Batch Created Successfully!");
}

function update_medicine(){
  extract($_POST);
  query("UPDATE tbl_medicine set name = '$name', price = '$price', description = '$description', type='$type' where id = $id ");
  unset($_POST);
  return success("Medicine Updated Successfully!");
}

function add_stock(){
  extract($_POST);
    $user_id = $_SESSION['user']->id;
    $access_id = $_SESSION['auth'];
    query(("UPDATE tbl_medicine_stock set stock = (stock + $stock) where id = $stock_id"));
    query("INSERT into tbl_medicine_stock_history (stock_id, qty, user_id, access_id) VALUES ('$stock_id','$stock','$user_id','$access_id')");
  unset($_POST);
  return success("Stock Added Successfully!");
}

function delete_medicine_batch(){
  extract($_POST);
  query("DELETE from tbl_medicine_stock where id = $delete_medicine_batch");
  unset($_POST);
  return success("Medicine Batch Deleted Successfully!");
}

function create_equipment()
{
  extract($_POST);

  if (check_exists("tbl_equipment", "name", $name)) {
    return error("Laboratory/Equipment Already Exists!");
  }
  $id = get_insert_id("INSERT INTO tbl_equipment ( name, description, price, stock) VALUES ('$name', '$description', '$price', '$stock')");
  unset($_POST);
  return success("Laboratory/Equipment Created Successfully!");
}

function update_equipment(){
  extract($_POST);
  query("UPDATE tbl_equipment set name = '$name', price = '$price', description = '$description', stock='$stock' where id = $id ");
  unset($_POST);
  return success("Laboratory/Equipment Updated Successfully!");
}

function create_service()
{
  extract($_POST);
  if (check_exists("tbl_services", "name", $name)) {
    return error("Service Already Exists!");
  }
  $id = get_insert_id("INSERT INTO tbl_services ( name, description, price) VALUES ('$name', '$description', '$price')");
  unset($_POST);
  return success("Service Created Successfully!");
}

function update_service(){
  extract($_POST);
  query("UPDATE tbl_services set name = '$name', price = '$price', description = '$description' where id = $id ");
  unset($_POST);
  return success("Service Updated Successfully!");
}


function check_exists($table, $column, $value, $id = null)
{
  if (!empty($id)) {
    return get_one("SELECT count(IFNULL($column,0)) as result from $table where $column = '$value' and x.id <> $id ")->result;
  }
  return get_one("SELECT count(IFNULL($column,0)) as result from $table where $column = '$value'")->result;
}

function check_username($username, $id = null)
{
  if (!empty($id)) {
    return get_one("SELECT count(IFNULL(x.uname,0)) as result from (SELECT uname,id from admin UNION SELECT uname,id from doctor UNION SELECT uname,id from patient UNION SELECT uname,id from staff) as x where x.uname = '$username' and x.id <> $id ")->result;
  }
  return get_one("SELECT count(IFNULL(x.uname,0)) as result from (SELECT uname,id from admin UNION SELECT uname,id from doctor UNION SELECT uname,id from patient UNION SELECT uname,id from staff) as x where x.uname = '$username'")->result;
}

function check_email($email, $id = null)
{
  if (!empty($id)) {
    return get_one("SELECT count(IFNULL(x.email,0)) as result from (SELECT email,id from admin UNION SELECT email,id from doctor UNION SELECT email,id from patient UNION SELECT email,id from staff) as x where x.email = '$email' and x.id <> $id ")->result;
  }
  return get_one("SELECT count(IFNULL(x.email,0)) as result from (SELECT email,id from admin UNION SELECT email,id from doctor UNION SELECT email,id from patient UNION SELECT email,id from staff) as x where x.email = '$email'")->result;
}

function success($message = "Action Is Successfully!")
{
  return "<script>alert('$message');</script>";
  // return '<div id="Hide" class="alert alert-success alert-dismissible fade show" role="alert">' . $message . '</div>';
}

function error($message = "Error Something Went Wrong!")
{
  return "<script>alert('$message');</script>";
  // return '<div id="Hide" class="alert alert-danger alert-dismissible fade show" role="alert">' . $message . '</div>';
}


function login()
{
  extract($_POST);
  $sql = "SELECT * from (select a.*,1 as access_id FROM admin a union select d.*,2 as access_id from doctor d union select s.*,4 as access_id from staff s union 
select p.id,p.fname,p.cn,p.addrss,p.email,p.uname,p.password,p.mname,p.lname,p.province_id,p.city_id,p.barangay_id,p.house_no,p.zip_code,p.pic,3 as access_id from patient p) x where (x.uname = '$uname' OR x.email = '$uname') AND password = '$pass'
order by x.access_id asc limit 1";;
  if (get_count($sql) > 0) {
    $user = get_one($sql);
    $_SESSION['user'] = $user;
    $_SESSION['auth'] = $user->access_id;

    return success("Logging in Please wait...") . '<script>setTimeout(location.reload(),3000)</script>';
  }
  return error("Invalid Username/Password!");
}

function generate_password()
{
  $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#$';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < 8; $i++) {
    $randomString .= $characters[random_int(0, $charactersLength - 1)];
  }
  return $randomString;
}


function check_script()
{
  $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  if (strpos($url, 'index.php') !== false) {
    return true;
  }
  return false;
}


function dynamic_dropdown($table, $name, $id = null, $disabled = false){
  $select = "<select name='$name' class='form-control' ".($disabled ? 'disabled' : '').">";
  foreach (get_all("select * from $table") as $res) {
    $select .= "<option value='".$res['id']."' ".($res['id'] == $id ? 'selected' : '').">".$res['name']."</option>";
  }
  $select .= "</select>";
  return $select;
}

function medicine_dropdown($name, $id = null, $disabled = false){
  $select = "<select name='$name' class='form-control' ".($disabled ? 'disabled' : '').">";
  foreach (get_all("select m.*,ms.expiration_date,ms.id from tbl_medicine m inner join tbl_medicine_stock ms on ms.medicine_id = m.id") as $res) {
    $select .= "<option value='".$res['id']."' ".($res['id'] == $id ? 'selected' : '').">".$res['name'].' Exp.'.$res['expiration_date']."</option>";
  }
  $select .= "</select>";
  return $select;
}

function sign($n) {
    if($n > 0){
      return "+".$n;
    }else if($n == 0){
      return 0;
    }else{
      return "-".$n;
    }
}