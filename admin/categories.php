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
										<h1 class="mt-4">Categories</h1>
											<!-- <ol class="breadcrumb mb-4">
												<li class="breadcrumb-item active">Add Category</li>
											</ol> -->
									</div><!-- alignment -->	

									<div class="col-xs-6 col-lg-4">

									<?php 

										// if anything happens when add category is clicked
										if(isset($_POST['submit'])) {
											////display this
											////echo "<h1>hello</h1>";

											$cat_title = $_POST['cat_title'];

											//// if cat_title is equal to empty string or function to check is var is empty
											if($cat_title == "" || empty($cat_title)) {
												//// Then display this.
												echo "This field should not empty";

											}else{

												// insert what user inputs to the categories table and column. 
												$query = "INSERT INTO categories(cat_title) ";
												
												// and assign value to variable. 
												$query .= "VALUE('{$cat_title}')";

												// then send to database with the connection and query. 
												$create_category_query = mysqli_query($connection, $query);
											
												// check if query was succesful
												if(!$create_category_query) {
													
													// terminate script and display error with the connection. 
													die('QUERY FAILED' . mysqli_error($connection));

												}

											} // End else

										} // isset function

									?>

										<form action="" method="post">

											<div class="form-group">
												<label for="cat-title">Add Category</label>
												<input type="text" name="cat_title" class="form-control">
											</div><!-- form-group -->
											<div class="form-group">
												<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
											</div><!-- form-group -->

										</form><!-- form -->

									</div><!-- alignment -->

									<div class="col-xs-6 col-lg-12">

										<table class="table table-striped table-bordered table-hover my_table">
											<thead>
												<tr>
													<th>Id</th>
													<th>Category Title</th>
												</tr>
											</thead>
											<tbody>
											<?php
						
												$query = "SELECT * FROM categories";
											
												//function sends in the query and connection. 
												$select_categories = mysqli_query($connection,$query);

												// while the condition is true fetch the row representing the array from ($variable)
												while($row = mysqli_fetch_array($select_categories)) {
													// Then assign the array to a variable
													$cat_id = $row['cat_id'];
													$cat_title = $row['cat_title'];

													echo "<tr>";
													// Then display the fetch row form the database in the browser. 
														echo "<td>{$cat_id}</td>";
														echo "<td>{$cat_title}</td>";
														// delete button
														echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
														// Edited link
														echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
													echo "</tr>";
												}

											?>

											<!-- DELETE QUERY FUNCTION -->
											
											<?php 

												//check for the delete key in url
												if(isset($_GET['delete'])) {
													// then save it here
													$the_cat_id = $_GET['delete'];
											
													// query to delete from categories where, then we reference the column in the database which is called cat_id equal to the $the_cat_id
													$query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
											
													// send in
													$delete_query = mysqli_query($connection, $query);
											
													// once the above is done refrash in this location
													header("Location: categories.php");
													
												}
		
											?>	
										
											</tbody>
										</table> <!-- table table-bordered table-hover -->

									</div><!-- alignment -->
								</div>
							</div><!-- container fluid -->

						</main><!-- main -->

					</div> <!-- content -->

				</div><!-- row -->

			</div><!-- container --> 

		</div><!-- layoutSidenav --> 

		<?php include "inc/admin_footer.php" ?>      