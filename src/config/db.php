<?php 
//Propertise

class db{

private $dbhost='us-cdbr-iron-east-05.cleardb.net';
private $dbuser='ba0ac9d42abcff';
private $dbpass='30c015ff';
private $dbname='heroku_4bfbced3b843eba';

//Connect
public function connect(){

  
    // $this->dbhost =  getenv("DB_HOSTNAME_JOB");
    // $this->dbuser =  getenv("DB_USER_JOB");
    // // $this->dbpass =  getenv("DB_PASS_JOB");
    // $this->dbname =  getenv("DB_SCHEMA_CINEMA_JOB");


    $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
    $dbConnection = new PDO($mysql_connect_str,$this->dbuser,$this->dbpass);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
return $dbConnection;
}
}
?>