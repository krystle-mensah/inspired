<hr class="hide_on_small">
<nav class="nav site-navigation hide_on_small">
  <div><a class="nav_link" href="index.php">home</a></div>
  <?php

  $fetchQry = "SELECT * FROM categories";
  $select_all_statement = mysqli_prepare($connection, $fetchQry);
  mysqli_stmt_execute($select_all_statement);
  $all_categories = mysqli_stmt_get_result($select_all_statement);

  while ($row = mysqli_fetch_array($all_categories)) { ?>
  <?php
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];
    echo "<div>";

    echo " <a class='nav_link' href='category.php?category=$cat_id'>";

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
    echo "</a>";
    echo "</div>";
  }
  ?>
  <div><a class="nav_link" href="contact.php">contact</a></div>
</nav><!-- site-navigation -->
<hr class="hide_on_small">