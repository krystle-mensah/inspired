<?php include "inc/db.php" ?>

<!-- include head.php page here -->
<?php include "inc/head.php"; ?>

<!-- HEADER -->
<?php include "inc/header.php"; ?>

<div class="container">

  <!-- NAVIGATION -->
  <?php include "inc/navigation.php"; ?>

  <!-- CAROUSEL -->
  <?php include "inc/carousel.php"; ?>

</div>


<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog_main">

      <?php

      //Detect the button click by the name attribute submit from the user 
      if (isset($_POST['submit'])) {
        // then grap the user input by the name attribute and save it here
        $search = $_POST['search'];

        //$firstName = 'c%';

        $query = "SELECT * FROM posts WHERE post_tags LIKE ?";

        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, 's', $search);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);


        //$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
        // Then I send in that request with a function
        //$search_query = mysqli_query($connection, $query);
        // Then if that request does not get to the database
        if (!$result) {
          // Then I want to print a message and terminate the current script: with an error message. I have to pass in the connection.
          die("QUERY FAILED" . mysqli_error($connection));
        }
        // Now im going to count the rows that are coming out of my query with a function. 
        $count = mysqli_num_rows($result);
        // Then if the query equals 0
        if ($count === 0) {
          // Then display 'No Result' 
          echo "<h1> NO RESULT </h1>";
          // else if there is data
        } else {

          foreach ($result as $row) {
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];

      ?>

            <div class="col-md-6">
              <a class="post_link" href="post.php?p_id=<?= $row['post_id']; ?>">
                <div class="blog-post">

                  <div class="card box-shadow">
                    <div class="card-body d-flex flex-column align-items-start">
                      <img class="flex-auto d-none d-md-block post-image img-fluid" src="img/<?= $post_image; ?>" alt="Card image cap">
                    </div>
                    <div class="post-content">
                      <h1 class="post_title"><?= $post_title;  ?></h1>
                      <p class="blog-post-meta post_date"><?= $post_date;  ?> by <a class="post_author" href="#"><?= $post_author;  ?></a></p>
                      <?php
                      //$request_to = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                      //$select_categories_id = mysqli_query($connection, $request_to);

                      $query = "SELECT * FROM categories WHERE cat_id = ?";
                      $statement = mysqli_prepare($connection, $query);
                      mysqli_stmt_bind_param($statement, 'i', $post_category_id);
                      mysqli_stmt_execute($statement);
                      $result = mysqli_stmt_get_result($statement);

                      foreach ($result as $number_key) {
                        $cat_id = $number_key['cat_id'];
                        $cat_title = $number_key['cat_title'];
                      };
                      ?>
                      <a class="post_cat_title" href="category.php?category=<?= $cat_id;  ?>">
                        <p><strong><?= $cat_title;  ?></strong></p>
                      </a>

                    </div><!-- post-content -->
                  </div><!-- card box-shadow -->



                </div><!-- blog-post -->
              </a><!-- post link -->
            </div><!-- alignment -->

          <?php } ?>

      <?php }
      } ?>
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
<?php include "inc/scripts.php"; ?>