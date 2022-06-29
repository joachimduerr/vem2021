<?php
  
class TZutat {
  public $id;
  public $einheit;
  public $zutat;
  public $art;
    
  //id einheit zutat
  
  public function __construct($aid=-1, $azutat='neue Zutat', $aart = 'Obst', $aeinheit='kg') {
    $this->id = $aid;
    $this->einheit = $aeinheit;
    $this->zutat = $azutat;
    $this->art = $aart;
  }
}

?>