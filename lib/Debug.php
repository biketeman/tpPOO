<?php

class Debug {

  public function __construct($data){
    header("Content-type: text/html; charset=utf-8");
    echo "<pre>";
    print_r($data);
    exit;
  }
}
