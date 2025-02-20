<?php
include 'library/config.php'; // Koneksi ke database
?>
<script>
    function printTable() {
        window.print();
    }
</script>
<h2 class="judul">Daftar Peminjaman</h2>
<button class="tombol edit" onclick="printTable()">Print</button>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Peminjam</th>
            <th>Nama Peminjam</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Jam Pinjam</th>
            <th>Jam Kembali</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT p.kodePeminjam, p.namaPeminjam, p.jamPinjam, p.jamKembali, 
        d.jumlah, i.namaBarang, d.idBarang
        FROM peminjam p
        JOIN detail_peminjaman d ON p.kodePeminjam = d.kodePeminjam
        JOIN dataInventaris i ON d.idBarang = i.id
        ORDER BY p.jamPinjam DESC";


        $result = mysqli_query($con, $query);
        $no = 0;
        while ($data = mysqli_fetch_assoc($result)) {
            $no++;
        ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data['kodePeminjam']; ?></td>
            <td><?= $data['namaPeminjam']; ?></td>
            <td><?= $data['namaBarang']; ?></td>
            <td><?= $data['jumlah']; ?></td>
            <td><?= $data['jamPinjam']; ?></td>
            <td><?= $data['jamKembali']; ?></td>
            <td><a href="?hal=pengembalian&kode=<?=$data['kodePeminjam']?>" class="tombol edit">Kembalikan</a></td>

        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
