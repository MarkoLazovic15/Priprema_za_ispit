<?php
// Povezivanje sa bazom podataka
require ('baza_parametri.php');
// Normalizacija ulaznih podataka
$Proizvodjac   	= mysqli_real_escape_string($bp, @$_POST['Proizvodjac']);
$Model   		= mysqli_real_escape_string($bp, @$_POST['Model']);
$Registracija   = mysqli_real_escape_string($bp, @$_POST['Registracija']);
$vozac_id = (int) @$_POST['vozac_id'];
// Unos novog zapisa u tabelu
$upit = "insert into vozilo (Proizvodjac, Model, Registracija, vozac_id) values ('$Proizvodjac', '$Model', '$Registracija', $vozac_id)";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
	die(mysqli_error($bp));
// Raskid veza sa bazom podataka
mysqli_close($bp);
// Preusmeravanje na formular za unos
die(header("Location: vozila_pregled.php"));