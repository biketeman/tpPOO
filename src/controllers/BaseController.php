<?php

class BaseController {

  /**
   * Test de l'authentification en PHP
   * @return boolean [description]
   */
  public function isLogged($array){
      if(isset($_SESSION["Authentifié"]) && $_SESSION["Authentifié"] == true) {
        return true;
      }
      $this->redirect($array["redirect"]);
  }

  public function redirect($path) {
    header('Location: '. $path);
    exit;
  }

  public function login($req, $res){
    // Page d'authentification
    $admin = new Admin();
    $res->html("admin/login.php", array());
  }

  public function loginPost($req, $res){
    // Récuperation des données à travers de Modèle
    $admin = new Admin();

    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $rows = $admin->isUser($email, $password);


    // Test si l'adresse et le mot de passe envoyer dans la variable $_POST conrespondent
    // au informations issues de la base de données
    if(($rows["email"] == $email) && ($rows["password"] == $password)){

      // Test Ok, mise à jour de la session afin de se souvenir que cette personne est bien authentifier à travers la session
      $_SESSION["Authentifié"] = true;
      // Redirection de l'utlisateur vers l'espace membres
      header('Location: /admin');
    } else {
      // si les données ne conrespondent pas, nous renvoyions la page de login à travers la vue
      $res->html("admin/login.php", array());
    }
  }

  public function logout($req, $res){
    $_SESSION["Authentifié"] = 0;
    header('Location: /');
  }
}
