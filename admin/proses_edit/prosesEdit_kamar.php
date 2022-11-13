<?php
    include "../../DB/koneksi.php";

    $halaman = $_POST['halaman'];
    $id = $_POST["id"];
    $tipe_kamar = $_POST["tipe_kamar"];
    $jml_kamar = $_POST["jml_kamar"];
    $gambar = $_FILES["gambar"]["name"];
    $file_tmp = $_FILES["gambar"]["tmp_name"];
    $gambar1 = $_POST["gambar1"];
    $gambar1_temp = $_FILES["gambar1"];

    if($gambar1 >= 1){
        unlink('../../image/kamar/'.$gambar1);
    }
    move_uploaded_file($file_tmp, '../../image/kamar/'.$gambar);

    mysqli_query($koneksi, "UPDATE kamar SET tipe_kamar = '$tipe_kamar', jumlah_kamar = '$jml_kamar', gambar = '$gambar' WHERE id_kamar = $id");
    header("location:../kamar.php?pesan=edit&halaman=$halaman");
?>