<div id="layoutSidenav_nav">

					<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
						<div class="sb-sidenav-menu">
							<div class="nav">
								<!-- <div class="sb-sidenav-menu-heading">Core</div> -->
								<a class="nav-link" href="Dashboard.php">
									<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
									Dashboard 
								</a>

								<!-- POST -->
								<a class="nav-link collapsed" href="./posts.php" data-toggle="collapse" data-target="#collapsePosts" aria-expanded="false" aria-controls="collapseLayouts">
									<div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
									Posts
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<!-- POST DROPDOWN -->
								<div class="collapse" id="collapsePosts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
									<nav class="sb-sidenav-menu-nested nav">
										<a class="nav-link" href="./posts.php">View All Posts</a>
										<a class="nav-link" href="posts.php?source=add_post">Add Posts</a>
									</nav>
								</div>
								<!-- IMAGE SLIDER -->
								<a class="nav-link collapsed" href="./slider_images.php" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
									<div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
									Image Slider
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<!-- IMAGE SLIDER DROPDOWN -->
								<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
									<nav class="sb-sidenav-menu-nested nav">
										<a class="nav-link" href="./slider_images.php">View All Image Slides</a>
										<a class="nav-link" href="slider_images.php?source=add_slide_image">Add Slide Image</a>
									</nav>
								</div>

								<!-- USERS -->
								<a class="nav-link collapsed" href="users.php" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="false" aria-controls="collapseLayouts">
									<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
									Users
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								
								<div class="collapse" id="collapseUsers" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
									<nav class="sb-sidenav-menu-nested nav">
										<a class="nav-link" href="users.php">View All Users</a>
										<a class="nav-link" href="users.php?source=add_user">Add User</a>
									</nav>
								</div>
								<!-- CATEGORIES -->
								<a class="nav-link" href="categories.php">
									<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
									Categories
								</a>
								<!-- COMMENTS -->
								<!-- <a class="nav-link" href="#">
									<div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
									Comments
								</a> -->
								<!-- PROFILE -->
								<a class="nav-link" href="#">
									<div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
									Profile
								</a>

								<!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
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
								</div> -->
								<!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
								<!-- <a class="nav-link" href="charts.html">
									<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
									Charts
								</a> -->
								<!-- <a class="nav-link" href="tables.html">
									<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
									Tables
								</a> -->
							</div>
						</div>
						<!-- <div class="sb-sidenav-footer">
							<div class="small">Logged in as:</div>
							Start Bootstrap
						</div> -->
					</nav>
</div>