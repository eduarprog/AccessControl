<?php

require_once "connection.php";
$connection = connection();

$nam = "";
$email = "";
$pass = "";


$sql = "SELECT * FROM register WHERE email = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    header("location: forgotpassword.php");
}

$destinatario = filter_var($email, FILTER_VALIDATE_EMAIL);
$asunto = "Correo de recuperacion $nam = {$row['nam']} ";

$carta = "Datos a continuacion; $nam = {$row['nam']}; \n";
$carta .= "Correo:  $email = {$row['email']}; \n";
$carta .= "contrasena: $pass = {$row['pass']};";

mail($destinatario, $asunto, $carta);