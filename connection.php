<?php
                //Conexion a puerto y base de datos
function connection() 
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'users';

    $connection=mysqli_connect($host,$user,$pass,$db);

    return $connection;
}





