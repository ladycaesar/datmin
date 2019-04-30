<?php
include('fragment/header.php');
include('fragment/sidebar.php');
?>

			<div id="main">

				<div class="header">
					<h2>Data Testing</h2>
				</div>


				<!-- Content -->
		<div style="padding: 0 15px;">

			<!--
			-- Buat sebuah tombol untuk mengarahkan ke form import data
			-- Tambahkan class btn agar terlihat seperti tombol
			-- Tambahkan class btn-success untuk tombol warna hijau
			-- class pull-right agar posisi link berada di sebelah kanan
			-->


			<a href="form_importdata.php" class="btn btn-success pull-right">
				<span class="glyphicon glyphicon-upload"></span> Import Data
			</a>

			<hr>

			<!-- Buat sebuah div dan beri class table-responsive agar tabel jadi responsive -->
		 <table border="1">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Usia</th>
						<th>Jenis Kelamin</th>
						<th>Status</th>
						<th>Pekerjaan</th>
						<th>Penghasilan Per Tahun</th>
						<th>Jumlah Tanggungan</th>
						<th>Status Rumah</th>
						<th>Pre Existing Disease</th>
						<th>Jenis Produk</th>
						<th>Plan</th>
						<th>Permohonan</th>
						<th>Aksi</th>
					</tr>

					<?php
					// Load file koneksi.php
					include "koneksi.php";

					// Buat query untuk menampilkan semua data testing
					$sql = mysqli_query($koneksi, "SELECT * FROM data_testing");

					$no = 1; // Untuk penomoran tabel, di awal set dengan 1
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
						echo'<tr>
    				<td>'.$data['no'].'</td>
    				<td>'.$data['nama'].'</td>
    				<td>'.$data['usia'].'</td>
    				<td>'.$data['jenkel'].'</td>
						<td>'.$data['status'].'</td>
    				<td>'.$data['pekerjaan'].'</td>
    				<td>'.$data['penghasilan'].'</td>
    				<td>'.$data['jml_tanggungan'].'</td>
						<td>'.$data['status_rumah'].'</td>
						<td>'.$data['preexisting_disease'].'</td>
    				<td>'.$data['jenis_produk'].'</td>
    				<td>'.$data['plan'].'</td>
    				<td>'.$data['permohonan'].'</td>
    				<td><a href="edit.php?no='.$data['no'].'">Edit</a>- <a href="delete.php?no='.$data['no'].'">Delete</a> </td></tr>';

						$no++; // Tambah 1 setiap kali looping
					}
					?>
				</table>
			</div>
		</div>

				</div>
<?php

include('fragment/footer.php');
?>
