<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}
?>
<?php
session_start(); 
if(isset($_POST['submit'])){
	$login = $_POST['Login'];
	$password = $_POST['Password'];
	include ("database.php");
	$get_info = "Select login, password, isLogged from admin where admin_id = '1'";
	$run_info = mysql_query($get_info);
	$info_row = mysql_fetch_array($run_info);
	if($login == $info_row['login'] && $password == $info_row['password'] && $info_row['isLogged'] == '0'){
		$_SESSION['user'] = 'admin';
		$run_info = mysql_query("update admin set isLogged = '1' where admin_id = '1'");
		echo '<script type="text/javascript">
		window.location = "../admin/index.php"
		</script>';
	}else if($info_row['isLogged'] != '0'){
		session_destroy();
		echo '<script>alert("Admin is already logged !!")</script>';
	}
	else{
		session_destroy();
		echo '<script>alert("Wrong password or login !!")</script>';
	}
		mysql_close();
}

?>

<div class="container" style="margin-top:10%;">
	<div class = "row">
		<form class="form-signin col-sm-4 col-sm-offset-4" enctype="multipart/form-data" method="post" autocomplete="off">
			<input type="text" name="Login" style="display:none" class="form-control">
			<input type="text" name="Login" class="form-control" placeholder="Login" required="" autofocus="">
			<input type="password" name="Password" class="form-control" placeholder="Password" required="">
			<button class="btn btn-lg btn-primary btn-block" id="submit" name="submit" type="submit">
				Login
			</button>
		</form>
	</div>
</div>
