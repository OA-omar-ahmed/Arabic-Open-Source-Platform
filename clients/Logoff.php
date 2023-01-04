<?php @session_start();
ob_start();


$_SESSION = array();
$_SESSION['session_name_user_client'] = "";
session_destroy();
if (!isset($_SESSION['session_name_user_client'])) {
	echo "<h1>Logout successfully ✅
 inshallah</h1>";
	echo '<meta http-equiv="Refresh" content="0;url=login.php">';

	exit;
} else {
	//session_destroy();
	//echo'<meta http-equiv="Refresh" content="0;url=index.php">';
	echo '<meta http-equiv="Refresh" content="0;url=login.php">';

	die("<h1>LogOut is Done inshallah !! </h1>");
}
ob_end_flush();
