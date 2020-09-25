<?php include "db.php"; ?>

<?php session_start();?>

<?php 

// if login in button is clicked
if(isset($_POST['login'])){
   //TEST - if the below message is displaying
  //echo "found";

  // TEST -  User input
  //echo $login_email = $_POST['login_email'];
  //echo $login_password = $_POST['login_password'];

  //CATCH INPUT AND SAVE IN VARIABLES
  $login_email = $_POST['login_email'];
  $login_password = $_POST['login_password'];
  
  // THEN CLEAN INPUT - To avoid mysql injections.
  // Escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection.
  $login_email = mysqli_real_escape_string($connection, $login_email);
  $login_password =  mysqli_real_escape_string($connection, $login_password);


  // SELECT all from TABLE WHERE COLUMN MATCHES USER INPUT FROM FORM. 
  $query = "SELECT * FROM users WHERE  user_email = '{$login_email}' ";

  //FUNCTION - to bring BACK MATCH.
  $select_user_query = mysqli_query($connection, $query);

  //IF NOT $var
  if(!$select_user_query){

    //Print a message and terminate the current script:
    die("QUERY FAILED" . mysqli_error($connection));

  }
  
  //if query didnt fail

  // condition it to loop
  while($row = mysqli_fetch_array($select_user_query)){
  // TEST - when we type the right user we a getting data
  ////echo $db_id = $row['userId'];  // OUTPUT - id is there

    $db_userId = $row['userId']; 
    $db_user_firstname = $row['user_firstname']; 
    $db_username = $row['username'];  // OUTPUT
    $db_user_password = $row['user_password'];   
    $db_user_lastname = $row['user_lastname']; 
    $db_user_email = $row['user_email'];
    $db_user_role = $row['user_role']; 

  }

  // VALIDATE USER

  if($login_email === $db_user_email && $login_password === $db_user_password) {
    
    // Then create sessions
    $_SESSION['user_firstname'] = $db_user_firstname;
    $_SESSION['username'] = $db_username;
    $_SESSION['user_password'] = $db_user_password;
    $_SESSION['user_lastname'] = $db_user_lastname;
    $_SESSION['user_email'] = $db_user_email;
    $_SESSION['user_role'] = $db_user_role;
  
    // AND locate user to the cta.php page
    header('Location: ../admin/Dashboard.php');
   
    // ELSE we dont find a match 
  } else {
  
    // relocate user to the front of the site
    header("Location: ../index.php");
  
  } // if statement
  
} // isset 

?>