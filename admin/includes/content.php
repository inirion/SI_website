<?php
	if(isset($_GET['insert_post'])){
		include('insert_post.php');
	}else if(isset($_GET['view_posts'])){
		include('view_posts.php');
	}else if(isset($_GET['edit_post'])){
		include('edit_post.php');
	}
?>