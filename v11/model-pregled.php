<!DOCTYPE html>
<html>
    <head>
        <title>Преглед модела</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Преглед модела</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Произвођач</th>
                    <th>Модел</th>
                    <th>Година</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <?php
            // Повезивање са сервером базе података
            require ('baza-parametri.php');
            
            // Учитавање произвођача у низ индексован вредношћу ID-а
            $Proizvodjaci = array();
            $rezultat = mysqli_query($bp, 'select * from Proizvodjac');
            if (!$rezultat)
                die(mysqli_error($bp));
            while ($red = mysqli_fetch_object($rezultat))
                $Proizvodjaci[$red->ID] = $red;

            // Учитавање модела из базе
            $upit = "select * from Model";
            $rezultat = mysqli_query($bp, $upit);
            if (!$rezultat)
                die(mysqli_error($bp));

            // Приказ података
            while ($red = mysqli_fetch_object($rezultat))
            {
                echo "<tr>\n";
                echo " <td>{$red->ID}</td>\n";
                echo " <td>{$Proizvodjaci[$red->Proizvodjac_ID]->Naziv}</td>\n";
                echo " <td>{$red->Naziv}</td>\n";
                echo " <td>{$red->Godina}</td>\n";
                echo " <td>{$red->Cena}</td>\n";
                echo " <td><a href='model-izmena.php?ID={$red->ID}'>Измена</a></td>\n";
                echo " <td><a href='model-uklanjanje-db.php?ID={$red->ID}'>Уклањање</a></td>\n";
                echo "</tr>\n";
            }
            ?>
        </table>
        <hr />
        <a href="index.php">Почетна</a>
        <a href="model-dodavanje.php">Додавање новог модела</a>
    </body>
</html>