<?php
    include "../../DB/koneksi.php";
    
    $halaman = $_GET["halaman"];

    $return = mysqli_query($koneksi, "SELECT * FROM kamar");
?>

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/pesan.css">

<a href="../fasilitas_kamar.php?halaman=<?= $halaman ?>" class="btn btn-danger mt-2 ms-2">Back</a>
<div class="col-lg-7 mx-auto my-5">
    <div class="card card-primary card-outline">
        <div class="card-header bg-info">
            <h1 class="text-center text-white">Tambah Data Fasilitas Kamar</h1>
        </div>
        <form action="../proses_tambah/prosesTambah_fasilitas_kamar.php" class="mt-3 mb-3" method="post" onsubmit="return validasi()">

            <input type="hidden" name="id_admin" value="1">
            <input type="hidden" name="halaman" value="<?= $halaman ?>">

            <label for="tipe_kamar">Tipe Kamar</label>
            <select name="tipe_kamar" id="tipe_kamar">
                <option value="" disabled selected="selected">Pilih Tipe Kamar</option>
                <?php while($data = mysqli_fetch_array($return)):
                ?>
                <option value="<?= $data["tipe_kamar"] ?>"><?= $data["tipe_kamar"] ?></option>
                <?php
                endwhile;
                ?>
            </select>
            <br><br>

            <label for="nama_fasilitas">Nama Fasilitas</label>
            <input type="text" id="nama_fasilitas" name="nama_fasilitas">
            <br><br>
            
            <button class="btn btn-success mt-3" type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script>
    function validasi(){
        var nama_fasilitas = document.getElementById("nama_fasilitas").value;
        var tipe_kamar = document.getElementById("tipe_kamar").value;

        if(tipe_kamar!=""&&nama_fasilitas!=""){
            return true;
        }
        else{
            alert("Data tidak boleh kosong!");
            return false;
        }
    }
</script>