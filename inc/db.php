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

if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
} else {
  //echo "Connected successfully";
}


?>

<!-- pdo -->
<?php

// $servername = "localhost";
// $username = "root";
// $password = "";



// try {
//   $connection = new PDO("mysql:host=$servername;dbname=inspired", $username, $password);
//   // set the PDO error mode to exception
//   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
// } catch (PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }

?>