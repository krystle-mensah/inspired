<?php

// IF PRESSED
if (isset($_POST['create_user'])) {

  //pick up theres values
  $user_firstname        =  mysqli_real_escape_string($connection, $_POST['user_firstname']);
  $user_lastname         =  mysqli_real_escape_string($connection, $_POST['user_lastname']);
  $user_role             =  mysqli_real_escape_string($connection, $_POST['user_role']);
  $username              =  mysqli_real_escape_string($connection, $_POST['username']);
  $user_email            =  mysqli_real_escape_string($connection, $_POST['user_email']);
  $user_password         =  mysqli_real_escape_string($connection, $_POST['user_password']);

  $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
  $sql = "INSERT INTO users (user_firstname, user_lastname, user_role, username, user_email, user_password) VALUES (?, ?, ?, ?, ?, ?)";
  if ($insertQry = mysqli_prepare($connection, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($insertQry, "ssssss", $user_firstname, $user_lastname, $user_role, $username, $user_email, $user_password);

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($insertQry)) {
      // let them no it was created
      echo "<p class='success-button'>User Created. <a href='users.php'>View Users</a>";
    } else {
      echo "ERROR: Could not execute query: $sql. " . mysqli_error($connection);
    }
  }
  // Close statement
  mysqli_stmt_close($insertQry);

  // Close connection
  mysqli_close($connection);
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