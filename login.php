<?php
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>

<!DOCTYPE html>
<html>
  <head>
    <title>Masuk</title>

	<!-- Skrip CSS -->
<link rel="stylesheet" type="text/css" href="assets/login.css">

  </head>
  <body>
		<style type="text/css">
								body {
										background-image: url(img/asuransi-sinarmas.jpg);

								}
						</style>
	<div class="container">
		<div class="main">
	      <form action="proses_login.php" method="post">
			<h2>Login</h2><hr/>

			<label>Username :</label>
			<input id="name" name="username" placeholder="username" type="text">

			<label>Password :</label>
			<input id="password" name="password" placeholder="**********" type="password">

			<input type="submit" name="submit" id="submit" value="Login">
			<p>
			<tr>
				<button><td colspan=3><a href="register.php">Register</a></td></button>
			</tr>
		  </form>
		</div>
   </div>

  </body>
</html>
