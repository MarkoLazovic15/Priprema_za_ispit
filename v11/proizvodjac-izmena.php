<!DOCTYPE html>
<html>
    <head>
        <title>Измена произвођача</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Измена произвођача</h1>
        <?php
        // Повезивање са сервером базе података
        require ('baza-parametri.php');

        // Нормализација улазних података
        $ID = (int) @$_REQUEST['ID'];

        // Учитавање података записа из базе
        $upit = "select * from Proizvodjac where ID=$ID";
        $rezultat = mysqli_query($bp, $upit);

        // Провера да ли је било грешака и да ли постоји тражени запис
        if (!$rezultat)
            die(mysqli_error($bp));
        if (mysqli_num_rows($rezultat) != 1)
            die('Не постоји произвођач са задатим ID параметром.');

        // Пребацивање резултата у објекат 'Student'
        $Proizvodjac = mysqli_fetch_object($rezultat);
        ?>
        <form action="proizvodjac-izmena-db.php" method="post">
            ID: <input type="text" name="ID" value="<?php echo $Proizvodjac->ID; ?>" readonly />
            <br />
            Назив: <input type="text" name="Naziv" value="<?php echo $Proizvodjac->Naziv; ?>" />
            <hr />
            <button type="submit">Измена</button>
        </form>
    </body>
</html>