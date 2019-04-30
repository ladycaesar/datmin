<?php
// mengaktifkan session
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman sambil mengirim pesan logout
echo "<script>alert('Terima kasih, Anda Berhasil Logout')</script>";
header("location:index.php?pesan=logout");
?>
