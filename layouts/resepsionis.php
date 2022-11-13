<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resepsionis</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../image/navbar/hotel.png">
</head>
<body>
    <?php
        include "../navbar/resepsionis.php";
        include "../DB/koneksi.php";

        session_start();

        if($_SESSION['status']!="resepsionislogin"){
            header("location:../user/login.php");
        }
    ?>

<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>