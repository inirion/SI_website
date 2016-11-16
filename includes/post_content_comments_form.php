<!-- Comment -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<form method="post">
				<div class="form-group ">
					<label class="control-label " for="name"> Name </label>
					<input class="form-control" id="name" name="name" type="text"/>
				</div>
				<div class="form-group ">
					<label class="control-label " for="message"> Message </label>
					<textarea class="form-control" cols="40" id="message" name="message" rows="5" required=""></textarea>
				</div>
				<div class="form-group">
					<div>
						<button class="btn btn-primary " name="submit" type="submit">
							Submit
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<hr>

<?php
if (isset($_POST['submit'])) {
	if ($_POST['name'] == '')
		$comment_name = htmlentities('Anonymous', ENT_QUOTES);
	else
		$comment_name = htmlentities($_POST['name'], ENT_QUOTES);
	$comment_date = date('j.n.Y');
	$comment_text = htmlentities($_POST['message'], ENT_QUOTES);
	$comment_status = 'unapproved';
	

	if ($post_content != '') {
		$insert_posts = "insert into comments (post_id,comment_name, comment_text, comment_date,comment_status) values ('$post_id','$comment_name','$comment_text','$comment_date','$comment_status')";
		$run_posts = mysql_query($insert_posts);
		echo "<meta http-equiv='refresh' content='0'>";
		echo "<script>window.open('details.php?php=$post_id',_self)</script>";
	}
	
}
?>