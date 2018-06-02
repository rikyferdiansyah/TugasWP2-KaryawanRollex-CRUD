<?php

require_once "core/init.php";
require_once "view/header.php";

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
function rupiah($nilai, $pecahan = 0) {
    return number_format($nilai, $pecahan, ',', '.');
}
 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-6">
       <h1>DETAIL PROFIL KARYAWAN</h1>
     </div>
   </div>
   <hr>
   <div class="row">
     <div class="panel panel-default">
       <div class="panel-heading" style="background-color: #212121">
         <div class="text-center">
           <img src="images/<?= $gambar_detail; ?>" class="img-rounded" width="200" height="200">
         </div>
       </div>
       <div class="panel-body">
         <div class="table-responsive">
           <table class="table table-striped" style="font-size:18px">
             <tr>
               <th>NIP</th>
               <td>:</td>
               <td><?= $nip_detail; ?></td>
             </tr>
             <tr>
               <th>Nama</th>
               <td>:</td>
               <td><?= $nama_detail; ?></td>
             </tr>
             <tr>
               <th>Departemen</th>
               <td>:</td>
               <td><?= $departemen_detail; ?></td>
             </tr>
             <tr>
               <th>Gaji</th>
               <td>:</td>
               <td>Rp <?= rupiah($gaji_detail); ?></td>
             </tr>
             <tr>
               <th>Jenis Kelamin</th>
               <td>:</td>
               <td><?= $jk_detail; ?></td>
             </tr>
             <tr>
               <th>Alamat</th>
               <td>:</td>
               <td><?= $alamat_detail; ?></td>
             </tr>
             <tr>
               <th>No Telepon</th>
               <td>:</td>
               <td><?= $notelp_detail; ?></td>
             </tr>
             <tr>
               <th>Status</th>
               <td>:</td>
               <td><?= $status_detail; ?></td>
             </tr>
           </table>
         </div>
       </div>
     </div>
   </div>
 </div>

 <?php
 require_once "view/footer.php";

  ?>
