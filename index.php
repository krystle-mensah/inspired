<?php include "inc/db.php" ?>

<!-- include head.php page here -->
<?php include "inc/head.php"; ?>

<div class="container">
      <!-- HEADER -->
      <?php include "inc/header.php"; ?>

      <!-- NAVIGATION -->
      <?php include "inc/navigation.php"; ?>

      <!-- CAROUSEL -->
      <?php include "inc/carousel.php"; ?>

</div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">

          <div class="blog-post">
            <div class="col-md-6">
              <div class="card box-shadow">
                <div class="card-body d-flex flex-column align-items-start">
                  <img class="flex-auto d-none d-md-block post-image img-fluid" src="main-img/place_1.jpg" alt="Card image cap">
                </div>
                <div class="post-content">
                  <h3 class="mb-0">
                    <a class="text-dark" href="#">Post title</a>
                  </h3>
                  <p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>
                  <p><strong class="d-inline-block mb-2 text-success">category Title</strong></p>
                </div><!-- post-content -->
              </div>
            </div>
          </div><!-- /.blog-post -->

          <!-- PAGEINATION -->
          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

        </div><!-- /.blog-main -->

        <!-- SIDEBAR -->
        <?php include "inc/sidebar.php"; ?>

      </div><!-- /.row -->

    </main><!-- /.container -->

    <?php include "inc/footer.php"; ?>