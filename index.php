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

      <?php
      $per_page = 4;

      if (isset($_GET['page'])) {

        $page = $_GET['page'];
      } else {
        $page = "";
      }
      if ($page == "" || $page == 1) {
        $page_1 = 0;
      } else {
        $page_1 = ($page *  $per_page) -  $per_page;
      }

      // first find out how many posts you have
      $post_query_count = "SELECT * FROM `posts` ";
      $statement = mysqli_prepare($connection, $post_query_count);
      mysqli_stmt_execute($statement);
      $find_count = mysqli_stmt_get_result($statement);
      $count = mysqli_num_rows($find_count);

      $count =  ceil($count / $per_page);

      $query = "SELECT * FROM `posts` ORDER BY `posts`.`post_date` DESC LIMIT $page_1, $per_page";
      //$query = "SELECT * FROM `posts` ORDER BY `posts`.`post_date` DESC";
      $Statement = mysqli_prepare($connection, $query);
      mysqli_stmt_execute($Statement);
      $getResult = mysqli_stmt_get_result($Statement);

      while ($row = mysqli_fetch_array($getResult)) {

        $post_category_id = $row['post_category_id'];
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
              <h1 class="post_title"><?= $post_title;  ?></h1>
              <p class="post_date"><?= $post_date;  ?> by <a class="post_author" href="#"><?= $post_author;  ?></a></p>
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
      <?php

      // first display each number
      for ($i = 1; $i <= $count; $i++) {

        //if ($i == $page) {
        echo "<a href='index.php?page={$i}'>{$i}</a>";
        //} else {
        //}
      }

      ?>
    </div><!-- pagination -->

  </div><!-- /.row -->

</main><!-- /.container -->

<?php include "inc/footer.php"; ?>
<?php include "inc/scripts.php"; ?>