<?php
include "library/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaLengkap = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'user'; // Otomatis diisi 'user'

    if ($username === "" || $password === "" || $namaLengkap === "" ) {
        die("Input tidak boleh hanya berisi spasi!");
    }

    // Insert ke database
    $query = "INSERT INTO user (namaLengkap, username, password, role) VALUES ('$namaLengkap', '$username', '$password', '$role')";
    
    if (mysqli_query($con, $query)) {
        echo "<p align='center'>Pendaftaran Berhasil!</p>";
        echo "<meta http-equiv='refresh' content='2; url=index.php'>";
    } else {
        echo "<p align='center'>Gagal Mendaftar: " . mysqli_error($con) . "</p>";
    }
}
?>
