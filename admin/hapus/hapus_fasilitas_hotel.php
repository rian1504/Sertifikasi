<?php
include "../../DB/koneksi.php";
    $id = $_GET["id"];
    $halaman = $_GET["halaman"];

    $result = mysqli_query($koneksi, "SELECT * FROM fasilitas_hotel where id_hotel = $id");
    $data = mysqli_fetch_array($result);
    $filename = $data['gambar'];

    unlink('../../image/fasilitas_hotel/'.$filename);

    mysqli_query($koneksi, "DELETE FROM fasilitas_hotel where id_hotel = $id");
    header("location:../fasilitas_hotel.php?pesan=hapus&halaman=$halaman");
?>