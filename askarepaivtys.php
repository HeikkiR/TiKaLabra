<?php

require 'models/Askare.php';
session_start();

$nimi = $_POST['animi'];
$kuvaus = $_POST['kuvaus'];
$testi = new Askare();
$lista=$testi->listaaAskareet();
        foreach($lista as $olio)  {
            if($olio->getANimi() === $nimi)
            {
                $olio->muutaKuvaus($kuvaus);
            }
        }
        
        header('location:muistilista.php');