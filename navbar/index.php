<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
  <div class="container-fluid">
    <a href="index.php">
      <img src="../image/navbar/hotel.png" alt="" width="60px">
    </a>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-black" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="kamar.php">Kamar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="fasilitas.php">Fasilitas</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <?php 
          session_start();
        ?>
        <?php if(@$_SESSION["status"] == "adminlogin"){ ?>
          <li class="nav-item mt-1">
            <h3>Admin</h3>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black" href="../admin/dashboard.php">Dashboard</a>
          </li>
        <?php } ?>
        <?php if(@$_SESSION["status"] == "resepsionislogin"){ ?>
          <li class="nav-item mt-1">
            <h3>Resepsionis</h3>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black" href="../resepsionis/dashboard.php">Dashboard</a>
          </li>
        <?php } ?>
        <?php if(@$_SESSION["status"] == ""){ ?>
          <li class="nav-item">
            <a class="nav-link text-black" href="login.php">Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>