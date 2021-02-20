<?php

//if the post id is set in the url
if (isset($_GET['GET_carousel_id'])) {

  //GET it and save it in this variable
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
  $slide_category_id = $row['carousel_cat_id'];
  $slide_author      = $row['carousel_author'];
  $slide_image       = $row['carousel_image'];
  $slide_tags        = $row['carousel_tags'];
  $slide_content     = $row['carousel_content'];
  $slide_date        = $row['carousel_date'];
}

if (isset($_POST['update_slide'])) {
  //echo "hi";

  $slide_title          =  $_POST['carousel_title'];
  $slide_category_id    =  $_POST['carousel_cat_id'];
  $slide_author         =  $_POST['carousel_author'];
  $slide_image          =  $_FILES['image']['name'];
  $slide_image_temp     =  $_FILES['image']['tmp_name'];
  $slide_content        =  $_POST['carousel_content'];
  $slide_tags           =  $_POST['carousel_tags'];

  move_uploaded_file($slide_image_temp, "../img/$slide_image");

  // if empty var
  if (empty($slide_image)) {

    //select all where col id = var
    $query = "SELECT * FROM carousel WHERE carousel_id = ?";

    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, 'i', $GET_carousel_id);
    mysqli_stmt_execute($statement);
    $select_image = mysqli_stmt_get_result($statement);

    while ($row = mysqli_fetch_array($select_image)) {

      $slide_image = $row['carousel_image'];
    }
  }

  $updateQry = "UPDATE carousel SET carousel_title  = ?, carousel_author  = ?, carousel_cat_id  = ?, carousel_date  = ?, post_status  = ?, carousel_tags  = ?, carousel_content  = ?, carousel_image  = ? WHERE carousel_id = ?";

  $updateStatement = mysqli_prepare($connection, $updateQry);

  mysqli_stmt_bind_param($updateStatement, 'ssssssssi', $slide_title, $slide_author, $slide_category_id, $post_date, $slide_tags, $post_tags, $slide_content, $slide_image, $GET_carousel_id);
  mysqli_stmt_execute($updateStatement);

  mysqli_close($connection);

  // update post then set each column in the database table equal to variable the form.
  // $query = "UPDATE carousel SET carousel_title  = '{$slide_title}', carousel_author = '{$slide_author}', carousel_cat_id = '{$slide_category_id}', carousel_date   =  now(), 
  // carousel_tags = '{$slide_tags}', carousel_content = '{$slide_content}', carousel_image = '{$slide_image}' WHERE carousel_id  = {$GET_carousel_id} ";

  // // Then we send in the query
  // $update_slide = mysqli_query($connection, $query);

  // // confirm update post
  // confirmQuery($update_slide);

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

    <select name="carousel_cat_id">

      <?php
      // SELECT ALL CATEGORIES QUERY
      $query = "SELECT * FROM categories";

      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_execute($statement);
      $select_categories = mysqli_stmt_get_result($statement);

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

  </div> <!-- form-group -->

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