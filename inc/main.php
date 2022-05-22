<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once('rezept.php');
include_once('zutat.php');

echo "<H1>Chefköchle</H1>";

$zutat = array();
$zutat['Schweinehals'] = new TZutat('Schweinehals', 'Fleisch', 'g');
$zutat['Apfel'] = new TZutat('Apfel');
$zutat['Birne'] = new TZutat('Birne');
$zutat['Ei'] = new TZutat('Ei', 'Ei', 'Stk');
$zutat['Milch'] = new TZutat('Milch', 'Milchprodukte', 'l');
$zutat['Joghurt'] = new TZutat('Joghurt', 'Milchprodukte', 'g');

$rezept = new TRezept('Chili con carne', 4);
$rezept->setDauer(30);
$rezept->setSchwierigkeitsgrad(2);
$rezept->addzutat($zutat['Schweinehals'], 500);
$rezept->print();
$rezept->print(8);

$rezept = new TRezept('Spiegelei', 1);
$rezept->addzutat($zutat['Ei'], 1);
$rezept->print();
$rezept->print(5);


 
?>