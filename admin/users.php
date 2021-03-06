<?php include "inc/admin_head.php" ?>

<body class="sb-nav-fixed">

  <!-- TOP NAV -->
  <?php include "inc/admin_nav.php" ?>

  <!-- PAGE WRAPPER -->
  <div id="layoutSidenav">

    <div class="container-fluid">

      <div class="row">

        <!-- SIDE NAV -->
        <?php include "inc/admin_sideNav.php" ?>

        <!-- CONTENT -->
        <div id="layoutSidenav_content">

          <main>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <h1 class="mt-4">users</h1>
                  <!-- <ol class="breadcrumb mb-4">
												<li class="breadcrumb-item active">Add Category</li>
											</ol> -->
                </div><!-- alignment -->

                <?php

                //check url for get source
                if (isset($_GET['source'])) {

                  // if ture assign variable
                  //$source = $connection->real_escape_string($_GET['source']);
                  $source = mysqli_real_escape_string($connection, $_GET['source']);

                  // we have to put an else because im getting an undefined variable.  
                } else {

                  // variable assigned to eptmy string
                  $source = '';
                }

                // switch statement to perform different actions based on the variable condition.
                switch ($source) {
                    // if source is equal to add post
                  case 'add_user';

                    //then display this
                    include "inc/add_user.php";

                    // stop
                    break;

                    // if source is equal to this page
                  case 'edit_user';

                    //then display this
                    include "inc/edit_user.php";

                    // stop
                    break;

                    // if case's fail then default to this page.
                  default:

                    include "inc/view_all_users.php";

                    // stop running  
                    break;
                }

                ?>

              </div>
            </div><!-- container fluid -->

          </main><!-- main -->

        </div> <!-- content -->

      </div><!-- row -->

    </div><!-- container -->

  </div><!-- layoutSidenav -->

  <?php include "inc/admin_footer.php" ?>
  <?php include "inc/scripts.php"; ?>