<?php
    include "../../DB/koneksi.php";

    $halaman = $_POST['halaman'];
    $id = $_POST["id"];
    $nama_fasilitas = $_POST["nama_fasilitas"];
    $keterangan = $_POST["keterangan"];
    $gambar = $_FILES["gambar"]["name"];
    $file_tmp = $_FILES["gambar"]["tmp_name"];
    $gambar1 = $_POST["gambar1"];
    $gambar1_temp = $_FILES["gambar1"];

    if($gambar1 >= 1){
        unlink('../../image/fasilitas_hotel/'.$gambar1);
    }
    move_uploaded_file($file_tmp, '../../image/fasilitas_hotel/'.$gambar);
    
    mysqli_query($koneksi, "UPDATE fasilitas_hotel SET nama_fasilitas = '$nama_fasilitas', keterangan = '$keterangan' , gambar = '$gambar' WHERE id_hotel = $id");
    header("location:../fasilitas_hotel.php?pesan=edit&halaman=$halaman");

    
?>