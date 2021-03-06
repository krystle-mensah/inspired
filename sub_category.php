<?php
include "admin/inc/db.php";
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

      <?php
      //check get sub category is set in url
      if (isset($_GET['subCategory'])) {
        // then GET sub category id
        $subCategoryID = mysqli_real_escape_string($connection, $_GET['subCategory']);
      } else {
        echo "not set";
      }

      ?>

      <?php
      $limit =  6;
      $query = "SELECT * FROM sub_categories_posts WHERE subCategoryID = ? ORDER BY `sub_categories_posts`.`post_date` DESC LIMIT ?";
      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 'ii', $subCategoryID,  $limit);
      mysqli_stmt_execute($statement);
      $result = mysqli_stmt_get_result($statement);

      foreach ($result as $row) {

        $subCategoryID = $row['subCategoryID'];
        $subCategoryPostID = $row['subCategoryPostID'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];

      ?>
        <div class="card">
          <a class="post_link" href="post.php?p_id=<?= $post_id; ?>">
            <figure class="d-flex flex-column">
              <img class="card-img-top post_img" src="img/<?= $post_image; ?>" alt="Card image cap">
            </figure>
            <div class="post-content card-body">
              <h1 class="post_title"><?= $post_title; ?></h1>
              <p class="blog-post-meta post_date"><?= $post_date;  ?> by <a class="post_author" href="#"><?= $post_author;  ?></a></p>
              <!-- REQUST CATEGOROY TITLES -->
              <?php
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
                <p><strong class="post_cat_title"><?= $subCategoriesTitle; ?></strong></p>
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