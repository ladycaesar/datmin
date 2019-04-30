<?php
include koneksi.php;
$no	= $_GET['no'];

$sql 	= 'delete from data_testing where no="'.$no.'"';
$query	= mysqli_query($db_link,$sql);
header('location: data_testing.php');
?>
