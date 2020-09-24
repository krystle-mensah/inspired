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
          <?php
          
          if(isset($_GET['category'])){
        
            // Each value when clicked
            $post_category_id = $_GET['category'];
    
          }
          
          // requst all the post table database. 
          //$query = "SELECT * FROM posts WHERE post_category_id = $post_category_id ";

          $query = "SELECT posts.post_category_id AS post_category_id, carousel.carousel_cat_id AS carousel_cat_id FROM posts, carousel WHERE posts.post_category_id AND carousel.carousel_cat_id = $post_category_id";
          //echo $query;

// if ($result=mysqli_query($connection,$query))
//   {
//   // Return the number of rows in result set
//   $rowcount=mysqli_num_rows($result);
//   printf("Result set has %d rows.\n",$rowcount);
//   // Free result set
//   mysqli_free_result($result);
//   }

// mysqli_close($connection);

          // perform a query against the database and send in query and connection
          $select_all_posts_query = mysqli_query($connection,$query);
          
          while($row = mysqli_fetch_array($select_all_posts_query)) {

          //Then assign the row array to a variable
          $post_category_id = $row['post_category_id'];
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
                    $request_to = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                    $select_categories_id = mysqli_query($connection,$request_to);
                    // while the condition is true fetch the row representing the array from ($variable - see above)
                    while($row = mysqli_fetch_array($select_categories_id)) {
                    // Then assign the array to a variable
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    // display the cat title 
                    //echo "<td>{$cat_title}</td>";
                    } 
                    ?>
                    <a class="post_cat_title" href="category.php?category=<?= $cat_id;  ?>">
                      <p><strong class="post_cat_title"><?= $cat_title;  ?></strong></p>
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