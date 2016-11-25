<div class="navbar navbar-inverse navbar-static-top">
	<!-- Header container start -->
	<div class = "container-fluid">
		<!-- Title or logo of website -->
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Name</a>
		</div>
		<!-- Hamburger button start -->
		<button class = "navbar-toggle" data-toggle = "collapse" data-target = " .navHeaderCollapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<!-- Hamburger button end -->

		<!-- Navigation bar start -->
		<div class="collapse navbar-collapse navHeaderCollapse">
			<ul class="nav navbar-nav navbar-left">
				<li>
					<a>About</a>
				</li>
				<!-- Dropdown in Navigation bar start -->
				<li class = "dropdown">
					<a href="#" class = "dropdown-toggle" data-toggle = "dropdown">Category <b class = "caret"></b></a>
					<!-- Creating dropdown effect by adding ul element inside li element -->
					<ul class="dropdown-menu">
						<!-- Populationg dropdown by categories from database start -->
						<?php
						include ("includes/database.php");

						$get_categories = "Select * from categories";
						$run_categories = mysql_query($get_categories);

						while ($categories_row = mysql_fetch_array($run_categories)) {
							$category_id = $categories_row['category_id'];
							$category_title = $categories_row['category_title'];
							/*reading selected category name and id from database*/
							echo "<li><a href = 'index.php?category=$category_id'>$category_title</a></li>";
						}
						mysql_close();
						?>

						<!-- Populationg dropdown by categories from database end -->
					</ul>
				</li>
				<!-- Dropdown in Navigation bar start -->
				<li>
					<a>Contact</a>
				</li>
			</ul>
			<!-- Creation of serchbox start -->
			<form class="navbar-form navbar-right" role="search" metod="get" action="index.php" enctype="multipart/form-data">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="search" required>
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
			<!-- Creation of serchbox end -->
		</div>
		<!-- Navigation bar end -->
	</div>
	<!-- Header container ends -->
</div>