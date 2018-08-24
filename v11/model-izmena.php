<!DOCTYPE html>
<html>
    <head>
        <title>Измена модела</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Измена модела</h1> 
        <?php
        // Повезивање са сервером базе података
        require ('baza-parametri.php');
        
        // Нормализација улазних података
        $ID = (int) @$_REQUEST['ID'];

        // Учитавање података записа из базе
        $upit = "select * from Model where ID=$ID";
        $rezultat = mysqli_query($bp, $upit);

        // Провера да ли је било грешака и да ли постоји тражени запис
        if (!$rezultat)
            die(mysqli_error($bp));
        if (mysqli_num_rows($rezultat) != 1)
            die('Не постоји модел са задатим ID параметром.');

        // Пребацивање резултата из базе у PHP објекат
        $Model = mysqli_fetch_object($rezultat);
        ?>
        <form action="model-izmena-db.php" method="post">
            ID: <input type="text" name="ID" value="<?php echo $Model->ID; ?>" readonly />
            <br />
            Произвођач:
            <select name="Proizvodjac_ID">
            <?php
            // Повезивање са сервером базе података
            require ('baza-parametri.php');
            
            // Учитавање података из базе
            $upit = "select * from Proizvodjac";
            $rezultat = mysqli_query($bp, $upit);
            if (!$rezultat)
                die(mysqli_error($bp));
            
            // Приказ података
            while ($red = mysqli_fetch_object($rezultat))
            {
                if ($Model->Proizvodjac_ID == $red->ID)
                    echo "<option value='{$red->ID}' selected>{$red->Naziv}</option>\n";
                else
                    echo "<option value='{$red->ID}'>{$red->Naziv}</option>\n";
            }
            ?>
            </select>
            <br />
            Назив: <input type="text" name="Naziv" value="<?php echo $Model->Naziv; ?>" />
            <br />
            Година: <input type="text" name="Godina" value="<?php echo $Model->Godina; ?>" />
            <br />
            Цена: <input type="text" name="Cena" value="<?php echo $Model->Cena; ?>" />
            <hr />
            <button type="submit">Измена</button>
        </form>
    </body>
</html>