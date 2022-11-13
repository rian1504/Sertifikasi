<link rel="stylesheet" href="../css/sidebar.css">

<style>
  img{
    width: 30px;
    height: 30px;
  }
</style>

<main class="d-flex flex-nowrap">

  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-primary" style="width: 250px; height: 1000px;">
    <a href="dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <img src="../image/admin/dashboard.png" alt="">
      <span class="fs-4">Home</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="kamar.php?halaman=1" class="nav-link text-white">
          <img src="../image/admin/kamar.png" alt="">
          Kamar
        </a>
      </li>
      <li>
        <a href="fasilitas_kamar.php?halaman=1" class="nav-link text-white">
          <img src="../image/admin/fasilitas_kamar.png" alt="">
          Fasilitas Kamar
        </a>
      </li>
      <li>
        <a href="fasilitas_hotel.php?halaman=1" class="nav-link text-white">
          <img src="../image/admin/fasilitas_hotel.png" alt="">
          Fasilitas Hotel
        </a>
      </li>
      <br><br>
      <a href="../DB/logout.php" class="btn btn-danger">Logout</a>
    </ul>
  </div>