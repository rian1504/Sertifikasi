<?php
    session_start();
    include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginAdmin = mysqli_query($koneksi, "select * from admin where username='$username' and password='$password'");
    $cekAdmin=mysqli_num_rows($loginAdmin);

    $loginResepsionis = mysqli_query($koneksi, "select * from resepsionis where username='$username' and password='$password'");
    $cekResepsionis=mysqli_num_rows($loginResepsionis);

    if($cekAdmin > 0){
        $_SESSION['status']="adminlogin";
        header("location:../admin/dashboard.php");
    }
    elseif($cekResepsionis > 0){
        $_SESSION['status']="resepsionislogin";
        header("location:../resepsionis/dashboard.php");
    } 
    else{
        header("location:../user/login.php?pesan=gagal_login");
    }
?>