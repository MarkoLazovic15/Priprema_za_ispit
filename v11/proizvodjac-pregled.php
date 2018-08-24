<!DOCTYPE html>
<html>
    <head>
        <title>Преглед</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Преглед произвођача</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Назив</th>
                </tr>
            </thead>
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
               echo "<tr>\n";
               echo " <td>{$red->ID}</td>\n";
               echo " <td>{$red->Naziv}</td>\n";
               echo " <td><a href='proizvodjac-izmena.php?ID={$red->ID}'>Измена</a></td>\n";
               echo " <td><a href='proizvodjac-uklanjanje-db.php?ID={$red->ID}'>Уклањање</a></td>\n";
               echo "</tr>\n";
            }
            
            ?>
        </table>
        <hr />
        <a href="index.php">Почетна</a>
        <a href="proizvodjac-dodavanje.php">Додавање новог произвођача</a>
    </body>
</html>