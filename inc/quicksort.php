<?php

include_once('function.php');

function quicksort(&$a, $feld='') {
  if (count($a)<2) {
    return;
  }
  $links  = array();
  $rechts = array();
  $teiler_key = key($a);
  $teiler = array_shift($a);
  foreach ($a as $value) {
    if (ist_groesser($teiler, $value, $feld)) {
      $links[] = $value;
    } else {
      $rechts[] = $value;
    }
  }
  quicksort($links, $feld);
  quicksort($rechts, $feld);
  $a = array_merge($links, array($teiler), $rechts);
}











/*
function quicksort(&$a) {
  if (count($a)<2) {
    return;
  }
  $links  = array();
  $rechts = array();
  $teiler_key = key($a);
  $teiler = array_shift($a);
  foreach ($a as $value) {
    if (ist_groesser($teiler, $value)) {
      $links[] = $value;
    } else {
      $rechts[] = $value;
    }
  }
  //echo "$n links<BR />";
  quicksort($links);
  //echo "$n rechts<BR />";
  quicksort($rechts);
  $a = array_merge($links, array($teiler), $rechts);
}
*/
/*
function quicksort(&$a, $feld='') {
  if (count($a)<2) {
    return;
  }
  $links  = array();
  $rechts = array();
  $teiler_key = key($a);
  $teiler = array_shift($a);
  foreach ($a as $value) {
    if (ist_groesser($teiler, $value, $feld)) {
      $links[] = $value;
    } else {
      $rechts[] = $value;
    }
  }
  quicksort($links, $feld);
  quicksort($rechts, $feld);
  $a = array_merge($links, array($teiler), $rechts);
}
*/

?>
