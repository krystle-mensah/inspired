<?php

// NEW DATABASE CONNECTION
// Class Database{
 
// 	private $server = "mysql:host=localhost;dbname=inspired";
// 	private $username = "root";
// 	private $password = "";
// 	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
// 	protected $conn;
 	
// 	public function open(){
//  		try{
//  			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
//  			return $this->conn;
//  		}
//  		catch (PDOException $e){
//  			echo "There is some problem in connection: " . $e->getMessage();
//  		}
 
//     }
 
// 	public function close(){
//    		$this->conn = null;
//  	}
 
// }

// $pdo = new Database();


//db array assigned to value's
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "inspired";

//foreach db array use key to loop through each value.
foreach($db as $key => $value){
  
  define(strtoupper($key),$value);

}

//Create connection
$connection = new mysqli(DB_HOST, DB_USER,DB_PASS,DB_NAME);

//Check connection
// if ($connection->connect_error) {
//   die("Connection failed: " . $connection->connect_error);
// }
// echo "Connected successfully";

?>