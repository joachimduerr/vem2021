<?php

include_once('interfaces.php');
include_once('quicksort.php');

class TZutat implements IPrint ,  IArray  {
  public $Titel;
  public $Art;
  public $Einheit;
  
  public function __construct($aTitel, $aArt = 'Obst', $aEinheit='Stk') {
    $this->Titel = $aTitel;
    $this->Art = $aArt;
    $this->Einheit = $aEinheit;
  }
  
  //IPrint
  public function print() {
    echo "$this->Titel, $this->Art, $this->Einheit<BR />";
  }
  
  //IArray
  public function toarray() {
    return array( "Titel"=>$this->Titel, "Art"=>$this->Art, "Einheit"=>$this->Einheit);
  }
     
}

class TZutatListe {
  private $items;
  public function __construct() {
    $this->items = array();
  }
  public function add($azutat) {
    $this->items[] = $azutat;
  }
  public function find($afeld, $asuch) {
    foreach ($this->items as $item) {
      if ($item->toarray()[$afeld] == $asuch) {
        return $item;
      } 
    }
    return new TZutat('--','--','--');
  }
  public function sort($afield) {
    quicksort($this->items, $afield);
  }
  public function print() {
    foreach ($this->items as $item)
      $item->print();
  }
}

?>