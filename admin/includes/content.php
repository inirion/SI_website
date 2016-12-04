<?php
if (!defined('MyConst')) {
	die('Direct access not permitted');
} else {
	if (isset($_GET['insert_post'])) {
		include ('insert_post.php');
	} else if (isset($_GET['view_posts'])) {
		include ('view_posts.php');
	} else if (isset($_GET['edit_post'])) {
		include ('edit_post.php');
	} else if (isset($_GET['delete_post'])) {
		include ('delete_post.php');
	} else if (isset($_GET['logout'])) {
		include ('logout.php');
	} else if (isset($_GET['view_categories'])) {
		include ('view_categories.php');
	} else if (isset($_GET['insert_category'])) {
		include ('insert_category.php');
	} else if (isset($_GET['delete_category'])) {
		include ('delete_category.php');
	} else if (isset($_GET['edit_category'])) {
		include ('edit_category.php');
	} else if (isset($_GET['view_comments'])) {
		include ('view_comments.php');
	} else if (isset($_GET['change_comment_status'])) {
		include ('change_comment_status.php');
	} else if (isset($_GET['delete_comment'])) {
		include ('delete_comment.php');
	}

}
?>