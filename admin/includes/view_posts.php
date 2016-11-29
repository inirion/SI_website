<div class="container">
	<table class="table table-hover table-bordered text-center">
		<thead>
			<tr>
				<th class="text-center">Post ID</th>
				<th class="text-center">Title</th>
				<th class="text-center">Author</th>
				<th class="text-center">Comments</th>
				<th class="text-center">Edit</th>
				<th class="text-center">Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include ("database.php");
			$get_posts = "Select * from posts";
			$run_posts = mysql_query($get_posts);

			while ($posts_row = mysql_fetch_array($run_posts)) {
				$post_id = $posts_row['post_id'];
				$post_title = $posts_row['post_title'];
				$post_author = $posts_row['post_author'];
				$post_image = $posts_row['post_image'];
			?>
			<tr>
				<th class="text-center"><?php echo $post_id;?></th>
				<th class="text-center"><?php echo $post_title;?></th>
				<th class="text-center"><?php echo $post_author;?></th>
				<th class="text-center">
				<?php
				
					$get_comments = "SELECT * FROM comments where post_id='$post_id'";
					$run_comments = mysql_query($get_comments);
					$count = mysql_num_rows($run_comments);
					echo $count;
				?>
				</th>
				<th class="text-center"><a href="index.php?edit_post=<?php echo $post_id;?>" class="btn btn-success" role="button">Edit</a></th>
				<th class="text-center"><a href="includes/delete_post.php?delete_post=<?php echo $post_id;?>" class="btn btn-danger" role="button">Delete</a></th>
			</tr>
			<?php
			}
			mysql_close();
			?>
		</tbody>
	</table>
	<a href = "index.php?insert_post" class = "btn btn-info pull-right" role="button">New Post</a>
</div>