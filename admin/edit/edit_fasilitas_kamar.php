<?php
    include "../../DB/koneksi.php";

    $id = $_GET["id"];
    $halaman = $_GET["halaman"];

    $result = mysqli_query($koneksi, "SELECT * FROM fasilitas_kamar WHERE id_fasilitas_kamar = $id");
    $data = mysqli_fetch_assoc($result);

    $resultAll = mysqli_query($koneksi, "SELECT * FROM kamar");
?>

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/pesan.css">

<a href="../fasilitas_kamar.php?halaman=<?= $halaman ?>" class="btn btn-danger mt-2 ms-2">Back</a>
<div class="col-lg-7 mx-auto my-5">
    <div class="card card-primary card-outline">
        <div class="card-header bg-info">
            <h1 class="text-center text-white">Edit Data Fasilitas Kamar</h1>
        </div>
        <form action="../proses_edit/prosesEdit_fasilitas_kamar.php" class="mt-3 mb-3" method="post" onsubmit="return validasi()">

            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="halaman" value="<?= $halaman ?>">

            <label for="tipe_kamar">Tipe Kamar</label>
            <select name="tipe_kamar" id="tipe_kamar">
                <?php while($dataAll = mysqli_fetch_array($resultAll)):
                ?>
                <option value="<?= $dataAll["tipe_kamar"] ?>" 
                <?php if($dataAll["tipe_kamar"] == $data["tipe_kamar"]){?> selected <?php } ?>
                ><?= $dataAll["tipe_kamar"] ?></option>
                <?php
                endwhile;
                ?>
            </select>
            <br><br>

            <label for="nama_fasilitas">Nama Fasilitas</label>
            <input type="text" id="nama_fasilitas" name="nama_fasilitas" value="<?= $data['nama_fasilitas'] ?>">
            <br><br>
            
            <button class="btn btn-success mt-3" type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script>
    function validasi(){
        var nama_fasilitas = document.getElementById("nama_fasilitas").value;
        var id_kamar = document.getElementById("id_kamar").value;

        if(id_kamar!=""&&nama_fasilitas!=""){
            return true;
        }
        else{
            alert("Data tidak boleh kosong!");
            return false;
        }
    }
</script>