<?php
/*
Askareid SERIAL NOT NULL PRIMARY KEY, 
Askerenimi VARCHAR(64) NOT NULL, 
KayttajaNimi VARCHAR NOT NULL references Kayttaja(KayttajaNimi), 
AskareKuvaus TEXT, 
LuokkaNimi VARCHAR(64) references Luokka(LuokkaNimi) 
 */
require_once 'libs/Tietokantayhteys.php';

class Askare {

    protected $id;
    protected $askarenimi;
    protected $kayttajanimi;
    protected $kuvaus;
    protected $luokka;

    public function __construct() {

    }
    
    public function setANimi($askarenimi)  {
        $this->askarenimi = $askarenimi;
    } 
    
    public function setKNimi($kayttajanimi) {
        $this->kayttajanimi = $kayttajanimi;
    }
    
    public function setLuokka($luokka) {
        $this->luokka = $luokka;
    }
    
    public function setKuvaus($luokankuvaus) {
        $this->luokankuvaus = $luokankuvaus;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getANimi() {
        return $this->askarenimi;
    }
       
    public function getKNimi() {
        return $this->kayttajanimi;
    }
    
    public function getKuvaus() {
        return $this->kuvaus;
    }
    
    public function getLuokka() {
        return $this->luokka;
    }
    
    public function luoAskare() {
        $sql = "INSERT INTO Askare(askerenimi,kayttajanimi) VALUES(?,?)";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql);
        
        $tee = $kysely->execute(array($this->getANimi(),$this->getKNimi()));
        }
               
    public function listaaAskareet() {
        $yhteys = Tietokantayhteys::getTietokantayhteys();
        $sql = "SELECT askareid,askerenimi,kayttajanimi,askarekuvaus,luokkanimi FROM Askare";
        $kysely = Tietokantayhteys::getTietokantayhteys()->prepare($sql);
        $kysely->execute();
        
        $tulokset = array();
        foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) { 
            $askareolio = new Askare();
            $askareolio->setId($tulos->askareid);
            $askareolio->setANimi($tulos->askerenimi);
            $askareolio->setKnimi($tulos->kayttajanimi);
            $askareolio->setKuvaus($tulos->askarekuvaus);
            $askareolio->setLuokka($tulos->luokkanimi);
            
            $tulokset[] = $askareolio;
       }
        return $tulokset;
    }
}