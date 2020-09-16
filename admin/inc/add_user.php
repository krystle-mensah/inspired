<?php

// IF PRESSED
if(isset($_POST['create_user'])){

  //pick up theres values
  $user_firstname        = $_POST['user_firstname'];
  $user_lastname         = $_POST['user_lastname'];
  $user_role             = $_POST['user_role'];
  $username              = $_POST['username'];
  $user_email            = $_POST['user_email'];
  $user_password         = $_POST['user_password'];

  // INSERT INTO DATABASE, IN THESE TABLE AND THESES COLUMNS 
  $query = "INSERT INTO users(user_firstname,user_lastname,user_role, username,user_email,user_password) ";

  // INSERT VALUES FROM USER
  $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') "; 
  
  // SEND IN 
  $create_user_query = mysqli_query($connection, $query); 

  // CONFIRM
  confirmQuery($create_user_query);

  // let them no it was created
  echo "<p class='success-button'>User Created. <a href='users.php'>View Users</a>"; 

}

?>

<!-- multipart/form-data lets you send encoded data  -->
<form action="" method="post" enctype="multipart/form-data"> 

  <div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
   
    <select name="user_role" id="">
      <!-- static data added -->
      <option value="subscriber">select option</option>
      <option value="admin">admin</option>
      <option value="subscriber">subscriber</option>
    </select>
    
  </div> <!-- form-group -->

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file"  name="image">
  </div> -->

  <div class="form-group">
    <label for="title">Username</label>
    <input type="text" class="form-control" name="username">
  </div>

  <div class="form-group">
    <label for="post_content">Email</label>
    <input type="email" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="post_content">Password</label>
    <input type="password" class="form-control" name="user_password">
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
  </div>

</form>