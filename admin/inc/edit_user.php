<?php 
// IF SET
if(isset($_GET['edit_user'])){
  // then save in this varible
  $the_user_id = $_GET['edit_user'];

  // select all from table where the user id is equal to the url id
  $query = "SELECT * FROM users WHERE userId = $the_user_id ";

  // then Perform query against a database and send in the query and the connection
  $select_users_query = mysqli_query($connection,$query);

  while($row = mysqli_fetch_array($select_users_query)) {

    // values we bring back and assign to variable
    $userId         = $row['userId'];
    $username       = $row['username'];
    $user_password  = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname  = $row['user_lastname'];
    $user_email     = $row['user_email'];
    $user_role      = $row['user_role'];
  }
}

// IF PRESSED
if(isset($_POST['edit_user'])){
  // PICK UP VAULES
  $user_firstname        = $_POST['user_firstname'];
  $user_lastname         = $_POST['user_lastname'];
  $user_role             = $_POST['user_role'];
  $username              = $_POST['username'];
  $user_email            = $_POST['user_email'];
  $user_password         = $_POST['user_password'];
 
  
  if(!empty($user_password)) { 

    $query_password = "SELECT user_password FROM users WHERE userId =  $the_user_id";
    
    $get_user_query = mysqli_query($connection, $query_password);
    
    confirmQuery($get_user_query);

    $row = mysqli_fetch_array($get_user_query);

    $db_user_password = $row['user_password'];


    if($db_user_password != $user_password) {

      $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

    }
  
  
  // UPDATE DATABASE
  $query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', 
  user_role = '{$user_role}', username = '{$username}', user_email = '{$user_email}', 
  user_password = '{$hashed_password}' WHERE userId = {$the_user_id} ";

  //SEND IT IN
  $edit_user_query = mysqli_query($connection, $query);
  
  // CONFIRM QUERY
  confirmQuery($edit_user_query);
  
  // display this
  echo "<p class='success-button'>User Updated. <a href='users.php'>View Users</a></p>";
  
  }

}

?>

<!-- multipart/form-data lets you send encoded data  -->
<form action="" method="post" enctype="multipart/form-data"> 

  <div class="form-group">
    <label for="title">First Name</label>
    <input type="text" value="<?= $user_firstname; ?>" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" value="<?= $user_lastname; ?>"  class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
   
    <select name="user_role" id="">
      <!-- static data added -->
      <option value="subscriber"><?= $user_role; ?></option>

      <?php if($user_role == 'admin'){

      echo  "<option value='subscriber'>subscriber</option>";

      } else {

        echo "<option value='admin'>admin</option>";

      }?>

    </select>
    
  </div> <!-- form-group -->

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file"  name="image">
  </div> -->

  <div class="form-group">
    <label for="title">Username</label>
    <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
  </div>

  <div class="form-group">
    <label for="post_content">Email</label>
    <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="post_content">Password</label>
    <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
  </div>

</form>