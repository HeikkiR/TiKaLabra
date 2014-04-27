<?php

// to do muuta nimen perusteella poista id:n perusteella tehtäväksi

// to do:  tarkastus poistaessa ettei kaadu

require 'models/Askare.php';
require 'models/Kayttaja.php';

session_start();
$user = $_SESSION['kirjautunut'];


$id = $_POST['askareId'];

$testi = new Askare();
$lista=$testi->listaaAskareet();
        foreach($lista as $askareolio)  {
            if($askareolio->getANimi() === $id && $user->getTunnus() === $askareolio->getKNimi())
            {
                $askareolio->poistaAskareKannasta();
            }
        }
        
        header('location:muistilista.php'); 
