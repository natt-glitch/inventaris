<?php
if(!defined('INDEX')) die();

$id = $_GET['id'];
$query = "SELECT * FROM datainventaris WHERE kodeBarang = '$id'";
$result = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($result);
?>

<h2 class="judul">Edit Data Inventaris</h2>
<form action="?hal=pegawai_update" method="post" enctype="multipart/form-data">

    <!-- Input ID -->
    <input type="hidden" name="id" value="<?=$data['kodeBarang']?>"><!--untuk menyimpan id yang berasal dari database-->

    <!-- Input Foto -->
    <!-- <div class="form-group">
        <label for="foto">Foto</label>
        <div class="input">
            <input type="file" name="foto" id="foto">
            <img src="images/<?=$data['foto']?>" width="100"  alt="">
        </div>
    </div> -->

    <!-- Input Nama -->
    <div class="form-group">
        <label for="nama">Kode Barang</label>
        <div class="input">
            <input type="text" name="nama" id="kode_barang" value="<?=$data['kodeBarang']?>">
        </div>
    </div>
    
    <div class="form-group">
        <label for="nama">Nama Barang</label>
        <div class="input">
            <input type="text" name="nama" id="kode_barang" value="<?=$data['namaBarang']?>">
        </div>
    </div>
    <!-- Input Gender -->
    <div class="form-group">
        <label for="jk">Jenis Kelamin</label> 

        <!-- Pengecekan gender -->
        <?php
        if($data['jenis_kelamin']=="L"){ //untuk mengecek jenis kelamin jika L maka akan menampilkan Laki-laki
            $l=" checked"; //jika L maka akan menampilkan Laki-laki
            $p=""; //jika p akan kosong
        }else{ //jika tidak L maka akan menampilkan Perempuan
            $l=""; //jika L akan kosong
            $p=" checked";  //jika P maka akan menampilkan Perempuan
        }
        ?>

        <input type="radio" name="jk" id="jk" value="L" <?= $l ?>> Laki-laki <!--untuk menampilkan jenis kelamin Laki-laki-->
        <input type="radio" name="jk" id="jk" value="P" <?= $p ?>> Perempuan <!--untuk menampilkan jenis kelamin Perempuan-->
    </div>

    <!-- Input Tanggal Lahir -->
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <div class="input">
            <input type="date" name="tanggal" id="tanggal" value="<?=$data['tgl_lahir']?>">
        </div>
    </div>

    <!-- Input Jabatan -->
    <div class="form-group">
        <label for="jabatan">Jenis</label>
        <div class="input">
            <select name="jabatan" id="jabatan">
                <option value=""> - Pilih Jenis Barang - </option>
<?php
$queryj = "SELECT * FROM jenis"; //untuk menampilkan data dari tabel jenis
$resultj = mysqli_query($con,$queryj); //untuk mengeksekusi query
while($j = mysqli_fetch_assoc($resultj)){ //fungsi variable j adalah untuk menampilkan data dari tabel jenis
    echo "<option value=\"{$j['kode']}\""; //value yang akan diambil dari tabel jenis
    if($j['kode'] == $data['kode']) echo " selected"; //jika kode yang diambil dari tabel jenis sama dengan kode yang diambil dari tabel datainventaris maka akan menampilkan selected
    echo "> {$j['jenis']} </option>";
}
?>
            </select>
        </div>
    </div>

    <!-- Input Keterangan -->
    <div class="form-group">
        <label for="kondisi">kondisi</label>
        <div class="input">
            <textarea name="kondisi" id="kondisi"
            style="width:100%" rows="5"><?= $data['kondisi'] ?></textarea>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="Simpan" class="tombol simpan">
        <input type="reset" value="Batal" class="tombol reset">
    </div>
</form>