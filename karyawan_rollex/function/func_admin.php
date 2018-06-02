<?php

function cek_data($user, $pass){
	$user = escape($user);
	$pass = escape($pass);

	$query = "SELECT * FROM admin WHERE user='$user' AND pass='$pass'";
	global $koneksi;

	if ($result = mysqli_query($koneksi, $query)) {
		if (mysqli_num_rows($result) != 0) {
			return true;
		}else{
			return false;
		}
	}
}

function show_name(){
	$query = "SELECT fullname FROM admin";
	return result($query);
}

function show_admin(){
  $query = "SELECT fullname, email, no_telp, gambar FROM admin";
  global $koneksi;

	if ($result = mysqli_query($koneksi, $query)) {
		if (mysqli_num_rows($result) or die('gagal menampilkan data')) {
			return $result;
	   }
  }
}

 ?>
