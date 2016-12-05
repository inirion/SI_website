<?php
include ("includes/database.php");
if(isset($_GET['page'])){
	$page = $_GET['page'];
	if($page <= 0)
	$page = 1;
	$num = $page;
}else{
	 $page = ' ';
	 $num = 1;
}
	if($page ==' ' || $page == '1'){
		$page1 = 0;
	}else{
		$page1 = ($page*5) - 5;
	}
$post_keywords = $_GET['search'];
$count = mysql_query("select * from posts where post_keywords like '%$post_keywords%'");
$get_posts = "select * from posts where post_keywords like '%$post_keywords%' LIMIT $page1, 5";
$run_posts = mysql_query($get_posts);
echo"<hgroup class='mb20'>
		<h1>Search Results</h1>
		<h2 class='lead''><strong class='text-danger'>".mysql_num_rows($count)."</strong> results were found for the search for <strong class='text-danger'>".$post_keywords."</strong></h2>								
	</hgroup>";
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
<a href = 'details.php?post=<?php echo $post_id ?>'><h4 class='text-center'><strong><?php echo $post_title; ?></strong></h4></a>

</div>

<div class='panel-body text-left'>
<div class ='row'>
<div class = 'col-sm-3'>
<a href = 'details.php?post=<?php echo $post_id; ?>'><img class='featuredImg' src='admin/news_img/<?php echo $post_image ?>' width='100%'></a>
</div>
<div class='col-sm-9'>
<?php echo $post_description; ?>
</div>
</div>
<a href = 'details.php?post=<?php echo $post_id; ?>' class='btn btn-danger pull-right'>Read More</a>
</div>

<div class='panel-footer'>
<h6 class='text-right'>Posted by : <?php echo $post_author; ?> <small> On <?php echo $post_date; ?></small></h6>
</div>

</div>
<?php
}
$page = mysql_query("select * from posts where post_keywords like '%$post_keywords%'");
	$count=mysql_num_rows($page);
	$a = $count/5;
	$a=ceil($a);
	?><div class="row" style="margin-bottom: 50px;">
		<div class="col-xs-12"><?php
		if($num - 1 > 0){
			?><a href="index.php?search=<?php echo $post_keywords; ?>&page=<?php echo $num - 1 ?>">
				<button type="button" class="btn btn-default btn-lg">
					<span class="glyphicon glyphicon-arrow-left">
				</button>
			</a><?php
		}
		if($num + 1 <= $a){
			?><a href="index.php?search=<?php echo $post_keywords; ?>&page=<?php echo $num + 1 ?>">
				<button type="button" class="btn btn-default btn-lg pull-right">
					<span class="glyphicon glyphicon-arrow-right">
				</button>
			</a><?php
		}
	?></div></div><?php
mysql_close();
?>
