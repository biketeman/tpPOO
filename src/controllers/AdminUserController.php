<?php

class AdminUserController extends BaseController {

  public function getData() {
    // Attention, il faut renseigner que les champs présents dans la base de données
    return array(
      "nom" => $_POST["nom"],
      "email" => $_POST["email"]
    );
  }

  public function index($req, $res){
    //Test si l'utilisateur est logged
    $this->isLogged(array("redirect" => "/admin/login"));
    $user = new User();
    $rows = $user->find();
    $res->html("admin/users.php", array("users" => $rows));
  }

  public function add($req, $res){
    //Test si l'utilisateur est logged
    $this->isLogged(array("redirect" => "/admin/login"));
    $user = new User();

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $result = $user->insert($this->getData());
        $this->redirect("/admin");
    } else {
        $res->html("admin/user.php", array());
    }
  }

  public function update($req, $res){
    $this->isLogged(array("redirect" => "/admin/login"));
    $user = new User();

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $result = $user->update($_GET["id"], $this->getData());
        $this->redirect("/admin");
    } else {
        $row = $user->findOne($_GET["id"]);
        $res->html("admin/user.php", $row);
    }
  }

  public function delete($req, $res){
    $this->isLogged(array("redirect" => "/admin/login"));
    $user = new User();
    $user->delete($_GET["id"]);
    $this->redirect("/admin");
  }
}
