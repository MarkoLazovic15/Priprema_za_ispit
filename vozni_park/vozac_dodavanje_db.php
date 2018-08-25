<?php
// Povezivanje sa bazom podataka
require ('baza_parametri.php');
// Normalizacija ulaznih podataka
$Ime   = mysqli_real_escape_string($bp, @$_POST['Ime']);
$Prezime   = mysqli_real_escape_string($bp, @$_POST['Prezime']);
// Unos novog zapisa u tabelu
$upit = "insert into vozac (Ime, Prezime) values ('$Ime', '$Prezime')";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
	die(mysqli_error($bp));
// Raskid veza sa bazom podataka
mysqli_close($bp);
// Preusmeravanje na formular za unos
die(header("Location: vozaci_pregled.php"));