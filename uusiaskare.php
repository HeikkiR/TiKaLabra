<?php
require 'models/Kayttaja.php';
require 'models/Askare.php';
session_start();

$nimi = $_POST['nimi'];
$kuvaus = $_POST['kuvaus'];
$user = $_SESSION['kirjautunut'];
$luokka = $_POST['luokkavalinta'];

$olio=new Askare();  
$olio->setANimi($nimi);
$olio->setKNimi($user->getTunnus());
$olio->setKuvaus($kuvaus);
if($luokka != 'luokaton') { $olio->setLuokka($luokka); }
$olio->luoAskare();
        
        header('location:muistilista.php');