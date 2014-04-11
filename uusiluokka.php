<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'models/Luokka.php';
session_start();

$nimi = $_POST['luokka'];

$olio=new Luokka();  
$olio->setNimi($nimi);
$olio->luoLuokkaKantaan();
        
        header('location:Luokkienhallinta.php');