<?php 

include "db.php";

session_start(); 

?>

<?php 

// if login button is clicked
if(isset($_POST['login'])){
  
  //echo "found"; //TEST - if the below message is displaying

  //catch user login details and clean Escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection.

  $login_email				  = $connection -> real_escape_string($_POST['login_email']);
  $login_password				= $connection -> real_escape_string($_POST['login_password']);

  // SELECT all from TABLE WHERE COLUMN MATCHES USER INPUT FROM FORM. 
  $login_user = $connection->query("SELECT * FROM users WHERE  user_email = '{$login_email}' "); 

  if($login_user ->num_rows > 0) {
    foreach($login_user as $row ){

      $db_id = $row['userId'];  // test OUTPUT - id is there
      $db_userId = $row['userId']; 
      $db_user_firstname = $row['user_firstname']; 
      $db_username = $row['username'];  // OUTPUT
      $db_user_password = $row['user_password'];   
      $db_user_lastname = $row['user_lastname']; 
      $db_user_email = $row['user_email'];
      $db_user_role = $row['user_role']; 

    }

    if(password_verify($login_password,$row['user_password'])){
      //echo "You have been logged in";
      $_SESSION['user_firstname'] = $db_user_firstname;
      $_SESSION['username'] = $db_username;
      $_SESSION['user_password'] = $db_user_password;
      $_SESSION['user_lastname'] = $db_user_lastname;
      $_SESSION['user_email'] = $db_user_email;
      $_SESSION['user_role'] = $db_user_role;
    
      header('Location: ../admin/posts.php');

    } else {
    
      header("Location: ../index.php");
    
    }

  } else {

    echo "please check your inputs";
  
  }

} // isset 

?>