<?php

//echo gethostname();
// Krystles-MBP.cust.communityfibre.co.uk
if (gethostname() == "Krystles-MBP.cust.communityfibre.co.uk") {
  // DEVELOPEMENT CONNECTION
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', "inspired");

  // Create connection
  $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // if (mysqli_connect_errno()) {
  //   printf("Connect failed: %s\n", mysqli_connect_error());
  //   exit();
  // } else {
  //   //echo "Connected successfully";
  // }
} else {
  //REMOTE DATABASE CONNECTION
  //Get Heroku ClearDB connection information
  $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
  $cleardb_server = $cleardb_url["host"];
  $cleardb_username = $cleardb_url["user"];
  $cleardb_password = $cleardb_url["pass"];
  $cleardb_db = substr($cleardb_url["path"], 1);
  $active_group = 'default';
  $query_builder = TRUE;
  // Connect to REMOTE DB
  $connection = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  } else {
    //echo "Connected successfully";
  }
}
