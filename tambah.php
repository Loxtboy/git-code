<?php 

 	session_start();

 	if (!isset($_SESSION['login'])) {
 		header("Location: login.php");

 		exit;
 	}


	require 'function.php';

	if (isset($_POST["submit"])) {

		if ( tambah($_POST) > 0) {
		echo"
		<script>
			alert('Berhasil di Tambahkan');
			document.location.href = 'index.php';
		</script>
		";
		}else{
		echo"
		<script>
			alert('Gagal di Tambahkan');
			document.location.href = 'index.php';
		</script>
		";
	}
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="tambahx.css">
	<title>Tambah Data Buku</title>
</head>
<body>
	<h1>Tambah Data Buku</h1>
	<fieldset>
		<form action=""	method="post" enctype="multipart/form-data">
			<ul>
				<div class="inputtambah">
				<li>
					<label for="idbuku"> ID Buku :</label><br>
					<input type="text" name="idbuku" id="idbuku" placeholder="Masukkan ID Buku" required>
				</li>
				<li>
					<label for="Judul"> Judul :</label><br>
					<input type="text" name="Judul" id="Judul" placeholder="Masukkan Judul Buku" required>
				</li>
				<li>
					<label for="Pengarang"> Pengarang :</label><br>
					<input type="text" name="Pengarang" id="Pengarang" placeholder="Masukkan Pengarang Buku" required>
				</li>
				<li>
					<label for="TahunTerbit">Tahun Terbit :</label><br>
					<input type="date" name="TahunTerbit" id="TahunTerbit" placeholder="Masukkan Tahun Terbit" required>
				</li>
				<li>
					<label for="Gambar">Gambar :</label><br>
					<input class="image" type="file" name="Gambar" id="Gambar" required>
				</li>
				<li>
					<label for="Baca">File Buku :</label><br>
					<input type="file" name="Baca" id="Baca" required>
				</li>
				<li>
					<label for="Kategori">Kategori :</label><br>
					<select name="Kategori" id="Kategori" required>
						<option>Pemrograman</option>
						<option>Pendidikan</option>
						<option>Novel</option>
					</select>
				</li>
				<br>
				<li>
					<button type="submit" name="submit">Create</button>
					<button class="moveback"><a href="index.php">Back</a></button>
				</li>
				</div>
			</ul>
		</form>
	</fieldset>
</body>
</html>