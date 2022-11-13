<?php
include "../../DB/koneksi.php";
    $id = $_GET["id"];
    $halaman = $_GET["halaman"];

    $result = mysqli_query($koneksi, "SELECT * FROM kamar where id_kamar = $id");
    $data = mysqli_fetch_array($result);
    $filename = $data['gambar'];

    unlink('../../image/kamar/'.$filename);

    mysqli_query($koneksi, "DELETE FROM kamar where id_kamar = $id");
    header("location:../kamar.php?pesan=hapus&halaman=$halaman");
?>