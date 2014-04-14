<?php



    require 'models/Luokka.php';
    require 'models/Kayttaja.php';
        
    session_start();
    
    
    $tunnus = $_POST['ktunnus'];
    $salasana = $_POST['salasana'];
    $varmistus = $_POST['varmistus'];
    
    if ($varmistus === "varmistus") {
    
    $kayttis = new kayttaja();
    $kayttis->setTunnus($tunnus);
    $kayttis->setSalasana($salasana);
    $kayttis->setEtuNimi($tunnus);
    $kayttis->setSukuNimi($tunnus);
    $kayttis->teeKayttaja();
    
    header('location:index.php');
    
    
    }
    