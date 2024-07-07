<?php
session_start();
require_once("connection.php");

$email = $_POST["email"];
$pass = $_POST["pass"];

$conection = connection();

$sql = "SELECT * FROM register WHERE email = '$email' AND pass = '$pass'";
$resultado = $conection->query($sql);

if ($resultado->num_rows > 0) {
    $_SESSION["user"] = $email;
    header("Location: system.php");
} else {
    header("Location: login.php?error=1");
}
