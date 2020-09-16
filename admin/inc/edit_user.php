<?php 
// IF SET
if(isset($_GET['edit_user'])){
  // then save in this varible
  $the_user_id = $_GET['edit_user'];

  // select all from table where the user id is equal to the url id
  $query = "SELECT * FROM users WHERE userId = $the_user_id ";

  // then Perform query against a database and send in the query and the connection
  $select_users_query = mysqli_query($connection,$query);

  // then loop through the varible and condition it. 
  //true fetch the row representing the array from ($variable)
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
 
  // we need to make sure when we are editing a user that it is in crpted
  
  // so first we query the database for the colum from the table.
  $query = "SELECT randSalt FROM users";

  //then we perform a query against the database and send in the connection and query 
  $select_randsalt_query = mysqli_query($connection, $query);

  // if this is not set
  if(!$select_randsalt_query) {
    //display a message  and Return the last error description and the connection
    die('query failed' . mysqli_error($connection));
  }

  //then we go inside the database

  // fetch column from table and get the value 
  $row = mysqli_fetch_array($select_randsalt_query);
  // then save the colum value here
  $salt =  $row['randSalt'];
  // then enypted the user password with salt
  $hashed_password = crypt($user_password, $salt);

  
  
  // INSERT INTO TABLE
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

?>

<!-- multipart/form-data lets you send encoded data  -->
<form action="" method="post" enctype="multipart/form-data"> 

  <div class="form-group">
    <label for="title">First Name</label>
    <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" value="<?php echo $user_lastname; ?>"  class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
   
    <select name="user_role" id="">
      <!-- static data added -->
      <option value="subscriber"><?php echo $user_role; ?></option>

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