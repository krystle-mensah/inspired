<?php

if (isset($_POST['create_slide'])) {
  // TEST - type in the title field then click button 
  ////echo $_POST['title']; // output - we are geeting the title

  //ADD THESE NAME VALUES 
  $slide_title        = $_POST['title'];
  $slide_author       = $_POST['author'];
  $slide_image        = $_FILES['image']['name'];
  $slide_image_temp   = $_FILES['image']['tmp_name'];
  $slide_content      = $_POST['slide_content'];
  $slide_tags         = $_POST['slide_tags'];
  $slide_date         = date('Y-m-d');

  move_uploaded_file($slide_image_temp, "../img/$slide_image");

  $sql = "INSERT INTO carousel (carousel_title, carousel_author, carousel_image, carousel_content, carousel_tags, carousel_date) VALUES (?, ?, ?, ?, ?,?)";

  if ($insertQry = mysqli_prepare($connection, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($insertQry, "ssssss", $slide_title, $slide_author, $slide_image, $slide_content, $slide_tags, $slide_date);

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($insertQry)) {
      echo "Records inserted successfully.";
    } else {
      echo "ERROR: Could not execute query: $sql. " . mysqli_error($connection);
    }
    // Close statement
    mysqli_stmt_close($insertQry);
  }
  // Close connection
  mysqli_close($connection);

  //echo "<p class='success-button'>Slide Created. <a href='slide_images.php'>Edit More Slides</a> or <a href='../slide_post.php?s_id={$GETslide_id}'>View slide</a>";

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