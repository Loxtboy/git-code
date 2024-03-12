<?php 

require 'function.php';

if (isset($_POST["register"])) {

	if (register($_POST) > 0) {
		echo "<script>
				alert('user baru berhasil ditambahkan');
				documnet.location.href='login.php';
			 </script>";
	}else{
		 mysqli_error($conn);
	}

}

 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Registrasi</title>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="registers.css">
</head>
<body>
	
	<div class="wrapper">
		<span class="bg-animate"></span>

		<div class="form-box register">
			<h2>Registrasi</h2>
			<form action="" method="post">
				<div class="input-box" >
					<input type="text" name="username" id="username" autocomplete="off" required>
					<label for="username">Username</label>
					<i class='bx bxs-user'></i>
				</div>
				<div class="input-box">
					<input type="password" name="password" id="password" required>
					<label for="password">Password</label>
					<i class='bx bxs-lock'></i>
				</div>
				<div class="input-box">
					<input type="password" name="password2" id="password2" required>
					<label for="password2">Konfirmasi password</label>
					<i class='bx bxs-key'></i>
				</div>
		
				<button class="btn" type="submit" name="register">Register!</button>
				<div class="logreg-link" >
					<p>already have an account? <a href="login.php" class="login-link">Sign in</a></p>
				</div>
			</form>
		</div>
		<div class="info-text register">
			<h2>REGISTER BROO!</h2>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
		</div>
	</div>
	
	
</body>
</html>