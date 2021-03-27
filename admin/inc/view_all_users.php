<div id="bulkOptionContainer" class="col-xs-4 col-lg-2">

  <select class="form-control" name="bulk_options" id="">
    <option value="">Select Options</option>
    <option value="published">Publish</option>
    <option value="draft">Draft</option>
    <option value="delete">Delete</option>
    <option value="clone">Clone</option>
  </select>

</div><!-- bulkOptionContainer -->

<form class="col-lg-12" action="" method='post'>

  <table class="table table-bordered table-hover">

    <div class="col-xs-4">

      <input type="submit" name="submit" class="btn btn-success" value="Apply">
      <a class="btn btn-primary" href="users.php?source=add_user">New User</a>

    </div>

    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Username</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Role</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $qry = "SELECT * FROM users";
        $allUserStatement = mysqli_prepare($connection, $qry);
        mysqli_stmt_execute($allUserStatement);
        $select_users = mysqli_stmt_get_result($allUserStatement);

        //then we Fetch a result row as a numeric array and as an associative array:
        while ($row = mysqli_fetch_array($select_users)) {

          // values we bring back and assign to variable
          $userId = $row['userId'];
          $username = $row['username'];
          $user_password = $row['user_password'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_email = $row['user_email'];
          $user_role = $row['user_role'];

          echo "<tr>";
          echo "<td>$userId</td>";
          echo "<td>$username</td>";
          echo "<td>$user_firstname</td>";
          echo "<td>$user_lastname</td>";
          echo "<td>$user_email</td>";
          echo "<td>$user_role</td>";

          // POPULATE URL WITH - KEY&VALUE
          echo "<td><a href='users.php?change_to_admin=$userId'>admin</a></td>";
          echo "<td><a href='users.php?change_to_sub=$userId'>subscriber</a></td>";

          echo "<td><a href='users.php?source=edit_user&edit_user=$userId'>Edit</a></td>";
          echo "<td><a href='users.php?delete=$userId'>Delete</a></td>";
          echo "</tr>";
        }

        ?>

      </tbody>
    </table><!-- table table-bordered table-hover -->
    <?php

    // check Get varible is set
    if (isset($_GET['change_to_admin'])) {

      // True - get the varible here
      $the_user_id = $connection->real_escape_string($_GET['change_to_admin']);
      // save string here
      $admin = 'admin';
      // UPDATE table set COL equal to this value where COL equals THE ID
      $updateQry = "UPDATE users SET user_role =  ? WHERE userId = ?";

      //$change_to_admin_query = mysqli_query($connection, $query);
      $updateStatement = mysqli_prepare($connection, $updateQry);
      mysqli_stmt_bind_param($updateStatement, 'si', $admin, $the_user_id);

      mysqli_stmt_execute($updateStatement);

      // refresh the on submited at this location
      header("Location: users.php");
    }

    if (isset($_GET['change_to_sub'])) {

      $the_user_id = $connection->real_escape_string($_GET['change_to_sub']);
      $subscriber = 'subscriber';

      $updateQry = "UPDATE users SET user_role = ? WHERE userId = ?";
      $updateStatement = mysqli_prepare($connection, $updateQry);
      mysqli_stmt_bind_param($updateStatement, 'si', $subscriber, $the_user_id);
      mysqli_stmt_execute($updateStatement);

      // then refresh the page everytime it is submited
      header("Location: users.php");
    }
    ?>

    <!-- DELETE USER QUERY -->
    <?php

    // check url for delete
    if (isset($_GET['delete'])) {

      // to prevent someone form going to the url and deleteing a user
      // first we need to validate our code
      // check user role is set
      if (isset($_SESSION['user_role'])) {
        // check user role is an admin user 
        if ($_SESSION['user_role'] == 'admin') {
          //TRUE - Get the user id who is set to admin delete user
          $the_user_id       = $connection->real_escape_string($_GET['delete']);

          $query = "DELETE FROM users WHERE userId = ? ";

          $deleteStatement = mysqli_prepare($connection, $query);
          mysqli_stmt_bind_param($deleteStatement, 'i', $the_user_id);
          mysqli_stmt_execute($deleteStatement);

          header("Location: users.php");
        } // close user role is equal to admin
      } // close user role
    } // close is delete

    ?>