<?php

if (isset($_GET['edit_user'])) {

  $the_user_id = $connection->real_escape_string($_GET['edit_user']);

  //fetch users by id
  $query = "SELECT * FROM users WHERE userId = ?";

  $statement = mysqli_prepare($connection, $query);
  mysqli_stmt_bind_param($statement, 'i', $the_user_id);
  mysqli_stmt_execute($statement);
  $select_users_query = mysqli_stmt_get_result($statement);
  //loop users by id
  while ($row = mysqli_fetch_array($select_users_query)) {

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

if (isset($_POST['edit_user'])) {
  // PICK UP VAULES
  $user_firstname        = $_POST['user_firstname'];
  $user_lastname         = $_POST['user_lastname'];
  $user_role             = $_POST['user_role'];
  $username              = $_POST['username'];
  $user_email            = $_POST['user_email'];
  $user_password         = $_POST['user_password'];


  if (!empty($user_password)) {

    $query_password = "SELECT user_password FROM users WHERE userId =  ?";

    $statement = mysqli_prepare($connection, $query_password);
    mysqli_stmt_bind_param($statement, 'i', $the_user_id);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    confirmQuery($result);
    $row = mysqli_fetch_array($result);
    $db_user_password = $row['user_password'];

    if ($db_user_password != $user_password) {

      $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
    }

    $updateQry = "UPDATE users SET username  = ?, user_password  = ?, user_firstname  = ?, user_lastname  = ?, user_email  = ?, user_role  = ? WHERE userId = ?";

    $updateStatement = mysqli_prepare($connection, $updateQry);

    mysqli_stmt_bind_param($updateStatement, 'ssssssi', $username, $hashed_password, $user_firstname, $user_lastname, $user_email, $user_role, $the_user_id);

    mysqli_stmt_execute($updateStatement);

    mysqli_close($connection);

    // CONFIRM QUERY
    //confirmQuery($updateQry);

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
    <input type="text" value="<?= $user_lastname; ?>" class="form-control" name="user_lastname">
  </div>

  <div class="form-group">

    <select name="user_role" id="">
      <!-- static data added -->
      <option value="subscriber"><?= $user_role; ?></option>

      <?php if ($user_role == 'admin') {

        echo  "<option value='subscriber'>subscriber</option>";
      } else {

        echo "<option value='admin'>admin</option>";
      } ?>

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