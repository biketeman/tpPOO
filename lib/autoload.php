<?php

function __autoload($class_name) {

  // Répertoire ou les fichiers sont hébergés
  $directories = array("lib", "src/controllers", "src/models", "src/views");

  foreach ($directories as $key => $directory) {
      $file = APPLICATION_PATH . "/" . $directory . "/" . $class_name . ".php";
      if(file_exists($file)){
          include_once $file;
      }
  }
}
