<?php

// Повезивање са сервером базе података
require ('baza-parametri.php');

// Нормализација улазних података
$ID = (int) @$_REQUEST['ID'];

// Уклањање захтеваног слога
$upit = "delete from Proizvodjac where ID=$ID";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

// Преусмеравање на почетну страницу
die(header("Location: proizvodjac-pregled.php"));