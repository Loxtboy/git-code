<?php 

	$conn = mysqli_connect("localhost","root","","dblibrary");

	function query($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		
		$rows = [];
		

		while($row = mysqli_fetch_assoc($result)){

			$rows[] = $row;
		}
			return $rows;
	}

	function tambah($post){
	global $conn;

	$Id_Buku  		= htmlspecialchars($post["idbuku"]);
	$Judul   		= htmlspecialchars($post["Judul"]);
	$Pengarang 	 	= htmlspecialchars($post["Pengarang"]);
	$Tahun_Terbit   = htmlspecialchars($post["TahunTerbit"]);
	$Gambar  		= upload();
	if(!$Gambar){
		return false;
	} 
	$Kategori  		= htmlspecialchars($post["Kategori"]);
	$Baca  			= uploadBaca();
	if(!$Baca){
		return false;
	} 

	$query = "INSERT INTO buku VALUES ('$Id_Buku','$Judul','$Pengarang','$Tahun_Terbit','$Gambar','$Kategori','$Baca')";

	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
	}

	function hapus($Id_Buku){
		global $conn;	

		mysqli_query($conn, "DELETE FROM buku WHERE idbuku = $Id_Buku");

		return mysqli_affected_rows($conn);
	}

	function ubah($post){
		global $conn;

		$Id_Buku  		= htmlspecialchars($post["idbuku"]);
		$Judul   		= htmlspecialchars($post["Judul"]);
		$Pengarang 	 	= htmlspecialchars($post["Pengarang"]);
		$Tahun_Terbit   = htmlspecialchars($post["TahunTerbit"]);
		$GambarLama  	= $post["GambarLama"];
		if ($_FILES['Gambar']['error'] === 4) {
			$Gambar = $GambarLama;
		}else{
			$Gambar = upload();
		}
		$Kategori  		= htmlspecialchars($post["Kategori"]);
		$BacaLama  	= $post["BacaLama"];

		if ($_FILES['Baca']['error'] === 4) {
			$Baca = $BacaLama;
		}else{
			$Baca = uploadBaca();
		}

	$query = "UPDATE buku SET
				Judul 			= '$Judul',
				Pengarang 		= '$Pengarang',
				TahunTerbit 	= '$Tahun_Terbit',
				Gambar 			= '$Gambar',
				Kategori 		= '$Kategori',
				Baca 			= '$Baca'
				WHERE idbuku 	= $Id_Buku
			  ";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}

	function upload(){
		$namaFile 	= $_FILES['Gambar']['name'];
		$ukuranFile = $_FILES['Gambar']['size'];
		$error 		= $_FILES['Gambar']['error'];
		$tmpName 	= $_FILES['Gambar']['tmp_name'];

		if ($error === 4) {
			echo " <script>
						alert('Pilih Gambar Terlebih Dahulu!');
					</script>
				";
				return false;
		}

		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "	<script>
						alert('Yang Anda Upload Bukanlah Gambar');
					</script>
				";
				return false;
		}

		if ($ukuranFile > 100000000) {
			echo "	<script>
						alert('Ukuran Gambar Terlalu Besar!');
					</script>
				";

				return false;
		}

		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

		return $namaFileBaru;
	}

	function uploadBaca(){
		$namaFile 	= $_FILES['Baca']['name'];
		$ukuranFile = $_FILES['Baca']['size'];
		$error 		= $_FILES['Baca']['error'];
		$tmpName 	= $_FILES['Baca']['tmp_name'];

		if ($error === 4) {
			echo " <script>
						alert('Pilih File Terlebih Dahulu!');
					</script>
				";
				return false;
		}

		$ekstensiGambarValid = ['html', 'pdf', 'docx'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "	<script>
						alert('Yang Anda Upload Bukanlah File Buku');
					</script>
				";
				return false;
		}

		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, 'read/' . $namaFileBaru);

		return $namaFileBaru;
	}

	function search($keyword){
		$query = "SELECT * FROM buku WHERE
			idbuku  	LIKE  '%$keyword%'OR
			Gambar  	LIKE  '%$keyword%'OR
			Judul  		LIKE  '%$keyword%'OR
			Pengarang  	LIKE  '%$keyword%'OR
			TahunTerbit LIKE  '%$keyword%'OR
			Kategori  	LIKE  '%$keyword%'
		";

		return query($query);
	}

	function register($post){
		global $conn;

		$username = strtolower(stripslashes($post["username"]));
		$password = mysqli_real_escape_string($conn, $post["password"]);
		$password2 = mysqli_real_escape_string($conn, $post["password2"]);

		// cek username sudah ada atau belum
		$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

		if(mysqli_fetch_assoc($result)) {
			echo "<script>
					alert('username sudah terdaftar!');
				 </script>";

				 return false;
		}

		// cek konfirmasi password
		if($password !== $password2) {
			echo "<script>
					alert('konfirmasi password tidak sesuai!');
				 </script>";
			return false;
		}

		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		// tambahkan userbaru ke database
		mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', 'Pengguna')");

		mysqli_affected_rows($conn);


	}

?> 