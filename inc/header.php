<header class="blog-header py-3 site_header">
  

    <div class="col-4 pt-1">
      <a class="sub-button" href="#">Subscribe</a>
    </div>

    <div class="logo_container">
      <!-- where in the inc folder. we go out of that. then where in the root ./ img folder in the current dir -->
        <a class="header_logo" href="#"><img src="./img/logo.png" alt="inspired sound"></a>
      
    </div>
    
    <div class="header_left">

      <!-- <div class="header_share">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div> -->

      <?php 
      
      //search function
      // if( isset( $_POST['submit'] ) ){
        
      //   $search = $_POST['search'];
      //   $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
      //   $search_query = mysqli_query($connection, $query);

      //   // try and test this when you have more posts. lecture 93.
      //   if(!$search_query) {
      //     die("QUERY FAILED" . mysqli_error($connection));
      //   }
      
      // }
      
      
      ?>

      <div class="search_form">
            <form action="" method="post">

              <div class="input-group">
                <input name="search" type="text" class="form-control" placeholder="search blog">
                  <span class="input-group-btn">
                      <button name="submit" class="btn btn-default" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                  </span> <!-- input-group-btn -->
              </div> <!-- input-group -->

            </form><!-- search form -->

      </div><!-- search_bar --> 
      
    </div><!-- header_left --> 

</header>

<?php 
// TEST - check input search.
////check input name search
////if( isset( $_POST['search'] ) ){echo $_POST['search'];}
?>