<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Page Title - SB Admin</title>
		<link href="css/styles.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
	</head>

<?php

include '../inc/db.php';

//first Check If the from is working
if( isset( $_POST['submit'] ) ){
	// TEST
	//echo 'submitted'; //output - click button and we see submitted

	// now we wont to Get the values from the user
	//TEST
	$user_firstname = $_POST['user_firstname']; //output
	$user_firstname = $_POST['user_firstname'];
	$user_lastname 	= $_POST['user_lastname'];
	$email 	  			= $_POST['email']; 
	$username 			= $_POST['username'];
	$password 			= $_POST['password'];

		// check If fields are Not Empty

		//if( !empty( $user_firstname ) && !empty( $user_lastname ) && !empty( $email ) && !empty( $username ) && !empty( $password ) ){

		// now Clean the data
		$user_firstname = mysqli_real_escape_string($connection, $user_firstname);
		$user_lastname 	= mysqli_real_escape_string($connection, $user_lastname);
		$email 	  			= mysqli_real_escape_string($connection, $email);
		$username 			= mysqli_real_escape_string($connection, $username);
		$password 			= mysqli_real_escape_string($connection, $password);

		//$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
		
		//now Insert into this Table and these Columns

		// if (!mysqli_query($con,"INSERT INTO Persons (FirstName) VALUES ('Glenn')")) {
		// 	echo("Error description: " . mysqli_error($con));
		// }

		// $query = "INSERT INTO users (user_firstname, user_lastname, user_email, username, user_password, user_role) VALUES ('{$user_firstname}', '{$user_lastname}', '{$email}', '{$username}', '{$password}', 'subscriber')";
		 
		// $register_user_query = mysqli_query($connection, $query);

	 	// if(!$register_user_query) {
	 	// 	die("QUERY FAILED " . mysqli_error($connection));
	 	// }

		// $message = " Your registration has been submitted.";

	//} 
	// else {

	// 	$message = " Fields cannot be empty ";

	// }

//} 
//else {

	//$message = " ";

}//isset 



?>

	<body class="bg-primary">
		<div id="layoutAuthentication">
			<div id="layoutAuthentication_content">
				<main>
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-7">
								<div class="card shadow-lg border-0 rounded-lg mt-5">
									<div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
									<div class="card-body">
										<form  action="registration.php" method="POST" autocomplete="off">
											<div class="form-row">
												<div class="col-md-6">
													<!-- First Name -->
													<div class="form-group">
														<label class="small mb-1" for="inputFirstName">First Name</label>
														<input class="form-control py-4" id="inputFirstName" type="text" name="user_firstname" placeholder="Enter first name" />
													</div>
												</div>
												<!-- Last name -->
												<div class="col-md-6">
													<div class="form-group">
														<label class="small mb-1" for="inputLastName">Last Name</label>
														<input class="form-control py-4" id="inputLastName" type="text" name="user_lastname" placeholder="Enter last name" />
													</div>
												</div>
											</div>
											<!-- Email -->
											<div class="form-group">
												<label class="small mb-1" for="inputEmailAddress">Email</label>
												<input type="email" name="email" class="form-control" placeholder="somebody@example.com">
											</div>
											
											<div class="form-group">
												<label class="small mb-1" for="inputConfirmPassword">Username</label>
												<input class="form-control py-4" name="username" type="text" placeholder="Enter Username" />
											</div>
											<div class="form-row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="small mb-1" for="inputPassword">Password</label>
														<input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
														<input class="form-control py-4" id="inputConfirmPassword" name="email" type="password" placeholder="Confirm password" />
													</div>
												</div>
											
												</div>
											</div>
											<input type="submit" name="submit" class="btn btn-primary btn-block form-group mt-4 mb-0" value="Create Account">
										</form>
									</div>
									<footer class="footer_main">
										<div class="card-footer text-center">
											<div class="small"><a href="index.php">Have an account? Go to login</a></div>
										</div>
									</footer>
									
								</div>
							</div>
						</div>
					</div>
				</main>
			</div><!-- layoutAuthentication_content -->
			<?php include "inc/admin_footer.php";?>
			
		</div><!-- layoutAuthentication -->

		<?php include "inc/scripts.php";?>
	</body>
</html>
