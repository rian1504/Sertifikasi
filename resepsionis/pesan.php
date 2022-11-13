<?php
    include "../DB/koneksi.php";
    $nama_pemesan = $_POST["nama_pemesan"];
    $email = $_POST["email"];
    $no_handphone = $_POST["no_handphone"];
    $nama_tamu = $_POST["nama_tamu"];
    $tipe_kamar = $_POST["tipe_kamar"];
    $jumlah_kamar = $_POST["jumlah_kamar"];
    $tgl_check_in = $_POST["tgl_check_in"];
    $tgl_check_out = $_POST["tgl_check_out"];

    $id_resepsionis = $_POST["id_resepsionis"];

    $return = mysqli_query($koneksi, "SELECT id_kamar FROM kamar WHERE tipe_kamar = '$tipe_kamar'");
    $data = mysqli_fetch_array($return);

    $id_kamar = $data[0];

    $karakter = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
    $kode_reservasi = substr(str_shuffle($karakter), 0, 10);

    mysqli_query($koneksi, "INSERT INTO reservasi(id_kamar, id_resepsionis, nama_pemesan, email, no_handphone, nama_tamu, tipe_kamar, tgl_check_in, tgl_check_out, jumlah_kamar, status_tamu, kode_reservasi) 
    VALUES('$id_kamar', '$id_resepsionis', '$nama_pemesan', '$email', '$no_handphone', '$nama_tamu', '$tipe_kamar', '$tgl_check_in', '$tgl_check_out', '$jumlah_kamar', '', '$kode_reservasi')");

    header("location:../user/cetak.php?kode_reservasi=$kode_reservasi");
?>