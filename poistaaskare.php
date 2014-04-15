<?php

// to do muuta nimen perusteella poista id:n perusteella tehtäväksi

// to do:  tarkastus poistaessa ettei kaadu

require 'models/Askare.php';
session_start();

$id = $_POST['askareId'];

$testi = new Askare();
$lista=$testi->listaaAskareet();
        foreach($lista as $askareolio)  {
            if($askareolio->getANimi() === $id)
            {
                $askareolio->poistaAskareKannasta();
            }
        }
        
        header('location:muistilista.php'); 
