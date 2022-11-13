<?php
    include "../DB/koneksi.php";
    $kode_reservasi = $_GET["kode_reservasi"];
    $return = mysqli_query($koneksi, "SELECT * FROM reservasi WHERE kode_reservasi='$kode_reservasi'");
    $data = mysqli_fetch_array($return);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../image/navbar/hotel.png">
</head>
<body>
<main class="d-flex flex-nowrap">

<div class="w-100">
    <div class="card mt-2">
        <div class="card-header bg-dark text-white text-center">
            Data Booking
        </div>
        <div class="card-body">
            <table>
            <tr>
                <td class="h2">Nama Pemesan</td>
                <td class="h2">:&emsp;<?= $data["nama_pemesan"]?></td>
            </tr>
            <tr>
                <td class="h2">Email</td>
                <td class="h2">:&emsp;<?= $data["email"]?></td>
            </tr>
            <tr>
                <td class="h2">No Handphone</td>
                <td class="h2">:&emsp;<?= $data["no_handphone"]?></td>
            </tr>
            <tr>
                <td class="h2">Nama Tamu</td>
                <td class="h2">:&emsp;<?= $data["nama_tamu"]?></td>
            </tr>
            <tr>
                <td class="h2">Tanggal Check In</td>
                <td class="h2">:&emsp;<?= $data["tgl_check_in"]?></td>
            </tr>
            <tr>
                <td class="h2">Tanggal Check Out</td>
                <td class="h2">:&emsp;<?= $data["tgl_check_out"]?></td>
            </tr>
            <tr>
                <td class="h2">Tipe Kamar</td>
                <td class="h2">:&emsp;<?= $data["tipe_kamar"]?></td>
            </tr>
            <tr>
                <td class="h2">Jumlah Kamar</td>
                <td class="h2">:&emsp;<?= $data["jumlah_kamar"]?></td>
            </tr>
            </table>
            <h2 class="text-center text-danger">Kode Reservasi: <?= $kode_reservasi ?></h2>
        </div>
    </div>
</div>
<div class="d-flex" style="height: 788px;">
  <div class="vr"></div>
</div>
<div class="text-center bg-secondary">
    <h5 class="text-white mb-5">Silahkan Download bukti reservasi dengan cara klik tombol download dibawah ini!</h5>
    <form action="../resepsionis/cetak.php" method="POST">
        <input type="hidden" name="nama_pemesan" value="<?= $data["nama_pemesan"] ?>">
        <input type="hidden" name="email" value="<?= $data["email"] ?>">
        <input type="hidden" name="no_handphone" value="<?= $data["no_handphone"] ?>">
        <input type="hidden" name="nama_tamu" value="<?= $data["nama_tamu"] ?>">
        <input type="hidden" name="tgl_check_in" value="<?= $data["tgl_check_in"] ?>">
        <input type="hidden" name="tgl_check_out" value="<?= $data["tgl_check_out"] ?>">
        <input type="hidden" name="tipe_kamar" value="<?= $data["tipe_kamar"] ?>">
        <input type="hidden" name="jumlah_kamar" value="<?= $data["jumlah_kamar"] ?>">
        <input type="hidden" name="kode_reservasi" value="<?= $data["kode_reservasi"] ?>">
        <button name="cetak" class="btn btn-primary mt-5">CETAK</button>
    </form>

    <a href="../user/index.php" class="btn btn-danger mt-3">Kembali</a>
</div>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>