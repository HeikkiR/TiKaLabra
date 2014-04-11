<?php

// to do:  tarkastus poistaessa ettei kaadu

require 'models/Luokka.php';
session_start();

$nimi = $_POST['lnimi'];

$testi = new Luokka();
$lista=$testi->listaaLuokat();
        foreach($lista as $luokkaolio)  {
            if($luokkaolio->getNimi() === $nimi)
            {
                $luokkaolio->poistaLuokkaKannasta();
            }
        }
        
        header('location:Luokkienhallinta.php');