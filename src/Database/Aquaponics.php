<?php

namespace Aquaponics\database;

use \PDO;

class Aquaponics {

  private $host;
  private $user;
  private $pass;
  private $data;

  public $connection;

  public function __construct() {
    $this->host = $_ENV["MYSQL_HOST"];
    $this->user = $_ENV["MYSQL_USER"];
    $this->pass = $_ENV["MYSQL_PASS"];
    $this->data = $_ENV["MYSQL_DATA"];

    $this->connection = new PDO("mysql:host=$this->host;dbname=$this->data", $this->user, $this->pass);
  }

}
