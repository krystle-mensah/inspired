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
        <div class="col-md-8">
        <?php 

        // Detact event on the index
        if(isset($_GET['p_id'])){
          // Each value when clicked
          $the_post_id = $_GET['p_id'];
        }

        ?>
          <?php 
          
          // requst all the post table database. 
          $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
          //echo $query; // OUTPUT - SELECT * FROM posts

          // perform a query against the database and send in query and connection
          $select_all_posts_query = mysqli_query($connection,$query);
          
          // while the condition is true fetch the row representing the array from $select_all_posts_query 
          while($row = mysqli_fetch_array($select_all_posts_query)) {
          //echo $row; // Notice: Array to string conversion

          // Then assign the row array to a variable
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          // reference form the database
          $post_image = $row['post_image'];
          $post_content = $row['post_content'];
        
          ?>
          <h1 class="mt-4"><?php echo $post_title;  ?></h1>
          by <a class="post_author" href="#"><?php echo $post_author;  ?></a>
          <p class="blog-post-meta"><?php echo $post_date;  ?> </p>
          
            
                <div class="card box-shadow">
                  <div class="card-body d-flex flex-column align-items-start">
                    <!-- / = means current directory -->
                    <img class="flex-auto d-none d-md-block post-image img-fluid" src="img/<?php echo $post_image; ?>" alt="Card image cap">
                  </div>
                  <div class="post-content">
                    
                    
                    
                    
                    <p><?php echo $post_content ?></p>
                  </div><!-- post-content -->
                </div>
              
            
          <?php }   ?>
        </div><!-- alignment and main blog -->
      </div><!-- /.row -->

      <!-- PAGEINATION --> 
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
      </nav>

    </main><!-- /.container -->

    <?php include "inc/footer.php"; ?>