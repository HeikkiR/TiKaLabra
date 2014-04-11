<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

<?php

    require 'models/Luokka.php';
    require 'models/Kayttaja.php';
        
    session_start();
    
    if (isset($_SESSION['kirjautunut']))  {
            $user = $_SESSION['kirjautunut'];
        
    require('template.php');
            
    require_once 'libs/Tietokantayhteys.php';
    
    echo 'Lisää uusi luokka:  <br>';
    ?> <form action="uusiluokka.php"  method="post"> 
        <input type="text" name="luokka">
        <input type="submit" name="submit" value="Luo nimellä"> <?php
       echo '<br> <br>';
       
        $lista=Luokka::listaaLuokat();
        foreach($lista as $luokkaolio)  { ?>
            <li><?php 
           $nimi = $luokkaolio->getNimi();
            
         //   header("location:index.php?virhe=".$virhe);
            
            
            echo "<td><a href='#".$luokkaolio->getNimi()."' class=\"class2\">".$luokkaolio->getNimi()."</a></td>";
    
            ?> </li>  
            <form action="poistaluokka.php"  method="post"> 
                <input type="hidden" name="lnimi" value="<?php echo $nimi;?>"> 
                <input type="submit" name="poista" id="button" value="Poista" /> </form>
            
            <form action="luokanpaivitus.php"  method="post"> 
                 <input type="hidden" name="lnimi" value="<?php echo $nimi;?>"> 
                <textarea name="kuvaus" rows="4" cols="50"><?php echo $luokkaolio->getKuvaus();?></textarea>'
                
                <input type="submit" name="Paivita" id="button" value="Päivitä" />
                </form>  <br>
    <?php
    
        } 
 
    }
    
    
    else {
        header('location:index.php');
    }
    
