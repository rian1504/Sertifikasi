<?php
    include "../layouts/main.php";
    include "../DB/koneksi.php";

    $return = mysqli_query($koneksi, "SELECT * FROM kamar");
?>
<link rel="stylesheet" href="../css/pesan.css">

<div class="col-lg-7 mx-auto my-5">
    <div class="card card-primary card-outline">
        <div class="card-header bg-info">
            <h1 class="text-center text-white">Form Pendaftaran</h1>
        </div>
        <form action="../resepsionis/pesan.php" method="post" class="mt-3 mb-3" onsubmit="return validasi()">

            <input type="hidden" name="id_resepsionis" value="1">
            <input type="hidden" name="total_kamar" id="total_kamar">
            <input type="hidden" name="kamar_dipesan" id="kamar_dipesan">

            <label for="nama_pemesan">Nama Pemesan</label>
            <input type="text" id="nama_pemesan" name="nama_pemesan">
            <br><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email">
            <br><br>
            
            <label for="no_handphone">No Handphone</label>
            <input type="number" id="no_handphone" name="no_handphone" maxlength="15">
            <br><br>

            <label for="nama_tamu">Nama Tamu</label>
            <input type="text" id="nama_tamu" name="nama_tamu">
            <br><br>

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

            <label for="tgl_check_in">Tanggal Check In</label>
            <input type="date" name="tgl_check_in" id="tgl_check_in" disabled>
            <button type="button" class="btn btn-warning mt-3" id="btn_check_in" disabled>Reset Check In</button>
            <br><br>

            <label for="tgl_check_out">Tanggal Check Out</label>
            <input type="date" name="tgl_check_out" id="tgl_check_out">
            <br><br>

            <label for="sisa_kamar">Sisa kamar</label>
            <input type="number" disabled id="sisa_kamar" name="sisa_kamar">
            <br><br>

            <label for="jml_kamar">Jumlah Kamar</label>
            <input type="number" name="jumlah_kamar" id="jml_kamar">
            <br><br>

            <button class="btn btn-success mt-3" type="submit" name="submit" id="submit">Submit</button>
        </form>
    </div>
</div>

<script src="../jquery/dist/jquery.min.js"></script>
<script src="../js/tipe_kamar.js"></script>
<script src="../js/kamar_dipesan.js"></script>
<script src="../js/submit.js"></script>
<script src="../js/reset_check_in.js"></script>

<script>
    function validasi(){
        var nama_pemesan = document.getElementById("nama_pemesan").value;
        var email = document.getElementById("email").value;
        var no_handphone = document.getElementById("no_handphone").value;
        var nama_tamu = document.getElementById("nama_tamu").value;
        var tipe_kamar = document.getElementById("tipe_kamar").value;
        var tgl_check_in = document.getElementById("tgl_check_in").value;
        var tgl_check_out = document.getElementById("tgl_check_out").value;
        var jumlah_kamar = parseInt(document.getElementById("jml_kamar").value);

        var sisa_kamar = parseInt(document.getElementById("sisa_kamar").value);

        if(nama_pemesan !=""&&email!=""&&no_handphone!=""&&nama_tamu!=""&&tipe_kamar!=""&&tgl_check_in!=""&&tgl_check_out!=""&&jumlah_kamar!=""){
            if(jumlah_kamar > sisa_kamar){
                alert("Jumlah kamar yang anda pilih melebihi kapasitas kamar yang kosong")
                return false;
            }
            else{
                return true;
            }
        }
        else{
            alert("Data tidak boleh kosong!");
            return false;
        }
    }
</script>