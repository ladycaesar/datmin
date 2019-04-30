<?php
	if(isset($_GET['username'])){
		if($_GET['username'] == "kosong"){
			echo "<h4 style='color:red'>Username Belum Di Masukkan !</h4>";
		}
	}
	?>

<!DOCTYPE html>
<html>
  <head>
    <title>Daftar</title>

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
	      <form action="proses_register.php" method="post">
			<h2>Register</h2><hr/>

			<label>Username :</label>
			<input id="name" name="username" placeholder="username" type="text">

			<label>Password :</label>
			<input id="password" name="password" placeholder="**********" type="password">

			<label>Confirm Password :</label>
			<input id="confirmpass" name="confirmpass" placeholder="**********" type="password">

			<input type="submit" name="submit" id="submit" value="Register">
			<p>
			<tr>
				<button><td colspan=3><a href="login.php">Login</a></td></button>
			</tr>
		  </form>
		</div>
   </div>

  </body>
</html>
