<?php $sql = $connection->query( "SELECT * FROM categories" ); ?>
  <hr>
  <nav class="nav justify-content-between site-navigation">
    <a class="" href="index.php">home</a>

      <?php foreach($sql as $row) :
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
       

          echo "
          
          
            <div><a class='dropbtn' href='category.php?category=$cat_id'>{$cat_title}</a></div>
          
          
          
          ";
      
      endforeach; ?>

    <a class="" href="contact.php">contact</a>
  </nav>
  <hr>
