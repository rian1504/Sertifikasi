<?php
    include "../DB/koneksi.php";

    $tgl_check_in = $_POST["tgl_check_in"];
    $tipe_kamar = $_POST["tipe_kamar"];

    $return = mysqli_query($koneksi, "SELECT SUM(jumlah_kamar) FROM reservasi WHERE tipe_kamar = '$tipe_kamar' AND tgl_check_in = '$tgl_check_in'");
    $data = mysqli_fetch_array($return);

    echo json_encode($data);
?>