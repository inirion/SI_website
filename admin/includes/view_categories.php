<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}
?>
<div class="container">
	<table class="table table-hover table-bordered text-center">
		<thead>
			<tr>
				<th class="text-center">Category ID</th>
				<th class="text-center">Category Type</th>
				<th class="text-center">Edit</th>
				<th class="text-center">Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include ("database.php");
			$get_categories = "Select * from categories";
			$run_cateogires = mysql_query($get_categories);

			while ($category_row = mysql_fetch_array($run_cateogires)) {
				$category_id = $category_row['category_id '];
				$category_title = $category_row['category_title'];
			?>
			<tr>
				<th class="text-center"><?php echo $category_id;?></th>
				<th class="text-center"><?php echo $category_title;?></th>
				<th class="text-center"><a href="index.php?edit_category=<?php echo $category_id;?>" class="btn btn-success" role="button">Edit</a></th>
				<th class="text-center"><a href="includes/delete_category.php?delete_=<?php echo $post_id;?>" class="btn btn-danger" role="button">Delete</a></th>
			</tr>
			<?php
			}
			mysql_close();
			?>
		</tbody>
	</table>
	<a href = "index.php?insert_post" class = "btn btn-info pull-right" role="button">New Post</a>
</div>