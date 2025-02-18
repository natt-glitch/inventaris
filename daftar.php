<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Aplikasi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div class="container">
        <section class="login-box">
            <h2>Daftar Aplikasi</h2>
            <form action="daftar_proses.php" method="post">
                <input type="text" placeholder="Nama Lengkap" id="nama" name="nama">
                <input type="text" placeholder="Username" id="username" name="username">
                <input type="password" placeholder="Password" id="password" name="password">              
                <input type="submit" value="Daftar">
                <a href="daftar.php" style="text-decoration: none; display: block; text-align: center;">daftar akun</a>
            </form>
        </section>
    </div>
</body>
</html>