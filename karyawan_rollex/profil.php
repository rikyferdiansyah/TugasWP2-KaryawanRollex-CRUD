
<img src="images/wall.png" class="img-responsive" style="position:fixed; z-index:-1;">

<?php

require_once "core/init.php";
require_once "view/header.php";

$profil = show_admin();
while ($row = mysqli_fetch_assoc($profil)) {
  $nama_admin   = $row['fullname'];
  $email_admin  = $row['email'];
  $notelp_admin = $row['no_telp'];
  $gambar_admin = $row['gambar'];
}
 ?>
 <div class="container">
   <div class="row">
     <div class="col-sm-6">
       <h1 style="color:white">Profil Admin</h1>
     </div>
   </div>
   <hr>
   <div class="row">
       <div class="panel panel-default" style="margin-bottom:50px">
         <div class="panel-heading" style="background-color: #212121">
           <div class="text-center">
             <img src="images/<?= $gambar_admin; ?>" class="img-rounded" width="200" height="200">
           </div>
         </div>
         <div class="panel-body">
           <div class="text-center">
             <h2><?= $nama_admin; ?></h2>
           </div>
           <div class="text-center" style="color:blue;">
             <h4><u><em><?= $email_admin; ?></em></u></h4>
           </div>
           <div class="text-center">
             <h3><?= $notelp_admin; ?></h3>
           </div>
         </div>
       </div>
   </div>
 </div>

 <?php
 require_once "view/footer.php";

  ?>
