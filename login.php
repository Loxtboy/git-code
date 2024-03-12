<?php
	 session_start();

	require 'function.php';

	if (isset($_SESSION['login'])) {
			header("Location: index.php");
			exit;
		}

	if(isset($_POST["login"])){

		$username = $_POST["username"];
		$password = $_POST["password"];
		

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

		$cek = mysqli_num_rows($result);

			if($cek > 0){
				// cek password
				$row = mysqli_fetch_assoc($result);

				if(password_verify($password, $row["password"])){
					$_SESSION["login"] = true;
					// cek user login
					if($row['level'] == "Admin"){
						// buat session login dan username
						$_SESSION['Admin'] = true;
						$_SESSION['level'] = "Admin";
						// alihkan ke halaman admin
						header("location:index.php");

					}else if($row['level'] == "Pegawai"){
						// buat session login dan username
						$_SESSION['Pegawai'] = true;
						$_SESSION['level'] = "Pegawai";
						// alihkan ke halaman petugas
						header("location:index.php");

					}else if($row['level'] == "Pengguna"){
						// buat session login dan username
						$_SESSION['Pengguna'] = true;
						$_SESSION['level'] = "Pengguna";
						// alihkan ke halaman user
						header("location:index.php");
					}else{
						header("location:index.php");
					}
				} else {
					$error = true;
				}
			} else {
				$error = true;
			}
	}

// login 1 user

	// session_start();

 	// if (isset($_SESSION['login'])) {

 	// 	header("Location: index.php");
 	// 	exit;
 	// }


	// require 'function.php';

	// if (isset($_POST["login"])) {
		
	// 	$username = $_POST["username"];
	// 	$password = $_POST["password"];

	// 	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// 	// cek username
	// 	if (mysqli_num_rows($result) === 1) {
			

	// 		// cek password
	// 		$row = mysqli_fetch_assoc($result);
	// 		if (password_verify($password, $row["password"]) ) {

	// 			// set session

	// 			$_SESSION['login'] = true;

	// 			header("Location: index.php");
	// 			exit;
	// 		}
	// 	}

	// 	$error = true;

	// }

 ?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="loginstyles.css">
</head>
<body>
	
	<div class="wrapper">
		<span class="bg-animate"></span>

		<div class="form-box login">
			<h2>Login</h2>
			<form action="" method="post">
				<div class="input-box" >
					<input type="text" name="username" id="username" autocomplete="off" required>
					<label for="username">Username</label>
					<i class='bx bxs-user'></i>
				</div>
				<div class="input-box">
					<input type="password" name="password" id="password" required>
					<label for="password">Password</label>
					<i class='bx bxs-key'></i>
				</div>
				<button class="btn" type="submit" name="login">Login</button>
				<?php if(isset($error)) : ?>
					<p style="color:red; font-style: italic; text-align:center;">username / password salah</p>
				<?php endif; ?>
				<div class="logreg-link" >
					<p>Don't have an account? <a href="registrasi.php" class="register-link">Sign Up</a></p>
				</div>
			</form>
		</div>
		<div class="info-text login">
			<h2>WELCOME BROO!</h2>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
		</div>
	</div>
</body>
</html>