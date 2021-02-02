<div class="col-lg-12">
  <h1 class="mt-4">Add Posts</h1>
</div><!-- alignment -->

<!-- CREATE POST -->
<?php if(isset($_POST['create_post'])){
    // TEST - type in the title field then click update button 
    //echo $_POST['title'];

    // SET THESE VALUES FOR THE USER
    $post_title        = $_POST['title'];
    $post_author       = $_POST['author'];
    $post_category_id  = $_POST['post_category_id'];
    $postSubCatID      = $_POST['postSubCatID'];
    $post_image        = $_FILES['image']['name'];
    $post_image_temp   = $_FILES['image']['tmp_name'];
    $post_tags         = $_POST['post_tags'];
    $post_content      = $_POST['post_content'];
    $post_date         = date('d-m-y');
    $post_status       = $_POST['post_status'];

    $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../img/$post_image" );

    $query = "INSERT INTO posts(post_category_id,postSubCatID, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";

    $query .= "VALUES('{$post_category_id}','{$postSubCatID}','{$post_title}','{$post_author}',now(),'{$post_image}', '{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}') "; 

    $create_post_query = mysqli_query($connection, $query); 

    confirmQuery($query);

    //echo "<p class='success-button'>Post Created. <a href='posts.php'>Edit More Posts</a> or <a href='../post.php?p_id={$the_post_id}'>View Post</a>"; 

} ?>

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
  <!-- CAT ID -->
  <div class="form-group">
    <label for="title">select a category</label>
    <select name="post_category_id" id="">
      <?php

        $query = "SELECT * FROM categories";  
        $select_categories = mysqli_query($connection,$query);
        
        confirmQuery($select_categories);

        while($row = mysqli_fetch_assoc($select_categories)) {
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];

          if($cat_id == $post_category_id) {
        
          echo "<option selected value='{$cat_id}'>{$cat_title}</option>";

          } else {

            echo "<option value='{$cat_id}'>{$cat_title}</option>";

          }
        }
      ?>
    </select>
  </div><!-- form-group -->
  <!-- SUB CATEGORIES -->
  <!-- CAT ID -->
  <div class="form-group">
    <label for="title">select a sub category</label>
    <select name="postSubCatID" id="">
      <?php

        $query = "SELECT * FROM sub_categories";  
        $selectSubCategories = mysqli_query($connection,$query);
        confirmQuery($selectSubCategories);

        while($row = mysqli_fetch_assoc($selectSubCategories)) {
          $subCategoriesID = $row['subCategoriesID'];
          $subCategoriesTitle = $row['subCategoriesTitle'];

          if($subCategoriesID == $postSubCatID) {
        
           echo "<option selected value='{$subCategoriesID}'>{$subCategoriesTitle}</option>";

          } else {

            echo "<option value='{$subCategoriesID}'>{$subCategoriesTitle}</option>";

          }
        }

      ?>
    
    </select>
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
    <input type="file"  name="image">
  </div>
  <!-- TAGS -->
  <div class="form-group">
    <label for="title">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
  </div>
  <!-- CONTENT -->
  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control "name="post_content" cols="30" rows="10">
    </textarea>
  </div>
  <!-- SUBMIT BUTTON -->
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
  </div>

</form>