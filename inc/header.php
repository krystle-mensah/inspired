<header class="header">
  <div class="header-container">
    <!-- HAMBURGER MOBILE -->
    <span class="open-slide hide_on_large">
        <a href="#" onclick="openSlideMenu()">
          <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
            <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
            <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
          </svg>
        </a>
    </span>
    <!-- LOGO -->
    <div class="logo-container">
      <img class="hide_on_small" id="logo" src="img/logo.png" alt="inspired sound logo">
    </div>
    <!-- BRAND NAME -->
    <h1 class="brand_name"> inspied sound</h1>
    <!-- TAGLINE -->
    <div class="tagline-container">
      <h3 class="header-tagline">underground music & culture</h3>
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
    <?php $all_categories = $connection->query( "SELECT * FROM categories" ); ?>
    <!-- LOOP CATEGORIES -->
    <?php foreach($all_categories as $row) { 
      $cat_title = $row['cat_title'];
      $cat_id    = $row['cat_id'];
    ?>
    <a class="mobile_nav_subCat_link" href="category.php?category=<?php echo $cat_id; ?>">
    <?php echo $cat_title; ?>
    <i class="fa fa-caret-down dropdown_icon"></i>
    <!-- SUB CATEGORIES -->
    <div class="dropdown-container">
      <!-- FETCH SUB CATEGORIES WHERE THE subCategoriesCatID EQUALS $row'cat_id'  -->
      <?php $sql = $connection->query( "SELECT * FROM `sub_categories` WHERE subCategoriesCatID = {$row['cat_id']}" ); ?>
      <!-- LOOP SUB CATEGORIES -->
      <?php foreach($sql as $row) { 
        $subCategoriesID       = $row['subCategoriesID'];
        $subCategoriesTitle    = $row['subCategoriesTitle'];
      ?>
        <a href="sub_category.php?subCategory=<?php echo $subCategoriesID; ?>"><?php echo $subCategoriesTitle;?></a>
      <?php }?>
    </div><!-- dropdown-container -->
    </a>
    <?php } ?>
    <a class="nav_link" href="contact.php">contact</a>

  </div><!-- side-menu side-nav -->

  <script>
    function openSlideMenu(){
      document.getElementById('side-menu').style.width = '250px';
      document.getElementById('main').style.marginLeft = '250px';
    }

    function closeSlideMenu(){
      document.getElementById('side-menu').style.width = '0';
      document.getElementById('main').style.marginLeft = '0';
    }
  </script>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("mobile_nav_subCat_link");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("mouseover", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>


</header>

<?php 
// TEST - check input search.
////check input name search
////if( isset( $_POST['search'] ) ){echo $_POST['search'];}
?>

<!-- 
<div class="col-4 pt-1">
  <a class="sub-button" href="#">Subscribe</a>
</div> 
-->
