<?php

class Response {

  public function json($data){
    $json = json_encode($data);
    header('Content-Type: application/json');
    echo $json;
    exit;
  }


  public function html($template_name, $data){

    function t($value){
      return utf8_encode($value);
    }

    function value($data, $field){
      if(isset($data[$field])){
        return $data[$field];
      }
      return "";
    }

    function selected($data, $value){
      if($data == $value) return "selected";
      return "";
    }

    function checked($data, $value){
      if($data == $value) return "checked";
      return "";
    }

    header("Content-type: text/html; charset=utf-8");
    include APPLICATION_PATH . "/src/templates/" . $template_name;
  }
}
