<?php
    include "../../DB/koneksi.php";

    $halaman = $_POST["halaman"];
    $id_admin = $_POST["id_admin"];
    $nama_fasilitas = $_POST["nama_fasilitas"];
    $keterangan = $_POST["keterangan"];
    $gambar = $_FILES["gambar"]["name"];
    $file_tmp = $_FILES["gambar"]["tmp_name"];

    move_uploaded_file($file_tmp, '../../image/fasilitas_hotel/'.$gambar);
    
    mysqli_query($koneksi, "INSERT INTO fasilitas_hotel(id_admin, nama_fasilitas, keterangan, gambar) VALUES('$id_admin', '$nama_fasilitas', '$keterangan', '$gambar')");
    header("location:../fasilitas_hotel.php?pesan=tambah&halaman=$halaman");
?>