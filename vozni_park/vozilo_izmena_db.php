<?php
// Повезивање са сервером базе података
require ('baza_parametri.php');
// Нормализација улазних података
$vozilo_id = (int) @$_POST['ID'];
$vozac_id = (int) @$_POST['vozac_id'];
$Proizvodjac  = mysqli_real_escape_string($bp, @$_POST['Proizvodjac']);
$Model = mysqli_real_escape_string($bp, @$_POST['Model']);
$Registracija   = mysqli_real_escape_string($bp, @$_POST['Registracija']);
// Измена података у бази
$upit = "update vozilo set vozac_id=$vozac_id, Proizvodjac='$Proizvodjac', Model='$Model',Registracija='$Registracija' where vozilo_id=$vozilo_id";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));
// Преусмеравање на почетну страницу
die(header("Location: vozila_pregled.php"));