<?php 

// if set
if(isset($_POST['create_post'])){
  // TEST - type in the title field then click update button 
  //echo $_POST['title'];

  //  form values
  $post_title        = $_POST['title'];
  $post_author       = $_POST['author'];
  $post_category_id  = $_POST['post_category_id'];
  $post_image        = $_FILES['image']['name'];
  $post_image_temp   = $_FILES['image']['tmp_name'];
  $post_tags         = $_POST['post_tags'];
  $post_content      = $_POST['post_content'];
  $post_date         = date('d-m-y');
  // hard coding the value
  $post_comment_count = 4;
  //$post_status       = $_POST['post_status'];
  
  // move files to post image temp to outside of admin in a root dir called img. 
  move_uploaded_file($post_image_temp, "../img/$post_image" );

  // query to insert to database
  //$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags, post_comment_count, post_status) ";
  $query = "INSERT INTO posts(post_title, post_author, post_category_id, post_image, post_tags, post_content, post_date, post_comment_count) ";

  // values we are inserting from the from.
  // $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}') ";

  $query .= "VALUES('{$post_title}','{$post_author}',{$post_category_id}, '{$post_image }','{$post_tags}','{$post_content}', now(), '{$post_comment_count}') ";  
  
  // Then send query and connection
  $create_post_query = mysqli_query($connection, $query); 

  confirmQuery($create_post_query);

  //$the_post_id = mysqli_insert_id($connection);

  //echo "<p class='success-button'>Post Created. <a href='posts.php'>Edit More Posts</a> or <a href='../post.php?p_id={$the_post_id}'>View Post</a>"; 

}

?>

<!-- multipart/form-data lets you send encoded data  -->
<form action="" method="post" enctype="multipart/form-data"> 
  <!-- TITLE -->
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">
  </div>

  <div class="form-group">
    <label for="title">cat id</label>
    <input type="text" class="form-control" name="post_category_id">
  </div>

  <!-- <div class="form-group"> -->
    <!-- <select name="post_category_id" id=""> -->

      <?php

        // // hold all from database table
        // $query = "SELECT * FROM categories";
        
        // // HOLD and send in query and connection
        // $select_categories = mysqli_query($connection,$query);
        
        // // CONFIRM VAR
        // confirmQuery($select_categories);

        // while($row = mysqli_fetch_assoc($select_categories)) {
        //   $cat_id = $row['cat_id'];
        //   $cat_title = $row['cat_title'];

        // if($cat_id == $post_category_id) {
      
        // echo "<option selected value='{$cat_id}'>{$cat_title}</option>";

        // } else {

        //   echo "<option value='{$cat_id}'>{$cat_title}</option>";

        // }
            
        // }

      ?>
    
    <!-- </select> -->
    
  <!-- </div>  -->
  <!-- form-group -->
  <!-- AUTHOR -->
  <div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" class="form-control" name="author">
  </div>

  <!-- <div class="form-group">

    <select name="post_status" id="">
      <option value="draft">Post Status</option>
      <option value="published">Publish</option>
      <option value="draft">Draft</option>
    </select>

    

  </div> -->

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file"  name="image">
  </div>

  <div class="form-group">
    <label for="title">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control "name="post_content" id="body" cols="30" rows="10">
    </textarea>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
  </div>

</form>