<?php $sql = $connection->query( "SELECT * FROM categories" ); ?>
  <hr>
  <nav class="nav d-flex justify-content-between site-navigation">
    <div><a class="" href="index.php">home</a></div>
    <?php foreach($sql as $row) :
      $cat_title = $row['cat_title'];
      $cat_id = $row['cat_id'];
      echo "<div><a href='category.php?category=$cat_id'>{$cat_title}</a></div>";
    endforeach; ?>
    <div><a class="" href="contact.php">contract</a></div>
  </nav>
  <hr>
