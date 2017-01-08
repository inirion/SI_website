<div class="navbar navbar-inverse navbar-static-top">
	<!-- Header container start -->
	<div class = "container-fluid">

		<div class="navbar-header">
			<!-- Hamburger button -->
			<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<!-- Title or logo of website -->
			<a class="navbar-brand" href="index.php">Admin panel</a>
		</div>

		<!-- Navigation bar start -->

		<div class="collapse navbar-collapse navHeaderCollapse col-xs-12">
			<ul class="nav navbar-nav navbar-left">
				<!-- Dropdown in Navigation bar start -->
				<?php
				include ("includes/database.php");
				$count = 0;
				$get_categories = "Select * from categories";
				$run_categories = mysql_query($get_categories);
				while ($categories_row = mysql_fetch_array($run_categories)) {
					$count++;
				}
				if ($count <= 4) {
					$get_categories = "Select * from categories";
					$run_categories = mysql_query($get_categories);
					while ($categories_row = mysql_fetch_array($run_categories)) {
						$category_id = $categories_row['category_id'];
						$category_title = $categories_row['category_title'];
						echo "<li><a href = 'index.php?category=$category_id'>$category_title</a></li>";
					}
				} else {
					echo '<li class = "dropdown">
						<a href="#" class = "dropdown-toggle" data-toggle = "dropdown">Category <b class = "caret"></b></a>
						<ul class="dropdown-menu">';

					$get_categories = "Select * from categories";
					$run_categories = mysql_query($get_categories);
					while ($categories_row = mysql_fetch_array($run_categories)) {
						$category_id = $categories_row['category_id'];
						$category_title = $categories_row['category_title'];
						echo "<li><a href = 'index.php?category=$category_id'>$category_title</a></li>";
					}
					echo '</ul></li>';
				}
				mysql_close();
				?>
			</ul>
</div>
			<!-- Creation of serchbox start -->
			<div class="pull-right">
			<form class="navbar-form pull-right" role="search" metod="get" action="index.php" enctype="multipart/form-data">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="search" required>
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
			</div>
		
		<!-- Creation of serchbox end -->
	</div>
	<!-- Navigation bar end -->

</div>
<!-- Header container ends -->
</div>