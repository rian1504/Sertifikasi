<?php
    include "../../DB/koneksi.php";

    $id = $_GET["id"];
    $halaman = $_GET["halaman"];

    $result = mysqli_query($koneksi, "SELECT * FROM kamar WHERE id_kamar = $id");
    $data = mysqli_fetch_assoc($result);
?>

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/pesan.css">

<style>
    .img1{
        margin-left: 50% !important;
        margin-right: auto !important;
    }
</style>

<a href="../kamar.php?halaman=<?= $halaman ?>" class="btn btn-danger mt-2 ms-2">Back</a>
<div class="col-lg-7 mx-auto my-5">
    <div class="card card-primary card-outline">
        <div class="card-header bg-info">
            <h1 class="text-center text-white">Edit Data Kamar</h1>
        </div>
        <form action="../proses_edit/prosesEdit_kamar.php" class="mt-3 mb-3" method="post" onsubmit="return validasi()" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="halaman" value="<?= $halaman ?>">

            <label for="tipe_kamar">Tipe Kamar</label>
            <input type="text" name="tipe_kamar" id="tipe_kamar" value="<?= $data['tipe_kamar']?>">
            <br><br>

            <label for="jml_kamar">Jumlah Kamar</label>
            <input type="number" id="jml_kamar" name="jml_kamar" value="<?= $data['jumlah_kamar'] ?>">
            <br><br>

            <?php
                if($data["gambar"] >= 1){
            ?>
            <div>
                <img src="../../image/kamar/<?= $data["gambar"] ?>" class="img-preview1 img-fluid mb-3 mt-3 col-sm-2 ms-auto img1">
            </div>
            <?php
                }
            ?>
            <?php
                if($data["gambar"] < 1){
            ?>
            <div>
                <img class="img-preview1 img-fluid mb-3 mt-3 col-sm-2 m-auto">
            </div>
            <?php
                }
            ?>

            <label for="gambar">Gambar</label>
            <input type="hidden" name="gambar1" value="<?= $data["gambar"] ?>">

            <input type="file" name="gambar" id="gambar" onchange="previewImage1()">
            <br><br>
            
            <button class="btn btn-success mt-3" type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script>
    function validasi(){
        var tipe_kamar = document.getElementById("tipe_kamar").value;
        var jml_kamar = document.getElementById("jml_kamar").value;
        var gambar = document.getElementById("gambar").value;

        if(tipe_kamar !=""&&jml_kamar!=""&&gambar!=""){
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