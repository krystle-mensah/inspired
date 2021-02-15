<?php //$all_categories = $connection->query("SELECT * FROM categories");



?>
<hr class="hide_on_small">
<nav class="nav justify-content-between site-navigation hide_on_small">
  <a class="nav_link" href="index.php">home</a>





  <?php

  $query = "SELECT * FROM categories";
  $selectFromCategories = mysqli_query($connection, $query);


  while ($row = mysqli_fetch_array($selectFromCategories)) { ?>
  <?php
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];


    echo "<div>";
    echo " <a class='nav_link' href='category.php?category=$cat_id'>";
    echo "<div class='drop_down'>";
    echo "<button class='drop_btn'>$cat_title</button>";
    echo "<div class='dropdown_content'>";

    //$sql = 'SELECT * FROM sub_categories WHERE subCategoriesCatID = $row['cat_id']; ';
    $query = "SELECT * FROM sub_categories WHERE subCategoriesCatID = $cat_id";
    $select_all_subID = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_subID)) {
      $subCategoriesTitle = $row['subCategoriesTitle'];
      $subCategoriesID = $row['subCategoriesID'];

      echo "<a class='dropdown_nav_link' href='sub_category.php?subCategory=$subCategoriesID'>$subCategoriesTitle</a>";
    }
    echo "</div>";
    echo "</div>";
    echo "</a>";
    echo "</div>";
  }
  //$stmt = null;
  ?>
  <a class="nav_link" href="contact.php">contact</a>
</nav><!-- site-navigation -->
<hr class="hide_on_small">