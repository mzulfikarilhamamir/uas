<?php

require_once "koneksi.php";
if (isset($_POST["register"])) {

	$email= $_POST["email"];
	$username= $_POST["username"];
	$password= $_POST["password"];
	
	$q = $db->prepare("INSERT INTO `user` (`id`,  `email`, 
	`username`, `password`) VALUES (NULL, ?, ?, SHA1(?));");
	$q->execute([ $email, $username,$password]);
	header("Location: login.php");

}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="modul/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script language="Javascript" src="modul/bootstrap-4.3.1-dist/js/bootstrap.min.js"> </script>
    <script src="modul/JQuery/jquery.min.js"></script>

    <!-- CSS dan JS DataTable -->
    <script src="modul/DataTable/datatables.min.js"></script>
    <script src="modul/DataTable/DataTables-1.10.23/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
	<!-- buat class container -->

	<div class="container h-100">
		<div class="row h-100 justify-content-center align-items-center">
	
			<!-- membuat form -->
			<form action="" method="POST" class="col-lg-6">
				<h5>Registrasi</h5>
				Selamat Datang
				<!-- buat row form (baris ke 1 pada form) -->
				<div class="form-row">
				
				</div>
				<!-- end baris 1 pada form -->

				<!-- baris ke 2 pada form -->
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="contoh1">Email</label>
						<input type="text" class="form-control" name="email" placeholder="Email">
					</div>
					<div class="form-group col-md-4">
						<label for="contoh2">Username</label>
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
					<div class="form-group col-md-4">
						<label for="contoh2">Password</label>
						<input type="text" class="form-control" name="password" placeholder="Password">
					</div>
				</div>
				<!-- end baris 2 pada form -->
				<button type="submit" class="btn btn-primary" name="register">Signup</button>
			</form>
			
			<!-- end form -->
		</div>
	</div>
	<!-- end container -->
</body>

</html>