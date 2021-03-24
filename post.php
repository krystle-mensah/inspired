<!-- The Include function is used to put data of one PHP file into another PHP file. If errors occur then the include function produces a warning but does not stop the execution of the script i.e. the script will continue to execute.  -->
<?php include "inc/db.php" ?>

<!-- include head.php page here -->
<?php include "inc/head.php"; ?>

<!-- HEADER -->
<?php include "inc/header.php"; ?>

<div class="container">

  <!-- NAVIGATION -->
  <?php include "inc/navigation.php"; ?>

</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8">
      <?php
      //Check whether this variable is empty or set/declared on the index.
      if (isset($_GET['p_id'])) {

        $the_post_id = $_GET['p_id']; // output

      }

      ?>
      <!-- connect to database and query for all table data where column equals the url id -->
      <?php
      $query = "SELECT * FROM posts WHERE post_id = ?";
      $statement = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($statement, 'i', $the_post_id);
      mysqli_stmt_execute($statement);
      $result = mysqli_stmt_get_result($statement);

      foreach ($result as $row) {
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];

      ?>
        <h1 class="mt-4 page_post_title"><?= $post_title;  ?></h1>
        <a class="post_author" href="#"><?= $post_author;  ?></a>
        <p class="blog-post-meta post_date"><?= $post_date; ?> </p>

        <div class="card-body d-flex flex-column align-items-center">
          <!-- / = means current directory -->
          <img class="flex-auto d-none d-md-block post-image img-fluid" src="img/<?= $post_image; ?>" alt="Card image cap">
        </div>
      <?php } ?>
    </div><!-- alignment and main blog -->
  </div><!-- /.row -->

  <div class="row">
    <div class="col-md-8">

      <hr>

      <p class="post_content"><?php echo $post_content; ?></p>

      <hr>

    </div><!-- alignment and main blog -->

  </div><!-- row -->

</main><!-- /.container -->

<section class="post_footer">

  <!-- LOGO -->
  <div>
    <img class="logo_post_footer" src="img/logo.png" alt="inspired sound logo">
  </div>

  <!-- SOCIAL MEDIA -->
  <div>
    <a href="https://soundcloud.com/inspired-sound-167086100">Soundcloud</a>
    <a href="https://www.instagram.com/inspiredsound.uk/">Instagram</a>
    <a href="https://open.spotify.com/user/3a91knedfbhntn7akthnp5l84?si=U4q094EUQaqPIvqhpWI8xQ&nd=1">Spotify</a>
    <a href="https://www.youtube.com/channel/UCRLOZeuW161QsWkDx7qSvYg">Youtube</a>
    <a href="https://www.mixcloud.com/Inspiredsounduk/">Mixcloud</a>
    <a class="nav_link" href="contact.php">contact</a>
  </div>

  <!-- Create a button that will take the user to the top of the page when clicked on: -->
  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

  <!-- copyright -->
  <div>
    <p>inspired sound, copyright <span class="copyright">&copy;</span></p>
  </div>


</section>

</footer>

<?php include "inc/scripts.php"; ?>