<?php
    if (!defined('INDEX')) die("");
?>

<h2 class="judul">Data Inventaris</h2>
<a href="?hal=pegawai_tambah" class="tombol">Tambah</a>

<table class="table">
    <thead>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Beli</th>
        <th>Lokasi Baran</th>
        <th>Tanggal Lahir</th>
        <th>Jabatan</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM datainventaris ";
$query .= "LEFT JOIN jabatan "; //untuk menggabungkan 2 tabel yaitu datainventaris dan jabatan
$query .= "ON pegawai.id_jabatan = jabatan.id_jabatan "; //menggabungkan 2 tabel berdasarkan id_jabatan
$query .= "ORDER BY pegawai.id_jabatan DESC"; //mengurutkan data berdasarkan id_jabatan secara descending
$result = mysqli_query($con, $query); 
$no = 0;

while ($data = mysqli_fetch_assoc($result)) { //mengambil data dari database
    $no++;
?>
<tr>
    <td><?=$no;?></td>
    <td><img src="images/<?=$data['foto']?>" alt="" width="100"></td>
    <td><?=$data['nama_pegawai']?></td> <!--mengambil data nama_pegawai dari database-->
    <td><?=$data['jenis_kelamin']?></td>
    <td><?=$data['tgl_lahir']?></td>
    <td><?=$data['nama_jabatan']?></td>
    <td><?=$data['keterangan']?></td>
    <td>
        <a href="?hal=pegawai_edit&id=<?=$data['id_pegawai']?>"
        class="tombol edit">Edit</a>
        <a href="?hal=pegawai_hapus&id=<?=$data['id_pegawai']?>&foto=<?=$data['foto']?>"
        class="tombol hapus">hapus</a>
    </td>
</tr>

<?php
}
?>
    </tbody>
</table>
        <footer>
        Made with 🤝 + 🍻 = 💝 <b>Kelompok 5 </b>
    </footer>
