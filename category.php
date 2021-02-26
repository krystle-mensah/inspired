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

      <!--  contion ? true else "not set" -->
      <?php isset($_GET['category']) ? $post_category_id = $_GET['category'] : "not set";

      $query = "SELECT * FROM posts WHERE post_category_id = ?";
      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 'i', $post_category_id);
      mysqli_stmt_execute($statement);
      $result = mysqli_stmt_get_result($statement);

      foreach ($result as $row) {

        $post_category_id = $row['post_category_id'];
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];

      ?>
        <div class="card">
          <a class="post_link" href="post.php?p_id=<?= $row['post_id']; ?>">
            <figure class="d-flex flex-column">
              <img class="card-img-top post_img" src="img/<?= $post_image; ?>" alt="Card image cap">
            </figure>
            <div class="post-content card-body">
              <h1 class="post_title"><?= $post_title; ?></h1>
              <p class="post_date"><?= $post_date;  ?> by <a class="post_author" href="#"><?= $post_author; ?></a></p>

              <!-- REQUST CATEGOROY TITLES -->
              <?php
              $query = "SELECT * FROM categories WHERE cat_id = ?";
              $statement = mysqli_prepare($connection, $query);
              mysqli_stmt_bind_param($statement, 'i', $post_category_id);
              mysqli_stmt_execute($statement);
              $result = mysqli_stmt_get_result($statement);

              foreach ($result as $row) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
              }
              ?>
              <a class="post_cat_title" href="category.php?category=<?= $cat_id;  ?>">
                <p><strong><?= $cat_title;  ?></strong></p>
              </a>
            </div><!-- post-content -->
          </a><!-- post link -->
        </div><!-- card -->
      <?php } ?>
    </div><!-- alignment and main blog -->

    <!-- SIDEBAR -->
    <aside class="col-md-4 blog-sidebar">
      <?php include "inc/sidebar.php"; ?>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<?php include "inc/footer.php"; ?>
<?php include "inc/scripts.php"; ?>