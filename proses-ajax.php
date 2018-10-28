<?php
	include "koneksi.php";
	$query = mysqli_query($koneksi, "SELECT * from tbl_latihan where id='$_GET[id]'");
	$kuku = mysqli_fetch_array($query);
	$data = array( 'id'     =>  $kuku['id'],
				   'nama'     =>  $kuku['nama'],
				   'alamat'     =>  $kuku['alamat'],);
	echo json_encode($data);
?>