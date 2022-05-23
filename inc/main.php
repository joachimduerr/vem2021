<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once('rezept.php');
include_once('zutat.php');
include_once('function.php');
include_once('quicksort.php');

echo "<H1>Chefköchle</H1>";

$zutat = new TZutatListe();
$zutat->add(new TZutat('Schweinehals', 'Fleisch', 'g'));
$zutat->add(new TZutat('Apfel'));
$zutat->add(new TZutat('Birne'));
$zutat->add(new TZutat('Ei', 'Ei', 'Stk'));
$zutat->add(new TZutat('Milch', 'Milchprodukte', 'l'));
$zutat->add(new TZutat('Joghurt', 'Milchprodukte', 'g'));

echo "<H2>Zutaten</H2>";
$zutat->sort('Einheit');
$zutat->print();

echo "<H2>Zutat finden</H2>";
$schwein = $zutat->find('Titel', 'Birne');
$schwein -> print();


echo "<H2>Rezepte</H2>";

$rezept = new TRezept('Chili con carne', 4);
$rezept->setDauer(30);
$rezept->setSchwierigkeitsgrad(2);
$rezept->addzutat($zutat->find('Titel', 'Schweinehals'), 500);
$rezept->print();
$rezept->print(8);

$rezept = new TRezept('Spiegelei', 1);
$rezept->addzutat($zutat->find('Titel', 'Ei'), 1);
$rezept->print();
$rezept->print(5);

?>