<?php
    include "../../DB/koneksi.php";
    
    $halaman = $_GET["halaman"];
?>

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/pesan.css">

<a href="../fasilitas_hotel.php?halaman=<?= $halaman ?>" class="btn btn-danger mt-2 ms-2">Back</a>
<div class="col-lg-7 mx-auto my-5">
    <div class="card card-primary card-outline">
        <div class="card-header bg-info">
            <h1 class="text-center text-white">Tambah Data Fasilitas Hotel</h1>
        </div>
        <form action="../proses_tambah/prosesTambah_fasilitas_hotel.php" class="mt-3 mb-3" method="post" onsubmit="return validasi()" enctype="multipart/form-data">

            <input type="hidden" name="halaman" value="<?= $halaman ?>">

            <label for="nama_fasilitas">Nama Fasilitas</label>
            <input type="text" id="nama_fasilitas" name="nama_fasilitas">
            <br><br>

            <label for="keterangan">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan">
            <br><br>

            <div>
                <img class="img-preview1 img-fluid mb-3 mt-3 col-sm-2 m-auto">
            </div>

            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar" onchange="previewImage1()">

            <input type="hidden" name="id_admin" value="1">
            
            <button class="btn btn-success mt-3" type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script>
    function validasi(){
        var nama_fasilitas = document.getElementById("nama_fasilitas").value;
        var keterangan = document.getElementById("keterangan").value;
        var gambar = document.getElementById("gambar").value;

        if(keterangan !=""&&nama_fasilitas!=""&&gambar!=""){
            return true;
        }
        else{
            alert("Data tidak boleh kosong!");
            return false;
        }
    }

    function previewImage1(){
        const image = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview1');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }
</script>