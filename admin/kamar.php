<?php
    include "../layouts/admin.php";
    $halaman = $_GET["halaman"];
?>

<div class="row row-cols-1 row-cols-md-1 g-1 m-auto mt-5">
  <div class="col">
    <h1 class="text-center">Data Kamar</h1>
  </div>
  <?php
      if(isset($_GET['pesan'])) {
          if($_GET['pesan'] == "tambah"){
  ?>
            <div class="alert alert-success row row-cols-1 row-cols-md-2 g-1" role="alert">
              <h5 class="text-center ms-auto">Berhasil menambah data</h5>
              <button type="button" class="btn-close bg-danger ms-auto" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
  <?php
          }
  ?>
  <?php
          if($_GET['pesan'] == "hapus"){
  ?>
            <div class="alert alert-danger row row-cols-1 row-cols-md-2 g-1" role="alert">
              <h5 class="text-center ms-auto">Berhasil menghapus data</h5>
              <button type="button" class="btn-close bg-danger ms-auto" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
  <?php
          }
  ?>
  <?php
          if($_GET['pesan'] == "edit"){
  ?>
            <div class="alert alert-warning row row-cols-1 row-cols-md-2 g-1" role="alert">
              <h5 class="text-center ms-auto">Berhasil mengedit data</h5>
              <button type="button" class="btn-close bg-danger ms-auto" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
  <?php
          }
  ?>
  <?php
      }
  ?>
  <div class="col">
    <a href="tambah/tambah_kamar.php?halaman=<?= $halaman ?>" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="col">
    <table class="table text-center">
      <thead class="table-dark">
        <td>No</td>
        <td>Tipe Kamar</td>
        <td>Jumlah Kamar</td>
        <td>Gambar</td>
        <td>Aksi</td>
      </thead>
      <tbody>
        <?php
          $batas = 5;
          $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
          $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
  
          $previous = $halaman - 1;
          $next = $halaman + 1;
          
          $data = mysqli_query($koneksi,"select * from kamar");
          $jumlah_data = mysqli_num_rows($data);
          $total_halaman = ceil($jumlah_data / $batas);
  
          $data_fasilitas = mysqli_query($koneksi,"select * from kamar limit $halaman_awal, $batas");
          $nomor = $halaman_awal+1;
          while($row = mysqli_fetch_array($data_fasilitas)):
        ?>
        <tr>
          <td><?= $nomor++; ?></td>
          <td><?= $row["tipe_kamar"]; ?></td>
          <td><?= $row["jumlah_kamar"]; ?></td>
          <td><img src="../image/kamar/<?= $row["gambar"] ?>"></td>
          <td>
            <a href="edit/edit_kamar.php?id=<?= $row["id_kamar"] ?>&halaman=<?= $halaman ?>" class="btn btn-warning">Edit</a>
            <a href="hapus/hapus_kamar.php?id=<?= $row["id_kamar"] ?>&halaman=<?= $halaman ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <?php include "../navbar/pagination.php"; ?>
  </div>
</div>