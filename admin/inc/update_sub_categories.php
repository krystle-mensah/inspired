<form action="" method="post">

  <div class="form-group">
    <label for="cat-title">Edit Sub Categories</label>

    <!-- EDITED CATEGORY -->

    <?php

    // Check for edit in the url
    if (isset($_GET['edit'])) {

      // if TRUE - then catch it
      $Get_sub_categories = $_GET['edit'];

      // select all from the table where colum is equal to the chapter.
      $query = "SELECT * FROM sub_categories WHERE subCategoriesID = $Get_sub_categories";
      // function to send query in to the database. 
      $select_sub_categories_by_id = mysqli_query($connection, $query);

      // while the condition is true fetch the row representing the array from ($variable - see above)
      while ($row = mysqli_fetch_array($select_sub_categories_by_id)) {
        $subCategoriesID = $row['subCategoriesID'];
        $subCategoriesTitle = $row['subCategoriesTitle'];
    ?>
        <!-- if variable is detected echo it in the input -->
        <input value="<?php if (isset($subCategoriesTitle)) {
                        echo $subCategoriesTitle;
                      } ?>" class="form-control" type="text" name="chapter_title">

    <?php }
      // Good error handle
      if (!$select_sub_categories_by_id) {
        printf("Error: %s\n", mysqli_error($connection));
        exit();
      }
    }


    // UPDATE CATEGORY QUERY

    // If post because we are posting a value form submit
    if (isset($_POST['update_sub_categories'])) {

      // then we get the title
      $get_subCategoriesTitle = $_POST['subCategoriesTitle'];
      // query to update categories and set cat title to variable from form
      $query = "UPDATE sub_categories SET subCategoriesTitle = '{$get_subCategoriesTitle}' WHERE subCategoriesID = {$subCategoriesID} ";
      // send in. function to perfrom agasint the database
      $update_query = mysqli_query($connection, $query);

      if (!$update_query) {
        printf("Error: %s\n", mysqli_error($connection));
        exit();
      }
    }
    ?>
  </div><!-- form-group -->
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_chapter" value="Update Chapter">
  </div><!-- form-group -->

</form><!-- form -->