<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'models/Luokka.php';
require_once 'libs/Tietokantayhteys.php';
session_start();

$nimi = $_POST['lnimi'];
$kuvaus = $_POST['kuvaus'];
$testi = new Luokka();
$lista=$testi->listaaLuokat();
        foreach($lista as $luokkaolio)  {
            if($luokkaolio->getNimi() === $nimi)
            {
                $luokkaolio->muutaKuvaus($kuvaus);
            }
        }
        
        header('location:Luokkienhallinta.php');