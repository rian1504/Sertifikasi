<?php
    include "../../DB/koneksi.php";

    $id = $_POST['id'];
    $halaman = $_POST["halaman"];

    mysqli_query($koneksi, "DELETE FROM reservasi WHERE id_reservasi = $id");
    header("Location:../reservasi.php?halaman=$halaman");
?>