<div class="col-lg-9">
		<div class="page-header text-center">
			<h3>News all around globe !!</h3>
		</div>
		<?php
		if(isset($_GET['post'])){
		$post_id = $_GET['post'];
		$get_posts = "select * from posts where post_id = '$post_id'";
		$run_posts = mysql_query($get_posts);
		while ($row_posts = mysql_fetch_array($run_posts)) {
			$post_title = html_entity_decode($row_posts['post_title'], ENT_QUOTES, "ISO-8859-1");
			$post_date = $row_posts['post_date'];
			$post_image = html_entity_decode($row_posts['post_image'], ENT_QUOTES, "ISO-8859-1");
			$post_author = html_entity_decode($row_posts['post_author'], ENT_QUOTES, "ISO-8859-1");
			$post_content = html_entity_decode($row_posts['post_content'], ENT_QUOTES, "ISO-8859-1");
			
			echo "

<div class='panel panel-default'>
<div class='page-header'>
<h4 class='text-center'><strong>$post_title</strong></h4>
</div>
<div class='panel-body'>
<div class ='row'>
<div class = 'col-sm-3'>
<img class='featuredImg' src='admin/news_img/$post_image' width='100%'>
</div>
<div class='col-sm-9'>
$post_content
</div>
</div>
</div>
<div class='panel-footer'>
<h6 class='text-right'>Posted by : $post_author <small> On $post_date</small></h6>
</div>

</div>";
		}
		}
		?>
</div>
