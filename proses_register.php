<?php
        include 'koneksi.php';

        if(isset($_POST['submit'])) {


          $username =$_POST['username'];
          $password = md5($_POST['password']);
          $confirmpass = md5($_POST['confirmpass']);

            $query = "INSERT INTO register VALUES ('$id','$username', '$password', '$confirmpass')";
            $input = mysqli_query($koneksi, $query);


            if(!$input) {
                die ("query gagal dijalankan: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
            }
          header("location:register.php");
}
?>
