<?php $file_load_name = "load_all_includes_header.php";
file_exists($file_load_name) ? @include_once(@$file_load_name) : exit("Not found file: " . $file_load_name);
if (!isset($_SESSION['session_name_user_client'])) {
	exit('<meta http-equiv="Refresh" content="0;url=login.php">');
}  ?>

<h1> Welcome <?php echo @$_SESSION['session_name_user_client']; ?></h1>
<?php
/*
			# (c)OmarAhmed2021
			# Page Content Here
		*/
?>

<a href="Logoff.php">Logoff.php</a>
<?php $file_load_name_footer = "load_all_includes_footer.php";
file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Not found file: " . $file_load_name_footer); ?>