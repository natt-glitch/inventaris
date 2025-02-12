<?php
if(!defined('INDEX')) die();
?>

<h2 class="judul">Tambah Pegawai</h2>
<form action="?hal=inventaris_insert" method="post" enctype="multipart/form-data">

    <!-- Input ID -->
    <input type="hidden" name="kode"><!--untuk menyimpan id yang berasal dari database-->

    <!-- Input Nama -->

    <div class="form-group">
        <label for="inventaris">kode Barang</label>
        <div class="input">
            <select name="kodeBarang" id="jabatan">
                <option value=""> - Pilih kode Barang - </option>
                <?php
                $queryj = "SELECT * FROM jenis "; 
                $resultj = mysqli_query($con,$queryj);
                $data = mysqli_fetch_assoc($resultj);
                while($j = mysqli_fetch_assoc($resultj)){ 
                    echo "<option value='$j[kodeBarang]'"; 
                    if($j['kodeBarang'] == $data['kodeBarang']) echo " selected";
                    echo "> $j[kodeBarang] $j[jenisBarang] </option>";
                }
                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="nama">Nama Barang</label>
        <div class="input">
            <input type="text" name="nama_barang" id="nama_barang" >
        </div>
    </div>
    
    <div class="form-group">
        <label for="nama">Harga Barang</label>
        <div class="input">
            <input type="text" name="harga" id="harga" >
        </div>
    </div>
    
    <div class="form-group">
        <label for="nama">Kondisi Barang</label>
        <div class="input">
            <input type="text" name="kondisi_barang" id="kondisi_barang" >
        </div>
    </div>
    
    <!-- Input Keterangan -->
    <div class="form-group">
        <label for="kondisi">Keterangan</label>
        <div class="input">
            <textarea name="keterangan" id="kondisi"
            style="width:100%" rows="5"></textarea>
        </div>
    </div>

    <!-- Input Jabatan -->
    <div class="form-group">
        <label for="inventaris">Jenis Barang</label>
        <div class="input">
            <select name="jenisBarang" id="jabatan">
                <option value=""> - Pilih Jenis Barang - </option>
                <?php
                $queryj = "SELECT * FROM jenis "; 
                $resultj = mysqli_query($con,$queryj);
                $data = mysqli_fetch_assoc($resultj);
                while($j = mysqli_fetch_assoc($resultj)){ 
                    echo "<option value='$j[kodeBarang]'"; 
                    if($j['kodeBarang'] == $data['kodeBarang']) echo " selected";
                    echo "> $j[jenisBarang] </option>";
                }
                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <input type="submit" value="Simpan" class="tombol simpan">
        <input type="reset" value="Batal" class="tombol reset">
    </div>
</form>