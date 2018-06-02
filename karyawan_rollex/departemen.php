<?php

require_once "core/init.php";
require_once "view/header.php";

function rupiah($nilai, $pecahan = 0) {
    return number_format($nilai, $pecahan, ',', '.');
}
 ?>

 <div class="container-fluid" style="margin:50px 10px 50px 10px;">
   <div class="row">
     <div class="col-md-3">
       <form method="get">
         <div class="form-group">
           <br>
           <select name="filter" onchange="form.submit()" class="form-control">
              <option value="0">-Filter Berdasarkan Depertemen-</option>
              <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
              <option value="Distribusi" <?php if($filter == 'Distribusi '){ echo 'selected'; } ?>>Distribusi</option>
              <option value="Manufaktur" <?php if($filter == 'Manufaktur'){ echo 'selected'; } ?>>Manufaktur</option>
              <option value="Marketing" <?php if($filter == 'Marketing'){ echo 'selected'; } ?>>Marketing</option>
              <option value="Personalia" <?php if($filter == 'Personalia'){ echo 'selected'; } ?>>Personalia</option>
              <option value="Informasi & Teknologi" <?php if($filter == 'Informasi & Teknologi'){ echo 'selected'; } ?>>Informasi & Teknologi</option>
              <option value="Engineering" <?php if($filter == 'Engineering'){ echo 'selected'; } ?>>Engineering</option>
           </select>
         </div>
       </form>
     </div>
     <div class="col-md-9">
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
     <div class="table-responsive">
       <table class="table table-stripped table-hover">
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
         <?php
          if ($filter) {
            $sql = show_dept($filter);
          } else {
            $sql = show_sequence();
          }
          $no = 1;
          while ($row = mysqli_fetch_assoc($sql)) :?>
         <tr>
            <td><?= $no; ?></td>
            <td><h5><?= $row['nip']; ?></h5></td>
            <td><a href="detail.php?nip=<?= $row['nip']; ?>"><?= $row['nama'];  ?></a></td>
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

 <?php
 require_once "view/footer.php";

  ?>
