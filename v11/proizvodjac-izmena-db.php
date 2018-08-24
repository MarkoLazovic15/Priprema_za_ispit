<?php

// Повезивање са сервером базе података
require ('baza-parametri.php');

// Нормализација улазних података
$ID = (int) @$_REQUEST['ID'];
$Naziv  = mysqli_real_escape_string($bp, @$_POST['Naziv']);

// Измена података у бази
$upit = "update Proizvodjac set Naziv='$Naziv' where ID=$ID";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

// Преусмеравање на почетну страницу
die(header("Location: proizvodjac-pregled.php"));