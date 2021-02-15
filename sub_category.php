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

      <?php isset($_GET['subCategory']) ? $postSubCatID = $_GET['subCategory'] : "not set";


      $query = "SELECT * FROM posts WHERE postSubCatID = ?";
      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 'i', $postSubCatID);
      mysqli_stmt_execute($statement);
      $result = mysqli_stmt_get_result($statement);

      foreach ($result as $row) {

        //Then assign the row array to a variable
        $postSubCatID = $row['postSubCatID'];
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        // reference form the database
        $post_image = $row['post_image'];

      ?>
        <a class="post_link" href="post.php?p_id=<?= $post_id; ?>">
          <div class="col-md-6">
            <div class="blog-post">
              <div class="card box-shadow">
                <div class="card-body d-flex flex-column align-items-start">
                  <img class="flex-auto d-none d-md-block post-image img-fluid" src="img/<?= $post_image; ?>" alt="Card image cap">
                </div>
                <div class="post-content">
                  <h1 class="post_title"><?= $post_title; ?></h1>
                  <p class="blog-post-meta post_date"><?= $post_date;  ?> by <a class="post_author" href="#"><?= $post_author;  ?></a></p>
                  <!-- REQUST CATEGOROY TITLES -->
                  <?php
                  //$sql = $connection->query("SELECT * FROM sub_categories WHERE subCategoriesID = {$postSubCatID}");

                  $query = "SELECT * FROM sub_categories WHERE subCategoriesID = ?";
                  $statement = mysqli_prepare($connection, $query);
                  mysqli_stmt_bind_param($statement, 'i', $postSubCatID);
                  mysqli_stmt_execute($statement);
                  $result = mysqli_stmt_get_result($statement);

                  foreach ($result as $row) {
                    $subCategoriesID = $row['subCategoriesID'];
                    $subCategoriesTitle = $row['subCategoriesTitle'];
                  }
                  ?>
                  <a class="post_cat_title" href="sub_category.php?subCategory=<?= $subCategoriesID;  ?>">
                    <p><strong class="post_cat_title"><?= $subCategoriesTitle;  ?></strong></p>
                  </a>
                </div><!-- post-content -->
              </div><!-- card box-shadow -->
            </div><!-- /.blog-post -->
          </div><!-- alignment -->
        </a><!-- post link -->
      <?php } ?>
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