<div class="col-lg-12">
  <h1 class="mt-4 admin_page_title">Add Sub Category Post</h1>
</div><!-- alignment -->

<?php if (isset($_POST['create_post'])) {

  $post_title        = mysqli_real_escape_string($connection, $_POST['title']);
  $post_author       = mysqli_real_escape_string($connection, $_POST['author']);
  $subCategoryID     = mysqli_real_escape_string($connection, $_POST['subCategoryID']);
  $post_image        = mysqli_real_escape_string($connection, $_FILES['image']['name']);
  $post_image_temp   = mysqli_real_escape_string($connection, $_FILES['image']['tmp_name']);
  $post_tags         = mysqli_real_escape_string($connection, $_POST['post_tags']);
  $post_content      = $_POST['post_content'];
  $post_date         = mysqli_real_escape_string($connection, date('Y-m-d'));
  $post_status       = mysqli_real_escape_string($connection, $_POST['post_status']);

  move_uploaded_file($post_image_temp, "../img/$post_image");

  $sql = "INSERT INTO sub_categories_posts (subCategoryID, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES (?, ?, ?, ?, ?, ?, ?,?)";

  $insertQry = mysqli_prepare($connection, $sql);

  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($insertQry, "ssssssss", $subCategoryID, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags, $post_status);

  // Attempt to execute the prepared statement
  mysqli_stmt_execute($insertQry);

  if (!$insertQry) {
    //send me a message with why it faild
    die('Query FAILED' . mysqli_error($connection));
  } else {
    // this well get the ID from the last post
    $sub_category_post_id = mysqli_insert_id($connection);
    echo "<p class='success-button'>Post Created. <a href='sub_category_posts.php'>Edit More Posts</a> or <a href='../sub_category_post.php?p_id={$sub_category_post_id}'>View Post</a>";
  }

  // Close statement
  mysqli_stmt_close($insertQry);

  // Close connection
  mysqli_close($connection);
} ?>
<div class="page_container">
  <div class="col-xl-12">
    <!-- CREATE POST FORM -->
    <form action="" method="post" enctype="multipart/form-data">
      <!-- TITLE -->
      <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
      </div>
      <!-- AUTHOR -->
      <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author">
      </div>
      <div class="form-group">
        <label for="title">select a sub category</label>
        <select name="subCategoryID" id="">
          <?php

          $query = "SELECT * FROM sub_categories";
          $statement = mysqli_prepare($connection, $query);
          mysqli_stmt_execute($statement);
          $getResult = mysqli_stmt_get_result($statement);

          while ($row = mysqli_fetch_assoc($getResult)) {
            $subCategoriesID    = $row['subCategoriesID'];
            $subCategoriesTitle = $row['subCategoriesTitle'];

            if ($subCategoriesID == $subCategoryID) {

              echo "<option selected value='{$subCategoriesID}'>{$subCategoriesTitle}</option>";
            } else {

              echo "<option value='{$subCategoriesID}'>{$subCategoriesTitle}</option>";
            }
          }
          ?>
        </select>
      </div><!-- form-group -->

      <!-- STATUS -->
      <div class="form-group">
        <select name="post_status" id="">
          <option value="draft">Post Status</option>
          <option value="published">Publish</option>
          <option value="draft">Draft</option>
        </select>
      </div>
      <!-- IMAGE -->
      <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
      </div>
      <!-- TAGS -->
      <div class="form-group">
        <label for="title">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
      </div>
      <!-- CONTENT -->
      <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" cols="30" rows="10">
        </textarea>
      </div>
      <div class="form-group">
        <div class="sharethis-inline-share-buttons"></div>
      </div>
      <!-- SUBMIT BUTTON -->
      <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Sub Category Post">
      </div>

    </form>

  </div>

</div>