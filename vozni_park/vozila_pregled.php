<!DOCTYPE html>
<html>
    <head>
        <title>Pregled Vozila</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Pregled Vozila</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proizvodjac</th>
                    <th>Model</th>
                    <th>Registracija</th>
                    <th>Vozac ID</th>
                </tr>
            </thead>
            <?php
            // Povezivanje sa serverom baze podataka
            require ('baza_parametri.php');
            // Ucitavanje iz baze podataka
            $upit = "select * from vozilo";
            $rezultat = mysqli_query($bp, $upit);
            if (!$rezultat)
               die(mysqli_error($bp));
            // Prikaz podataka
            while ($red = mysqli_fetch_object($rezultat))
            {
               echo "<tr>\n";
               echo " <td>{$red->vozilo_id}</td>\n";
               echo " <td>{$red->Proizvodjac}</td>\n";
               echo " <td>{$red->Model}</td>\n";
               echo " <td>{$red->Registracija}</td>\n";
               echo " <td>{$red->vozac_id}</td>\n";
               echo " <td><a href='vozilo_izmena.php?ID={$red->vozilo_id}'>Izmena</a></td>\n";
               echo " <td><a href='vozilo_uklanjanje_db.php?ID={$red->vozilo_id}'>Uklanjanje</a></td>\n";
               echo "</tr>\n";
            }
            
            ?>
        </table>
        <hr />
        <a href="index.php">Pocetna</a>
        <a href="vozilo_dodavanje.php">Dodavanje novog Vozila</a>
    </body>
</html>