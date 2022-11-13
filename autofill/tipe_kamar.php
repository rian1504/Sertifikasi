<?php
    include "../DB/koneksi.php";

    $tipe_kamar = $_POST["tipe_kamar"];

    $data = mysqli_query($koneksi, "SELECT jumlah_kamar FROM kamar WHERE tipe_kamar = '$tipe_kamar'");
    $tampil = mysqli_fetch_array($data);

    echo json_encode($tampil);
?>