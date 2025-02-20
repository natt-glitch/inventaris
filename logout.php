<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keluar</title>
    <link rel="icon" type="image/png" href="gambar/logo.png">
</head>
<body>
    
</body>
</html>
<?php
echo "<p align='center'>Anda telah logout!</p>";
echo "<meta http-equiv='refresh' content='2; url=login.php'>";
?>