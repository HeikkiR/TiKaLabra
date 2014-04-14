
<?php

require_once 'libs/Tietokantayhteys.php';

class Kayttaja {
  
  protected $tunnus;
  protected $salasana;
  protected $etunimi;
  protected $sukunimi;
  protected $sysop;

  public function __contruct() {
      
}
  
  public function __construct($tunnus, $salasana) {
    $this->tunnus = $tunnus;
    $this->salasana = $salasana;
  }
  
  public function setSalasana($salasana) {
      $this->salasana = $salasana;
  }
  
  public function getSalasana() {
      return $this->salasana;
  }
  
  public function getTunnus() {
      return $this->tunnus;
  }
  
  public function setTunnus($tunnus) {
      $this->tunnus=$tunnus;
  }
  
  public function getEtuNimi() {
      return $this->etunimi;
  }
  
  public function setEtuNimi($etunimi) {
      $this->etunimi=$etunimi;
  }
  
  public function getSukuNimi() {
      return $this->sukunimi;
  }
  
  public function setSukuNimi($sukunimi) {
      $this->sukunimi=$sukunimi;
  }
  
  public function getSysop() {
      return $this->sysop;
  }
 
  public function setSysop() {
      return $this->sysop;
  }

  public function listaaKayttajat() {
        $yhteys = Tietokantayhteys::getTietokantayhteys();
        $sql = "SELECT Kayttajanimi,salasana,etunimi,sukunimi,sysop FROM Kayttaja";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        
        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) { 
            $kayttaja = new Kayttaja();
            $kayttaja->setTunnus($tulos->kayttajanimi);
            $kayttaja->setSalasana($tulos->salasana);
            $kayttaja->setEtuNimi($tulos->etunimi);
            $kayttaja->setSukuNimi($tulos->sukunimi);
            $kayttaja->setSysop($tulos->sysop);         
            $tulokset[] = $kayttaja;
       }
        return $tulokset;
    }
    
    public function poistaKayttaja() {
        $sql = "DELETE FROM Kayttaja WHERE kayttajanimi = ?";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql);
        
        $tee = $kysely->execute(array($this->getTunnus()));
    }
    
    public function muutaSalasana($uusiSalasana) {
        $sql = "UPDATE Kayttaja SET salasana = ? WHERE Kayttajanimi = ?";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql);
        
        $tee = $kysely->execute(array($uusiSalasana,$this->getTunnus()));               
    }
    
    public function teeKayttaja() {
        $sql = "INSERT INTO Kayttaja(kayttajanimi,salasana,etunimi,sukunimi) VALUES(?,?,?,?)";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql);
        
        $tee = $kysely->execute(array($this->getTunnus(),$this->getSalasana(),$this->getEtuNimi(),$this->getSukuNimi()));
    }
    
  }
