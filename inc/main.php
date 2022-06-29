<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once('config.inc');
include_once('dbhandler.php');

echo "<H1>".$CONFIG['title']."</H1>";
$dsn = $CONFIG['dsn'];
$username = $CONFIG['username'];
$password = $CONFIG['password'];

$dbh = new TDBHandler;
$dbh->connect($dsn, $username, $password);

$_SESSION['modul'] = $_REQUEST['modul']??$_SESSION['modul']??'rezept';

if ($_SESSION['modul'] == 'autor') {
  include('modulautor.php');
} else if ($_SESSION['modul']=='zutat') {
  include('modulzutat.php');
}else {
  //Default: rezept  
  include('modulrezept.php');
}

?>