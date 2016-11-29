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
<form class="form-horizontal" enctype="multipart/form-data" method='post'>
	<fieldset>

		<!-- Form Name -->
		<legend align="middle">
			Insert
		</legend>

		<!-- Text input Title-->
		<div class="form-group col-sm-12"">
		<label class="col-md-3 control-label" for="Title">Title : </label>
		<div class="col-md-7">
		<input id="Title" name="Title" type="text" placeholder="Insert post title" class="form-control input-md" required="">
		<span class="help-block">This will be post title</span>
		</div>
		</div>

		<!-- Select Basic Category -->
		<div class="form-group col-sm-12">
		<label class="col-md-3 control-label" for="Category">Category :</label>
		<div class="col-md-7">
		<select id="Category" name="Category" class="form-control" required>
		<option selected disabled value="">Select Category</option>
		<!-- Populationg dropdown by categories from database start -->
		<?php
		include ("includes/database.php");

		$get_categories = "Select * from categories";
		$run_categories = mysql_query($get_categories);

		while ($categories_row = mysql_fetch_array($run_categories)) {
			$category_id = $categories_row['category_id'];
			$category_title = $categories_row['category_title'];
			/*reading selected category name and id from database*/
			echo "<option value='$category_id'>$category_title</option>";
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
				<input id="Author" name="Author" type="text" placeholder="Insert author name" class="form-control input-md" required="">
				<span class="help-block">This is post author</span>
			</div>
		</div>

		<!-- Text input Keywords-->
		<div class="form-group col-sm-12"">
		<label class="col-md-3 control-label" for="Keywords">Keywords :</label>
		<div class="col-md-7">
		<input id="Keywords" name="Keywords" type="text" placeholder="Insert keywords" class="form-control input-md" required="">
		<span class="help-block">Keywords for serchbox</span>
		</div>
		</div>

		<!-- File Button File -->
		<div class="form-group col-sm-12"">
			<label class="col-md-3 control-label" for="filebutton">File Button</label>
			<div class="col-md-7">
				<input id="filebutton" name="filebutton" class="input-file" type="file" required>
			</div>
		</div>

		<!-- Textarea Description -->
		<div class="form-group col-sm-12"">
		<label class="col-md-3 control-label" for="Description">Description :</label>
		<div class="col-md-7">
		<textarea class="form-control" id="Description" name="Description"></textarea>
		</div>
		</div>

		<!-- Textarea Content -->
		<div class="form-group col-sm-12"">
			<label class="col-md-3 control-label" for="Content">Content :</label>
			<div class="col-md-7">
				<textarea class="form-control" id="Content" name="Content" rows="15"></textarea>
			</div>
		</div>

		<!-- Button -->
		<div class="form-group col-sm-12"">
		<label class="col-xs-6"></label>
		<div class="col-xs-6 form-group">
		<button id="submit" name="submit" type="submit" class="btn btn-primary">
		Publish
		</button>
		</div>
		</div>

		</fieldset>
		</form>

		<?php
		include ("includes/database.php");
		if (isset($_POST['submit'])) {
			$post_category = $_POST['Category'];
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

				$insert_posts = "insert into posts (category_id, post_title, post_date, post_author, post_keywords, post_image, post_content,post_description) values
		('$post_category','$post_title','$post_date','$post_author','$post_keywords','$post_image','$post_content','$post_description')";

				$run_posts = mysql_query($insert_posts);
				if ($run_posts)
					echo "<script>alert('Post has been published !')</script>";
				echo '<script type="text/javascript">
		window.location = "../admin/index.php?view_posts"
		</script>';
			}
		}
		mysql_close();
		?>
