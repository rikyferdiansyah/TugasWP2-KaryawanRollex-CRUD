<?php

function showall(){

	$query  = "SELECT * FROM list_karyawan";
	return result($query);
}

function show_by_nip($nip){

	$query  = "SELECT * FROM list_karyawan WHERE nip='$nip'";
	return result($query);
}

function show_dept($filter){
	$query = "SELECT * FROM list_karyawan WHERE departemen='$filter'";
	return result($query);
}

function show_sequence(){
	$query = "SELECT * FROM list_karyawan ORDER BY nama ASC";
	return result($query);
}

function result($query){
	global $koneksi;

	if ($result = mysqli_query($koneksi, $query) or die('Failed to Show Data')) {

		return $result;

	}

}

function insert_data($nip, $nama, $alamat, $gaji, $status, $departemen, $jk, $gambar, $notelp){
  $nip = escape($nip);
  $nama = escape($nama);
  $alamat = escape($alamat);
  $gaji = escape($gaji);
  $status = escape($status);
  $departemen = escape($departemen);
  $jk = escape($jk);
  $gambar = escape($gambar);
  $notelp = escape($notelp);


  $query = "INSERT INTO list_karyawan (nip, nama, alamat, gaji, status, departemen, jk, gambar, no_telp) VALUES
            ('$nip','$nama','$alamat','$gaji','$status','$departemen','$jk','$gambar','$notelp')";
  return run($query);
}

function edit_data($nip, $nama, $alamat, $gaji, $status, $departemen, $jk, $gambar, $notelp){
  $query = "UPDATE list_karyawan SET nama='$nama', alamat='$alamat', gaji='$gaji', status='$status', departemen='$departemen', jk='$jk', no_telp='$notelp', gambar='$gambar'
            WHERE nip='$nip';";
  return run($query);
}

function edit_without_image($nip, $nama, $alamat, $gaji, $status, $departemen, $jk, $notelp){
  $query = "UPDATE list_karyawan SET nama='$nama', alamat='$alamat', gaji='$gaji', status='$status', departemen='$departemen', jk='$jk', no_telp='$notelp'
            WHERE nip='$nip';";
  return run($query);
}

function delete_data($nip){
  $query = "DELETE FROM list_karyawan WHERE nip='$nip';";
  return run($query);
}

function run($query){
	global $koneksi;

	if (mysqli_query($koneksi, $query)) return true;
	else return false;
}

function escape($data){
	global $koneksi;
	return mysqli_real_escape_string($koneksi, $data);
}
 ?>
