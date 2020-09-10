<?php
  //select all from table
  $query = "SELECT * FROM categories";
  // send that all in
  $select_categories_navigation = mysqli_query($connection,$query);				
?> 
<div class="nav-scroller py-1 mb-2">
  <nav class="nav d-flex justify-content-between site-navigation">
    <a class="p-2" href="#">home</a>
    <?php
    while($row = mysqli_fetch_array($select_categories_navigation)) {
      $cat_title = $row['cat_title'];
      $cat_id = $row['cat_id'];

      echo "<a class='p-2' href='category.php?category=$cat_id '>{$cat_title}</a>";
    }
    ?>
  </nav>
</div>