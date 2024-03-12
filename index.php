 <?php 

 	session_start();

 	if (!isset($_SESSION['login'])) {
 		header("Location: login.php");

 		exit;
 	}

	require 'function.php';

	$book = query("SELECT * FROM buku");

	if (isset($_POST["submitSearch"])) {
		$book= search($_POST["keyword"]);
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Library</title>
	<link rel="stylesheet" type="text/css" href="indexstylexx.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
	<!-- HEADER -->
	<header id="Home">
		<div class="header-logo">
			<img src="img/book.png" alt="logo">
			<h1>E-Library</h1>
		</div>
		<nav>
			<ul>
				<li><a href="#Home">Beranda</a></li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Pemrograman</a></li>
						<li><a class="dropdown-item" href="#">Pendidikan</a></li>
						<li><a class="dropdown-item" href="#">Novel</a></li>
					</ul>
				</li>
				<li><a href="#TentangKami">Tentang Kami</a></li>
			</ul>
		</nav>     
	</header>
	<!-- /HEADER -->

	<!-- MAIN -->
	<main>
		<div class="join-container">
			<div class="join-item">
				<img src="img/reading.jpg">
				<div class="join-content">
					<h2 class="join-title">E-Library</h2>
					<p class="join-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptates</p>
					<a class="join-action" href="logout.php">Logout</a>
				</div>
			</div>
		</div>
		
		<div class="searchbox-container">
			<form action="" method="post" enctype="multipart/from-data">
				<i class="ph ph-magnifying-glass"></i>
				<input type="text" name="keyword" autocomplete="off" placeholder="what you are looking for?">
				<button onclick="window.location.href = '#bookdata';" type="submit" name="submitSearch">Search</button>
			</form>
		</div>
	</main>
	<!-- /MAIN -->

	<hr style="border: 1px dashed;">
	<div class="databuku" id="bookdata">
			<h1>Data-Data Buku</h1>
			<?php if(isset($_SESSION["Admin"]) || isset($_SESSION["Pegawai"])) : ?>
			<a class="tambahdata" href="tambah.php">Tambahkan Data</a>
			<?php endif; ?>
			<table class="table">
 			 	<thead>
    				<tr>
      					<th scope="col">No.</th>
      					<th scope="col">ID Buku</th>
      					<th scope="col">Gambar</th>
      					<th scope="col">Judul</th>
      					<th scope="col">Pengarang</th>
						<th scope="col">Tahun Terbit</th>
						<th scope="col">Kategori</th>
						<th scope="col">Aksi</th>
    				</tr>
  				</thead>
  				<?php $i= 1; ?>
				<?php foreach($book as $row) : ?>
  				<tbody>
    				<tr>
    					<td><?php echo $i; ?></td>
						<td><?php echo $row["idbuku"] ?></td>
						<td><a class="booklink" href="read/<?php echo $row ["Baca"] ?>"><img src="img/<?php echo $row ["Gambar"] ?>" class="bookimg"></a></td>
						<td><?php echo $row["Judul"] ?></td>
						<td><?php echo $row["Pengarang"] ?></td>
						<td><?php echo $row["TahunTerbit"] ?></td>
						<td><?php echo $row["Kategori"] ?></td>
						<td>
							<?php if(isset($_SESSION["Admin"]) || isset($_SESSION["Pegawai"])) : ?>
							
							<a class="action" href="ubah.php?idbuku=<?php echo $row["idbuku"] ?>">	Ubah</a> |
							<?php if(isset($_SESSION["Admin"])) : ?>
							<a class="action" href="hapus.php?idbuku=<?php echo $row["idbuku"] ?>"> Hapus</a> |
							<?php endif; ?>
							<?php endif; ?>
							<?php if(isset($_SESSION["Admin"]) || isset($_SESSION["Pegawai"]) || isset($_SESSION["Pengguna"])) : ?>
							<a class="action" href="read/<?php echo $row ["Baca"] ?>"> Baca</a>
							<?php endif; ?>
						</td>
    				</tr>
  				</tbody>
  				<?php $i++; ?>
				<?php endforeach; ?>
			</table>
		</div>

	<!-- PARALLAX -->
	<div class="parallax">
		<div class="parallax-inner">
			<img src="img/perpus.jpg">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<hr>
		</div>
		<hr class="pembatas">
	</div>
	<!-- /PARALLAX -->

	<!-- FOOTER -->
	<footer>
		<div class="tentang-kami" id="TentangKami">
			<h2>Tentang Kami!!</h2> 
			<hr class="judulbatas">
			<div class="footer-logo">
				<img src="img/book.png" alt="logo">
				<h1>E-Library</h1>
			</div>
			<div class="info">
				<ul>
					<li><i class="ph ph-map-pin"> Jalanin aj dulu</i></li>
					<li><i class="ph ph-phone"> +62 22-81388465</i></li>
					<li><i class="ph ph-envelope"> e-library@gmail.com</i></li>
				</ul>
			</div>
			<div class="medsos">
				<ul>
					<li><a href="https://www.facebook.com"><i class="ph ph-facebook-logo"></i></a></li>
					<li><a href="https://www.twitter.com"><i class="ph ph-twitter-logo"></i></a></li>
					<li><a href="https://www.youtube.com"><i class="ph ph-youtube-logo"></i></a></li>
					<li><a href="https://www.instagram.com"><i class="ph ph-instagram-logo"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="map">
			<div class="vl"></div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11974.745900987175!2d2.12282!3d41.380896!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a498f576297baf%3A0x44f65330fe1b04b9!2sCamp%20Nou!5e0!3m2!1sid!2sid!4v1705553960193!5m2!1sid!2sid"></iframe>
		</div>

		<div class="copyright">
			<p> &#169 All Rights Reserved - Batara E-Library</p>
		</div>
	</footer>
	<!-- /FOOTER -->

</body>
</html>