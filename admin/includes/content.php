<?php
if (!defined('MyConst')) {
	die('Direct access not permitted');
}
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
}
?>