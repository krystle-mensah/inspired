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
                  <!-- PAGE TITLE -->
                  <h1 class="mt-4">Sub Category</h1>
                </div>

                <!-- CREATE A SUB CATEGORY -->
                <?php
                //check post set to submit
                if (isset($_POST['submit'])) {

                  // post sub categorie title Here
                  $subCategoriesTitle = $_POST['subCategoriesTitle'];

                  // check variable is equal to empty string OR varible is empty
                  if ($subCategoriesTitle == "" || empty($subCategoriesTitle)) {
                    echo "This field should not empty";
                  } else {
                    $query = "INSERT INTO sub_categories(subCategoriesTitle)";
                    $query .= "VALUES(?)";

                    $insertQry = mysqli_prepare($connection, $query);
                    mysqli_stmt_bind_param($insertQry, "s", $subCategoriesTitle,);
                    mysqli_stmt_execute($insertQry);
                    if (!$insertQry) {

                      // Print a message and terminate the current script:
                      die("QUERY FAILED" . mysqli_error($connection));
                    }
                  }
                } // isset function

                ?>

                <div class="col-xs-6 col-lg-4">
                  <!-- FORM -->
                  <form action="" method="post">
                    <!-- TITLE -->
                    <div class="form-group">
                      <label for="title">Add sub Category</label>
                      <input type="text" class="form-control" name="subCategoriesTitle">
                    </div>
                    <!--  CAT ID -->
                    <!-- <div class="form-group">
                      <label for="title">select a category</label>
                      <select name="subCategoriesCatID" id="">
                        <?php
                        // $query = "SELECT * FROM categories";
                        // $select_categories = mysqli_query($connection, $query);

                        // confirmQuery($select_categories);

                        // while ($row = mysqli_fetch_assoc($select_categories)) {
                        //   $cat_id = $row['cat_id'];
                        //   $cat_title = $row['cat_title'];
                        //   //set chapter cat id to the cat id
                        //   if ($cat_id == $chapter_cat) {
                        //     //when we click the title we get the catid of that title
                        //     echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
                        //   } else {

                        //     echo "<option value='{$cat_id}'>{$cat_title}</option>";
                        //   }
                        // }

                        ?>
                      </select>
                    </div> -->
                    <!-- form-group -->
                    <!-- SUBMIT BUTTON -->
                    <div class="form-group">
                      <input class="btn btn-primary" type="submit" name="submit" value="Publish Sub category">
                    </div>
                </div><!-- alignment -->

                </form>

                <?php

                if (isset($_GET['edit'])) {

                  $subCategoriesID = $connection->real_escape_string($_GET['edit']);

                  include "inc/update_sub_categories.php";
                }

                ?>

                <!-- ALL SUB CATEGOGIES TABLE -->
                <table class="table table-striped table-bordered table-hover my_table">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Sub Title Name</th>
                      <th>Category</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $query = "SELECT * FROM sub_categories";
                    $statement = mysqli_prepare($connection, $query);
                    mysqli_stmt_execute($statement);
                    $select_all_sub_categories = mysqli_stmt_get_result($statement);

                    ?>

                    <?php foreach ($select_all_sub_categories as $row) : ?>
                      <tr>
                        <td><?= $row['subCategoriesID']; ?></td>
                        <td><?= $row['subCategoriesTitle']; ?></td>

                        <?php
                        $query = "SELECT * FROM categories WHERE cat_id = ? ";

                        $statement = mysqli_prepare($connection, $query);
                        mysqli_stmt_bind_param($statement, 'i', $row['subCategoriesCatID']);
                        mysqli_stmt_execute($statement);
                        $select_all_categories_by_id = mysqli_stmt_get_result($statement);

                        ?>

                        <?php foreach ($select_all_categories_by_id as $row) : ?>

                          <td><?= $row['cat_title']; ?></td>
                          <td><a class="all_songs_edit" href="sub_categories.php?edit=<?= $subCategoriesID; ?>"> Edit </a></td>
                          <td><a class="all_songs_edit" href="sub_categories.php?delete=<?= $subCategoriesID; ?>"> Delete </a></td>

                        <?php endforeach; ?>
                      </tr>
                    <?php endforeach; ?>

                    <!-- DELETE QUERY FUNCTION -->
                    <?php
                    //check get delete is set
                    if (isset($_GET['delete'])) {
                      //get delete and make it the cat id
                      $the_sub_cat_id = $connection->real_escape_string($_GET['delete']);

                      $deleteQry = "DELETE FROM sub_categories WHERE subCategoriesID = ?";
                      $deleteStatement = mysqli_prepare($connection, $deleteQry);
                      mysqli_stmt_bind_param($deleteStatement, 'i', $the_sub_cat_id);
                      mysqli_stmt_execute($deleteStatement);

                      header("Location: sub_categories.php");
                    }

                    ?>
                  </tbody>
                  </form>

              </div><!-- row -->
            </div><!-- container-fluid -->
          </main><!-- main -->
        </div><!-- layoutSidenav_content -->
      </div><!-- row -->
    </div><!-- container-fluid -->
  </div><!-- layoutSidenav -->