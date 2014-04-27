<!DOCTYPE html>

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
        $luokkalista = Luokka::listaaLuokat();
        
        echo 'Lisää uusi askare:  <br> <br> Askareen nimi:';
        ?> <form action="uusiaskare.php"  method="post"> 
            <input type="text" name="nimi">
            <br>
            Askareen kuvaus: <br>
            <textarea name="kuvaus" rows="4" cols="50">   </textarea>
            <br> Valitse luokka:
            <select name="luokkavalinta">
                <option>luokaton</option>
                <?php 
                foreach($luokkalista as $luokkaolio) { ?>
                <option><?php echo $luokkaolio->getNimi()?></option>
                <?php } ?>
            </select>
            <br>
            <input type="submit" name="submit" value="Luo askare"> </form><?php
            echo '<br> <br>';
        }