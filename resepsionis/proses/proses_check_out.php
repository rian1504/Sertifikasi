<?php
    include "../../DB/koneksi.php";

    $id = $_POST['id'];
    $halaman = $_POST["halaman"];

    mysqli_query($koneksi, "UPDATE reservasi SET status_tamu = 'check_out' WHERE id_reservasi = $id");
    header("Location:../reservasi.php?halaman=$halaman");
?>