<?php

require_once "connection.php";
$connection = connection();

$name = "";
$usuario = "";
$contraseña = "";


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
$asunto = "Correo de recuperacion $name = {$row['name']} ";

$carta = "Datos a continuacion; $name = {$row['name']}; \n";
$carta .= "Correo:  $email = {$row['email']}; \n";
$carta .= "contrasena: $contraseña = {$row['contraseña']};";

mail($destinatario, $asunto, $carta);