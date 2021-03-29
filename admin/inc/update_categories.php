<form action="" method="post">

  <div class="form-group">
    <label for="cat-title">Edit Category</label>

    <!-- EDITED CATEGORY -->

    <?php

    // Check for edit in the url
    if (isset($_GET['edit'])) {

      // TRUE - Get the cat id
      $cat_id =  mysqli_real_escape_string($connection, $_GET['edit']);

      //Fetch record:
      $query = "SELECT * FROM categories WHERE cat_id = ?";

      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 'i', $cat_id);
      mysqli_stmt_execute($statement);
      $select_categories_id = mysqli_stmt_get_result($statement);

      // while the condition is true fetch the row representing the array from ($variable - see above)
      while ($row = mysqli_fetch_array($select_categories_id)) {
        // fetch values
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
    ?>
        <!-- if variable is detected echo it in the input -->
        <input value="<?php if (isset($cat_title)) {
                        echo $cat_title;
                      } ?>" class="form-control" type="text" name="cat_title">

    <?php }
    }

    ?>

    <?php

    // UPDATE CATEGORY QUERY

    //check post update detection 
    if (isset($_POST['update_category'])) {

      // TRUE - Post the cat title
      $the_cat_title = $_POST['cat_title'];

      //Update Multiple Columns:
      $updateQry = "UPDATE categories SET cat_title = ? WHERE cat_id = ?";
      $updateStatement = mysqli_prepare($connection, $updateQry);

      mysqli_stmt_bind_param($updateStatement, 'si', $the_cat_title, $cat_id);
      mysqli_stmt_execute($updateStatement);

      if (!$updateStatement) {

        // kill script and return error.
        die("QUERY FAILED" . mysqli_error($connection));
      }
    }
    //mysqli_close($connection);
    ?>

  </div><!-- form-group -->
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
  </div><!-- form-group -->

</form><!-- form -->