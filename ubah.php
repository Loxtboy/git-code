<?php 

require 'function.php';

$id_Buku = $_GET['idbuku'];
	
$buku = query ("SELECT * FROM buku WHERE idbuku = $id_Buku")[0];

if(isset ($_POST['submit']) ){

		if (ubah($_POST) > 0) {
			echo "
			<script>
				alert('Data Berhasil di Ubah');
				document.location.href = 'index.php';
			</script>
			";
			} else {
			echo "
			<script>
				alert('Data Gagal di Ubah');
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
	<title>Ubah Data Buku</title>
	<link rel="stylesheet" type="text/css" href="ubahss.css">
</head>
<body>

	<a href="index.php">Kembali ke Data Buku</a>

	<form action="" method="post" enctype="multipart/form-data">
		<fieldset>	
		<legend><h1>Ubah Data Buku</h1></legend>
		<input type="hidden" name="GambarLama" value="<?= $buku["Gambar"]?>">

		<ul>
			
			<li>
				<label for="idbuku">ID Buku :</label>
				<br>
				<input type="text" name="idbuku" id="idbuku"
				 required value="<?= $buku["idbuku"]; ?>">
			</li>

			<li>
				<label for="Gambar">Gambar :</label>
				<br>
				<img src="img/<?= $buku["Gambar"]; ?>" width="15%"><br>
				<input type="file" name="Gambar" id="Gambar" value="<?= $buku["Gambar"]; ?>"required>
			</li>

			<li>
				<label for="Baca">File Baca</label>
				<input type="file" name="Baca" id="Baca" value="<?= $buku["Baca"]; ?>"required>
			</li>

			<li>
				<label for="Judul">Judul :</label>
				<br>
				<input type="text" name="Judul" id="Judul"
				 required value="<?= $buku["Judul"]; ?>">
			</li>

			<li>
				<label for="Pengarang">Pengarang :</label>
				<br>
				<input type="text" name="Pengarang" id="Pengarang"
				 required value="<?= $buku["Pengarang"]; ?>">
			</li>

			<li>
				<label for="TahunTerbit">Tahun Terbit :</label>
				<br>
				<input type="date" name="TahunTerbit" id="TahunTerbit"
				 required value="<?= $buku["TahunTerbit"]; ?>">
			</li>

			<li>
				<label for="Kategori">Kategori :</label>
				<br>
				<select name="Kategori" id="Kategori"
				 required value="<?= $buku["Kategori"]; ?>">
					<option>Pemrograman</option>
					<option>Pendidikan</option>
					<option>Novel</option>
				</select>
			</li>

			<br>

			<li>
				<button type="submit" name="submit">Ubah</button>
			</li>

		</ul>
		</fieldset>
	</form>

</body>
</html>