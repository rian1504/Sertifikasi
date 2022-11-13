<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../image/navbar/hotel.png">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">

    <style>
        .btn2{
            margin-bottom: 730px;
            margin-left: 2px;
        }
    </style>
</head>
<body>
<a href="index.php" class="text-decoration-none text-white"><button class="btn btn2 btn-danger">Back</button></a>
<main class="form-signin w-100 m-auto text-center">
  <form action="../DB/login.php" method="POST" onsubmit="return validasi()">
    <img class="mb-4" src="../image/navbar/hotel.png" alt="" width="72" height="57">
    <h1 class="h1 mb-3 fw-normal">Login</h1>

    <?php
        if(isset($_GET['pesan'])) {
            if($_GET['pesan'] == "gagal_login"){
            ?>
            <div class="alert alert-danger" role="alert">
                Login gagal!
            </div>
            <?php
            }
        }
    ?>

    <div class="form-floating">
      <input type="text" class="form-control" id="username" placeholder="username" name="username" autofocus>
      <label for="username">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      <label for="password">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>
<script>
    function validasi(){
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if(username !=""&&password!=""){
            return true;
        }
        else{
            alert("Username dan Password harus diisi");
            return false;
        }
    }
</script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>