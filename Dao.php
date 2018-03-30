<?php
class Dao {

  private $host = "us-cdbr-iron-east-05.cleardb.net";
  private $db = "heroku_c1e7d16168842d5";
  private $user = "b0c907fbbec6d1";
  private $pass = "d2566170";
  public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
  } catch (Exception $e) {
    echo "connection failed: " . $e->getMessage();
  }
  
}

