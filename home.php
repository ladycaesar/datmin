<?php
include('fragment/header.php');
include('fragment/sidebar.php');
?>

<!--- Content ------------------------------->
			<div id="main">

				<div class="header">
				<h3>Asuransi Sinar Mas</h3>
				<h4>Jl. Bintaro Utama 3A Bintaro Jaya, Tangerang</h4>
					<!--<h2>Sistem Penerimaan Calon Nasabah</h2>-->

				</div>

				<div class="content">
					<center>
					<div class="col-4 mx-auto text-center">

					<img border="0" alt="logo_sinarmas" src="img/asuransi-sinarmas.jpg"> <!-- center this image within the column -->
					<h3>Simas Sehat Bintaro</h3>
					<p>
						<!-- cek apakah sudah login -->
						<?php
						session_start();
						if($_SESSION['status']!="login"){
						header("location:home.php?pesan=belum_login");
						}
						?>

						<!--<h4>Selamat datang, <?php echo $_SESSION['username']; ?>! Anda telah login.</h4>

						<br/>
						<br/>
					</p>
-->			</center>
				</div>
				</div>
<?php
include('fragment/footer.php');
?>
