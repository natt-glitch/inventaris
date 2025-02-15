<?php
if (!defined('INDEX')) die(""); 
?>

<h2 class="judul">Data Barang Yang Bisa Dipinjam</h2>

<form action="?hal=peminjaman" method="post" enctype="multipart/form-data">
    Nama Peminjam: <input type="text" name="nama_peminjam" required><br><br>

    <table class="table">
        <thead>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jenis</th>
            <th>Kondisi</th>
            <th>Stok</th>
            <th>Pilih</th>
        </thead>
        <tbody>
            <?php
            include 'library/config.php'; // Pastikan file koneksi dipanggil
            $query = "SELECT 
                        datainventaris.id, 
                        datainventaris.namaBarang, 
                        jenis.jenisBarang, 
                        datainventaris.keterangan, 
                        datainventaris.stok 
                      FROM datainventaris  
                      LEFT JOIN jenis ON datainventaris.kodeBarang = jenis.kodeBarang 
                      WHERE datainventaris.stok > 0
                      ORDER BY datainventaris.kodeBarang DESC";

            $result = mysqli_query($con, $query);
            $no = 0;
            while ($data = mysqli_fetch_assoc($result)) {
                $no++;
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data['namaBarang'] ?></td>
                    <td><?= $data['jenisBarang'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td><?= $data['stok'] ?></td>
                    <td>
                        <input type='checkbox' name='id_barang[]' value='<?= $data['id'] ?>'>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <button type="submit">Pinjam</button>
</form>
