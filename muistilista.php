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

        echo 'Askareet satunnaisessa järjestyksessä: <br> <br>';
        
        $lista=Askare::listaaAskareet();
        foreach($lista as $askareolio)  { ?>
            <li><?php 
           $nimi = $askareolio->getANimi();
           if ($user->getTunnus() === $askareolio->getKNimi()) {
            echo "<td><a href='#".$askareolio->getANimi()."' class=\"class2\">".$askareolio->getANimi()."</a></td>";
           
            ?> </li>  
                
            
            <form action="poistaaskare.php"  method="post"> 
                <input type="hidden" name="askareId" value="<?php echo $askareolio->getANimi();?>"> 
                <input type="submit" name="poista" id="button" value="Poista" /> </form>
            
            <form action="askarepaivtys.php"  method="post"> 
                 <input type="hidden" name="animi" value="<?php echo $nimi;?>"> 
                <textarea name="kuvaus" rows="4" cols="50"><?php echo $askareolio->getKuvaus();?></textarea>'
                
                <input type="submit" name="Paivita" id="button" value="Päivitä" />
                </form>  <br>
                
                
                
                
                <?php } 
        
        }
        
        
        }
   else {
       header('location:index.php');
   }
         ?>
        
        
    </body>
</html>
