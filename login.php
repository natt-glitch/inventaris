<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Aplikasi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" type="image/png" href="gambar/logo.png">
</head>
<body>
    <div class="container">
        <section class="login-box">
            <img src="gambar/logo.png" alt="" >
            <h2>Login Aplikasi <br>
             <b>Data Inventaris dan Peminjaman Barang</b>
            </h2>
            <form action="ceklogin.php" method="post">
                <input type="text" placeholder="Username" id="username" name="username" required>
                <input type="password" placeholder="Password" id="password" name="password" required>              
                <input type="submit" value="Masuk">
                <a href="daftar.php" style=" display: block; text-align: center;">daftar akun</a>
                <a href="https://naylaazkiya.github.io/Panduan-apg.k5/" target="_blank">Panduan APG</a>

            </form>
        </section>
    </div>
</body>
</html>