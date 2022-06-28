<?php

include_once('autor.php');

class TDBHandler  {
  protected $dbh;
  
  public function __construct() {
  }
  
  public function connect($dsn, $username, $password) {
    try {
      $this->dbh = new PDO($dsn, $username, $password);
    } catch(Exception $e) {
      die('Interner Fehler: Die Datenbank-Verbindung konnte nicht aufgebaut werden.');
    }
  }
  
  public function getAutorenListe($suche='') {
    $sql = "SELECT id, autor FROM autor WHERE autor LIKE :suche";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':suche', $suche);
    $stmt->execute();
    $results = $stmt->fetchAll(); 
    $autoren = array();
    foreach ($results as $result) {
      $autor = new TAutor($result['id'], $result['autor']);
      $autoren[$autor->id] = $autor;
    } 
    return $autoren;
  }

  public function getAutor($id) {
    $sql = "SELECT id, autor FROM autor WHERE id=:id";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $results = $stmt->fetchAll();
    $result = reset($results); 
    $autor = new TAutor($result['id'], $result['autor']);
    return $autor;
  }

  public function saveAutor($autor) {
    if ($autor->id>0) {
      $sql = "REPLACE INTO autor(id, autor) VALUES(:id, :autor)";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindParam(':id', $autor->id);
    } else {
      $sql = "INSERT INTO autor(autor) VALUES(:autor)";
      $stmt = $this->dbh->prepare($sql);
    }
    $stmt->bindParam(':autor', $autor->autor);
    $stmt->execute();
  }
  
  public function deleteAutor($id) {
    $sql = "DELETE FROM autor WHERE id=:id";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
}

?>