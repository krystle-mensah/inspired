<?php
// DEVELOPEMENT CONNECTION
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', "inspired");

//REMOTE DATABASE CONNECTION
// define('DB_HOST', 'sql4.freesqldatabase.com');
// define('DB_USER', 'sql4404292');
// define('DB_PASS', 'lRB4cfmAVD');
// define('DB_NAME', "sql4404292");

// Create connection
//$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// if (mysqli_connect_errno()) {
//   printf("Connect failed: %s\n", mysqli_connect_error());
//   exit();
// } else {
//   echo "Connected successfully";
// }

$url = parse_url(getenv("mysql://ba381f6aafda8b:f9d0a3ec@us-cdbr-east-03.cleardb.com/heroku_95220712da5e428?reconnect=true"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$connection = mysqli_connect($server, $username, $password, $db);

if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
} else {
  echo "Connected successfully";
}
