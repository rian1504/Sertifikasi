<?php
    include "../DB/koneksi.php";;
    include "../layouts/main.php";
?>
<style>
body{
    background-color: beige;
}
.card-img{
  width: 75%;
}
.card2{
  background-color: grey;
}
</style>

<div class="card text-bg-dark mb-3 m-auto" style="max-width: 18rem;">
  <div class="card-body">
    <h2 class="card-title text-center">Fasilitas Hotel</h2>
  </div>
</div>
<div class="row row-cols-1 row-cols-md-2 g-4 w-75 h-75 m-auto mb-3 card2">
  <?php
    $result = mysqli_query($koneksi, "select * from fasilitas_hotel");
    while($row = mysqli_fetch_assoc($result)) : 
  ?>
    <div class="col">
      <div class="card mb-3">
        <img src="../image/fasilitas_hotel/<?= $row["gambar"] ?>" class="card-img-top w-75 mt-2 m-auto" alt="<?= $row["nama_fasilitas"] ?>">
        <div class="card-body m-auto">
          <h2 class="card-title text-center"><?= $row["nama_fasilitas"] ?></h2>
          <p class="card-text"><?= $row["keterangan"] ?></p>
        </div>
      </div>
    </div>
  <?php endwhile ?>