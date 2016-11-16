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
<h5 class='text-left'> 
<div class= 'row'>
<div class= 'col-xs-1'>
<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
</div>
<div class= 'col-xs-10'>
<strong>$post_title</strong>
</div>
</div>
</h5>
</a>
</div>
";
	}
	?>
	
</div>