<!DOCTYPE html> 
<html> 
    <head> 
        <title>Dodavanje vozila</title> 
        <meta charset="UTF-8"> 
    </head>
    <body> 
        <h1>Dodavanje vozila</h1>
        <form action="vozilo_dodavanje_db.php" method="post"> 
            Proizvodjac: <input type="text" name="Proizvodjac" />
            </br>
            Model: <input type="text" name="Model" />
            </br>
            Registracija: <input type="text" name="Registracija" />
            </br>
            Vozac: <select name="vozac_id">
            </br>
            <?php
            //Povezivanje sa serverom baze podataka
            require ('baza_parametri.php');
            
            //Ucitavanje podataka iz baze
            $upit = "select * from vozac";
            $rezultat = mysqli_query($bp, $upit);
            if (!$rezultat){
                die(mysqli_error($bp));
            }
            // Prikaz podataka
            while ($red = mysqli_fetch_object($rezultat))
            {
                echo "<option value='{$red->vozac_id}'>{$red->Ime}</option>\n";
            }
            ?>
            </select>
            </br>
           <button type="submit">Dodavanje</button>
        </form> 
    </body> 
</html>