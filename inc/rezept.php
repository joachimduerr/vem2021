<?php

class TRezept {
  protected $Titel = 'neues Rezept';
  protected $AnzahlPersonen = 4;
  protected $Dauer = 20;
  protected $Schwierigkeitsgrad = 'leicht';
  public $zutaten;
  
  public function __construct($aTitel = 'Test', $aAnzahlPersonen = 4) {
    $this->Titel = $aTitel;
    $this->AnzahlPersonen = $aAnzahlPersonen;
    $this->zutaten = array();
  }

  public function getDauer()   { return $this->Dauer; }
  public function setDauer($aDauer) { $this->Dauer = $aDauer; }
  
  public function getSchwierigkeitsgrad() { return $this->Schwierigkeitsgrad; }
  public function setSchwierigkeitsgrad($aSchwierigkeitsgrad) { 
    switch ($aSchwierigkeitsgrad) {
      case 1: $this->Schwierigkeitsgrad = 'leicht'; break; 
      case 2: $this->Schwierigkeitsgrad = 'normal'; break; 
      case 3: $this->Schwierigkeitsgrad = 'schwierig'; break; 
      case 4: $this->Schwierigkeitsgrad = 'MälzersFickkack'; break;
      default:  $this->Schwierigkeitsgrad = 'unbekannt';
    }
    
  }
    
  public function print($aAnzahl=0) {
    echo "<H1>$this->Titel</H1>";
    if ($aAnzahl<=0) { $aAnzahl=$this->AnzahlPersonen; }
    echo "Rezept für $aAnzahl Person(en)<BR />";
    echo "Dauer: $this->Dauer<BR />";
    echo "Schwierigkeitsgrad: $this->Schwierigkeitsgrad<BR />";
    echo "<H2>Zutaten</H2>";
    foreach ($this->zutaten as $zutat) {
      echo ($aAnzahl*$zutat[1]/$this->AnzahlPersonen)." ".$zutat[0]->Einheit." ".$zutat[0]->Titel."<BR />"; 
    }
    
  }
  
  public function addzutat($azutat, $amenge) {
    $this->zutaten[] = array($azutat, $amenge);
  }

}

?>