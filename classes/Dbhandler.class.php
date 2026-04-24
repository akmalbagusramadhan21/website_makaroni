<?php

class Dbhandler {
  private $host = "127.0.0.1";
  private $user = "root";
  private $pass = "";
  private $db = "ogtech";
  private $conn;

  public function __construct() {
    $this->connect(); // inisialisasi koneksi saat objek dibuat
  }

  private function connect() {
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function conn() {
    if ($this->conn === null) {
      $this->connect();
    }
    return $this->conn;
  }
}
