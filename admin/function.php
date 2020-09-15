<?php

//CONFIRM FUNCTION

function confirmQuery($result) {

  // MAKE ME GLOBAL
  global $connection;
  
  //IF NOT 
  if(!$result){

    // Print a message and terminate the current script:
    die("QUERY FAILED" . mysqli_error($connection));

  }
  
}

?>