<?php
include "../../DB/koneksi.php";
    $id = $_GET["id"];
    $halaman = $_GET["halaman"];

    mysqli_query($koneksi, "DELETE FROM fasilitas_kamar where id_fasilitas_kamar = $id");
    header("location:../fasilitas_kamar.php?pesan=hapus&halaman=$halaman");
?>