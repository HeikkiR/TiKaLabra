<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        alku
       <?php
        function getTietokantayhteys() {
            static $yhteys = null; //Muuttuja, jonka sisältö säilyy getTietokantayhteys-kutsujen välillä.

            if ($yhteys === null) { 
                //Tämä koodi suoritetaan vain kerran, sillä seuraavilla 
                //funktion suorituskerroilla $yhteys-muuttujassa on sisältöä.
                $yhteys = new PDO('pgsql:');
            $yhteys->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }

            return $yhteys;
        }
        
        $yhteys = getTietokantayhteys();
        
        $sql = "SELECT Etunimi from Kayttaja";
        $kysely = getTietokantayhteys()->prepare($sql); 
        $kysely->execute();
        
        $id = $kysely->fetchColumn(); //Hakee oletuksena ensimmäisen sarakkeen
        echo $id;

         ?>
        loppu
    </body>
</html>
