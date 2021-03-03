<hr class="hide_on_small">
<nav class="nav site-navigation hide_on_small">
  <a class="nav_link" href="index.php">home</a>
  <?php

  $query = "SELECT * FROM categories";
  $selectFromCategories = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_array($selectFromCategories)) { ?>
  <?php
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];
    echo "<a class='nav_link' href='category.php?category=$cat_id'>";

    echo " <div>";

    echo "<div class='drop_down'>";
    echo "<button class='drop_btn'>$cat_title</button>";
    echo "<div class='dropdown_content'>";

    $query = "SELECT * FROM sub_categories WHERE subCategoriesCatID = ?";
    $select_all_subID = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($select_all_subID, 'i', $cat_id);

    mysqli_stmt_execute($select_all_subID);
    $result = mysqli_stmt_get_result($select_all_subID);

    while ($row = mysqli_fetch_assoc($result)) {
      $subCategoriesTitle = $row['subCategoriesTitle'];
      $subCategoriesID = $row['subCategoriesID'];

      echo "<a class='dropdown_nav_link' href='sub_category.php?subCategory=$subCategoriesID'>$subCategoriesTitle</a>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</a>";
  }
  ?>
  <a class="nav_link" href="contact.php">contact</a>
</nav><!-- site-navigation -->
<hr class="hide_on_small">