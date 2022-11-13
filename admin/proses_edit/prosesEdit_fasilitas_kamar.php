<?php
    include "../../DB/koneksi.php";

    $halaman = $_POST['halaman'];
    $id = $_POST['id'];
    $tipe_kamar = $_POST["tipe_kamar"];
    $nama_fasilitas = $_POST["nama_fasilitas"];

    $return = mysqli_query($koneksi, "SELECT id_kamar FROM kamar WHERE tipe_kamar = '$tipe_kamar'");
    $data = mysqli_fetch_array($return);

    $id_kamar = $data[0];

    mysqli_query($koneksi, "UPDATE fasilitas_kamar SET id_kamar = '$id_kamar', tipe_kamar = '$tipe_kamar', nama_fasilitas = '$nama_fasilitas' WHERE id_fasilitas_kamar = $id");
    header("location:../fasilitas_kamar.php?pesan=edit&halaman=$halaman");
?>