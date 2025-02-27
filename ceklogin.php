<?php
    session_start();
    include "library/config.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "" || $password === "" ) {
        die("Input tidak boleh hanya berisi spasi!");
    }
    

    $query = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' AND password = '$password' "); // Query untuk mencari data user berdasarkan username dan password
    $data = mysqli_fetch_array($query);
    
    $jml = mysqli_num_rows($query);

    if ($jml > 0) {

        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['role'] = $data['role'];

        if ($_SESSION['role'] == 'admin') {
            header("Location: index.php?hal=dashboard_admin");
        } else {
            header("Location: index1.php?hal=dashboard_user");
        }
    } else{
        echo "<p align='center'>Login Gagal!</p>";
        echo "<meta http-equiv='refresh' content='2; url=login.php'>";
    }


    // $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'"; // Query untuk mencari data user berdasarkan username dan password
    // $hasil = mysqli_query($con,$query);
    // $data = mysqli_fetch_array($hasil);
    // $jml = mysqli_num_rows($hasil);

    // if ($user['role'] == 'admin') {
    //     header("Location: dashboard_admin.php");
    // } else {
    //     header("Location: dashboard_user.php");
    // }
    // exit();

    // if ($jml > 0 ){
    //     $_SESSION['username'] = $data['username'];
    //     $_SESSION['password'] = $data['password'];

    //     header('location: index.php');
    // } else{
    //     echo "<p align='center'>Login Gagal!</p>";
    //     echo "<meta http-equiv='refresh' content='2; url=login.php'>";
    // }
?>
