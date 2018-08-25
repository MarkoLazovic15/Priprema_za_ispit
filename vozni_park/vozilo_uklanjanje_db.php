<?php
// Повезивање са сервером базе података
require ('baza_parametri.php');
// Нормализација улазних података
$vozilo_id = (int) @$_REQUEST['ID'];
// Уклањање захтеваног слога
$upit = "delete from vozilo where vozilo_id=$vozilo_id";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));
// Преусмеравање на почетну страницу
die(header("Location: vozila_pregled.php"));