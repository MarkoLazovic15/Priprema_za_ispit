<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'modeli';


$bp = mysqli_connect($server, $user, $pass, $db);
if (!$bp){
    die('Јавила се грешка при повезивању са сервером базе података.');
}