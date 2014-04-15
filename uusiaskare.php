<?php
require 'models/Kayttaja.php';
require 'models/Askare.php';
session_start();

$nimi = $_POST['nimi'];
$kuvaus = $_POST['kuvaus'];
$user = $_SESSION['kirjautunut'];

$olio=new Askare();  
$olio->setANimi($nimi);
$olio->setKNimi($user->getTunnus());
$olio->setKuvaus($kuvaus);
$olio->luoAskare();
        
        header('location:muistilista.php');