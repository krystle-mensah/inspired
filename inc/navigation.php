<?php
  //select all from table
  $query = "SELECT * FROM categories";
  // send that all in
  $select_categories_navigation = mysqli_query($connection,$query);				
?>
  <hr>
  <nav class="nav d-flex justify-content-between site-navigation">
    <div><a class="" href="index.php">home</a></div>
    <?php
    while($row = mysqli_fetch_array($select_categories_navigation)) {
      $cat_title = $row['cat_title'];
      $cat_id = $row['cat_id'];

      echo "<div><a class='' href='category.php?category=$cat_id '>{$cat_title}</a></div>";
    }
    ?>
  </nav>
  <hr>
