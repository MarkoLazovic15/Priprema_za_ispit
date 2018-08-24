<?php

// Повезивање са сервером базе података
require ('baza-parametri.php');

// Нормализација улазних података
$Naziv   = mysqli_real_escape_string($bp, @$_POST['Naziv']);

// Унос новог записа у табелу
$upit = "insert into Proizvodjac (Naziv) values ('$Naziv')";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
	die(mysqli_error($bp));

// Раскид везе са сервером базе података
mysqli_close($bp);

// Преусмеравање на формулар за унос
die(header("Location: proizvodjac-pregled.php"));