<?php
    include "../../DB/koneksi.php";

    $id = $_POST['id'];
    $halaman = $_POST["halaman"];

    var_dump($halaman);

    mysqli_query($koneksi, "UPDATE reservasi SET status_tamu = 'check_in' WHERE id_reservasi = $id");
    header("Location:../reservasi.php?halaman=$halaman");
?>