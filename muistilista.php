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
        <?php
        require('template.php');
        ?>
       <?php
       
        require_once 'Tietokantayhteys.php';
        
        $yhteys = Tietokantayhteys::getTietokantayhteys();
        
        $sql = "SELECT Etunimi from Kayttaja";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql); 
        $kysely->execute();
        
        $id = $kysely->fetchColumn(); //Hakee oletuksena ensimmäisen sarakkeen
        echo $id;

         ?>
        loppu
    </body>
</html>
