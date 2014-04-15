<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    
        
        <?php
        require 'models/Luokka.php';
        require 'models/Kayttaja.php';
        require 'models/Askare.php';
        
        session_start();
        if (isset($_SESSION['kirjautunut']))  {
            
            $user = $_SESSION['kirjautunut'];
        
        require('template.php');     
        require_once 'libs/Tietokantayhteys.php';
        
        
        $user = $_SESSION['kirjautunut'];

        
         echo 'Lisää uusi askare:  <br> <br> Askareen nimi:';
        ?> <form action="uusiaskare.php"  method="post"> 
        <input type="text" name="nimi">
        <br>
        Askareen kuvaus: <br>
        <textarea name="kuvaus" rows="4" cols="50">   </textarea>
        <br>
        <select>
            <option>luokka1</option>
            <option>luokka2</option>
            <option>luokka3</option>
        </select>
        
        <br>
        
        <input type="submit" name="submit" value="Luo askare"> <?php
        echo '<br> <br>';
       
        }