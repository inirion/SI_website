<div class="col-lg-9">
	<div class="page-header text-center">
		<h3>News all around globe !!</h3>
	</div>
	<?php
	if (!isset($_GET['category'])) 
		include('includes/random_posts.php');
	else if(isset($_GET['category']))
		include('includes/category_posts.php');
	?>
</div>
