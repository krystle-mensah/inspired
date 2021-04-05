<?php include "inc/admin_head.php" ?>

<body class="sb-nav-fixed">

  <!-- TOP NAV -->
  <?php include "inc/admin_nav.php" ?>

  <!-- PAGE WRAPPER -->
  <div id="layoutSidenav">

    <div class="container-fluid">

      <!-- SIDE NAV -->
      <?php include "inc/admin_sideNav.php" ?>

      <!-- CONTENT -->
      <div id="layoutSidenav_content">

        <main>
          <div class="container-fluid">
            <div class="row">

              <?php

              //check url for get source
              if (isset($_GET['source'])) {

                // if ture assign variable
                $source = mysqli_real_escape_string($connection, $_GET['source']);
              } else {

                // variable assigned to eptmy string
                $source = '';
              }

              switch ($source) {
                case 'add_sub_category_post';

                  include "inc/add_sub_category_post.php";

                  break;

                case 'edit_sub_category_post';

                  include "inc/edit_sub_category_post.php";

                  break;

                default:

                  include "inc/view_sub_category_posts.php";

                  break;
              }

              ?>

            </div>
          </div><!-- container fluid -->

        </main><!-- main -->

      </div> <!-- content -->

    </div><!-- container -->

  </div><!-- layoutSidenav -->

  <?php include "inc/admin_footer.php" ?>
  <?php include "inc/scripts.php"; ?>