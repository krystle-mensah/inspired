<div class="col-lg-12">
  <h1 class="mt-4">Add Posts</h1>
</div> 

<?php 

if(isset($_POST['create_post'])){
  // TEST - type in the title field then click update button 
  //echo $_POST['title'];

  // Catch name attributes from values
  $post_title        = $_POST['title'];
  $post_author       = $_POST['author'];
  $post_category_id  = $_POST['post_category_id'];
  $post_chapter_id   = $_POST['post_chapter_id'];

  $post_image        = $_FILES['image']['name'];
  $post_image_temp   = $_FILES['image']['tmp_name'];
  
  //$post_video        = $_FILES['video']['name'];
  //$post_video_temp   = $_FILES['video']['tmp_name'];
  
  $post_tags         = $_POST['post_tags'];
  $post_content      = $_POST['post_content'];
  $post_date         = date('d-m-y');
  $post_status       = $_POST['post_status'];

  //hard coding the value
  $post_comment_count = 4;
  
  
  // move files to post image temp to outside of admin in a root dir called img. 
  move_uploaded_file($post_image_temp, "../img/$post_image" );

  //move_uploaded_file( $_FILES["file"]["tmp_name"], "videos/" . $_FILES["file"]["name"] );
      
  // $post_video = preg_replace(" #.*youtube\.com/wat`ch\?v=#", "", $post_video);
  // //echo "the video Id " . $post_video . "<br>"; 
  // $post_video = ' <iframe width="560" height="315" src="https://www.youtube.com/embed/' .$post_video.' " frameborder="0" allowfullscreen></iframe>';
  // echo $post_video;

  $query = "INSERT INTO posts(post_category_id,post_chapter_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";

  $query .= "VALUES('{$post_category_id}','{$post_chapter_id}','{$post_title}','{$post_author}',now(),'{$post_image}', '{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}') "; 

  // then we send the query in
  $create_post_query = mysqli_query($connection, $query); 

  confirmQuery($query);

  //echo "<p class='success-button'>Post Created. <a href='posts.php'>Edit More Posts</a> or <a href='../post.php?p_id={$the_post_id}'>View Post</a>"; 

}

?>

<!-- FORM -->

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
  <!-- POST CAT ID -->
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

  <!-- POST Chapter ID -->
  <!-- <div class="form-group">
    <label for="title">select a chapter</label>
      <select name="post_chapter_id" id="">

      <?php

        // QUERY FOR ALL TABLE
        // $query = "SELECT * FROM chapters";
        // $select_chapters = mysqli_query($connection,$query);
        
        // confirmQuery($select_chapters);

        // while($row = mysqli_fetch_assoc($select_chapters)) {
        //   $chapterId = $row['chapterId'];
        //   $chapterName = $row['chapterName'];

        // if($chapterId == $post_chapter_id) {
      
        // echo "<option selected value='$chapterId'>$chapterName</option>";

        // } else {

        //   echo "<option value='$chapterId'>$chapterName</option>";

        // }
            
        // }

      ?>
    
    </select>
    
  </div> -->
  <!-- form-group -->

  <div class="form-group">

    <select name="post_status" id="">
      <option value="draft">Post Status</option>
      <option value="published">Publish</option>
      <option value="draft">Draft</option>
    </select>

  </div>

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

  <!-- SUBMIT BUTTON -->
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
  </div>

</form>