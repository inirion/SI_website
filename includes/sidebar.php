<div class='col-lg-3' sidenav>
	<div class="page-header text-left">
		<h3>Recent Articles</h3>
	</div>
	<?php
	$get_posts = "select * from posts order by 1 DESC LIMIT 0,5";
	$run_posts = mysql_query($get_posts);
	while ($row_posts = mysql_fetch_array($run_posts)) {
		$post_id = $row_posts['post_id'];
		$post_title = html_entity_decode($row_posts['post_title'], ENT_QUOTES, "ISO-8859-1");
		$post_image = html_entity_decode($row_posts['post_image'], ENT_QUOTES, "ISO-8859-1");
		$post_description = html_entity_decode($row_posts['post_description'], ENT_QUOTES, "ISO-8859-1");
		echo "
<div class='page-header'>
<a href='details.php?post=$post_id'>
<h5 class='text-left'> <span class='glyphicon glyphicon-chevron-right pull-left' aria-hidden='true'></span>
<strong>$post_title</strong>
</h5>
</a>
</div>
";
	}
	?>
	
</div>