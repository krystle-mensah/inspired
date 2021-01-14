<?php include "inc/db.php" ?>

<!-- include head.php page here -->
<?php include "inc/head.php"; ?>

<!-- HEADER -->
<?php include "inc/header.php"; ?>

<div class="container">
      
  <!-- NAVIGATION -->
  <?php include "inc/navigation.php"; ?>

  

</div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog_main">
          
          <!--  -->
          <?php
          
          if(isset($_GET['chapter'])){
            // Each value when clicked
            $post_chapter_id = $_GET['chapter']; //we are getting the id
    
          }else {
            echo "not set";
          }
          
          // requst all the post table database. 
          $sql = $connection->query("SELECT * FROM posts WHERE post_chapter_id = $post_chapter_id "); 

          
          foreach($sql as $row) {

          //Then assign the row array to a variable
          $post_chapter_id = $row['post_chapter_id'];
          $post_id = $row['post_id']; 
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          // reference form the database
          $post_image = $row['post_image'];
        
          ?>
          <div class="col-md-6">
            <a class="post_link" href="post.php?p_id<?= $post_id;  ?>">
              <div class="blog-post">
              
                <div class="card box-shadow">
                  <div class="card-body d-flex flex-column align-items-start">
                    <img class="flex-auto d-none d-md-block post-image img-fluid" src="img/<?= $post_image; ?>" alt="Card image cap">
                  </div>
                  <div class="post-content">
                    <h1 class="post_title"><?= $post_title; ?></h1>
                    <p class="blog-post-meta post_date"><?= $post_date;  ?> by <a class="post_author" href="#"><?= $post_author;  ?></a></p>
                    <?php 
                    $request_to = "SELECT * FROM chapters WHERE chapterId = {$post_chapter_id} ";
                    $select_chapters_id = mysqli_query($connection,$request_to);
                    // while the condition is true fetch the row representing the array from ($variable - see above)
                    while($row = mysqli_fetch_array($select_chapters_id)) {
                    // Then assign the array to a variable
                    $chapterId = $row['chapterId'];
                    $chapterName = $row['chapterName'];
                    } 
                    ?>
                    <a class="post_cat_title" href="category.php?category=<?= $row['chapterId']?>">
                      <p><strong class="post_cat_title"><?= $row['chapterName'] ?></strong></p>
                    </a>
        
                  </div><!-- post-content -->
                </div><!-- card box-shadow --> 
              </div><!-- /.blog-post -->
            </a><!-- post link -->
          </div><!-- alignment -->
          <?php }   ?>

        </div><!-- alignment and main blog -->
        
        <!-- SIDEBAR -->
        <aside class="col-md-4 blog-sidebar">
          <?php include "inc/sidebar.php"; ?>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

      <!-- PAGEINATION --> 
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
      </nav>

    </main><!-- /.container -->

    <?php include "inc/footer.php"; ?>