<?php

require 'models/Kayttaja.php';
require 'template.php';


session_start();
    
    if (isset($_SESSION['kirjautunut']))  {
            $user = $_SESSION['kirjautunut'];
            if(isset($_POST['uusisalasana'])) {
                $testisalasana=$_POST['vanhasalasana'];
                if($testisalasana === $user->getSalasana()) {
                    $salasana=$_POST['uusisalasana'];
                    $user->muutaSalasana($salasana);
                    $ilmoitusteksti="Salasana muuttaminen onnistui!";
                }
                else {
                    $ilmoitusteksti="Annoit väärän salasanan!";
                }
   
            }
            
            $ktunnus = $user->getTunnus();  
            require 'views/Ktietoview.php';
    }
    
    
    