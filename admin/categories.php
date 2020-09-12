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
									<h1 class="mt-4">Cat title</h1>
										<ol class="breadcrumb mb-4">
											<li class="breadcrumb-item active">Dashboard</li>
										</ol>
								</div><!-- alignment -->	
							</div><!-- row -->

								<div class="col-xs-6 col-lg-4">

									<form action="">

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
																					<?php 
																					
																					

																						
																					
																						//check for the delete key
																						if(isset($_GET['delete'])) {
																							// if good save it in here
																							$the_cat_id = $_GET['delete'];
																					
																							// query to delete from categories where, then we reference the column in the database which is called cat_id equal to the $the_cat_id
																							$query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
																					
																							// send in
																							$delete_query = mysqli_query($connection, $query);
																					
																							// refrash in this location
																							header("Location: categories.php");
																							
																						}
																					
																					
																					
																					?>	
																				
										</tbody>
									</table> <!-- table table-bordered table-hover -->

								</div><!-- alignment -->


								
							
								
						</div><!-- container fluid --> 
					</main><!-- main --> 
				</div>

				</div><!-- row -->

			</div><!-- container --> 

		</div><!-- layoutSidenav --> 

		<?php include "inc/admin_footer.php" ?>      