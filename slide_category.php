<?php
include "inc/db.php";
include "inc/head.php";
include "inc/header.php";
?>

<div class="container">
  <!-- NAVIGATION -->
  <?php include "inc/navigation.php"; ?>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8">
      <?php
      $limit =  6;
      $query = "SELECT * FROM carousel ORDER BY `carousel`.`carousel_date` DESC LIMIT  ?";
      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 'i', $limit);
      mysqli_stmt_execute($statement);
      $result = mysqli_stmt_get_result($statement);

      foreach ($result as $row) {

        $carouselCat_title = $row['carouselCat_title'];
        $carousel_id = $row['carousel_id'];
        $carousel_title = $row['carousel_title'];
        $carousel_author = $row['carousel_author'];
        $carousel_date = $row['carousel_date'];
        $carousel_image = $row['carousel_image'];

      ?>
        <div class="card card_slide">
          <a class="post_link" href="slide_post.php?s_id=<?= $carousel_id; ?>">
            <figure>
              <img class="card-img-top" src="img/<?= $carousel_image; ?>" alt="Card image cap">
            </figure>
            <div class="post-content card-body">
              <h1 class="post_title"><?= $carousel_title; ?></h1>
              <p class="blog-post-meta post_date"><?= $carousel_date;  ?> by <a class="post_author" href="#"><?= $carousel_author;  ?></a></p>
              <a class="post_cat_title" href="#">
                <p><strong class="post_cat_title"><?= $carouselCat_title;  ?></strong></p>
              </a>
            </div><!-- post-content -->
          </a><!-- post link -->
        </div><!-- card -->
      <?php }   ?>
    </div><!-- alignment and main blog -->

    <!-- SIDEBAR -->
    <aside class="col-md-4 blog-sidebar">
      <?php include "inc/sidebar.php"; ?>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<?php include "inc/footer.php"; ?>
<?php include "inc/scripts.php"; ?>