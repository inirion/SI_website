<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}
?>
<div class="navbar navbar-inverse navbar-static-top">
	<!-- Header container start -->
	<div class = "container">
		<!-- Title or logo of website -->
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Admin panel</a>
		</div>
		<!-- Hamburger button start -->
		<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<!-- Hamburger button end -->

		<!-- Navigation bar start -->
		<div class="collapse navbar-collapse navHeaderCollapse">
			<ul class="nav navbar-nav navbar-right">
				<!--Posts start -->
				<li>
					<a href = 'index.php?view_posts'>Posts</a>
				</li>
				<!-- Posts ends -->
				<!-- Category start -->
				<li>
					<a href = 'index.php?view_categories'>Categories</a>
				</li>
				<!-- Category end -->
				<li>
					<a href = 'index.php?view_comments'>View Comments</a>
				</li>
				<li>
					<a href = 'index.php?logout'>Logout</a>
				</li>
			</ul>

		</div>
		<!-- Navigation bar end -->
	</div>
	<!-- Header container ends -->
</div>