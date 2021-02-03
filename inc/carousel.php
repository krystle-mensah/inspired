<?php 

//include "inc/db.php"; 

//$result = $connection->query("SELECT * FROM carousel");

$query = "SELECT * FROM carousel";
$result = mysqli_query($connection,$query);

// if(!$result){

//     //Print a message and terminate the current script:
//  die("QUERY FAILED" . mysqli_error($connection));

// } else {
//   echo "query worked";
// }

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php

          $i = 0;
          while ($row = mysqli_fetch_array($result)):
          //foreach ($result as $row):
            $carousel_cat_id =  $row['carousel_cat_id'];
            $slide_id =  $row['carousel_id'];
            $actives = '';
            if($i == 0) {
              $actives = 'active';
            }
            
          ?>
            <li data-target="#myCarousel" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>
    
          <?php $i++; endwhile; ?>
        </ol>
        <div class="carousel-inner">
          <?php 
          
          $i = 0;
          while ($row = mysqli_fetch_array($result)):
          //foreach ($result as $row):
            $actives = '';
            if($i == 0) {
              $actives = 'active';
            }
          ?>
          
          <div class="carousel-item <?= $actives; ?>">
            <img class="first-slide" src="img/<?= $row['carousel_image']; ?>">
            <div class="container">
              <div class="carousel-caption text-left">
                
                <p><?= $row['carousel_content']; ?></p>
                <?php //$sql = $connection->query("SELECT * FROM categories WHERE cat_id = {$carousel_cat_id} "); 
                $query = "SELECT * FROM categories WHERE cat_id = {$carousel_cat_id}";
                $result = mysqli_query( $connection, $query ); 
                    while ($row = mysqli_fetch_array($result)):    
                    //foreach($sql as $number_key):
                      $cat_id = $number_key['cat_id'];
                      $cat_title = $number_key['cat_title'];
                    endwhile;?>
      
                <a class="carousel_cat_link" href="slide_post.php?s_id=<?= $slide_id; ?>"><?= $cat_title; ?></a>
                <!-- <p><a class="btn btn-lg btn-primary carousel_button" href="#" role="button">Read More</a></p> -->
                <h1 class="carousel_title"><?= $row['carousel_title']; ?></h1>
              </div>
            </div>
          </div>
          <?php $i++; endwhile; ?>

          <!-- <div class="carousel-item">
            <img class="second-slide" src="img/news_1.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Category Title</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Read More</a></p>
              </div>
            </div>
          </div> -->

          <!-- <div class="carousel-item">
            <img class="third-slide" src="img/news_1.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Category Title</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Read More</a></p>
              </div>
            </div>
          </div> -->








        </div><!-- carousel-inner -->

        
        
        
        
        
        
        
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

</div><!-- #myCarousel -->