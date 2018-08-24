<?php

// Повезивање са сервером базе података
require ('baza-parametri.php');

// Нормализација улазних података
$Proizvodjac_ID = (int) @$_POST['Proizvodjac_ID'];
$Naziv  = mysqli_real_escape_string($bp, @$_POST['Naziv']);
$Godina = mysqli_real_escape_string($bp, @$_POST['Godina']);
$Cena   = mysqli_real_escape_string($bp, @$_POST['Cena']);

// Унос новог записа у табелу
$upit = "insert into Model (Proizvodjac_ID, Naziv, Godina, Cena) values ($Proizvodjac_ID, '$Naziv', '$Godina', '$Cena')";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
	die(mysqli_error($bp));

// Раскид везе са сервером базе података
mysqli_close($bp);

// Преусмеравање на формулар за унос
die(header("Location: model-pregled.php"));