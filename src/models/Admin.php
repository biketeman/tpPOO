<?php


class Admin extends Model {
  // Nom de la table correspondant dans la base de données
  public $table_name = "admins";

  public function isUser($email, $password){
    $query = $this->dbConnection->from($this->table_name)
      ->select('email, password')
      ->where(array("email" => $email, "password" => $password))
      ->limit(1);
    return $query->fetch();
  }
}
