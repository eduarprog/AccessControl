<?php
session_start();
require_once("connection.php");

$email = $_POST["email"];
$password = $_POST["password"];

$conection = connection();

$sql = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
$resultado = $conection->query($sql);

if ($resultado->num_rows > 0) {
    $_SESSION["register"] = $email;
    header("Location: system.php");
} else {
    header("Location: login.php?error=1");
}
