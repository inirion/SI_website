<!-- Comment -->
<?php
$get_comments = "select * from comments where post_id = '$post_id' AND comment_status = 'approved'";
$run_comments = mysql_query($get_comments);
while ($row_comment = mysql_fetch_array($run_comments)) {
	$comment_name = html_entity_decode($row_comment['comment_name'], ENT_QUOTES, "ISO-8859-1");
	$comment_date = $row_comment['comment_date'];
	$comment_text = html_entity_decode($row_comment['comment_text'], ENT_QUOTES, "ISO-8859-1");
	echo "
	<div class='media'>
	<div class='media-body' style = 'padding-bottom:20px;'>
		<h4 class='media-heading'>$comment_name <small>$comment_date</small></h4>
		$comment_text
	</div>
</div>";
}
?>
