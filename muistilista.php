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
    
        
        <?php
        require 'models/Luokka.php';
        require 'models/Kayttaja.php';
        require 'models/Askare.php';
        
        session_start();
        if (isset($_SESSION['kirjautunut']))  {
            
            $user = $_SESSION['kirjautunut'];
        
        require('template.php');     
        require_once 'libs/Tietokantayhteys.php';
        
        
        $user = $_SESSION['kirjautunut'];

        $lista=Askare::listaaAskareet();
        foreach($lista as $askareolio)  { ?>
            <li><?php 
           $nimi = $askareolio->getANimi();
           if ($user->getTunnus() === $askareolio->getKNimi()) {
            echo "<td><a href='#".$askareolio->getANimi()."' class=\"class2\">".$askareolio->getANimi()."</a></td>";
           }
            ?> </li> <br> <?php } 
        
        }
        
        

   else {
       header('location:index.php');
   }
         ?>
        
        
    </body>
</html>
