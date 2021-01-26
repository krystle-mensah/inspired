<!-- The Include function is used to put data of one PHP file into another PHP file. If errors occur then the include function produces a warning but does not stop the execution of the script i.e. the script will continue to execute.  -->
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
        //Check whether this variable is empty or set/declared on the index.
        if(isset($_GET['p_id'])){

          $the_post_id = $_GET['p_id']; // output

        }

        ?>
        <!-- connect to database and query for all table data where column equals the url id -->
        <?php $sql = $connection->query("SELECT * FROM posts WHERE post_id = $the_post_id "); 
          // then for each of them as row
          foreach($sql as $row) {
            // loop column values
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            // reference form the database
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
        
          ?>
          <h1 class="mt-4 post_title"><?= $post_title;  ?></h1>
            <a class="post_author" href="#"><?= $post_author;  ?></a>
          <p class="blog-post-meta post_date"><?= $post_date; ?> </p>
          
          <div class="card-body d-flex flex-column align-items-center">
            <!-- / = means current directory -->
            <img class="flex-auto d-none d-md-block post-image img-fluid" src="img/<?= $post_image; ?>" alt="Card image cap">
          </div>
          <?php } ?>
        </div><!-- alignment and main blog -->
      </div><!-- /.row -->

      <div class="row">
        <div class="col-md-8">
            
          <hr>
            
          <p class="post_content"><?php echo $post_content; ?></p>

          <hr>
        
        </div><!-- alignment and main blog -->
        
      </div><!-- row -->
      
      <!-- PAGEINATION --> 
      <!-- <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
      </nav> -->

    </main><!-- /.container -->

    <?php include "inc/footer.php"; ?>
    <?php include "inc/scripts.php";?>  