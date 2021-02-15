<?php

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "inspired";

foreach ($db as $key => $value) {

  define(strtoupper($key), $value);
}

// Create connection
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Check connection
// if ($connection->connect_error) {
//   die("Connection failed: " . $connection->connect_error);
// }
// echo "Connected successfully";


// $connection = mysqli_connect("localhost", "root", "", "inspired");

// // Check connection
// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   exit();
// }



// class Database
// {

//   private $server = "mysql:host=localhost;dbname=inspired";
//   private $username = "root";
//   private $password = "";
//   private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
//   protected $conn;

//   public function open()
//   {
//     try {
//       $this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
//       return $this->conn;
//     } catch (PDOException $e) {
//       echo "There is some problem in connection: " . $e->getMessage();
//     }
//   }

//   public function close()
//   {
//     $this->conn = null;
//   }
// }

// $pdo = new Database();
