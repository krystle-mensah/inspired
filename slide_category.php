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
    <div class="col-md-8 blog_main">
      <!--  condition ? true else "not set" -->
      <?php isset($_GET['category']) ? $slide_category_id = $_GET['category'] : "not set";

      $query = "SELECT * FROM carousel WHERE carousel_cat_id = ?";
      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 'i', $slide_category_id);
      mysqli_stmt_execute($statement);
      $result = mysqli_stmt_get_result($statement);

      foreach ($result as $row) {

        $slide_category_id = $row['carousel_cat_id'];
        $carousel_id = $row['carousel_id'];
        $carousel_title = $row['carousel_title'];
        $carousel_author = $row['carousel_author'];
        $carousel_date = $row['carousel_date'];
        $carousel_image = $row['carousel_image'];

      ?>
        <div class="card">
          <a class="post_link" href="slide_post.php?s_id=<?= $carousel_id; ?>">
            <!-- <div class="col-md-6"> -->
            <div class="blog-post ">
              <div class="card-body d-flex flex-column align-items-start">
                <img class="flex-auto d-none d-md-block post-image img-fluid" src="img/<?= $carousel_image; ?>" alt="Card image cap">
              </div>
              <div class="post-content">
                <h1 class="post_title"><?= $carousel_title; ?></h1>
                <p class="blog-post-meta post_date"><?= $carousel_date;  ?> by <a class="post_author" href="#"><?= $carousel_author;  ?></a></p>

                <!-- REQUST CATEGOROY TITLES -->
                <?php
                $query = "SELECT * FROM categories WHERE cat_id = ?";
                $statement = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($statement, 'i', $slide_category_id);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                foreach ($result as $row) {
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];
                }
                ?>
                <a class="post_cat_title" href="category.php?category=<?= $cat_id;  ?>">
                  <p><strong class="post_cat_title"><?= $cat_title;  ?></strong></p>
                </a>
              </div><!-- post-content -->
            </div><!-- /.blog-post -->
            <!-- </div> -->
            <!-- alignment -->
          </a><!-- post link -->
        </div><!-- card -->
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
<?php include "inc/scripts.php"; ?>