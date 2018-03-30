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
  	echo "<div id=\"header\">
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

