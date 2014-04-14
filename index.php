<?php
        require 'models/Kayttaja.php';
        require_once 'libs/Tietokantayhteys.php';
        require 'views/kirjautumisview.php';
        
        
        if(isset($_POST['ktunnus'])) {
                submitfunc();
            }
            else{}
        
            
        function submitfunc() {
        
            $yhteys = Tietokantayhteys::getTietokantayhteys();
            
            $tunnus = $_POST['ktunnus'];
            $password = $_POST['salasana'];
        
            $sql = "SELECT Salasana from Kayttaja where KayttajaNimi = '$tunnus';" ;
            $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql); 
            $kysely->execute();
 
            $ssanatesti = $kysely->fetchColumn(); 
            if ($ssanatesti === $password) {
                session_start();

                //$kayttaja = $tunnus;
                $user = new Kayttaja($tunnus, $password);
                
                $_SESSION['kirjautunut'] = $user;
        
                header('location:muistilista.php');
            }
            else {
            $_GET['virhe'] = 'salasana';
            $virhe = $_GET['virhe'];
            header("location:index.php?virhe=".$virhe);
            }
        }