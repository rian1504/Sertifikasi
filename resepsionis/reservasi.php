<?php
    include "../layouts/resepsionis.php";

    $batas = 3;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;
    
    $data = mysqli_query($koneksi,"SELECT * FROM reservasi");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);

    $search = @$_POST["search"];
    $searchDate = @$_POST["searchDate"];

    if(isset($_POST["cari"])){
        $data = mysqli_query($koneksi, "SELECT * FROM reservasi WHERE nama_tamu LIKE '%$search%'");
        $rows = [];

        while($row = mysqli_fetch_array($data)){
            $rows[] = $row;
        }
    } elseif(isset($_POST["cariDate"])){
        $data = mysqli_query($koneksi, "SELECT * FROM reservasi WHERE tgl_check_in = '$searchDate'");
        $rows = [];

        while($row = mysqli_fetch_array($data)){
            $rows[] = $row;
        }
    } else{
        $data_reservasi = mysqli_query($koneksi,"SELECT * FROM reservasi LIMIT $halaman_awal, $batas");
        $rows = [];
        
        while($row = mysqli_fetch_array($data_reservasi)){
            $rows[] = $row;
        }
    }
    $nomor = $halaman_awal+1;
?>

<div class="row row-cols-1 row-cols-md-1 g-1 m-auto mt-5">
    <div class="col">
        <h1 class="text-center">Data Check In</h1>
    </div>
    <div class="col input-group">
        <form action="" method="POST">
            <input type="date" name="searchDate" id="searchDate">
            <button class="btn btn-primary" type="submit" name="cariDate">Search</button>
        </form>
        <form action="" method="POST" class="ms-auto">
            <input type="text" name="search" class="search ms-auto" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" autocomplete="off" minlength="2">
            <button class="btn btn-primary" type="submit" id="button-addon2" name="cari">Search</button>
        </form>
    </div>
    <div class="col">
        <table class="table text-center">
        <thead class="table-dark">
            <td>No</td>
            <td>Nama Pemesan</td>
            <td>Email</td>
            <td>No Handphone</td>
            <td>Nama Tamu</td>
            <td>Tipe Kamar</td>
            <td>Jumlah Kamar</td>
            <td>Status</td>
            <td>Tanggal Check In</td>
            <td>Tanggal Check Out</td>
            <td>Kode Reservasi</td>
            <td>Aksi</td>
        </thead>
        <tbody>
            <?php foreach( $rows as $row ) : ?>
            <tr>
                <td><?= $nomor++ ?></td>
                <td><?= $row["nama_pemesan"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["no_handphone"] ?></td>
                <td><?= $row["nama_tamu"] ?></td>
                <td><?= $row["tipe_kamar"] ?></td>
                <td><?= $row["jumlah_kamar"] ?></td>
                <td><?= $row["status_tamu"] ?></td>
                <td><?= $row["tgl_check_in"] ?></td>
                <td><?= $row["tgl_check_out"] ?></td>
                <td><?= $row["kode_reservasi"] ?></td>
                <td>
                    <?php if($row["status_tamu"] == ""){
                    ?>
                        <form action="proses/proses_check_in.php" method="post">
                            <input type="hidden" name="id" value="<?= $row["id_reservasi"] ?>">
                            <input type="hidden" name="halaman" value="<?= $_GET["halaman"] ?>">
                            <button type="submit" class="btn btn-info" onclick="return confirm('Check In?')">Check In</button>
                        </form>
                    <?php    
                        } 
                    ?>
                    <?php if($row["status_tamu"] == "check_in"){
                    ?>
                        <form action="proses/proses_check_out.php" method="post">
                            <input type="hidden" name="id" value="<?= $row["id_reservasi"] ?>">
                            <input type="hidden" name="halaman" value="<?= $_GET["halaman"] ?>">
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Check Out?')">Check Out</button>
                        </form>
                    <?php    
                        } 
                    ?>
                    <?php if($row["status_tamu"] == "check_out"){
                    ?>
                        <form action="proses/hapus.php" method="post">
                            <input type="hidden" name="id" value="<?= $row["id_reservasi"] ?>">
                            <input type="hidden" name="halaman" value="<?= $_GET["halaman"] ?>">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data?')">Hapus</button>
                        </form>
                    <?php    
                        } 
                    ?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
        <?php
            $a = isset($_POST["cari"]) || isset($_POST["cariDate"]);
            if($a == false){
                include "../navbar/pagination.php";
            }
         ?>
    </div>
</div>