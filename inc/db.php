<?php




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