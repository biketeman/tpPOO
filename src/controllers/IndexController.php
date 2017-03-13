<?php
/**
 * Page d'accueil
 */
class IndexController {
  public function index($req, $res){
    // Modèle Film
    $res->html("index.php", array());
  }
}
