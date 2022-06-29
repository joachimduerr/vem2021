<?php

include_once('autor.php');
include_once('zutat.php');

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
  
  
  
  
  public function getZutatenListe($suche='') {
    $sql = "SELECT id, einheit, zutat, art FROM zutat WHERE zutat LIKE :suche";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':suche', $suche);
    $stmt->execute();
    $results = $stmt->fetchAll(); 
    $zutaten = array();
    foreach ($results as $result) {
      $zutat = new TZutat($result['id'], $result['zutat'], $result['art'], $result['einheit']);
      $zutaten[$zutat->id] = $zutat;
    } 
    return $zutaten;
  }

  public function getZutat($id) {
    $sql = "SELECT  id, einheit, zutat, art FROM zutat WHERE id=:id";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $results = $stmt->fetchAll();
    $result = reset($results); 
    $zutat = new TZutat($result['id'], $result['zutat'], $result['art'], $result['einheit']);
    return $zutat;
  }

  public function saveZutat($zutat) {
    if ($zutat->id>0) {
      $sql = "REPLACE INTO zutat(id, einheit, zutat, art) VALUES(:id, :einheit, :zutat, :art)";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindParam(':id', $zutat->id);
    } else {
      $sql = "INSERT INTO zutat(einheit, zutat, art) VALUES(:einheit, :zutat, :art)";
      $stmt = $this->dbh->prepare($sql);
    }
    $stmt->bindParam(':einheit', $zutat->einheit);
    $stmt->bindParam(':zutat', $zutat->zutat);
    $stmt->bindParam(':art', $zutat->art);
    $stmt->execute();
  }
  
  public function deleteZutat($id) {
    $sql = "DELETE FROM zutat WHERE id=:id";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
  
}

?>