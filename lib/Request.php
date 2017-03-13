<?php

class Request {

  public $body = array();
  public $query = array();
  public $files = array();

  public $server = null;
  public $session = null;
  public $cookie = null;

  public function __construct(){
    $this->server = $_SERVER;
  }

  public function addParams(){
    $method = $_SERVER["REQUEST_METHOD"];
    $this->query = $_GET;

    switch ($method) {
      case 'GET':
        $this->query = $_GET;
        break;
      case 'POST':
        $this->body = $_POST;
        break;
      case 'PUT':
        parse_str(file_get_contents("php://input"), $post_vars);
        $this->body = $post_vars;
        break;
      case 'DELETE':
        parse_str(file_get_contents("php://input"), $post_vars);
        $this->body = $post_vars;
        break;
      case 'FILES':
        $this->files = $_FILES;
        break;
      default:
        $this->query = $_GET;
        break;
    }
  }
}