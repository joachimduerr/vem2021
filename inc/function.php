<?php

include_once("interfaces.php");

function printarray($a) {
  foreach ($a as $key=>$value) {
    if (is_object($value) && ($value instanceof IPrint)) {
      echo "$key => ";
      $value->print();
    } else {
      echo "$key => $value<BR />";
    }
  }
}

function tausche(&$links, &$rechts){
  $tmp    = $links;
  $links  = $rechts;
  $rechts = $tmp;
}

function ist_groesser($links, $rechts, $feld=''){
  if(is_object($links) && is_object($rechts) && ($links instanceof IArray) && ($rechts instanceof IArray)) {
    return (($links->toarray()[$feld]??0) > ($rechts->toarray()[$feld]??0));
  } else {
    return ($links>$rechts);
  }
}

?>