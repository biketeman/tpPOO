<?php

include_once "FluentPDO/FluentPDO.php";

class Model {

  // identifiant de connexion
  protected $dbConnection;

  /**
   * Connexion à la base de données
   */
  public function __construct(){
    try {
      // Path Connexion in Standard
      $path = 'mysql:host='.MYSQL_HOST.':'. MYSQL_PORT . ';dbname='.MYSQL_DATABASE;

      //Connexion with socket
      if(defined('MYSQL_SOCKET')) $path = 'mysql:unix_socket='.MYSQL_SOCKET.';dbname='.MYSQL_DATABASE;

      $pdo = new PDO($path, MYSQL_USER, MYSQL_PASSWORD, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $this->dbConnection = new FluentPDO($pdo);
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
  }

  public function find(){
    return $this->dbConnection->from($this->table_name)->fetchAll();
  }

  public function findOne($id){
    $query = $this->dbConnection->from($this->table_name)->where("id", $id);
    return $query->fetch();
  }

  public function insert($values){
    return $this->dbConnection
      ->insertInto($this->table_name)
      ->values($values)->execute();
  }

  public function update($id, $set) {
    $query = $this->dbConnection
      ->update($this->table_name)
      ->set($set)
      ->where('id', $id);
    return $query->execute();
  }

  public function delete($id) {
    $query = $this->dbConnection
      ->delete($this->table_name)
      ->where('id', $id);
    return $query->execute();
  }
}
