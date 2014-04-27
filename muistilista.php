<!DOCTYPE html>
<!--
Näyttää askareet ja tarjoaa perus työkalut niiden muokkauksee. 
Valitettavan rumaa koodia. Tässä periaatteessa controller ja view samassa.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>


    <?php
    require 'models/Luokka.php';
    require 'models/Kayttaja.php';
    require 'models/Askare.php';

    session_start();
    if (isset($_SESSION['kirjautunut'])) {
        $user = $_SESSION['kirjautunut'];
        require('template.php');
        require_once 'libs/Tietokantayhteys.php';
        $user = $_SESSION['kirjautunut'];

// Seuraava if-else lause valitsee järjestyksen. Html-koodia seassa.
        $jarjestys = $_POST['jarjestys'];
        if ($jarjestys === 'luokka') {
            echo 'Askareet järjestettynä luokittain ';
            $lista = Askare::listaaAskareetLuokittain();
            ?>
            <form action="muistilista.php" method="post">
                <input type="hidden" name="jarjestys" value="aakkos">
                <input type="submit" name="jarsubmit" value="Järjestä nimen mukaan"/>
            </form>           
            <?php
        }
         else {
            echo 'Askareet aakkosjärjestyksessä:';
            $lista = Askare::listaaAskareet();
            ?>
            <form action="muistilista.php" method="post">
                  <input type="hidden" name="jarjestys" value="luokka">
                <input type="submit" name="jarsubmit" value="Järjestä luokittain"/>
            </form>
            <?php
        }
        echo'<br> <br>';

// Seuraava foreach hakee käyttäjän askareiden tiedot modelista ja näyttää ne, sekä tarjoaa muokkaus mahdollisuudet.
        foreach ($lista as $askareolio) {
            ?>
            <li><?php
                $nimi = $askareolio->getANimi();
                if ($user->getTunnus() === $askareolio->getKNimi()) {
                    echo "<td><a href='#" . $askareolio->getANimi() . "' class=\"class2\">" . $askareolio->getANimi() . "</a></td>";
                    ?> </li>  

                <form action="poistaaskare.php"  method="post"> 
                    <input type="hidden" name="askareId" value="<?php echo $askareolio->getANimi(); ?>"> 
                    <input type="submit" name="poista" id="button" value="Poista" /> </form>

            <?php echo 'Askareen luokka: ' . $askareolio->getLuokka(); ?>

                <form action="askarepaivtys.php"  method="post"> 
                    <input type="hidden" name="animi" value="<?php echo $nimi; ?>"> 
                    <textarea name="kuvaus" rows="4" cols="50"><?php echo $askareolio->getKuvaus(); ?></textarea>'
                    <input type="submit" name="Paivita" id="button" value="Päivitä" />
                </form>  <br>
                <?php
            }
        }
    } else {
        header('location:index.php');
    }
    ?>


</body>
</html>
