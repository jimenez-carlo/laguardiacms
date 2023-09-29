<?php
include "../config/conn.php";

if (isset($_POST['login_btn'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $login_query = "SELECT * FROM admin  WHERE uname = '$uname' AND password = '$pass' LIMIT 1";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {

        foreach ($login_query_run as $data) {
            $user_id = $data['id'];
            $user_name = $data['fname'];
            $user_uname = $data['uname'];
            // $role_as = $data['role_as'];
            // $user_status = $data['user_status'];
            // $user_pass = $data['user_pass'];
        }

        $_SESSION['auth'] = 1;
        // $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_uname' => $user_uname,

        ];

        //1 = admin
        if ($_SESSION['auth']) {
            header("Location: ../admin/admin.php");
            exit(0);
            //0 = patient
        } // } elseif ($_SESSION['auth_role'] == '0') {
        //     header("Location: ../patient/patient.php");
        //     exit(0);
        // }
    }
}

if (isset($_POST['login_btn'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $login_query = "SELECT * FROM doctor  WHERE uname = '$uname' AND password = '$pass' LIMIT 1";
    $login_query_run = mysqli_query($conn, $login_query);


    if (mysqli_num_rows($login_query_run) > 0) {

        foreach ($login_query_run as $data) {
            $user_id = $data['id'];
            $user_name = $data['fname'];
            $user_uname = $data['uname'];
            // $role_as = $data['role_as'];
            // $user_status = $data['user_status'];
            // $user_pass = $data['user_pass'];
        }

        $_SESSION['auth'] = 2;
        // $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_uname' => $user_uname,

        ];

        //1 = admin
        if ($_SESSION['auth']) {
            header("Location: ../doctor/doctor.php");
            exit(0);
            //0 = patient
        } // } elseif ($_SESSION['auth_role'] == '0') {
        //     header("Location: ../patient/patient.php");
        //     exit(0);
        // }
    }
}

if (isset($_POST['login_btn'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $login_query = "SELECT * FROM staff  WHERE uname = '$uname' AND password = '$pass' LIMIT 1";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {

        foreach ($login_query_run as $data) {
            $user_id = $data['id'];
            $user_name = $data['fname'];
            $user_uname = $data['uname'];
            // $role_as = $data['role_as'];
            // $user_status = $data['user_status'];
            // $user_pass = $data['user_pass'];
        }

        $_SESSION['auth'] = 3;
        // $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_uname' => $user_uname,

        ];

        //1 = admin
        if ($_SESSION['auth']) {
            header("Location: ../staff/staff.php");
            exit(0);
            //0 = patient
        } // } elseif ($_SESSION['auth_role'] == '0') {
        //     header("Location: ../patient/patient.php");
        //     exit(0);
        // }
    }
}

if (isset($_POST['login_btn'])) {
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $login_query = "SELECT * FROM patient  WHERE uname = '$uname' AND password = '$pass' LIMIT 1";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {

        foreach ($login_query_run as $data) {
            $user_id = $data['id'];
            $user_name = $data['fname'];
            $user_uname = $data['uname'];
            // $role_as = $data['role_as'];
            // $user_status = $data['user_status'];
            // $user_pass = $data['user_pass'];
        }

        $_SESSION['auth'] = 4;
        // $_SESSION['auth_role'] = "$role_as";
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_uname' => $user_uname,

        ];

        //1 = admin
        if ($_SESSION['auth']) {
            header("Location: ../patient/patient.php");
            exit(0);
            //0 = patient
        } // } elseif ($_SESSION['auth_role'] == '0') {
        //     header("Location: ../patient/patient.php");
        //     exit(0);
        // }

    } else {
        $_SESSION['msg'] = "Invalid Email or Password";
        header("Location: ../index.php");
        exit(0);
    }
} else {
    $_SESSION['msg'] = "You Are Not allowed to access this file";
    header("Location: ../index.php");
    exit(0);
}
