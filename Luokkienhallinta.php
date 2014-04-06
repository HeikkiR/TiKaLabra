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
       
     $apuluokka = new Luokka();
     $lista=Luokka::listaaLuokat();
     print_r($lista);
  echo 'Luokat:';
  echo $lista[0]->getNimi();
    foreach($lista as $luokkaolio) {
        echo $luokkaolio->getNimi(); 
        }
    }