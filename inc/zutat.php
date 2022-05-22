<?php

class TZutat {
  public $Titel;
  public $Art;
  public $Einheit;
  
  public function __construct($aTitel, $aArt = 'Obst', $aEinheit='Stk') {
    $this->Titel = $aTitel;
    $this->Art = $aArt;
    $this->Einheit = $aEinheit;
  }
    
}

?>