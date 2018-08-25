<!DOCTYPE html>
<html>
    <head>
        <title>Izmena Vozaca</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Izmena Vozaca</h1> 
        <?php
        // Povezivanje sa serverom baze podataka
        require ('baza_parametri.php');
        
        // Normalizacija ulaznih podataka
        $vozac_id = (int) @$_REQUEST['ID'];
        // Ucitavanje iz baze podataka
        $upit = "select * from vozac where vozac_id=$vozac_id";
        $rezultat = mysqli_query($bp, $upit);
        //Provera da li je bilo gresaka i da li postoji trazeni zapis
        if (!$rezultat)
            die(mysqli_error($bp));
        if (mysqli_num_rows($rezultat) != 1)
            die('Ne postoji model sa ovim ID.');
        // Prebacivanje podataka iza paze u php objekat
        $vozac = mysqli_fetch_object($rezultat);
        ?>
        <form action="vozac_izmena_db.php" method="post">
            ID: <input type="text" name="vozac_id" value="<?php echo $vozac->vozac_id; ?>" readonly />
            <br />
            Ime: <input type="text" name="Ime" value="<?php echo $vozac->Ime; ?>" />
            <br />
            Prezime: <input type="text" name="Prezime" value="<?php echo $vozac->Prezime; ?>" />
            <br />
            <button type="submit">Izmena</button>
        </form>
    </body>
</html>