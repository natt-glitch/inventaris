<?php
    session_start();
    include "library/config.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $hasil = mysqli_query($con,$query);
    $data = mysqli_fetch_array($hasil);
    $jml = mysqli_num_rows($hasil);

    if ($jml > 0 ){
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];

        header('location: index.php');
    } else{
        echo "<p align='center'>Login Gagal!</p>";
        echo "<meta http-equiv='refresh' content='2; url=login.php'>";
    }
?>
