<!DOCTYPE html> 
<html> 
    <head> 
        <title>Додавање модела</title> 
        <meta charset="UTF-8"> 
    </head>
    <body> 
        <h1>Додавање модела</h1> 
        <form action="model-dodavanje-db.php" method="post">
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
                echo "<option value='{$red->ID}'>{$red->Naziv}</option>\n";
            }
            ?>
            </select>
            <br />
            Назив: <input type="text" name="Naziv" />
            <br />
            Година: <input type="text" name="Godina" />
            <br />
            Цена: <input type="text" name="Cena" />
            <hr /> 
            <button type="submit">Додавање</button> 
        </form> 
    </body> 
</html>