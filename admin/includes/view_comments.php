<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}else{
?>
<div class="container">
	<div class="row">
	<table class="table table-hover table-bordered text-center">
		<thead>
			<tr>
				<th class="text-center">Author</th>
				<th class="text-center">Text</th>
				<th class="text-center">Status</th>
				<th class="text-center">Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include ("database.php");
			$get_comments = "Select * from comments";
			$run_comments = mysql_query($get_comments);

			while ($comment_row = mysql_fetch_array($run_comments)) {
				$comment_id = $comment_row['comment_id'];
				$comment_author = html_entity_decode($comment_row['comment_name'], ENT_QUOTES, "ISO-8859-1");
				$comment_text = html_entity_decode($comment_row['comment_text'], ENT_QUOTES, "ISO-8859-1");
				$comment_status = $comment_row['comment_status'];
				if($comment_status == 'unapproved') $status = 'Approve';
				else if ($comment_status == 'approved') $status = 'Unapprove';
			?>
			<tr>
				<th class="text-center"><?php echo $comment_author; ?></th>
				<th class="text-center"><?php echo $comment_text; ?></th>
				<th class="text-center"><a href="index.php?change_comment_status=<?php echo $comment_id; ?>" class="btn btn-success" role="button"><?php echo $status; ?></a></th>
				<th class="text-center"><a href="index.php?delete_comment=<?php echo $comment_id; ?>" class="btn btn-danger" role="button">Delete</a></th>
			</tr>
			<?php
			}
			mysql_close();
			?>
		</tbody>
	</table>
	</div>
</div>
<?php } ?>