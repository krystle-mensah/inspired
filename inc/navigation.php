<?php $all_categories = $connection->query( "SELECT * FROM categories" ); ?>
  <hr>
  <nav class="nav justify-content-between site-navigation">
    <a class="" href="index.php">home</a>

      <?php foreach($all_categories as $row) { ?>
      <?php 
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        //$cat_chapter = $row['cat_chapter'];
        

            echo "<div>";
              echo" <a href='category.php?category=$cat_id'>";
                echo "<div class='drop_down'>";
                  echo "<button class='drop_btn'>$cat_title</button>";
                    echo "<div class='dropdown_content'>";

                    $sql = $connection->query( "SELECT * FROM chapters" );

                    //foreach($sql as $row) {
                      //$chapterName = $row['chapterName'];
                      //$chapter_sortingId = $row['sorting'];
                   

                      //if($cat_chapter ===  $chapterName ){
                        //echo "<a href='chapter.php?chapter=$row[chapterId]'>$chapterName</a>";
                      //}
                    //}
                      echo "</div>";
                    echo "</div>";
              echo "</a>";
            echo "</div>";
    }

?>
    <a class="" href="contact.php">contact</a>
  </nav>
  <hr>

