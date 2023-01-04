 <?php $file_load_name = "load_all_includes_header.php";
	file_exists($file_load_name) ? @include_once(@$file_load_name) : exit("Not found file: " . $file_load_name); ?>
<?php // if(!isset( $_SESSION['session_name_user_client'] ) ){ exit('<meta http-equiv="Refresh" content="0;url=login.php">');  }  
?>
<?php
// $hide_header="1";
// @file_exists("load_all_includes_header.php")? include_once("load_all_includes_header.php"):"";
$this_crud_file_name =   "orders"  .  ".php"; // change the index name
$this_page_start_link = $this_crud_file_name . "?";
$pagesearch = $this_crud_file_name . "?Co=true";
$query = "";
$increased_num = "";
?> 
 <?php // session_start();
	/*include_once('../includes/connection.php');
	include_once('../includes/classes.php');
	 include_once('../includes/users.php');
	include_once('../includes/functions.php');
	// */
	// $users = $user->fetch_all();
	// print_r($users );
	?>











 
 <?php $file_load_name_footer = "load_all_includes_footer.php";
	file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Not found file: " . $file_load_name_footer); ?>