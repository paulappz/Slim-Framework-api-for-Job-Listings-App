<?php 
//Propertise

class db{



private $dbhost;
private $dbuser;
private $dbpass;
private $dbname;

//Connect
public function connect(){

  
    $this->dbhost =  getenv("DB_HOSTNAME_JOB");
    $this->dbuser =  getenv("DB_USER_JOB");
    $this->dbpass =  getenv("DB_PASS_JOB");
    $this->dbname =  getenv("DB_SCHEMA_CINEMA_JOB");


    $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
    $dbConnection = new PDO($mysql_connect_str,$this->dbuser,$this->dbpass);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
return $dbConnection;
}
}
?>