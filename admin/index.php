<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>News Website</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<?php
		if(isset($_SESSION['user'])){
		include("includes/header.php");
		include("includes/content.php");
		include("includes/footer.php");
		 ?>
		 <?php
		 } else {
		   echo "not logged";
		 }
		
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
