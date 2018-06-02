<img src="images/wall.png" class="img-responsive" style="position:fixed; z-index:-1;">

<?php

require_once "core/init.php";
require_once "view/header.php";

$error = '';
// membuat query max
$carikode = mysqli_query($koneksi, "SELECT max(nip) FROM list_karyawan") or die (mysqli_error());

// menjadikannya array
$datakode = mysqli_fetch_array($carikode);

// jika $datakode
if ($datakode) {
  $nilaikode = substr($datakode[0], 4);

  // menjadikan $nilaikode ( int )
  $kode = (int) $nilaikode;

  // setiap $kode di tambah 1
  $kode = $kode + 1;
  $kode_otomatis = "KAR-".str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
  $kode_otomatis = "KAR-0001";
}


if (isset($_POST['submit'])) {
  $nip         = $_POST['nip'];
  $nama        = $_POST['nama'];
  $alamat      = $_POST['alamat'];
  $gaji        = $_POST['gaji'];
  $status      = $_POST['status'];
  $departemen  = $_POST['departemen'];
  $jk          = $_POST['jk'];
  $notelp      = $_POST['notelp'];
  $nama_gambar = $_FILES['gambar']['name'];
	$file_gambar = $_FILES['gambar']['tmp_name'];
	$directory	 = "images/$nama_gambar";
	move_uploaded_file($file_gambar, $directory);

  if (insert_data($nip, $nama, $alamat, $gaji, $status, $departemen, $jk, $nama_gambar, $notelp)) {
    header('Location: index.php');
  }else {
    $error = 'Ada Masalah Saat Menambahkan Data';
  }
}
 ?>
 <div class="container" style="margin-top:50px; margin-bottom:50px;">
   <div class="row">
     <div class="col-md-6 col-md-offset-3">
       <div class="panel panel-default">
         <div class="panel-heading" style="background-color: #080808; color:white;">
           <h3 class="text-center">Tambah Karyawan</h3>
         </div>
         <div class="panel-body">
           <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nip">NIP</label> <br>
              <input type="text" class="form-control" name="nip" size="37" readonly value="<?= $kode_otomatis; ?>"> <br> <br>

             	<label for="nama">Nama Lengkap</label> <br>
             	<input type="text" class="form-control" name="nama" size="37" value=""> <br> <br>

             	<label for="alamat">Alamat</label> <br>
             	<textarea name="alamat" class="form-control" rows="5" cols="40" value=""></textarea> <br> <br>

             	<label for="gaji">Gaji Utama</label> <br>
             	<input type="number" class="form-control" name="gaji" min="500000" max="10000000" step="25000" style="width: 19em" value=""> <br> <br>

              <label for="status">Status</label> <br>
             	<select name="status" class="form-control">
                <option value="Tetap">Tetap</option>
                <option value="Kontrak">Kontrak</option>
              </select> <br> <br>

              <label for="departemen">Departemen</label> <br>
              <select name="departemen" class="form-control">
                <option value="Distribusi">Distribusi</option>
                <option value="Manufaktur">Manufaktur</option>
                <option value="Marketing">Marketing</option>
                <option value="Personalia">Personalia</option>
                <option value="Informasi & Teknologi">Informasi & Teknologi</option>
                <option value="Engineering">Engineering</option>
              </select> <br> <br>

              <label for="jk">Jenis Kelamin</label> <br>
              <select name="jk" class="form-control">
                <option value="Laki-Laki">L</option>
                <option value="Perempuan">P</option>
              </select> <br> <br>

              <label for="notelp">No Telepon</label> <br>
             	<input type="text" class="form-control" name="notelp" size="37" value=""> <br> <br>

             	<label for="exampleInputFile">Foto Profil</label> <br>
             	<input name="gambar" class="form-control-file" type="file" id="exampleInputFile"> <br> <br>

              <div id="error"><?= $error  ?></div>

              <div class="text-center">
                <input type="submit" name="submit" value="Submit">
              </div>
            </div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>

 <?php
 require_once "view/footer.php";

  ?>
