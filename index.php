<?php include "inc/db.php" ?>

<!-- include head.php page here -->
<?php include "inc/head.php"; ?>

<div class="container">
      <!-- HEADER -->
      <?php include "inc/header.php"; ?>

      <!-- NAVIGATION -->
      <?php include "inc/navigation.php"; ?>

      <!-- CAROUSEL -->
      <?php include "inc/carousel.php"; ?>

</div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog_main">
          <?php 
          
          // requst all the post table database. 
          $query = "SELECT * FROM posts";
          //echo $query; // OUTPUT - SELECT * FROM posts

          // perform a query against the database and send in query and connection
          $select_all_posts_query = mysqli_query($connection,$query);
          
          // while the condition is true fetch the row representing the array from $select_all_posts_query 
          while($row = mysqli_fetch_array($select_all_posts_query)) {
          //echo $row; // Notice: Array to string conversion

          // Then assign the row array to a variable
          $post_id = $row['post_id']; 
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          // reference form the database
          $post_image = $row['post_image'];
        
          ?>
          <div class="col-md-6">
            <div class="blog-post">
              
                <div class="card box-shadow">
                  <div class="card-body d-flex flex-column align-items-start">
                    <img class="flex-auto d-none d-md-block post-image img-fluid" src="main-img/<?php echo $post_image; ?>" alt="Card image cap">
                  </div>
                  <div class="post-content">
                    <a class="post_title" href="#"><h3><?php echo $post_title;  ?></h3></a>
                    
                    <p class="blog-post-meta"><?php echo $post_date;  ?> by <a class="post_author" href="#"><?php echo $post_author;  ?></a></p>
                    
                    <p><strong class="d-inline-block mb-2 text-success">category Title</strong></p>
                  </div><!-- post-content -->
                </div>
              </div>
            </div><!-- /.blog-post -->
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