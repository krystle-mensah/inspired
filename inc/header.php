<header class="header">
  <div class="header-container">

    <div class="logo-container">
      <img class="hide_on_small" id="logo" src="img/logo.png" alt="inspired sound logo">
    </div>

    <h1 class="brand_name"> inspied sound</h1>

    <div class="tagline-container">
      <h3 class="header-tagline">underground music & culture</h3>
    </div>
    <div class="social_media hide_on_small">
      <div class="social-media-container">
        <a href="https://twitter.com/inspiredsounduk" target="_blank" class="social-media-link"><i class="fab fa-twitter"></i></a>
        <a href="https://open.spotify.com/user/3a91knedfbhntn7akthnp5l84?si=mDkzbZv_T6WLzbwC9FkXmQ" target="_blank" class="social-media-link"><i class="fab fa-spotify"></i></a>
        <a href="https://soundcloud.com/inspired-sound-167086100" target="_blank" class="social-media-link"><i class="fab fa-soundcloud"></i></a>
      </div>
    </div>

    <div class="header-icons hide_on_small">
      <div class="header-icons-container">
        <a href="#" class="header-icon-link"><i class="fas fa-headphones"></i></a>
        <a href="#" class="header-icon-link"><i class="fas fa-search"></i></a>
        <a href="#" class="header-icon-link"><i class="fas fa-bars"></i></a>
      </div>
    </div>

  </div>
  <!-- MOBILE NAVIGATION -->
  <nav class="navbar hide_on_large">
    <h1 class="brand_name brand_name_mobile"> inspied sound</h1>
    <div class="tagline-container">
      <h3 class="header_tagline_mobile">underground music & culture</h3>
    </div>
    <span class="open-slide">
      <a href="#" onclick="openSlideMenu()">
        <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
            <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
            <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
        </svg>
      </a>
    </span>

    <ul class="navbar-nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

  <div id="side-menu" class="side-nav hide_on_large">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Contact</a>
  </div>

  <div id="main">
    <h1 class="hide_on_large"> Responsive Side Menu</h1>
  </div>

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

