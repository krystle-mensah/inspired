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


      <?php

      if (isset($_GET['category'])) {

        $post_category_id = $connection->real_escape_string($_GET['category']);
      } else {

        echo "not set";
      }

      //<!--  contion ? true else "not set" -->
      //isset($_GET['category']) ? $post_category_id = $_GET['category'] : "not set";

      // if (isset($_GET['category_page'])) {
      //   echo $page = $_GET['category_page'];
      // } else {
      //   echo $page = "";
      // }

      // if ($page == "" || $page == 1) {
      //   $category_page_1 = 0;
      // } else {
      //   $category_page_1 = ($page *  5) -  5;
      // }


      // CATEGORY COUNT FOR PAGE
      // $categoryID_query_count = "SELECT * FROM `posts` WHERE post_category_id = ?";
      // $statement = mysqli_prepare($connection, $categoryID_query_count);
      // mysqli_stmt_bind_param($statement, 'i', $post_category_id);
      // mysqli_stmt_execute($statement);
      // $find_count = mysqli_stmt_get_result($statement);
      // $count = mysqli_num_rows($find_count);


      //$count =  ceil($count / 5);

      //$count =  $count / 5;

      // FETCH QUERY
      $limit =  6;
      $query = "SELECT * FROM `posts` WHERE post_category_id = ? ORDER BY `posts`.`post_date` DESC LIMIT ?";
      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 'ii', $post_category_id, $limit);
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

    <!-- PAGEINATION -->
    <div class="custom_pagination">

      <!-- <p> -->
      <!-- echo $count  -->
      <!-- </p> -->

      <?php

      // first display each number
      //for ($i = 1; $i <= $count; $i++) {

      // if ($i == $page) {
      //echo "<a href='category.php?category_page={$i}'>{$i}</a>";
      // } else {
      // }
      //}

      ?>
    </div><!-- pagination -->

  </div><!-- /.row -->

</main><!-- /.container -->

<?php include "inc/footer.php"; ?>
<?php include "inc/scripts.php"; ?>