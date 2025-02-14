<?php
if(!defined('INDEX')) die();

$id = $_GET['id']; 
$query = "SELECT * FROM peminjam WHERE id = '$id'";
$result = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($result);
?>

<h2 class="judul">Pinjam Barang</h2>
<form action="?hal=peminjam_update" method="post" enctype="multipart/form-data">

    <!-- Input ID -->
    <input type="hidden" name="id" value="<?=$data['id']?>">
    <!-- Input Nama -->

    <div class="form-group">
        <label for="nama">Nama Peminjam</label>
        <div class="input">
            <input type="text" name="nama_peminjam" id="nama_barang" value="<?=$data['namaBarang']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="nama">Nama Barang</label>
        <div class="input">
            <input type="text" name="nama_barang" id="nama_barang" value="<?=$data['namaBarang']?>">
        </div>
    </div>
    
    <div class="form-group">
        <label for="nama">Kondisi Barang</label>
        <div class="input">
            <input type="text" name="kondisi_barang" id="kondisi_barang" value="<?=$data['kondisiBarang']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="jabatan">Jenis Barang</label>
        <div class="input">
            <select name="jenis_barang" id="jabatan">
                <option value=""> - Pilih Jenis Barang - </option>
                <?php
                $queryj = "SELECT * FROM jenis"; 
                $resultj = mysqli_query($con,$queryj);
                while($j = mysqli_fetch_assoc($resultj)){ 
                    echo "<option value='$j[kodeBarang]'"; 
                    if($j['kodeBarang'] == $data['kodeBarang']) echo " selected";
                    echo "> $j[jenisBarang] </option>";
                }
                
                ?>
            </select>
        </div>
    </div>
    
    <!-- Input Keterangan -->
    <div class="form-group">
        <label for="kondisi">Keterangan</label>
        <div class="input">
            <textarea name="keterangan" id="kondisi"
            style="width:100%" rows="5"><?= $data['keterangan'] ?></textarea>
        </div>
    </div>

    <!-- Input Jabatan -->

    <div class="form-group">
        <input type="submit" value="Simpan" class="tombol simpan">
        <input type="reset" value="Batal" class="tombol reset">
    </div>
</form>