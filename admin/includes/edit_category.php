<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}else {
	include ("database.php");
if (isset($_GET['edit_category'])) {
	$id = $_GET['edit_category'];
	$get_categories = "Select * from categories where category_id = '$id'";
	$run_categories = mysql_query($get_categories);

	while ($categories_row = mysql_fetch_array($run_categories)) {
		$category_type = html_entity_decode($categories_row['category_title'], ENT_QUOTES, "ISO-8859-1");
	}
}
?>
<form class="form-horizontal" enctype="multipart/form-data" method='post'>
	<fieldset>
		<!-- Form Name -->
		<legend align="middle" >
			Insert category type
		</legend>

		<!-- Text input Title-->
		<div class="form-group col-sm-12">
		<label class="col-sm-4 control-label" for="Title">Type : </label>
		<div class="col-sm-4">
		<input id="Type" name="Type" type="text" placeholder="Insert category type" value = "<?php echo $category_type; ?>" class="form-control input-md" required="">
		<span class="help-block">Edit exisiting category</span>
		</div>
		</div>

		<!-- Button -->
		<div class="form-group col-sm-11">
			<div class="col-sm-offset-6">
				<button id="submit" name="update" type="submit" class="btn btn-primary">
					Update new category
				</button>
			</div>
		</div>

	</fieldset>
</form>

<?php
include ("includes/database.php");
if (isset($_POST['update'])) {
	$category_type = htmlentities($_POST['Type'], ENT_QUOTES);
	
	$update_category = "update categories set category_title = '$category_type' where category_id = '$id'";

	$run_category = mysql_query($update_category);
	if ($run_category)
		echo "<script>alert('Category has been updated !')</script>";
	echo '<script type="text/javascript">
	window.location = "../admin/index.php?view_categories"
	</script>';
	
}
mysql_close();
}
?>
