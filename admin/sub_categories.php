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

              <!-- CREATE A CHAPTER -->
              <?php 
                if(isset($_POST['createSubCategory'])){
                // TEST - Type in the title field then click button
                //echo $chapter_cat = $_POST['chapter_cat'];

                // Catch name attributes from values
                $subCategoriesTitle = $_POST['subCategoriesTitle'];
                $subCategoriesCatID = $_POST['subCategoriesCatID'];
                // INSERT INTO DATABASE
                $query = "INSERT INTO sub_categories(subCategoriesCatID, subCategoriesTitle)";
                // THESE VALUSE
                $query .= "VALUES('{$subCategoriesCatID}','{$subCategoriesTitle}')"; 

                $create_subCategories_query = mysqli_query($connection, $query); 
                if(!$create_subCategories_query){

                // Print a message and terminate the current script:
                die("QUERY FAILED" . mysqli_error($connection));

                }

                }

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
                  <div class="form-group">
                    <label for="title">select a category</label>
                    <select name="subCategoriesCatID" id="">
                      <?php
                        $query = "SELECT * FROM categories";  
                        $select_categories = mysqli_query($connection,$query);
                        
                        confirmQuery($select_categories);

                        while($row = mysqli_fetch_assoc($select_categories)) {
                          $cat_id = $row['cat_id'];
                          $cat_title = $row['cat_title'];
                          //set chapter cat id to the cat id
                          if($cat_id == $chapter_cat) {
                          //when we click the title we get the catid of that title
                          echo "<option selected value='{$cat_id}'>{$cat_title}</option>";

                          } else {

                            echo "<option value='{$cat_id}'>{$cat_title}</option>";

                          }
                        }

                      ?>
                    </select>
                  </div><!-- form-group -->
                </div><!-- alignment -->
                <!-- SUBMIT BUTTON -->
                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="createSubCategory" value="Publish Sub category">
                </div>
              </form>

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
                      <?php $select_all_chapters = $connection->query("SELECT * FROM sub_categories");?>
                      <?php foreach($select_all_chapters as $row ) { ?>
                        <tr>
                          <td><?= $row['subCategoriesID']; ?></td>
                          <td><?= $row['subCategoriesTitle']; ?></td>
                          <?php $sql = $connection->query("SELECT * FROM categories WHERE cat_id = {$row['subCategoriesCatID']} "); ?>
                          <?php foreach($sql as $row) { ?>
                          
                            <td><?= $row['cat_title']; ?></td>

                          <?php } ?>
                        </tr>
                      <?php } ?>

                  </form>
                  
                </div><!-- row -->
              </div><!-- container-fluid -->
            </main><!-- main -->
          </div><!-- layoutSidenav_content -->
        </div><!-- row -->
      </div><!-- container-fluid -->
    </div><!-- layoutSidenav -->