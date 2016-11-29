<?php
session_start(); 
if(isset($_POST['submit'])){
	$login = $_POST['Login'];
	$password = $_POST['Password'];
	if($login == 'admin' && $password == 'admin'){
		$_SESSION['user'] = 'admin';
		echo '<script type="text/javascript">
		window.location = "../admin/index.php"
		</script>';
	}else{
		session_destroy();
		echo '<script>alert("Wrong password or login !!")</script>';
		
	}
	
}

?>
<div class="container" style="margin-top:10%;">
	<div class = "row">
		<form class="form-signin col-sm-4 col-sm-offset-4" enctype="multipart/form-data" method="post">
			<input type="text" name="Login" class="form-control" placeholder="Login" required="" autofocus="">
			<input type="password" name="Password" class="form-control" placeholder="Password" required="">
			<button class="btn btn-lg btn-primary btn-block" id="submit" name="submit" type="submit">
				Login
			</button>
		</form>
	</div>
</div>
