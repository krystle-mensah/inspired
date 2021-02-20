<form action="" method="post">

  <div class="form-group">
    <label for="cat-title">Edit Category</label>

    <!-- EDITED CATEGORY -->

    <?php

    // Check for edit in the url
    if (isset($_GET['edit'])) {

      // if TRUE - then catch it
      $cat_id = $_GET['edit'];

      // select all from the categories table where cat_id is equal to cat_id catched.
      //Fetch all records:
      $query = "SELECT * FROM categories WHERE cat_id = ?";

      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 'i', $cat_id);
      mysqli_stmt_execute($statement);
      $select_categories_id = mysqli_stmt_get_result($statement);

      // function to send query in to the database. 
      //$select_categories_id = mysqli_query($connection, $query);

      // while the condition is true fetch the row representing the array from ($variable - see above)
      while ($row = mysqli_fetch_array($select_categories_id)) {
        // Then assign the array to a variable
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

    // If post because we are posting a value form submit
    if (isset($_POST['update_category'])) {

      // then we get the cat_title
      $the_cat_title = $_POST['cat_title'];

      // query to update categories and set cat title to variable from form
      //$query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
      // send in. function to perfrom agasint the database
      //$update_query = mysqli_query($connection, $query);

      //Update Multiple Columns:
      $updateQry = "UPDATE categories SET cat_title = ? WHERE cat_id = ?";
      $updateStatement = mysqli_prepare($connection, $updateQry);

      mysqli_stmt_bind_param($updateStatement, 'si', $the_cat_title, $cat_id);
      mysqli_stmt_execute($updateStatement);

      // if NOT
      if (!$updateStatement) {

        // kill script and return error.
        die("QUERY FAILED" . mysqli_error($connection));
      }

      mysqli_close($connection);
    }

    ?>

  </div><!-- form-group -->
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
  </div><!-- form-group -->

</form><!-- form -->