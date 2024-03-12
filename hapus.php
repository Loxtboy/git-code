<?php 

 session_start();

 if (!isset($_SESSION['login'])) {
 	header("Location: login.php");

 	exit;
 }


require 'function.php';

$id_Buku = $_GET['idbuku'];
		if (hapus($id_Buku) > 0) {
			echo "
			<script>
				alert('Data Berhasil di Hapus');
				document.location.href = 'index.php';
			</script>
			";
			} else {
			echo "
			<script>
				alert('Data Gagal di Hapus');
				document.location.href = 'index.php';
			</script>
			";
		}
	
 ?>