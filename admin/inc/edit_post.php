<?php

//if the edit button is clicked pick up that ID
if (isset($_GET['p_id'])) {
  //$user_firstname        = $connection->real_escape_string($_POST['user_firstname']);
  //GET it and save it in this variable
  $the_post_id = $connection->real_escape_string($_GET['p_id']);
}
//then query the database
$query = "SELECT * FROM posts WHERE post_id = ?";
// then prepare a statement
$statement = mysqli_prepare($connection, $query);
// then bind the parms
mysqli_stmt_bind_param($statement, 'i', $the_post_id);
// then excute the statment
mysqli_stmt_execute($statement);
// then return the result
$select_posts_by_id = mysqli_stmt_get_result($statement);
// then loop through the result
while ($row = mysqli_fetch_array($select_posts_by_id)) {

  $post_id = $row['post_id'];
  $post_author = $row['post_author'];
  $post_title = $row['post_title'];
  $post_category_id = $row['post_category_id'];
  $post_status = $row['post_status'];
  $post_image = $row['post_image'];
  $post_content = $row['post_content'];
  $post_tags = $row['post_tags'];
  $post_comment_count = $row['post_comment_count'];
  $post_date = $row['post_date'];
}

if (isset($_POST['update_post'])) {
  //echo "hi";
  $post_author         =  $connection->real_escape_string($_POST['post_author']);
  $post_title          =  $connection->real_escape_string($_POST['post_title']);
  $post_category_id    =  $connection->real_escape_string($_POST['post_category']);
  $post_status         =  $connection->real_escape_string($_POST['post_status']);
  $post_image          =  $connection->real_escape_string($_FILES['image']['name']);
  $post_image_temp     =  $connection->real_escape_string($_FILES['image']['tmp_name']);
  //$post_content        =  $connection->real_escape_string($_POST['post_content']);
  $post_content = $_POST['post_content'];
  $post_tags           =  $connection->real_escape_string($_POST['post_tags']);

  move_uploaded_file($post_image_temp, "../img/$post_image");

  if (empty($post_image)) {
    $query = "SELECT * FROM posts WHERE post_id = ? ";

    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, 'i', $the_post_id);
    mysqli_stmt_execute($statement);
    $select_image = mysqli_stmt_get_result($statement);

    // then loop though result set
    while ($row = mysqli_fetch_array($select_image)) {
      // assign to var      
      $post_image = $row['post_image'];
    }
  }

  $updateQry = "UPDATE posts SET post_title  = ?, post_author  = ?, post_category_id  = ?, post_date  = ?, post_status  = ?, post_tags  = ?, post_content  = ?, post_image  = ? WHERE post_id = ?";

  $updateStatement = mysqli_prepare($connection, $updateQry);

  mysqli_stmt_bind_param($updateStatement, 'ssssssssi', $post_title, $post_author, $post_category_id, $post_date, $post_status, $post_tags, $post_content, $post_image, $the_post_id);
  mysqli_stmt_execute($updateStatement);

  mysqli_close($connection);

  echo "<p class='success-button'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";
}

?>

<!-- multipart/form-data lets you send encoded data  -->
<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?= $post_title; ?>" type="text" class="form-control" name="post_title">
  </div>

  <div class="form-group">

    <select name="post_category" id="">
      <?php
      // SELECT ALL CATEGORIES QUERY
      $query = "SELECT * FROM categories ";

      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_execute($statement);
      $select_categories = mysqli_stmt_get_result($statement);

      while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        if ($cat_id == $post_category_id) {

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
    <input value="<?= $post_author; ?>" type="text" class="form-control" name="post_author">
  </div>

  <div class="form-group">

    <select name="post_status" id="">

      <option value=''><?php echo $post_status; ?></option>

      <?php
      // this works kind of
      if ($post_status == "published") {
        echo "<option selected value='draft'>Draft</option>";
      } else {

        echo "<option selected value='published'>Publish</option>";
      }

      ?>
    </select><!-- post_status -->
  </div><!-- form-group -->

  <div class="form-group">
    <!-- not sure if below code is supossed to be here -->
    <label for="post_image">Post Image</label>
    <img width="100" src="../img/<?= $post_image; ?>" alt="">
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="title">Post Tags</label>
    <input value="<?= $post_tags; ?>" type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control " name="post_content" id="body" cols="30" rows="10"><?= $post_content; ?></textarea>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
  </div>

</form>