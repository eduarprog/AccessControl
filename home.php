<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

require 'connection.php';
$connection = connection();

$nam = "";
$email = "";
$date1 = "";
$pass= "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET["email"])) {
        header("location: home.php");
        exit;
    }

    $email = $conection->real_escape_string($_GET["email"]);

    $sql = "SELECT * FROM productos WHERE email=?";
    $stmt = $conection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: home.php");
        exit;
    }

    $nam = htmlspecialchars($row["nam"]);
    $date1 = htmlspecialchars($row["date1"]);
    $email = htmlspecialchars($row["email"]);
    $pass = htmlspecialchars($row["pass"]);

} else {

    $email = $conection->real_escape_string($_POST["email"]);
    $nam = $conection->real_escape_string($_POST["nam"]);
    $date1 = $conection->real_escape_string($_POST["date1"]);
    $pass = $conection->real_escape_string($_POST["pass"]);

    $sql = "UPDATE productos SET nam=?, date1=?, email=?, pass=? WHERE email=?";
    $stmt = $conection->prepare($sql);
    $stmt->bind_param("sssss", $nam, $date1, $email, $pass, $email);
    $stmt->execute();

    header("location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f97fcd2c02.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Home - AccessControl</title>
    <link rel="shortcut icon" href="https://www.clipartmax.com/png/small/1-17832_home-clip-art-clipart-panda-pleasing-home-transparent-background-house-logo.png">
  </head>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">AccessControl</a>
    <div class="d-flex">
      <button class="btn" title="View account" style="color: green;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-user"></i>&nbsp;USER</button>&nbsp;
     </div>
  </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Info Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <a title="Out" style="text-decoration: none; left: 148px; position: absolute; top: 21px;" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket fa-lg" style="color: #e40c0c;"></i>&nbsp;</a>
      </div>
      <div class="modal-body">
      <form action="" method="post">
      <div data-mdb-input-init class="form-outline form-white mb-3">
        <input required placeholder="First Name" type="text" name="nam" id="typeFirstNameX" class="form-control form-control-lg" value="<?php echo $nam; ?>" />
                  </div>
                <div class="col-6">
                  <div data-mdb-input-init class="form-outline form-white mb-3">
                    <input required type="date" name="date1" id="typeLastNameX" class="form-control form-control-lg" value="<?php echo $date1; ?>" />
                  </div>
                </div>
              <div data-mdb-input-init class="form-outline form-white  mb-3">
                <input required placeholder="Email"  type="email" name="email" id="typeEmailX" class="form-control form-control-lg" value="<?php echo $email; ?>" />
              </div>
              <div  data-mdb-input-init class="form-outline form-white mb-3">
                <input required type="password" placeholder="Password" name="pass" id="contra1" class="form-control form-control-lg" value="<?php echo $pass; ?>" />
              </div>
              <hr>
              <button type="submit" title="Save" style="background-color: #34495E;" class="btn btn"><i class="fa-solid fa-floppy-disk" style="color: #f7f7f7;"></i></s></button>
        </form>
      </div>
    </div>
      </div>
    </div>
  </div>
</div>
<br>
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Access control credentials</h5>
        <p class="card-text">Keep control of your credentials.</p>
        <a href="https://edu.gcfglobal.org/en/techsavvy/password-tips/1/" class="btn btn-primary">See tips</a>
      </div>
    </div>
  </div>
  <br>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Create easy-to-remember passwords</h5>
        <p class="card-text">Don't forget that they should be easy for you, but not for someone else.</p>
        <a href="https://proton.me/blog/create-remember-strong-passwords" class="btn btn-danger">View details</a>
      </div>
    </div>
  </div>
</body>
</html>