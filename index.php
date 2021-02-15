<?php
include "inc/db.php";
include "inc/head.php";
include "inc/header.php";
?>

<div class="container">
  <!-- NAVIGATION -->
  <?php include "inc/navigation.php"; ?>
  <!-- CAROUSEL -->
  <?php include "inc/carousel.php"; ?>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog_main">
      <div class="row h-100">
        <?php $sql = $connection->query("SELECT * FROM `posts` ORDER BY `posts`.`post_date` DESC");
        foreach ($sql as $row) {

          $post_category_id = $row['post_category_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];

        ?>
          <a class="post_link" href="post.php?p_id=<?= $row['post_id']; ?>">
            <div class="card col-md-6 ">
              <div class="blog-post">
                <img class="flex-auto d-md-block post-image img-fluid card-img-top" src="img/<?= $post_image; ?>" alt="Card image cap">
                <div class="card-body d-flex flex-column">
                  <div class="post-content">
                    <h1 class="post_title"><?= $post_title;  ?></h1>
                    <p class="blog-post-meta post_date"><?= $post_date;  ?> by <a class="post_author" href="#"><?= $post_author;  ?></a></p>
                    <?php
                    $query = "SELECT * FROM categories WHERE cat_id = ?";
                    $statement = mysqli_prepare($connection, $query);
                    mysqli_stmt_bind_param($statement, 'i', $post_category_id);
                    mysqli_stmt_execute($statement);
                    $result = mysqli_stmt_get_result($statement);
                    foreach ($result as $number_key) :
                      $cat_id = $number_key['cat_id'];
                      $cat_title = $number_key['cat_title'];
                    endforeach;
                    ?>
                    <a class="post_cat_title" href="category.php?category=<?= $cat_id;  ?>">
                      <p class="card-text"><strong><?= $cat_title;  ?></strong></p>
                    </a>
                  </div><!-- post-content -->
                </div><!-- card body -->
              </div><!-- blog-post -->
            </div><!-- card -->
          </a><!-- post link -->
        <?php } ?>
      </div><!-- row -->
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