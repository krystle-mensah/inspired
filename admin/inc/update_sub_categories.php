<form action="" method="post">

  <div class="form-group">
    <label for="cat-title">Edit Sub Categories</label>

    <!-- EDITED CATEGORY -->

    <?php

    // Check for edit in the url
    if (isset($_GET['edit'])) {

      // TRUE - Get the sub category
      $Get_sub_categories = mysqli_real_escape_string($connection, $_GET['edit']);

      //Fetch record:
      $query = "SELECT * FROM sub_categories WHERE subCategoriesID = ?";

      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 'i', $Get_sub_categories);
      mysqli_stmt_execute($statement);
      $select_sub_categories_by_id = mysqli_stmt_get_result($statement);


      while ($row = mysqli_fetch_array($select_sub_categories_by_id)) {
        $subCategoriesID = $row['subCategoriesID'];
        $subCategoriesTitle = $row['subCategoriesTitle'];
    ?>
        <!-- if variable is detected echo it in the input -->
        <input value="<?php if (isset($subCategoriesTitle)) {
                        echo $subCategoriesTitle;
                      } ?>" class="form-control" type="text" name="subCategoriesTitle">
    <?php }
      if (!$select_sub_categories_by_id) {
        printf("Error: %s\n", mysqli_error($connection));
        exit();
      }
    }


    // UPDATE CATEGORY QUERY

    // check for update sub category
    if (isset($_POST['update_sub_category'])) {

      // then we get the title
      $get_subCategoriesTitle = $_POST['subCategoriesTitle'];

      $updateQry = "UPDATE sub_categories SET subCategoriesTitle = ? WHERE subCategoriesID = ?";
      $updateStatement = mysqli_prepare($connection, $updateQry);
      mysqli_stmt_bind_param($updateStatement, 'si', $get_subCategoriesTitle, $subCategoriesID);
      mysqli_stmt_execute($updateStatement);

      if (!$updateStatement) {
        printf("Error: %s\n", mysqli_error($connection));
        exit();
      }
    }
    ?>
  </div><!-- form-group -->
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_sub_category" value="Update sub category">
  </div><!-- form-group -->

</form><!-- form -->