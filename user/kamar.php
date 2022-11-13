<?php
    include "../layouts/main.php";
    include "../DB/koneksi.php";
?>

<style>
  body{
    background-color: grey;
  }
  .card{
    background-color: cadetblue;
  }
  .card2{
    background-color: lightgoldenrodyellow;
  }
</style>

<div class="card card2 mb-3 m-auto" style="max-width: 18rem;">
  <div class="card-body">
    <h2 class="card-title text-center text-dark">Tipe Kamar</h2>
  </div>
</div>
<?php
    $result = mysqli_query($koneksi, "SELECT tipe_kamar, gambar FROM kamar");
    while($row = mysqli_fetch_assoc($result)) : 
  ?>
<div class="card mb-3 m-auto text-white" style="max-width: 1500px;">
  <div class="row g-0">
    <div class="col-md-9">
      <img src="../image/kamar/<?= $row["gambar"] ?>" class="img-fluid rounded-start m-2" alt="...">
    </div>
    <div class="col-md-3">
      <div class="card-body">
        <br><br><br><br><br><br><br>
        <h1 class="card-title"><?= $row["tipe_kamar"] ?></h1>
        <br><br><br><br><br>
        <h3>Fasilitas :</h3>
        <?php
            $tipe_kamar = $row["tipe_kamar"];
            $resultFasilitas = mysqli_query($koneksi, "SELECT * FROM fasilitas_kamar WHERE tipe_kamar='$tipe_kamar'");
            while($rowFasilitas = mysqli_fetch_assoc($resultFasilitas)) :
        ?>
        <p class="card-text"><?= $rowFasilitas["nama_fasilitas"] ?></p>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>
<?php endwhile; ?>