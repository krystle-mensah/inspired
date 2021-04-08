<?php
// DEVELOPEMENT CONNECTION
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', "inspired");

//REMOTE DATABASE CONNECTION
//define('DB_HOST', 'sql4.freemysqlhosting.net');
//define('DB_USER', 'root');
//define('DB_PASS', 'bj2QV51Ry3');
//define('DB_NAME', "sql4404106");

// Create connection
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// if (mysqli_connect_errno()) {
//   printf("Connect failed: %s\n", mysqli_connect_error());
//   exit();
// } else {
//   //echo "Connected successfully";
// }
