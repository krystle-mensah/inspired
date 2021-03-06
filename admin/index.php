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

<body class="bg-primary">
	<div id="layoutAuthentication">
		<div id="layoutAuthentication_content">
			<main>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-5">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header">
									<h3 class="text-center font-weight-light my-4">Login</h3>
								</div>
								<div class="card-body">

									<form action="../inc/login.php" method="post">
										<!-- Email -->
										<div class="form-group">
											<label class="small mb-1" for="inputEmailAddress">Email address:</label>
											<input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="login_email" required />
										</div>
										<!-- Password -->
										<div class="form-group">
											<label class="small mb-1" for="inputPassword">Password</label>
											<input class="form-control py-4" type="password" placeholder="Enter password" name="login_password" required />
										</div>
										<!-- <div class="form-group">
											<div class="custom-control custom-checkbox">
												<input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
												<label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
											</div>
										</div>
										<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
											<a class="small" href="password.html">Forgot Password?</a> -->
										<button class="btn btn-primary" name="login" type="submit">Login</button>
								</div>
								</form>
							</div>
							<!-- <div class="card-footer text-center">
										<div class="small"><a href="registration.php">Need an account? Sign up!</a></div>
									</div> -->
						</div>
					</div>
				</div>
		</div>
		</main>
	</div><!-- layoutAuthentication_content -->
	<?php include "inc/admin_footer.php"; ?>

	</div><!-- layoutAuthentication -->

	<?php include "inc/scripts.php"; ?>
</body>

</html>