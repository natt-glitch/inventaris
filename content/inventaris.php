<?php
    if (!defined('INDEX')) die(""); 
?>

<h2 class="judul">Data Inventaris</h2>
<a href="?hal=inventaris_tambah" class="tombol">Tambah</a>

<table class="table">
    <thead>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Beli</th>
        <th>Jenis</th>
        <th>Kondisi</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM datainventaris "; 
$query .= "JOIN jenis "; //untuk menggabungkan 2 tabel yaitu datainventaris dan jabatan
$query .= "ON datainventaris.kodeBarang = jenis.kode "; //menggabungkan 2 tabel berdasarkan id_jabatan
$query .= "ORDER BY datainventaris.kodeBarang DESC"; //untuk mengurutkan data berdasarkan kodebarang
$result = mysqli_query($con, $query); 
$no = 0;

while ($data = mysqli_fetch_assoc($result)) { //mengambil data dari database 
    $no++;
?>
<tr>
    <td><?=$no;?></td>
    <td><?=$data['kodeBarang']?></td>
    <td><?=$data['namaBarang']?></td> <!--mengambil data nama_pegawai dari database-->
    <td><?=$data['harga']?></td>
    <td><?=$data['jenisBarang']?></td>
    <td><?=$data['kondisiBarang']?></td>
    <td><?=$data['kategori']?></td>
    <td>
        <a href="?hal=inventaris_edit&id=<?=$data['kodeBarang']?>"
        class="tombol edit">Edit</a>
        <a href="?hal=pegawai_hapus&id=<?=$data['kodeBarang']?>&foto=<?=$data['foto'] ?? ''?>" 
        class="tombol hapus">hapus</a> 
    </td>
</tr>

    </tbody>
    <?php
}
?>
</table>
