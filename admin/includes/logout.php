<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}
?>
<?php
session_destroy();
echo '<script type="text/javascript">
		window.location = "../admin/login.php"
		</script>';
?>