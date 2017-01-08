<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}
?>
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
					<a href = 'index.php?view_comments'>Comments</a>
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