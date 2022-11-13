<?php
    include "../layouts/admin.php";

    include "../DB/koneksi.php";
?>

<style>
    .card img{
        width: 100px;
        height: 100px;
        margin: auto;
    }
    .row a{
        text-decoration: none;
        color: black;
    }
</style>

<h2 class="text-center ms-auto m-5">Selamat Datang Admin!</h2>
<div class="row row-cols-1 row-cols-md-2 g-3 m-auto">
<a href="kamar.php?halaman=1">
  <div class="col">
    <div class="card bg-warning">
      <img src="../image/admin/kamar.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title text-center">Data Kamar</h4>
      </div>
    </div>
  </div>
</a>
<a href="fasilitas_kamar.php?halaman=1">
  <div class="col">
    <div class="card bg-warning">
      <img src="../image/admin/fasilitas_kamar.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title text-center">Data Fasilitas Kamar</h4>
      </div>
    </div>
  </div>
</a>
<a href="fasilitas_hotel.php?halaman=1" class="m-auto">
  <div class="col mt-3">
    <div class="card bg-warning">
      <img src="../image/admin/fasilitas_hotel.png" class="card-img-top mt-3" alt="...">
      <div class="card-body">
        <h4 class="card-title text-center">Data Fasilitas Hotel</h4>
      </div>
    </div>
  </div>
</div>
</a>