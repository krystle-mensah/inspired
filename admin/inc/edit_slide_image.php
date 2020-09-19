<?php

//if the post id is set in the url
if(isset($_GET['carousel_id'])){

  $url_carousel_id = $_GET['carousel_id'];
}

$sql = $connection->query("SELECT * FROM carousel WHERE carousel_id = $url_carousel_id ");

foreach($sql as $row) {

  // ARRAY values we bring back and assign to variable
  $carousel_id = $row['carousel_id'];
  $carousel_title = $row['carousel_title'];
  $carousel_author = $row['carousel_author'];
  $carousel_image = $row['carousel_image'];
  $carousel_tags = $row['carousel_tags'];
  $carousel_content = $row['carousel_content'];
  $carousel_cat_id = $row['carousel_cat_id'];
  $carousel_date = $row['carousel_date'];
  
}

if(isset($_POST['update_carousel'])){

  $carousel_author         =  $_POST['carousel_author'];
  $carousel_title          =  $_POST['carousel_title'];
  $carousel_cat_id         =  $_POST['carousel_cat_id'];
  $carousel_image          =  $_FILES['image']['name'];
  $carousel_image_temp     =  $_FILES['image']['tmp_name'];
  $carousel_content        =  $_POST['carousel_content'];
  $carousel_tags           =  $_POST['carousel_tags'];
  
  //move file to from var then move to new location
  move_uploaded_file($carousel_image_temp, "../img/$carousel_image");

  // if empty var
  if(empty($carousel_image)) {
    
    $sql = $connection->query("SELECT * FROM carousel WHERE carousel_id = $url_carousel_id ");
    
    foreach($sql as $row):
            
      $carousel_image = $row['carousel_image'];
  
    endforeach;
  }

  }

  // update post then set each column in the database table equal to variable the form.
  
  $query = "UPDATE carousel SET ";
  $query .="carousel_title  = '{$carousel_title}', ";
  $query .="carousel_author  = '{$carousel_author}', ";
  $query .="carousel_cat_id = '{$carousel_cat_id}', ";
  $query .="carousel_date   =  now(), ";
  $query .="carousel_tags   = '{$carousel_tags}', ";
  $query .="carousel_content= '{$carousel_content}', ";
  $query .="carousel_image  = '{$carousel_image}' ";
  $query .= "WHERE carousel_id = {$url_carousel_id} ";


  // $sql = $connection->query(
  //   "INSERT INTO carousel(carousel_title, carousel_cat_id, carousel_author, carousel_image, carousel_content, carousel_date, carousel_tags) 
  //    VALUES ('{$slide_title}','{$slide_category_id}','{$slide_author}', '{$slide_image }','{$slide_content}', now(), '{$slide_tags}')
    
  //   ");

  // Then we send in the query
  //$update_post = mysqli_query($connection,$query);
  
  // confirm update post
  //confirmQuery($update_post);
  
  // display this
  //echo "<p class='success-button'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";



?>

<!-- multipart/form-data lets you send encoded data  -->
<form action="" method="post" enctype="multipart/form-data"> 

  <div class="form-group">
    <label for="title">Slide Title</label>
    <input value="<?= $carousel_title; ?>" type="text" class="form-control" name="post_title">
  </div>

  <div class="form-group">
    
    <select name="post_category" id="">

      <!-- // SELECT ALL CATEGORIES QUERY -->
      <?php $sql = $connection->query("SELECT * FROM categories");
    
        confirmQuery($sql);

          foreach($sql as $row) :
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];


          if($cat_id == $post_category_id) {

            echo "<option selected value='{$cat_id}'>{$cat_title}</option>";

          } else {

            echo "<option value='{$cat_id}'>{$cat_title}</option>";

          }
              
          endforeach;


      ?>
    
    </select>
    
  </div> <!-- form-group -->

  <div class="form-group">
    <label for="title">Slide Author</label>
    <input value="<?= $carousel_author; ?>" type="text" class="form-control" name="post_author">
  </div>
  

  <div class="form-group">
    <!-- not sure if below code is supossed to be here -->
    <label for="post_image">Slide Image</label>
    <img width="100" src="../img/<?= $carousel_image; ?>" alt="">
    <input type="file"  name="image">
  </div>

  <div class="form-group">
    <label for="title">Slide Tags</label>
    <input value="<?= $carousel_tags; ?>" type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label for="post_content">Slide Content</label>
    <textarea class="form-control "name="post_content" id="body" cols="30" rows="10"><?= $carousel_content; ?></textarea>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_carousel" value="Update Slide">
  </div>

</form>