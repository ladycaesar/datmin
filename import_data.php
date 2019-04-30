<?php
/*
-- Source Code from My Notes Code (www.mynotescode.com)
--
-- Follow Us on Social Media
-- Facebook : http://facebook.com/mynotescode/
-- Twitter  : http://twitter.com/mynotescode
-- Google+  : http://plus.google.com/118319575543333993544
--
-- Terimakasih telah mengunjungi blog kami.
-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
*/

// Load file koneksi.php
include "koneksi.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';

	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';

	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

	$numrow = 1;
	foreach($sheet as $row){
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
			// Buat query Insert
			$query = "INSERT INTO data_testing VALUES('".$no."','".$nama."','".$usia."','".$jenkel."','".$status."','".$pekerjaan."','".$penghasilan."',
      '".$jml_tanggungan."','".$status_rumah."','".$preexisting_disease."','".$jenis_produk."','".$plan."','".$permohonan."')";

			// Eksekusi $query
			mysqli_query($koneksi, $query);
		}

		$numrow++; // Tambah 1 setiap kali looping
	}
}

header('location: data_testing.php'); // Redirect ke halaman awal
?>
