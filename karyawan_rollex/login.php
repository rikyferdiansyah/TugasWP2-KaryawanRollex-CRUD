<?php
require_once "core/init.php";
require_once "view/header_admin.php";

$fullname = show_name();
$row = mysqli_fetch_assoc($fullname);

if (isset($_POST['submit'])) {
	$user  = $_POST['user'];
	$pass  = $_POST['pass'];

	if (!empty(trim($user)) && !empty(trim($pass))) {

		if (cek_data($user, $pass)) {
      session_start();
      $_SESSION['fullname'] = $row['fullname'];
      $_SESSION['user'] = $user;
			$_SESSION['status'] = "login";
			header('Location: index.php');
		}else{
			header('Location: login.php');
		}
	}else{
		$error = 'Username & Password wajib diisi';
	}
}
 ?>

 <div class="container-fluid">
   <div class="row">
     <div class="col-md-4">
       <div class="panel panel-default" style="margin:300px 0 0 40px">
         <div class="panel-body">
           <form action="" method="post">
             <div class="form-group">
               <label for="nama"><h4>Username</h4></label> <br>
               <input type="text" name="user" class="form-control" placeholder="Username" required> <br> <br>

               <label for="password"><h4>Password</h4></label> <br>
               <input type="password" name="pass" class="form-control" placeholder="*******" required> <br> <br>

               <div class="text-center">
                 <input type="submit" name="submit" value="Login">
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
