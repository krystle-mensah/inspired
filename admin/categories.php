<?php include "inc/admin_head.php" ?>
	<body class="sb-nav-fixed">
		<!-- TOP NAV -->
		<?php include "inc/admin_nav.php" ?>
		<!-- SIDE NAV -->
		<div id="layoutSidenav">

			<div class="container-fluid">

				<div id="layoutSidenav_nav">

					<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
						<div class="sb-sidenav-menu">
							<div class="nav">
								<div class="sb-sidenav-menu-heading">Core</div>
								<a class="nav-link" href="index.html">
									<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
									Dashboard 
								</a>
								<div class="sb-sidenav-menu-heading">Interface</div>
								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
									<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
									Layouts
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
									<nav class="sb-sidenav-menu-nested nav">
										<a class="nav-link" href="layout-static.html">Static Navigation</a>
										<a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
									</nav>
								</div>
								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
									<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
									Pages
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
									<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
										<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
											Authentication
											<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
										</a>
										<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
											<nav class="sb-sidenav-menu-nested nav">
												<a class="nav-link" href="login.html">Login</a>
												<a class="nav-link" href="register.html">Register</a>
												<a class="nav-link" href="password.html">Forgot Password</a>
											</nav>
										</div>
										<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
											Error
											<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
										</a>
										<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
											<nav class="sb-sidenav-menu-nested nav">
												<a class="nav-link" href="401.html">401 Page</a>
												<a class="nav-link" href="404.html">404 Page</a>
												<a class="nav-link" href="500.html">500 Page</a>
											</nav>
										</div>
									</nav>
								</div>
								<div class="sb-sidenav-menu-heading">Addons</div>
								<a class="nav-link" href="charts.html">
									<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
									Charts
								</a>
								<a class="nav-link" href="charts.html">
									<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
									Categories
								</a>
								<a class="nav-link" target="_blank" href="../index.php">
									<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
									view site 
								</a>
								<a class="nav-link" href="tables.html">
									<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
									Tables
								</a>
							</div>
						</div>
						<div class="sb-sidenav-footer">
							<div class="small">Logged in as:</div>
							Start Bootstrap
						</div>
					</nav>
				</div>

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
				
							<div class="row">

								<div class="col-xs-6">

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

								<div class="col-xs-6">

									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>Id</th>
												<th>Category Title</th>
											</tr>
										</thead>
										<tbody>
										<?php
																				
										//select all from the categories table.
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


								
							</div><!-- row -->
								
						</div><!-- container fluid --> 
					</main><!-- main --> 
				</div>

			</div><!-- container --> 

		</div><!-- layoutSidenav --> 

		<?php include "inc/admin_footer.php" ?>      