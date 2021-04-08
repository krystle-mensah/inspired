<?php
// DEVELOPEMENT CONNECTION
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', "inspired");

//REMOTE DATABASE CONNECTION
define('DB_HOST', 'sql4.freesqldatabase.com');
define('DB_USER', 'sql4404292');
define('DB_PASS', 'lRB4cfmAVD');
define('DB_NAME', "sql4404292");

// Create connection
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// if (mysqli_connect_errno()) {
//   printf("Connect failed: %s\n", mysqli_connect_error());
//   exit();
// } else {
//   //echo "Connected successfully";
// }
