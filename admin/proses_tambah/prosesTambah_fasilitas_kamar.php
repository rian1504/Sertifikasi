<?php
    include "../../DB/koneksi.php";

    $halaman = $_POST["halaman"];
    $id_admin = $_POST["id_admin"];
    $tipe_kamar = $_POST["tipe_kamar"];
    $nama_fasilitas = $_POST["nama_fasilitas"];
    
    $return = mysqli_query($koneksi, "SELECT id_kamar FROM kamar WHERE tipe_kamar = '$tipe_kamar'");
    $data = mysqli_fetch_array($return);

    $id_kamar = $data[0];

    mysqli_query($koneksi, "INSERT INTO fasilitas_kamar(id_admin, id_kamar, tipe_kamar, nama_fasilitas) VALUES('$id_admin', '$id_kamar', '$tipe_kamar', '$nama_fasilitas')");
    header("location:../fasilitas_kamar.php?pesan=tambah&halaman=$halaman");
?>