<?php
// Повезивање са сервером базе података
require ('baza_parametri.php');
// Нормализација улазних података
$vozac_id = (int) @$_REQUEST['ID'];
// Уклањање захтеваног слога
$upit = "delete from vozac where vozac_id=$vozac_id";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat)
    die(mysqli_error($bp));
// Преусмеравање на почетну страницу
die(header("Location: vozaci_pregled.php"));