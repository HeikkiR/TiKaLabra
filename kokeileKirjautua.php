<?php
    
        require_once 'libs/Tietokantayhteys.php';
        
        $yhteys = Tietokantayhteys::getTietokantayhteys();
        
        
        $tunnus = $_POST['ktunnus'];
        $password = $_POST['salasana'];
        
        $sql = "SELECT Salasana from Kayttaja where KayttajaNimi = '$tunnus';" ;
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql); 
        $kysely->execute();
        
 
        $ssanatesti = $kysely->fetchColumn(); 
        if ($ssanatesti === $password) {
            session_start();

            $kayttaja = $tunnus;
            $_SESSION['kirjautunut'] = $kayttaja;
        
            header('location:muistilista.php');
        }
        else {
            header('location:index.php');
        }