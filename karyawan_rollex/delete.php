<?php

require_once "core/init.php";

$nip = $_GET['nip'];

$sql = show_by_nip($nip);
$row = mysqli_fetch_assoc($sql);
if(is_file("image/".$row['gambar'])){
unlink("image/".$row['gambar']);
}
if (isset($_GET['nip'])) {
	if (delete_data($_GET['nip'])) {
		echo "<script> alert ('Artikel Berhasil Dihapus'); document.location='index.php'</script>";
	}else{
		echo "<script> alert ('Artikel Gagal Dihapus'); document.location='index.php'</script>";
	}
}

 ?>
