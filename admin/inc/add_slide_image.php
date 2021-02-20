<?php

if (isset($_POST['create_slide'])) {
  // TEST - type in the title field then click button 
  ////echo $_POST['title']; // output - we are geeting the title

  $slide_title        = $_POST['title'];
  $slide_category_id  = $_POST['slide_category_id'];
  $slide_author       = $_POST['author'];
  $slide_image        = $_FILES['image']['name'];
  $slide_image_temp   = $_FILES['image']['tmp_name'];
  $slide_tags         = $_POST['slide_tags'];
  $slide_content      = $_POST['slide_content'];
  $slide_date         = date('Y-m-d');

  move_uploaded_file($slide_image_temp, "../img/$slide_image");

  $sql = "INSERT INTO carousel (carousel_title, carousel_cat_id, carousel_author, carousel_image, carousel_content, carousel_date, carousel_tags) VALUES (?, ?, ?, ?, ?, ?, ?)";

  if ($insertQry = mysqli_prepare($connection, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($insertQry, "sisssss", $slide_title, $slide_category_id, $slide_author, $slide_image, $slide_date, $slide_content, $slide_tags);

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($insertQry)) {
      //echo "Records inserted successfully.";
      echo "<p class='success-button'>Post Created.";
    } else {
      echo "ERROR: Could not execute query: $sql. " . mysqli_error($connection);
    }
  }

  // $sql = $connection->query(
  //   "INSERT INTO carousel(carousel_title, carousel_cat_id, carousel_author, carousel_image, carousel_content, carousel_date, carousel_tags) 
  //    VALUES ('{$slide_title}','{$slide_category_id}','{$slide_author}', '{$slide_image}','{$slide_content}', now(), '{$slide_tags}')

  //   "
  // );

  //confirmQuery($query);

  // echo "<p class='success-button'>Post Created. <a href='posts.php'>Edit More Posts</a> or <a href='../post.php?p_id={$the_post_id}'>View Post</a>"; 

  // Close statement
  mysqli_stmt_close($insertQry);

  // Close connection
  mysqli_close($connection);
}

?>

<!--ADD SLIDE FROM -->

<h1 class="mt-4"> Add Slide Image</h1>

<form action="" method="post" enctype="multipart/form-data">
  <!-- TITLE -->
  <div class="form-group">
    <label for="title">Slide Title</label>
    <input type="text" class="form-control" name="title">
  </div>

  <div class="form-group">
    <select name="slide_category_id" id="">

      <?php

      $query = "SELECT * FROM categories";
      $select_categories = mysqli_query($connection, $query);

      //confirmQuery($select_categories);

      while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        if ($cat_id == $slide_category_id) {

          echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
        } else {

          echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
      }

      ?>

    </select>

  </div><!-- form-group -->

  <!-- AUTHOR -->
  <div class="form-group">
    <label for="title">Slide Author</label>
    <input type="text" class="form-control" name="author">
  </div>

  <div class="form-group">
    <label for="post_image">Slide Image</label>
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="title">Slide Tags</label>
    <input type="text" class="form-control" name="slide_tags">
  </div>

  <div class="form-group">
    <label for="post_content">Slide Content</label>
    <textarea class="form-control " name="slide_content" class="body" cols="30" rows="10">
    </textarea>
  </div>
  <script>
    CKEDITOR.replace('slide_content');
  </script>
  <div class="sharethis-inline-share-buttons"></div>
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_slide" value="Publish Slide">
  </div>

</form>