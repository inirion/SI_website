<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}
?>
<?php
	include('database.php');
	
	if(isset($_GET['delete_comment'])){
		$delete_id = $_GET['delete_comment'];
		$delete_category = "delete from comments where comment_id = '$delete_id'";
		$delete_run = mysql_query($delete_category);
		
		echo "<script>alert('Comment has been deleted !')</script>";
				echo '<script type="text/javascript">
		window.location = "../admin/index.php?view_comments"
		</script>';
	}
	mysql_close();
?>