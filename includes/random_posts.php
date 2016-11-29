<?php
include ("includes/database.php");
$get_posts = "select * from posts order by rand() LIMIT 0,5";
$run_posts = mysql_query($get_posts);
while ($row_posts = mysql_fetch_array($run_posts)) {
	$post_id = $row_posts['post_id'];
	$post_title = html_entity_decode($row_posts['post_title'], ENT_QUOTES, "ISO-8859-1");
	$post_date = $row_posts['post_date'];
	$post_image = html_entity_decode($row_posts['post_image'], ENT_QUOTES, "ISO-8859-1");
	$post_author = html_entity_decode($row_posts['post_author'], ENT_QUOTES, "ISO-8859-1");
	$post_content = html_entity_decode($row_posts['post_content'], ENT_QUOTES, "ISO-8859-1");
	$post_description = html_entity_decode($row_posts['post_description'], ENT_QUOTES, "ISO-8859-1");
?>
<div class='panel panel-default'>

	<div class='page-header'>
		<a href = 'details.php?post=$post_id'><h4 class='text-center'><strong><?php echo $post_title; ?></strong></h4></a>

	</div>

	<div class='panel-body text-left'>
		<div class ='row'>
			<div class = 'col-sm-3'>
				<a href = 'details.php?post=<?php echo $post_id; ?>'><img class='featuredImg' src='admin/news_img/<?php echo $post_image;?>' width='100%'></a>
			</div>
			<div class='col-sm-9'>
				<?php echo $post_description; ?>
			</div>
		</div>
		<a href = 'details.php?post=$post_id' class='btn btn-danger pull-right'>Read More</a>
	</div>

	<div class='panel-footer'>
		<h6 class='text-right'>Posted by : <?php echo $post_author; ?><small> On <?php echo $post_date; ?></small></h6>
	</div>

</div>

<?php 
}
mysql_close();
?>



