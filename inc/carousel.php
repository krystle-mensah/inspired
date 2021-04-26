<?php
$limit =  6;
$result = "SELECT * FROM carousel ORDER BY `carousel`.`carousel_date` DESC LIMIT  ?";

$statement = mysqli_prepare($connection, $result);
mysqli_stmt_bind_param($statement, 'i', $limit);
mysqli_stmt_execute($statement);
$getResult = mysqli_stmt_get_result($statement);

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php

    $i = 0;
    foreach ($getResult as $row) {
      $carouselCat_title =  $row['carouselCat_title'];
      $carousel_title =  $row['carousel_title'];

      $slide_id =  $row['carousel_id'];
      $actives = '';
      if ($i == 0) {
        $actives = 'active';
      }

    ?>
      <li data-target="#myCarousel" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>

    <?php $i++;
    } ?>
  </ol>
  <div class="carousel-inner">
    <?php

    $i = 0;
    foreach ($getResult as $row) {
      $carousel_image =  $row['carousel_image'];
      $carousel_title =  $row['carousel_title'];
      $carouselCat_title =  $row['carouselCat_title'];
      $actives = '';

      if ($i == 0) {
        $actives = 'active';
      }

    ?>

      <div class="carousel-item <?= $actives; ?>">
        <img class="first-slide d-block w-100" src="img/<?= $carousel_image; ?>">
        <div class="container slide_content">
          <div class="carousel-caption">
            <a class="carousel_cat_link" href="slide_category.php?category=<?= $cat_id; ?>">News</a>
            <a class="carousel_title" href="slide_post.php?s_id=<?= $slide_id; ?>">
              <?= $carousel_title; ?>
            </a>
          </div>
        </div>
      </div>
    <?php $i++;
    };
    ?>
  </div><!-- carousel-inner -->

  <!-- CONTROLS -->
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div><!-- #myCarousel -->

<!-- 

KEEP

<div class="carousel-item">
  <img class="third-slide" src="img/news_1.jpg" alt="Third slide">
  <div class="container">
    <div class="carousel-caption text-right">
      <h1>Category Title</h1>
      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
      <p><a class="btn btn-lg btn-primary" href="#" role="button">Read More</a></p>
    </div>
  </div>
</div> 

-->