<?php

//GET - ID
if (isset($_GET['GET_carousel_id'])) {

  //AND SAVE HERE
  $GET_carousel_id = $_GET['GET_carousel_id'];
}

$query = "SELECT * FROM carousel WHERE carousel_id = ? ";

$statement = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($statement, 'i', $GET_carousel_id);
mysqli_stmt_execute($statement);
$select_carousel_by_id = mysqli_stmt_get_result($statement);

while ($row = mysqli_fetch_array($select_carousel_by_id)) {

  // ARRAY values we bring back and assign to variable
  $slide_id          = $row['carousel_id'];
  $slide_title       = $row['carousel_title'];
  $carouselCat_title = $row['carouselCat_title'];
  $slide_author      = $row['carousel_author'];
  $slide_image       = $row['carousel_image'];
  $slide_tags        = $row['carousel_tags'];
  $slide_content     = $row['carousel_content'];
  $slide_date        = $row['carousel_date'];
}

if (isset($_POST['update_slide'])) {
  //echo "hi";

  $slide_title          =  $_POST['carousel_title'];
  $slide_author         =  $_POST['carousel_author'];
  $slide_image          =  $_FILES['image']['name'];
  $slide_image_temp     =  $_FILES['image']['tmp_name'];
  $slide_content        =  $_POST['carousel_content'];
  $slide_tags           =  $_POST['carousel_tags'];

  move_uploaded_file($slide_image_temp, "../img/$slide_image");

  if (empty($slide_image)) {

    $query = "SELECT * FROM carousel WHERE carousel_id = ?";

    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, 'i', $GET_carousel_id);
    mysqli_stmt_execute($statement);
    $select_image = mysqli_stmt_get_result($statement);

    while ($row = mysqli_fetch_array($select_image)) {

      $slide_image = $row['carousel_image'];
    }
  }

  $updateQry = "UPDATE carousel SET carousel_title  = ?, carousel_author  = ?, carousel_date  = ?, carousel_tags  = ?, carousel_content  = ?, carousel_image  = ? WHERE carousel_id = ?";

  $updateStatement = mysqli_prepare($connection, $updateQry);

  mysqli_stmt_bind_param($updateStatement, 'ssssssi', $slide_title, $slide_author, $slide_date, $slide_tags, $slide_content, $slide_image, $GET_carousel_id);
  mysqli_stmt_execute($updateStatement);

  mysqli_close($connection);

  // display this
  //echo "<p class='success-button'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";

}

?>

<!-- EDIT SLIDE FORM  -->
<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Title</label>
    <input value="<?= $slide_title; ?>" type="text" class="form-control" name="carousel_title">
  </div>

  <div class="form-group">
    <label for="title">Post Author</label>
    <input value="<?= $slide_author; ?>" type="text" class="form-control" name="carousel_author">
  </div>

  <div class="form-group">
    <label for="image">Post Image</label>
    <img width="100" src="../img/<?= $slide_image; ?>" alt="">
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="title">Post Tags</label>
    <input value="<?= $slide_tags; ?>" type="text" class="form-control" name="carousel_tags">
  </div>

  <div class="form-group">
    <label for="slide_content">Post Content</label>
    <textarea class="form-control " name="carousel_content" id="body" cols="30" rows="10"><?= $slide_content; ?></textarea>
  </div>
  <script>
    CKEDITOR.replace('carousel_content');
  </script>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_slide" value="Update Slide">
  </div>

</form>