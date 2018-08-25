<?php
// Povezivanje sa serverom baze podataka
require ('baza_parametri.php');
// Normalizacija ulaznih podataka
$vozac_id = (int) @$_POST['vozac_id'];
$Proizvodjac_ID = (int) @$_POST['Proizvodjac_ID'];
$Ime  = mysqli_real_escape_string($bp, @$_POST['Ime']);
$Prezime = mysqli_real_escape_string($bp, @$_POST['Prezime']);
// Измена података у бази
$upit = "update vozac set Ime='$Ime', Prezime='$Prezime' where vozac_id=$vozac_id";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));
// Преусмеравање на почетну страницу
die(header("Location: vozaci_pregled.php"));