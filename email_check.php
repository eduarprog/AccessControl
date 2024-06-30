<?php
session_start();
require_once("connection.php");
require_once("authentication.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $connection = connection();

$sql = "SELECT * FROM register WHERE email = '$email'";
$stmt = $connection->prepare("SELECT * FROM register WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $_SESSION["register"] = $email;
    header("Location: authentication.php");
   } else {
    header("Location: forgotpassword.php?error=1");
   }
        $stmt->close();
        $connection->close();

    }
}

