<?php

class TAutor  {
  public $id;
  public $autor;
  
  public function __construct($aid=-1, $aautor = 'neu') {
    $this->id = $aid;
    $this->autor = $aautor;
  }
  
  public function print() {
    return ($this->id.": ".$this->autor);
  }
  
}
?>  