<?php

// Повезивање са сервером базе података
require ('baza-parametri.php');

// Нормализација улазних података
$ID = (int) @$_POST['ID'];
$Proizvodjac_ID = (int) @$_POST['Proizvodjac_ID'];
$Naziv  = mysqli_real_escape_string($bp, @$_POST['Naziv']);
$Godina = mysqli_real_escape_string($bp, @$_POST['Godina']);
$Cena   = mysqli_real_escape_string($bp, @$_POST['Cena']);

// Измена података у бази
$upit = "update Model set Proizvodjac_ID='$Proizvodjac_ID', Naziv='$Naziv', Godina='$Godina', Cena='$Cena' where ID=$ID";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));

// Преусмеравање на почетну страницу
die(header("Location: model-pregled.php"));