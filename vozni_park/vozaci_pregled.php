<!DOCTYPE html>
<html>
    <head>
        <title>Pregled Vozaca</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Pregled Vozava</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Vozac_ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                </tr>
            </thead>
            <?php
            // Povezivanje sa serverom baze podataka
            require ('baza_parametri.php');
            // Ucitavanje iz baze podataka
            $upit = "select * from vozac";
            $rezultat = mysqli_query($bp, $upit);
            if (!$rezultat)
               die(mysqli_error($bp));
            // Prikaz podataka
            while ($red = mysqli_fetch_object($rezultat))
            {
               echo "<tr>\n";
               echo " <td>{$red->vozac_id}</td>\n";
               echo " <td>{$red->Ime}</td>\n";
               echo " <td>{$red->Prezime}</td>\n";
               echo " <td><a href='vozac_izmena.php?ID={$red->vozac_id}'>Izmena</a></td>\n";
               echo " <td><a href='vozac_uklanjanje_db.php?ID={$red->vozac_id}'>Uklanjanje</a></td>\n";
               echo "</tr>\n";
            }
            
            ?>
        </table>
        <hr />
        <a href="index.php">Pocetna</a>
        <a href="vozac_dodavanje.php">Dodavanje novog Vozaca</a>
    </body>
</html>