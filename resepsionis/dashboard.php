<?php
    include "../layouts/resepsionis.php";

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

<h2 class="text-center ms-auto m-5">Selamat Datang Resepsionis!</h2>
<div class="row row-cols-1 row-cols-md-1 g-1 m-auto">
<a href="reservasi.php?halaman=1">
  <div class="col">
    <div class="card bg-warning">
      <img src="../image/resepsionis/reservasi.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title text-center">Data Reservasi</h4>
      </div>
    </div>
  </div>
</a>