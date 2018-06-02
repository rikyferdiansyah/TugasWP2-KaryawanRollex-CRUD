
<img src="images/wall.png" class="img-responsive" style="position:fixed; z-index:-1;">

<?php

require_once "core/init.php";
require_once "view/header.php";

$error = '';
$nip = $_GET['nip'];

if (isset($nip)) {
  $detail = show_by_nip($nip);
  while ($row = mysqli_fetch_assoc($detail)) {
    $nip_detail         = $row['nip'];
    $nama_detail        = $row['nama'];
    $departemen_detail  = $row['departemen'];
    $gaji_detail        = $row['gaji'];
    $jk_detail          = $row['jk'];
    $alamat_detail      = $row['alamat'];
    $notelp_detail      = $row['no_telp'];
    $status_detail      = $row['status'];
    $gambar_detail      = $row['gambar'];
  }
}

function get_form(){
  global $nip, $nama, $alamat, $gaji, $status, $departemen, $jk, $notelp;
  $nip         = $_POST['nip'];
  $nama        = $_POST['nama'];
  $alamat      = $_POST['alamat'];
  $gaji        = $_POST['gaji'];
  $status      = $_POST['status'];
  $departemen  = $_POST['departemen'];
  $jk          = $_POST['jk'];
  $notelp      = $_POST['notelp'];
}

if (isset($_POST['cek_foto'])) {
  get_form();
  $nama_gambar = $_FILES['gambar']['name'];
	$file_gambar = $_FILES['gambar']['tmp_name'];
	$directory	 = "images/$nama_gambar";
	if (move_uploaded_file($file_gambar, $directory)){

    $sql = show_by_nip($nip);
    $data = mysqli_fetch_assoc($sql);
    if(is_file("images/".$data['gambar'])){
      unlink("images/".$data['gambar']);
    }
    if (edit_data($nip, $nama, $alamat, $gaji, $status, $departemen, $jk, $nama_gambar, $notelp)) {
      header('Location: index.php');
    }else {
      $error = 'Ada Masalah Saat Mengupdate Data';
    }
  } else {
    $error = 'Gagal Update Gambar';
  }
}else if (isset($_POST['update'])) {
  get_form();

  if (edit_without_image($nip, $nama, $alamat, $gaji, $status, $departemen, $jk, $notelp)) {
    header('Location: index.php');
  } else {
    $error = 'Ada Masalah Saat Mengupdate Data';
  }
}
 ?>

 <div class="container" style="margin-top:50px; margin-bottom:50px;">
   <div class="row">
     <div class="col-md-6 col-md-offset-3">
       <div class="panel panel-default">
         <div class="panel-heading" style="background-color: #080808; color:white;">
           <h3 class="text-center">Edit Karyawan</h3>
         </div>
         <div class="panel-body">
           <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nip">NIP</label> <br>
              <input type="text" class="form-control" name="nip" size="37" readonly value="<?= $nip_detail; ?>"> <br> <br>

             	<label for="nama">Nama Lengkap</label> <br>
             	<input type="text" class="form-control" name="nama" size="37" value="<?= $nama_detail; ?>"> <br> <br>

             	<label for="alamat">Alamat</label> <br>
             	<textarea name="alamat" class="form-control" rows="5" cols="40"><?= $alamat_detail; ?></textarea> <br> <br>

             	<label for="gaji">Gaji Utama</label> <br>
             	<input type="number" class="form-control" name="gaji" min="800000" max="8000000" step="50000" style="width: 19em" value="<?= $gaji_detail; ?>"> <br> <br>

              <label for="status">Status</label> <br>
             	<select name="status" class="form-control">
                <option value="<?= $status_detail; ?>">-New Status-</option>
                <option value="Tetap">Tetap</option>
                <option value="Kontrak">Kontrak</option>
              </select> <br> <br>

              <label for="departemen">Departemen</label> <br>
              <select name="departemen" class="form-control">
                <option value="<?= $departemen_detail; ?>">-New Departemen-</option>
                <option value="Distribusi">Distribusi</option>
                <option value="Manufaktur">Manufaktur</option>
                <option value="Marketing">Marketing</option>
                <option value="Personalia">Personalia</option>
                <option value="Informasi & Teknologi">Informasi & Teknologi</option>
                <option value="Engineering">Engineering</option>
              </select> <br> <br>

              <label for="jk">Jenis Kelamin</label> <br>
              <select name="jk" class="form-control">
                <option value="<?= $jk_detail; ?>">-New Sex-</option>
                <option value="Laki-Laki">L</option>
                <option value="Perempuan">P</option>
              </select> <br> <br>

              <label for="notelp">No Telepon</label> <br>
             	<input type="text" class="form-control" name="notelp" size="37" value="<?= $notelp_detail; ?>"> <br> <br>

             	<label for="exampleInputFile">Foto Profil</label> <br>
              <input type="checkbox" id="myCheck" class="form-check-input" onclick="myFunction()" name="cek_foto" value="true"> Check if you want to change photo<br>
                <div id="input-file" style="display:none">
                  <input name="gambar" class="form-control-file" type="file" id="exampleInputFile"> <br> <br>
                </div>

                <script>
                  function myFunction() {
                      var checkBox = document.getElementById("myCheck");
                      var inputFile = document.getElementById("input-file");
                      if (checkBox.checked == true){
                          inputFile.style.display = "block";
                      } else {
                         inputFile.style.display = "none";
                      }
                  }
                </script>
              <div class="text-center" style="margin-top:20px">

                <div id="error"><?= $error  ?></div>

                <input type="submit" name="update" value="Update">
                <a href="index.php"><input type="button" class="btn btn-danger" value="Batal" style="width:200px; padding:10px 20px"></a>
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
