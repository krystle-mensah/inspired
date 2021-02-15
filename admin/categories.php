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
									<h1 class="mt-4">Categories</h1>
								</div><!-- alignment -->
								<!--CREATE A CATEGORY  -->
								<?php

								if (isset($_POST['submit'])) {

									$cat_title = $_POST['cat_title'];

									//// if cat_title is equal to empty string or function to check is var is empty
									if ($cat_title == "" || empty($cat_title)) {
										//// Then display this.
										echo "This field should not empty";
									} else {

										$insertQry = 'INSERT INTO categories (cat_title) VALUE(?)';
										$insertStatement = mysqli_prepare($connection, $insertQry);
										mysqli_stmt_bind_param($insertStatement, 's', $cat_title);
										mysqli_stmt_execute($insertStatement);

										if (!$insertStatement) {

											// terminate script and display error with the connection. 
											die('QUERY FAILED' . mysqli_error($connection));
										}
									} // End else

								} // isset function

								?>

								<div class="col-xs-6 col-lg-4">
									<!-- ADD CATEGORY -->
									<form action="" method="post">

										<div class="form-group">
											<label for="cat-title">Add Category</label>
											<input type="text" name="cat_title" class="form-control">
										</div><!-- form-group -->

										<!-- SUBIT BUTTON -->
										<div class="form-group">
											<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
										</div><!-- form-group -->
									</form><!-- form -->

									<?php // UPDATE AND INCLUDE QUERY

									// DECTECT - if the edited link is declared 
									if (isset($_GET['edit'])) {

										// IF TRUE - ASSIGN TO cat_id. 
										$cat_id = $_GET['edit'];

										// PATH TO UPDATE_CATEGORIES.PHP
										include "inc/update_categories.php";
									}

									?>
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
											$select_categories = mysqli_query($connection, $query);

											// while the condition is true fetch the row representing the array from ($variable)
											while ($row = mysqli_fetch_array($select_categories)) {
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

											if (isset($_GET['delete'])) {
												$the_cat_id = $_GET['delete'];

												$deleteQry = "DELETE FROM categories WHERE cat_id = ?";
												$deleteStatement = mysqli_prepare($connection, $deleteQry);
												mysqli_stmt_bind_param($deleteStatement, 'i', $the_cat_id);
												mysqli_stmt_execute($deleteStatement);

												header("Location: categories.php");
											}

											?>

										</tbody>
									</table> <!-- table table-bordered table-hover -->

								</div><!-- alignment -->
							</div><!-- row -->
						</div><!-- container fluid -->
					</main><!-- main -->

				</div> <!-- content -->

			</div><!-- row -->

		</div><!-- container -->

	</div><!-- layoutSidenav -->

	<?php include "inc/admin_footer.php" ?>