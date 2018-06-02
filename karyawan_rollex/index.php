<?php
require_once "core/init.php";
require_once "view/header.php";

function rupiah($nilai, $pecahan = 0) {
    return number_format($nilai, $pecahan, ',', '.');
}

session_start();
if($_SESSION['status'] !="login"){
	header("location:login.php");
}
 ?>

 <div class="container-fluid" style="margin:10px;">
       <div class="row">
         <div class="col-md-8">
           <h1>Hi, Welcome <?= $_SESSION['fullname']; ?></h1>
         </div>
         <div class="col-md-4">
           <br>
           <div class="text-right">
             <a href="tambah.php" class="btn btn-default btn-lg" style="background-color:#212121; color:white"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah Karyawan</a>
           </div>
         </div>
       </div>
       <hr>
       <div class="row" style="margin-top:50px;">
           <h3 class="text-center"><u>Data Karyawan PT. Rollex ID 2018</u></h3>
       </div>

       <div class="row">
         <div class="col-md-12">
         <div class="table-responsive">
           <table class="table table-striped">
             <thead>
               <tr>
                 <th>No</th>
                 <th>NIP</th>
                 <th>Nama Karyawan</th>
                 <th>Departemen</th>
                 <th>Gaji Utama</th>
                 <th>Jenis Kelamin</th>
                 <th>Alamat</th>
                 <th>No Telepon</th>
                 <th>Status</th>
                 <th>Tools</th>
               </tr>
             </thead>
             <?php
              $no = 1;
              $karyawan = showall();
              while ($row = mysqli_fetch_assoc($karyawan)) :?>
            <tr>
              <td><?= $no; ?></td>
              <td><h5><?= $row['nip']; ?></td>
              <td><a href="detail.php?nip=<?= $row['nip']; ?>"><?= $row['nama'];  ?></td>
              <td><?= $row['departemen']; ?></td>
              <td>Rp <?= rupiah($row['gaji']); ?></td>
              <td><?= $row['jk']; ?></td>
              <td><?= $row['alamat']; ?></td>
              <td><?= $row['no_telp']; ?></td>
              <td><?= $row['status']; ?></td>
              <td><a class="btn btn-warning btn-sm" href="edit.php?nip=<?= $row['nip']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                  <a class="btn btn-danger btn-sm" onclick="return confirm('Sure, you want to delete this data ?')" href="delete.php?nip=<?= $row['nip']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              </td>
            </tr>
            <?php
              $no++;
              endwhile; ?>
           </table>
          </div>
       </div>
     </div>
     </div>

 <?php
require_once "view/footer.php";

 ?>
