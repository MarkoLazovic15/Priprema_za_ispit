<!DOCTYPE html>
<html>
    <head>
        <title>Izmena Vozila</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Izmena Vozila</h1> 
        <?php
        // Повезивање са сервером базе података
        require ('baza_parametri.php');
        
        // Нормализација улазних података
        $vozilo_id = (int) @$_REQUEST['ID'];
        // Учитавање података записа из базе
        $upit = "select * from vozilo where vozilo_id=$vozilo_id";
        $rezultat = mysqli_query($bp, $upit);
        // Провера да ли је било грешака и да ли постоји тражени запис
        if (!$rezultat)
            die(mysqli_error($bp));
        if (mysqli_num_rows($rezultat) != 1)
            die('Не постоји модел са задатим ID параметром.');
        // Пребацивање резултата из базе у PHP објекат
        $Vozilo = mysqli_fetch_object($rezultat);
        ?>
        <form action="vozilo_izmena_db.php" method="post">
            vozilo_id: <input type="text" name="ID" value="<?php echo $Vozilo->vozilo_id; ?>" readonly />
            <br />
            vozac:
            <select name="vozac_id">
            <?php
            // Повезивање са сервером базе података
            require ('baza_parametri.php');
            
            // Учитавање података из базе
            $upit = "select * from vozac";
            $rezultat = mysqli_query($bp, $upit);
            if (!$rezultat)
                die(mysqli_error($bp));
            
            // Приказ података
            while ($red = mysqli_fetch_object($rezultat))
            {
                if ($Vozilo->vozac_id == $red->vozac_id)
                    echo "<option value='{$red->vozac_id}' selected>{$red->Ime}</option>\n";
                else
                    echo "<option value='{$red->vozac_id}'>{$red->Ime}</option>\n";
            }
            ?>
            </select>
            <br />
            Proizvodjac: <input type="text" name="Proizvodjac" value="<?php echo $Vozilo->Proizvodjac; ?>" />
            <br />
            Model: <input type="text" name="Model" value="<?php echo $Vozilo->Model; ?>" />
            <br />
            Registracija: <input type="text" name="Registracija" value="<?php echo $Vozilo->Registracija; ?>" />
            <hr />
            <button type="submit">Izmena</button>
        </form>
    </body>
</html>