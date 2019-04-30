<?php
// Membangun Koneksi dengan Server dengan nama server, user_id dan password sebagai parameter
$connection = mysqli_connect("localhost", "root", "");
// Seleksi Database
$db = mysqli_select_db("tugas_akhir", $connection);
session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['login_user'];

$ses_sql=mysqli_query("select username from admin where username='$user_check'", $);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
	mysqli_close($connection); // Menutup koneksi
	header('Location: home.php'); // Mengarahkan ke Home Page
}
?>
