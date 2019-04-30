<?php
include('fragment/header.php');
include('fragment/sidebar.php');
?>

<html>
<head>
  <script>
    $(document).ready(function(){
      // Sembunyikan alert validasi kosong
      $("#kosong").hide();
    });
    </script>
 </head>
<body>
<!--- Content ------------------------------->



			<div id="main">

				<div class="header">
					<h2></h2>

				</div>

        <!-- Content -->
		<div style="padding: 0 15px;">
			<!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
			<a href="data_testing.php" class="btn btn-danger pull-right">
				<span class="glyphicon glyphicon-remove"></span> Cancel
			</a>

			<hr>

			<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
			<form method="post" action="" enctype="multipart/form-data">
				<a href="data/data_uji.xlsx" class="btn btn-default">
					<span class="glyphicon glyphicon-download"></span>
					Download Data
				</a><br><br>

				<!--
				-- Buat sebuah input type file
				-- class pull-left berfungsi agar file input berada di sebelah kiri
				-->
				<input type="file" name="file" class="pull-left">

				<button type="submit" name="preview" class="btn btn-success btn-sm">
					<span class="glyphicon glyphicon-eye-open"></span> Preview
				</button>
			</form>

			<hr>

			<!-- Buat Preview Data -->
			<?php
			// Jika user telah mengklik tombol Preview
			if(isset($_POST['preview'])){
				//$ip = ; // Ambil IP Address dari User
				$nama_file_baru = 'data.xlsx';

				// Cek apakah terdapat file data.xlsx pada folder tmp
				if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
					unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

				$tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
				$tmp_file = $_FILES['file']['tmp_name'];

				// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
				if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
					// Upload file yang dipilih ke folder tmp
					// dan rename file tersebut menjadi data{ip_address}.xlsx
					// {ip_address} diganti jadi ip address user yang ada di variabel $ip
					// Contoh nama file setelah di rename : data127.0.0.1.xlsx
					move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

					// Load librari PHPExcel nya
					require_once 'PHPExcel/PHPExcel.php';

					$excelreader = new PHPExcel_Reader_Excel2007();
					$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

					// Buat sebuah tag form untuk proses import data ke database
					echo "<form method='post' action='import_data.php'>";

					// Buat sebuah div untuk alert validasi kosong
					//echo "<div class='alert alert-danger' id='kosong'>
					//Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
					//</div>";

					echo "<table class='table table-bordered'>
					<tr>
						<th colspan='13' class='text-center'></th>
					</tr>
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
					</tr>";

					$numrow = 1;
					$kosong = 0;
					foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
						// Ambil data pada excel sesuai Kolom
            $no = $row['A'];
            $nama = $row['B'];
            $usia = $row['C'];
            $jenkel = $row['D'];
            $status = $row['E'];
            $pekerjaan = $row['F'];
            $penghasilan = $row['G'];
            $jml_tanggungan = $row['H'];
            $status_rumah = $row['I'];
            $preexisting_disease = $row['J'];
            $jenis_produk = $row['K'];
            $plan = $row['L'];
            $permohonan = $row['M'];

						// Cek jika semua data tidak diisi
            if(empty($no) && empty($nama) && empty($usia) && empty($jenkel) && empty($status) && empty($pekerjaan) && empty($penghasilan)
            && empty($jml_tanggungan) && empty($status_rumah) && empty($preexisting_disease) && empty($jenis_produk) && empty($plan) && empty($permohonan))
        			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

						// Cek $numrow apakah lebih dari 1
						// Artinya karena baris pertama adalah nama-nama kolom
						// Jadi dilewat saja, tidak usah diimport
						if($numrow > 1){
							// Validasi apakah semua data telah diisi // Jika kosong, beri warna merah
							$no_td = ( ! empty($no))? "" : " style='background: #E07171;'";
							$nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'";
              $usia_td = ( ! empty($usia))? "" : " style='background: #E07171;'";
							$jenkel_td = ( ! empty($jenkel))? "" : " style='background: #E07171;'";
							$status_td = ( ! empty($status))? "" : " style='background: #E07171;'";
							$pekerjaan_td = ( ! empty($pekerjaan))? "" : " style='background: #E07171;'";
              $penghasilan_td = ( ! empty($penghasilan))? "" : " style='background: #E07171;'";
							$jml_tanggungan_td = ( ! empty($jml_tanggungan))? "" : " style='background: #E07171;'";
							$status_rumah_td = ( ! empty($status_rumah))? "" : " style='background: #E07171;'";
							$preexisting_disease_td = ( ! empty($preexisting_disease))? "" : " style='background: #E07171;'";
							$jenis_produk_td = ( ! empty($jenis_produk))? "" : " style='background: #E07171;'";
              $plan_td = ( ! empty($plan))? "" : " style='background: #E07171;'";
							$permohonan_td = ( ! empty($permohonan))? "" : " style='background: #E07171;'";

							// Jika salah satu data ada yang kosong
							if(empty($no) or empty($nama) or empty ($usia) or empty($jenkel) or empty($pekerjaan) or empty($penghasilan) or empty($jml_tanggungan)
                 or empty($status_rumah) or empty($preexisting_disease) or empty($jenis_produk) or empty($plan) or empty($permohonan)){
								$kosong++; // Tambah 1 variabel $kosong
							}

							echo "<tr>";
							echo "<td".$no_td.">".$no."</td>";
							echo "<td".$nama_td.">".$nama."</td>";
              echo "<td".$usia_td.">".$usia."</td>";
							echo "<td".$jenkel_td.">".$jenkel."</td>";
              echo "<td".$status_td.">".$status."</td>";
							echo "<td".$pekerjaan_td.">".$pekerjaan."</td>";
							echo "<td".$penghasilan_td.">".$penghasilan."</td>";
              echo "<td".$jml_tanggungan_td.">".$jml_tanggungan."</td>";
							echo "<td".$status_rumah_td.">".$status_rumah."</td>";
							echo "<td".$preexisting_disease_td.">".$preexisting_disease."</td>";
							echo "<td".$jenis_produk_td.">".$jenis_produk."</td>";
              echo "<td".$plan_td.">".$plan."</td>";
							echo "<td".$permohonan_td.">".$permohonan."</td>";
							echo "</tr>";
						}

						$numrow++; // Tambah 1 setiap kali looping
					}

					echo "</table>";

					// Cek apakah variabel kosong lebih dari 0
					// Jika lebih dari 0, berarti ada data yang masih kosong
					if($kosong > 0){
					?>
						<script>
						$(document).ready(function(){
							// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
							$("#jumlah_kosong").html('<?php echo $kosong; ?>');

							$("#kosong").show(); // Munculkan alert validasi kosong
						});
						</script>
					<?php
					}else{ // Jika semua data sudah diisi
						echo "<hr>";

						// Buat sebuah tombol untuk mengimport data ke database
						echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
					}

					echo "</form>";
				}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
					// Munculkan pesan validasi
					echo "<div class='alert alert-danger'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
					</div>";
				}
			}
			?>
		</div>

				</div>

</body>
</html>

<?php
include('fragment/footer.php');
?>
