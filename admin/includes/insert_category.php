<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}else {
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
		<input id="Type" name="Type" type="text" placeholder="Insert category type" class="form-control input-md" required="">
		<span class="help-block">This will be new category</span>
		</div>
		</div>

		<!-- Button -->
		<div class="form-group col-sm-11">
			<div class="col-sm-offset-6">
				<button id="submit" name="submit" type="submit" class="btn btn-primary">
					Add new category
				</button>
			</div>
		</div>

	</fieldset>
</form>

<?php
include ("includes/database.php");
if (isset($_POST['submit'])) {
	$category_type = htmlentities($_POST['Type'], ENT_QUOTES);
	
	$insert_category = "insert into categories (category_title) values
	('$category_type')";

	$run_category = mysql_query($insert_category);
	if ($run_category)
		echo "<script>alert('Category has been added !')</script>";
	echo '<script type="text/javascript">
	window.location = "../admin/index.php?view_categories"
	</script>';
	
}
mysql_close();
}
?>
