<?php $all_categories = $connection->query( "SELECT * FROM categories" ); ?>
  <hr>
  <nav class="nav justify-content-between site-navigation">
    <a class="" href="index.php">home</a>

      <?php foreach($all_categories as $row) { ?>
      <?php 
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        
            echo "<div>";
              echo" <a href='category.php?category=$cat_id'>";
                echo "<div class='drop_down'>";
                  echo "<button class='drop_btn'>$cat_title</button>";
                    echo "<div class='dropdown_content'>";
                    $sql = $connection->query("SELECT * FROM `sub_categories` WHERE subCategoriesCatID = {$row['cat_id']}"); 

                    foreach($sql as $row) {

                      echo "<a href='sub_category.php?subCategory=$row[subCategoriesID]'>$row[subCategoriesTitle]</a>";

                    }
                      echo "</div>";
                    echo "</div>";
              echo "</a>";
            echo "</div>";
    }

?>
    <a class="" href="contact.php">contact</a>
  </nav><!-- site-navigation -->
  <hr>

