<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'vozni_park';
$bp = mysqli_connect($server, $user, $pass, $db);
if (!$bp){
    die('Greska pri povezivanju sa bazom!');
}