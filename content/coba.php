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
            <th>jumlah</th>
            <th>jumlah Pinjaman</th>
            <th>Pilih</th>
        </thead>
        <tbody>
        <?php
        $query = "SELECT datainventaris.id, datainventaris.namaBarang, jenis.jenisBarang, 
                         datainventaris.keterangan, datainventaris.jumlah 
                  FROM datainventaris  
                  LEFT JOIN jenis ON datainventaris.kodeBarang = jenis.kodeBarang 
                  WHERE datainventaris.jumlah > 0
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
                    <td><?= $data['jumlah'] ?></td>
                    <td>
                    <input type="number" name="jumlah[<?= $data['id'] ?>]" min="1" max="<?= $data['jumlah'] ?>" value="1">
                    </td>
                    <td>
                        <input type='checkbox' name='id_barang[]' value='<?= $data['id'] ?>'>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <br>

    <button class="tombol" type="submit">Pinjam</button>
</form>
