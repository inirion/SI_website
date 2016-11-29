<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}
?>
<?php
	include('database.php');
	
	if(isset($_GET['delete_post'])){
		$delete_id = $_GET['delete_post'];
		$delete_post = "delete from posts where post_id = '$delete_id'";
		$delete_run = mysql_query($delete_post);
		
		echo "<script>alert('Post has been deleted !')</script>";
				echo '<script type="text/javascript">
		window.location = "../index.php?view_posts"
		</script>';
	}
	mysql_close();
?>