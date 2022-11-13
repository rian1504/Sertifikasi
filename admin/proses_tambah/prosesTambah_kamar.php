<?php
    include "../../DB/koneksi.php";

    $halaman = $_POST["halaman"];
    $id_admin = $_POST["id_admin"];
    $tipe_kamar = $_POST["tipe_kamar"];
    $jml_kamar = $_POST["jml_kamar"];
    $gambar = $_FILES["gambar"]["name"];
    $file_tmp = $_FILES["gambar"]["tmp_name"];

    move_uploaded_file($file_tmp, '../../image/kamar/'.$gambar);

    mysqli_query($koneksi, "INSERT INTO kamar(id_admin, tipe_kamar, jumlah_kamar, gambar) VALUES('$id_admin', '$tipe_kamar', '$jml_kamar', '$gambar')");
    header("location:../kamar.php?pesan=tambah&halaman=$halaman");
?>