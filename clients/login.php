<?php $file_load_name = "load_all_includes_header.php";
file_exists($file_load_name) ? @include_once(@$file_load_name) : exit("Not found file: " . $file_load_name); ?>
<?php isset($_SESSION) ? "" : @session_start();
if (isset($_SESSION['session_name_user_client'])) {
	exit('<meta http-equiv="Refresh" content="0;url=home.php">');
} 
$row = array();
?>
<?php include_once "../control/login.php"; ?>
<?php include_once "../views/forms/login.php"; ?>
<?php include_once "../views/footer.php"; ?>
