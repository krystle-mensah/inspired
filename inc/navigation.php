<?php $sql = $connection->query( "SELECT * FROM categories" ); ?>
  <hr>
  <nav class="nav justify-content-between site-navigation">
    <a class="" href="index.php">home</a>

      <?php foreach($sql as $row) :
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
       

          echo "
            <div>
              <a href='category.php?category=$cat_id'>
                <div class='drop_down'>
                  <button class='drop_btn'>{$cat_title}</button>
                    <div class='dropdown_content'>";
                    $selectAll_chapters = $connection->query( "SELECT * FROM chapters" );
                    foreach( $selectAll_chapters as $row){
                      $chapter_title = $row['chapterName'];
                      $chapterId = $row['chapterId'];
echo "";
                    }
                      "
                      <a href='#'>Link 1</a>
                      <a href='#'>Link 1</a>
                      <a href='#'>Link 1</a>
                    </div>
                </div>
              </a>
            </div>
              ";
      
        endforeach; 
      ?>
    <a class="" href="contact.php">contact</a>
  </nav>
  <hr>