<?php
if(!defined('MyConst')) {
   die('Direct access not permitted');
}
?>
<?php
session_destroy();
include ("database.php");
$run_info = mysql_query("update admin set isLogged = '0' where admin_id = '1'");
mysql_close();
echo '<script type="text/javascript">
		window.location = "../index.php"
		</script>';
?>