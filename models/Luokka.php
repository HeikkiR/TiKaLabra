<?php
require_once 'libs/Tietokantayhteys.php';

class Luokka {
    protected $luokkanimi;
    protected $yliluokka;
    protected $luokankuvaus;

    
    public function __construct() {
    //   $yliluokka = "{NULL}";// $this->luokkanimi = $luokkanimi;
    //   $luokkakuvaus = "{NULL}";
    //   $empty = "{NULL}";
    }
    
    public function luoLuokkaKantaan() {
        $sql = "INSERT INTO Luokka(luokkanimi,luokkakuvaus) VALUES(?,?)";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql);
        

        $tee = $kysely->execute(array($this->getNimi(),$this->getKuvaus()));

        }
        

    
    public function setNimi($luokkanimi) {
        $this->luokkanimi = $luokkanimi;
    }
    
    public function setYliluokka($yliluokka) {
        $this->yliluokka = $yliluokka;
    }
    
    public function setKuvaus($luokankuvaus) {
        $this->luokankuvaus = $luokankuvaus;
    }
    
    public function listaaLuokat() {
        $yhteys = Tietokantayhteys::getTietokantayhteys();
        $sql = "SELECT LuokkaNimi,YliLuokka,LuokkaKuvaus FROM Luokka";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        
        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) { 
            $luokkis = new Luokka();
            $luokkis->setNimi($tulos->luokkanimi);
            $luokkis->setYliLuokka($tulos->yliluokka);
            $luokkis->setKuvaus($tulos->luokkakuvaus);
            
            $tulokset[] = $luokkis;
       }
        return $tulokset;
    }
    
    public function muutaKuvaus($kuvaus) {
        $sql = "UPDATE luokka SET luokkakuvaus = ? WHERE luokkanimi = ?";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql);
        
        $tee = $kysely->execute(array($kuvaus,$this->getNimi()));
        
        //$tee = $kysely->execute(array($this->getKuvaus(),$this->getNimi()));                
    }
    
    public function muutayliLuokka() {
        $sql = "UPDATE luokka SET yliluokka = ? WHERE luokkanimi = ?";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql);
        
        $tee = $kysely->execute(array($this->getYliluokka(),$this->getNimi()));
    
    }
    
    public function poistaLuokkaKannasta() {
        $sql = "DELETE FROM Luokka WHERE luokkanimi = ?";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql);
        
        $tee = $kysely->execute(array($this->getNimi()));
    }
    
    public function getYliluokka() {
        return $this->yliluokka;
    }
    
    public function getNimi() {
        return $this->luokkanimi;
    }
    
    public function getKuvaus() {
        return $this->luokankuvaus;
    }

}
