<?php
if (!defined('MyConst')) {
	die('Direct access not permitted');
} else {
	include ("database.php");
	if (isset($_GET['change_comment_status'])) {
		$id = $_GET['change_comment_status'];
		$get_comment = "Select * from comments where comment_id = '$id'";
		$run_comment = mysql_query($get_comment);

		while ($comment_row = mysql_fetch_array($run_comment)) {
			$comment_status = $comment_row['comment_status'];
			if ($comment_status == 'unapproved')
				$status = 'approved';
			else if ($comment_status == 'approved')
				$status = 'unapproved';
		}
		$change_comment_status = "update comments set comment_status = '$status' where comment_id = '$id'";
		$run_comment = mysql_query($change_comment_status);
		echo '<script type="text/javascript">
	window.location = "../admin/index.php?view_comments"
	</script>';
	}
}
?>