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
                <input type="text" placeholder="Nama Lengkap" id="nama" name="nama" required>
                <input type="text" placeholder="Username" id="username" name="username" required>
                <input type="password" placeholder="Password" id="password" name="password" required>              
                <input type="submit" value="Daftar">
                <script>
                document.querySelector("form").addEventListener("submit", function(event) {
                    let inputs = document.querySelectorAll("input[type='text'], textarea, input[type='password']");
                    let valid = true;

                    inputs.forEach(input => {
                        if (input.value.trim() === "") { // Cek jika input hanya berisi spasi
                            valid = false;
                            alert("Input " + input.name + " tidak boleh hanya berisi spasi!");
                            input.focus();
                        }
                    });

                    if (!valid) {
                        event.preventDefault(); // Hentikan pengiriman form jika ada input yang salah
                    }
                });
                </script>
            </form>
        </section>
    </div>
</body>
</html>