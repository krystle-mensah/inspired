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
										<h1 class="mt-4">Chapters</h1>
											<!-- <ol class="breadcrumb mb-4">
												<li class="breadcrumb-item active">Add Category</li>
											</ol> -->
									</div><!-- alignment -->	

									<div class="col-xs-6 col-lg-4">

									<?php 

										// if anything happens when adding chapter is clicked
										if(isset($_POST['submit'])) {
											//echo "<h1>hello</h1>";
											
											// Query the database for ALL cat
											$query = "SELECT * FROM categories";
											

										
											

											$chapterName = $_POST['chapterName'];

											//// if cat_title is equal to empty string or function to check is var is empty
											if($chapterName == "" || empty($chapterName)) {
												//// Then display this.
												echo "This field should not empty";
											}	else{

												// insert what user inputs to the chapters table in this column. 
												$query = "INSERT INTO chapters(chapterName) ";
												
												// and assign value to variable. 
												$query .= "VALUE('{$chapterName}')";

												// then send to database with the connection and query. 
												$create_chapter_query = mysqli_query($connection, $query);
											
												// check if query was succesful
												if(!$create_chapter_query) {
													
													// terminate script and display error with the connection. 
													die('QUERY FAILED' . mysqli_error($connection));

												}

											} // End else

										} // isset function

									?>

										<form action="" method="post">

											<div class="form-group">
												<label for="cat-title">Add a Chapter</label>
												<input type="text" name="chapterName" class="form-control">
											</div><!-- form-group -->
											<div class="form-group">
												<input class="btn btn-primary" type="submit" name="submit" value="Add Chapter">
											</div><!-- form-group -->
										</form><!-- form -->

										<?php // UPDATE AND INCLUDE QUERY

											// DECTECT - if the edited link is declared 
											if(isset($_GET['edit'])){

												// IF TRUE - ASSIGN TO cat_id. 
												$chapterId = $_GET['edit'];

												// PATH TO UPDATE_CATEGORIES.PHP
												include "inc/update_chapters.php";

											}

										?>
									</div><!-- alignment -->

									<div class="col-xs-6 col-lg-12">

										<table class="table table-striped table-bordered table-hover my_table">
											<thead>
												<tr>
													<th>Id</th>
													<th>Chapter Title</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$query = "SELECT * FROM chapters";
											
												//function sends in the query and connection. 
												$select_all_chapters = mysqli_query($connection,$query);

												// while the condition is true fetch the row representing the array from ($variable)
												while($row = mysqli_fetch_array(	$select_all_chapters )) {
													// Then assign the array to a variable
													$chapterId = $row['chapterId'];
													$chapterName = $row['chapterName'];
													echo "<tr>";
													// Then display the fetch row form the database in the browser. 
														echo "<td>{$chapterId}</td>";
														echo "<td>{$chapterName}</td>";
														// delete button
														echo "<td><a href='chapters.php?delete={$chapterId}'>Delete</a></td>";
														// Edited link
														echo "<td><a href='chapters.php?edit={$chapterId}'>Edit</a></td>";
													echo "</tr>";
												}

											?>

											<!-- DELETE QUERY FUNCTION -->
											
											<?php 

												//check for the delete key in url
												if(isset($_GET['delete'])) {
													// then save it here
													$theChapterId = $_GET['delete'];
													$query = "DELETE FROM chapters WHERE chapterId = {$theChapterId}";
											
													// send in
													$delete_query = mysqli_query($connection, $query);
											
													// once the above is done refrash in this location
													header("Location: chapters.php");
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