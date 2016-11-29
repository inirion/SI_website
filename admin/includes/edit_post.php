<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}
?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector : 'textarea'
	}); 
</script>
<?php
include ("database.php");
if (isset($_GET['edit_post'])) {
	$id = $_GET['edit_post'];
	$get_posts = "Select * from posts where post_id = '$id'";
	$run_posts = mysql_query($get_posts);

	while ($posts_row = mysql_fetch_array($run_posts)) {
		html_entity_decode($posts_row['post_description'], ENT_QUOTES, "ISO-8859-1");
		$post_id = $posts_row['post_id'];
		$post_title = html_entity_decode($posts_row['post_title'], ENT_QUOTES, "ISO-8859-1");
		$post_category = $posts_row['category_id'];
		$post_author = html_entity_decode($posts_row['post_author'], ENT_QUOTES, "ISO-8859-1");
		$post_keywords = html_entity_decode($posts_row['post_keywords'], ENT_QUOTES, "ISO-8859-1");
		$post_image = $posts_row['post_image'];
		$post_content = html_entity_decode($posts_row['post_content'], ENT_QUOTES, "ISO-8859-1");
		$post_description = html_entity_decode($posts_row['post_description'], ENT_QUOTES, "ISO-8859-1");
	}
}
?>
<form class="form-horizontal" enctype="multipart/form-data" method='post'>
	<fieldset>

		<!-- Form Name -->
		<legend align="middle">
			Update
		</legend>

		<!-- Text input Title-->
		<div class="form-group col-sm-12"">
		<label class="col-md-3 control-label" for="Title">Title : </label>
		<div class="col-md-7">
		<input id="Title" name="Title" type="text" placeholder="Insert post title" value = "<?php echo $post_title; ?>" class="form-control input-md" required="">
		<span class="help-block">This will be post title</span>
		</div>
		</div>

		<!-- Select Basic Category -->
		<div class="form-group col-sm-12">
		<label class="col-md-3 control-label" for="Category">Category :</label>
		<div class="col-md-7">
		<select id="Category" name="Category" class="form-control" required>
		<!-- Populationg dropdown by categories from database start -->
		<?php
		$get_categories = "Select * from categories";
		$run_categories = mysql_query($get_categories);

		while ($categories_row = mysql_fetch_array($run_categories)) {
			$category_id = $categories_row['category_id'];
			$category_title = $categories_row['category_title'];
			/*reading selected category name and id from database*/
			if ($category_id == $post_category)
				echo "<option value='$category_id' selected>$category_title</option>";
			else {
				echo "<option value='$category_id'>$category_title</option>";
			}

		}
		?>
		<!-- Populationg dropdown by categories from database end -->
		</select>
		</div>
		</div>

		<!-- Text input Author-->
		<div class="form-group col-sm-12"">
			<label class="col-md-3 control-label" for="Author">Author :</label>
			<div class="col-md-7">
				<input id="Author" name="Author" type="text" placeholder="Insert author name" value =" <?php echo $post_author; ?>"  class="form-control input-md" required="">
				<span class="help-block">This is post author</span>
			</div>
		</div>

		<!-- Text input Keywords-->
		<div class="form-group col-sm-12"">
		<label class="col-md-3 control-label" for="Keywords">Keywords :</label>
		<div class="col-md-7">
		<input id="Keywords" name="Keywords" type="text" placeholder="Insert keywords" value = "<?php echo $post_keywords; ?>" class="form-control input-md" required="">
		<span class="help-block">Keywords for serchbox</span>
		</div>
		</div>

		<!-- File Button File -->
		<div class="form-group col-sm-12"">
			<label class="col-md-3 control-label" for="filebutton">File Button</label>
			<div class="col-md-2">
				<input id="filebutton" name="filebutton" class="input-file" type="file" required>

			</div>
			<div class="col-md-1">
				<img class="featuredImg" src='news_img/<?php echo $post_image; ?>' width='100%'>
			</div>
		</div>

		<!-- Textarea Description -->
		<div class="form-group col-sm-12"">
		<label class="col-md-3 control-label" for="Description">Description :</label>
		<div class="col-md-7">
		<textarea class="form-control" id="Description" name="Description"><?php echo $post_description; ?></textarea>
		</div>
		</div>

		<!-- Textarea Content -->
		<div class="form-group col-sm-12"">
			<label class="col-md-3 control-label" for="Content">Content :</label>
			<div class="col-md-7">
				<textarea class="form-control" id="Content" name="Content" rows="15"><?php echo $post_content; ?></textarea>
			</div>
		</div>

		<!-- Button -->
		<div class="form-group col-sm-12"">
		<label class="col-xs-6"></label>
		<div class="col-xs-6 form-group">
		<button id="submit" name="update" type="submit" class="btn btn-primary">
		Update
		</button>
		</div>
		</div>

		</fieldset>
		</form>

		<?php
		if (isset($_POST['update'])) {
			$update_id = $post_id;
			$post_category_new = $_POST['Category'];
			$post_title = htmlentities($_POST['Title'], ENT_QUOTES);
			$post_date = date('j.n.Y');
			$post_author = htmlentities($_POST['Author'], ENT_QUOTES);
			$post_keywords = htmlentities($_POST['Keywords'], ENT_QUOTES);
			$post_image = $_FILES['filebutton']['name'];
			$post_image_temporary = $_FILES['filebutton']['tmp_name'];
			$post_content = htmlentities($_POST['Content'], ENT_QUOTES);
			$post_description = htmlentities($_POST['Description'], ENT_QUOTES);

			if ($post_content == '') {
				echo "<script>alert('Please fill content text !!')</script>";
				exit();
			} else {
				move_uploaded_file($post_image_temporary, "news_img/$post_image");

				$update_posts = "update posts set category_id = '$post_category_new',post_title = '$post_title', post_date='$post_date', post_author = '$post_author',
		post_keywords = '$post_keywords', post_image = '$post_image', post_content = '$post_content', post_description = '$post_description' where post_id = '$update_id'";

				$run_update_posts = mysql_query($update_posts);
				if ($run_posts)
					echo "<script>alert('Post has been Updated !')</script>";
				echo '<script type="text/javascript">
		window.location = "../admin/index.php?view_posts"
		</script>';
			}
		}
		mysql_close();
		?>
