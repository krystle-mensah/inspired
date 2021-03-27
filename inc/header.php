<header class="header">
  <div class="header-container">
    <!-- HAMBURGER MOBILE -->
    <span class="open-slide hide_on_large">
      <a href="#" onclick="openSlideMenu()">
        <svg width="30" height="30">
          <path d="M0,5 30,5" stroke="#000" stroke-width="5" />
          <path d="M0,14 30,14" stroke="#000" stroke-width="5" />
          <path d="M0,23 30,23" stroke="#000" stroke-width="5" />
        </svg>
      </a>
    </span>
    <!-- SEARCH BUTTON -->
    <button onclick="openSearch()" class="search_button hide_on_large open_search"><i class="fas fa-search"></i></button>
    <!-- SEARCH SIDE MENU - This is what I well grap onto in javascript -->
    <div id="search_side_menu" class="side_search">
      <!-- close button -->
      <a href="#" class="btn-close hide_on_large" onclick="closeSearch()">&times;</a>
      <div class="search_container">
        <div class="search_form hide_on_large">
          <form action="search.php" method="post">
            <div class="input-group">
              <input name="search" type="text" class="form-control" placeholder="Type to Search">
              <span class="input-group-btn">
                <button onclick="closeSearch()" name="submit" class="btn btn-default" type="submit">search</button>
              </span> <!-- input-group-btn -->
            </div> <!-- input-group -->
          </form><!-- form -->
        </div><!-- search_form -->
      </div>

    </div><!-- search_side_menu -->

    <!-- LOGO -->
    <div class="logo-container">
      <img class="hide_on_small" id="logo" src="img/logo.png" alt="inspired sound logo">
    </div>
    <!-- BRAND NAME -->
    <h1 class="brand_name"> inspired sound</h1>
    <!-- TAGLINE -->

    <div class="tagline-container">
      <h3 class="header-tagline hide_on_small">underground music & culture</h3>
    </div>
    <!-- SOCIAL MEDIA -->
    <div class="social_media hide_on_small">
      <div class="social-media-container">
        <a href="https://twitter.com/inspiredsounduk" target="_blank" class="social-media-link"><i class="fab fa-twitter"></i></a>
        <a href="https://open.spotify.com/user/3a91knedfbhntn7akthnp5l84?si=mDkzbZv_T6WLzbwC9FkXmQ" target="_blank" class="social-media-link"><i class="fab fa-spotify"></i></a>
        <a href="https://soundcloud.com/inspired-sound-167086100" target="_blank" class="social-media-link"><i class="fab fa-soundcloud"></i></a>
      </div>
    </div>
    <!-- ICONS -->
    <div class="header-icons hide_on_small">
      <div class="header-icons-container">
        <a href="#" class="header-icon-link"><i class="fas fa-headphones"></i></a>
        <a href="#" class="header-icon-link"><i class="fas fa-search"></i></a>
        <a href="#" class="header-icon-link"><i class="fas fa-bars"></i></a>
      </div>
    </div>
  </div>
  <!-- MOBILE NAVIGATION -->
  <div id="side-menu" class="side-nav hide_on_large">
    <!-- CLOSE MENU -->
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <!-- LINKS -->
    <a class="nav_link" href="index.php">home</a>
    <!-- FETCH CATEGORIES -->
    <?php

    $qrySelect = "SELECT * FROM categories";
    $select_all_statement = mysqli_prepare($connection, $qrySelect);
    mysqli_stmt_execute($select_all_statement);
    $all_categories = mysqli_stmt_get_result($select_all_statement);

    ?>

    <!-- LOOP CATEGORIES -->
    <?php foreach ($all_categories as $row) {
      $cat_title = $row['cat_title'];
      $cat_id    = $row['cat_id'];
    ?>
      <a class="mobile_nav_subCat_link" href="category.php?category=<?= $cat_id; ?>">
        <?= $cat_title; ?>
        <i class="fa fa-caret-down dropdown_icon"></i>
        <!-- SUB CATEGORIES -->
        <div class="dropdown-container">
          <?php
          $query = "SELECT * FROM `sub_categories` WHERE subCategoriesCatID = ?";
          $statement = mysqli_prepare($connection, $query);
          mysqli_stmt_bind_param($statement, 'i', $cat_id);
          mysqli_stmt_execute($statement);
          $result = mysqli_stmt_get_result($statement);
          ?>
          <!-- LOOP SUB CATEGORIES -->
          <?php foreach ($result as $row) {
            $subCategoriesID       = $row['subCategoriesID'];
            $subCategoriesTitle    = $row['subCategoriesTitle'];
          ?>
            <a href="sub_category.php?subCategory=<?php echo $subCategoriesID; ?>"><?php echo $subCategoriesTitle; ?></a>
          <?php } ?>
        </div><!-- dropdown-container -->
      </a>
    <?php } ?>
    <a class="nav_link" href="contact.php">contact</a>

  </div><!-- side-menu side-nav -->

</header>

<?php
// TEST - check input search.
////check input name search
////if( isset( $_POST['search'] ) ){echo $_POST['search'];}
?>