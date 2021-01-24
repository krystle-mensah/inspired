<form action="" method="post">

  <div class="form-group">
    <label for="cat-title">Edit Sub Categories</label>
    
    <!-- EDITED CATEGORY -->
    
    <?php

      // Check for edit in the url
      if(isset($_GET['edit'])){
        
        // if TRUE - then catch it
        $chapterId = $_GET['edit'];

        // select all from the table where colum is equal to the chapter.
        $query = "SELECT * FROM chapters WHERE chapterId = $chapterId ";
        // function to send query in to the database. 
        $select_chapter_id = mysqli_query($connection,$query);
        
        // while the condition is true fetch the row representing the array from ($variable - see above)
        while($row = mysqli_fetch_array($select_chapter_id)) {
          // Then assign the array to a variable
          $chapterId = $row['chapterId'];
          $chapterName = $row['chapterName'];
          ?>
          <!-- if variable is detected echo it in the input -->
          <input value="<?php if(isset($chapterName)){echo $chapterName;}?>" class="form-control" type="text" name="chapter_title">

          <?php }
        
      }

    ?>

    <?php

    // UPDATE CATEGORY QUERY

    // If post because we are posting a value form submit
    if(isset($_POST['update_chapter'])) {

    // then we get the title
    $the_chapter_title = $_POST['chapterName'];
    // query to update categories and set cat title to variable from form
    $query = "UPDATE chapters SET chapterName = '{$the_chapter_title}' WHERE chapterId = {$chapterId} ";
    // send in. function to perfrom agasint the database
    $update_query = mysqli_query($connection, $query);
    // if NOT
    if( !$update_query ){
    // kill script and return error.
    die("QUERY FAILED" . mysqli_error($connection));
    }
    }
    ?>
  </div><!-- form-group -->
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_chapter" value="Update Chapter">
  </div><!-- form-group -->

</form><!-- form -->