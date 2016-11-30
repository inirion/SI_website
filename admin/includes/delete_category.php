<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}
?>
<?php
	include('database.php');
	
	if(isset($_GET['delete_category'])){
		$delete_id = $_GET['delete_category'];
		$delete_category = "delete from categories where category_id = '$delete_id'";
		$delete_run = mysql_query($delete_category);
		
		$delete_posts = "delete from posts where category_id = '$delete_id'";
		$delete_run = mysql_query($delete_posts);
		
		echo "<script>alert('Category has been deleted !')</script>";
				echo '<script type="text/javascript">
		window.location = "../admin/index.php?view_categories"
		</script>';
	}
	mysql_close();
?>