<?php

require_once 'KLogger.php';

class Dao {

  private $host = "us-cdbr-iron-east-05.cleardb.net";
  private $db = "heroku_c1e7d16168842d5";
  private $user = "b0c907fbbec6d1";
  private $pass = "d2566170";
  protected $logger;
  
  public function __construct () {
    $this->logger = new KLogger('/home/malikherring/CS401', KLogger::DEBUG);
  }
  
  public function getConnection () {
    try{
        $conn = 
            new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
        $this->logger->logDebug("Established a database connection.");
        return $conn;
    } catch (Exception $e) {
        echo "connection failed: " . $e->getMessage();
        $this->logger->logFatal("The database connection failed.");
    }
  }
  
  public function createHeading () {
  	return "<div id=\"header\">
            <img alt= \"Running Header\" src= \"header.jpeg\"> 
            <img alt= \"logo\" src= \"logo.jpeg\" id= \"logo\">
        </div>
	<div id=\"menubar\">
            <ul id=\"horizontal-menu\" id=\"menuText\">
                <li><a href=\"index.php\" alt=\"Home\">Home</a></li>
                <li><a href=\"schedule.php\" alt=\"Schedule\">Schedule</a></li>
                <li><a href=\"account.php\" alt=\"Account\">Account</a></li>
                <li><a href=\"phpInfo.php\" alt=\"PHP Info\">PHP Info</a></li>
            </ul>
	</div>";
  }
  
  public function getUsers(){
    $conn = $this->getConnection();
    $query = $conn->prepare("select * from user");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $results = $query->fetchAll();
    $this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
    return $results;
  }
  
  public function getUser($username){
    $conn = $this->getConnection();
    $query = $conn->prepare("SELECT * FROM user WHERE username = :username");
    $query->bindParam(':username', $username);
    $query->execute();
    $this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
    return $results;
  }
  
  public function saveUser($username, $email, $password){
    $conn = $this->getConnection();
    $query = $conn->prepare("INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");
    $query->bindParam(':username',$username);
    $query->bindParam(':email', $email);
    $query->bindParam(':password', $password);
    $this->logger->logDebug(__FUNCTION__ . " username=[{$username}] email=[{$email}]");
    $query->execute();
  }
  
  public function checkAccess($username) {
    $conn = $this->getConnection();
    $query = $conn->prepare("SELECT " . $username . " FROM user WHERE access = '1'");
    $result = $query->execute();
    return $result; 
  }      
}

