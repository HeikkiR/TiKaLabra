<?php
        require 'models/Kayttaja.php';
        require 'views/kirjautumisview.php';       
        
        if(isset($_POST['ktunnus'])) {
                submitfunc();
            }
            else{}
        
            
        function submitfunc() {
            
            $tunnus = $_POST['ktunnus'];
            $password = $_POST['salasana'];
            $kayttajalista=Kayttaja::listaaKayttajat();
            
            foreach($kayttajalista as $kayttajaolio) {
                if ($kayttajaolio->getTunnus() === $tunnus) {        
                    $oikeasalasana = $kayttajaolio->getSalasana();
                }
            }
            
            if($oikeasalasana === $password) {
                        session_start();
                        $user = new Kayttaja($tunnus, $password);              
                        $_SESSION['kirjautunut'] = $user;       
                        echo 'testi';
                        header('location:muistilista.php');
            }
            else {                
                $_GET['virhe'] = 'salasana';
                $virhe = $_GET['virhe'];
                header("location:index.php?virhe=".$virhe);
            
            }
        }