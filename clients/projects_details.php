<?php $file_load_name = "load_all_includes_header.php";
file_exists($file_load_name) ? @include_once(@$file_load_name) : exit("Not found file: " . $file_load_name); ?>
<?php // if(!isset( $_SESSION['session_name_user_client'] ) ){ exit('<meta http-equiv="Refresh" content="0;url=login.php">');  }  
?>
<?php // @file_exists("load_all_includes_header.php")? include_once("load_all_includes_header.php"):"";
$this_crud_file_name =   "projects_details"  .  ".php"; // change the index name
$this_page_start_link = $this_crud_file_name . "?";
$pagesearch = $this_crud_file_name . "?Co=true";
$query = "";
$increased_num = "";

// if( isset( $_GET['Co'] ) ){

$q = "";
$uid = @$uid ? $uid : "";
if (isset($uid) && @$uid != "") {

	$query .= "SELECT * FROM projects_tb";
	$query .= " WHERE ";
	$query .= " id='$uid' ";
} else
   if (isset($_REQUEST['view_id']) && !empty($_REQUEST['view_id']) && $_REQUEST['view_id'] != "") {
	$input_view_id = (int)intval($_REQUEST['view_id']);
	$query .= "SELECT * FROM projects_tb";
	$query .= " WHERE ";
	$query .= " id ='" . $input_view_id . "'";
	$query .= " LIMIT 1 ";
} else
   if (isset($_POST['input_search']) && $_POST['input_search'] != "") {
	$input_search = (string) trim(addslashes(strip_tags($_POST['input_search'])));
	$query .= "SELECT * FROM projects_tb";
	$query .= " WHERE ";
	$query .= " logo_img LIKE'%" . $input_search . "%'";
} else {
	$query .= "SELECT * FROM projects_tb";
}

$record_result = $database->query($query);
if (!$record_result) {
	die("Database query failed" . mysqli_error());
}

$q_num = $database->num_rows($record_result);

?>
<h1> Welcome
	<?php echo @$_SESSION['session_name_user_client']; ?>
</h1>
<h4> <a href="index.php">OA_Arabic Source code Library </a> / <a href="home.php"> Home </a> / <a href="projects_list.php">Projects List</a> / Projects details </h4>
<?php
echo @$q_num ? @$q_num . "  " : exit(" لم  يعد موجود هذا المشروع ");
echo "<table align='center' width='100%' border='0' >";
// echo " "; echo " <td> # </td> ";
// echo " <td> id </td> "; echo " <td> logo_img </td> "; echo " <td> proj_class </td> "; echo " <td> user_id </td> "; echo " <td> name </td> "; echo " <td> description </td> "; echo " <td> published_date </td> "; echo " <td> date_last_update </td> "; echo " <td> proj_status </td> "; echo " <td> version_num </td> "; echo " <td> cat_id </td> "; echo " <td> downloads_num </td> "; echo " "; 
if (@$q_num <= 0) {
	echo "<center>";
	echo "<h1>";
	echo "لا يوجد تفاصيل على المشروع ";
	echo "</h1>";
	echo "</center>";
} else {
	$record_row = $database->fetch_array($record_result);
	$key_img = "imgN_" . "projects_tb_rec_record__" . $record_row[0];
	$src_image_db = view_file_src_by_id_from_tb_oa($key_img);
	include_once "../control/project_details_update_seen_view.php";


	echo "<table align='center' width='80%' class='border1 ' border='0' >";
	echo "<tr>";
	echo "<td >";

	echo "</td>";
	 
	$key_files = "fiN" . md5("projects_OSP_rec_record__" . $record_row[0]);
	$src_files_db = view_file_src_by_id_from_tb_oa($key_files);
	echo "<td class='  '>";
	echo "<a class='btn' href='" . "project_public.php?dir_to_o=" . urlencode("" . basename($src_files_db)) . "' >";
	echo "فتح المصدر  وملفات المشروع" . " ";
	echo "</a>";
	echo "</td>";
	
	
	echo "<td>";
	$number_seen_post = (int)intval($record_row['downloads_num']);
	echo "&nbsp;&nbsp;";
	echo $number_seen_post;
	echo " <a class='btn' href='" . "projects_details.php?download_proj=1&view_id=" . $record_row['id'] . "&dir_to_o=" . urlencode("" . basename($src_files_db)) . "' >";
	echo @$_SESSION['last_projects_downloads_0o' . md5($record_row['id'])] ? "&check; " : "";
	//echo "<a href='". "project_public.php?dir_to_o=".urlencode("".basename($src_files_db))."' >";
	echo "تحميل  المشروع " . " ";
	echo "</a> ";
	
	echo "</td>"; 
	echo "</tr>";
	echo "</table>";


	echo "<table align='center' width='100%' border='0' >";

	echo "<tr>";
	echo "<td  >";
	echo "&nbsp;";
	echo "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td  >";
	//	echo "<h1>";
?>
	<a <?php echo " href=\" user_setting.php?Co=1&view_id=" . urlencode($record_row['user_id']) . " \">"; ?> <img class="user_list_img" src="<?php echo get_user_photo_by_id($record_row['user_id']); ?>" width="30" height="30" />
	<b>
	<?php echo @$get_user_info ? secure_outputs_oa($get_user_info->get_user_name_by_id($record_row['user_id'])) : "Please login to see username"; ?></b>
	</a>
	>>
	
	<?php
	echo "</td>";
	
	echo "<td>";
	echo "<p>&nbsp;</p>";
	echo "</td>";
	
	echo "<td width='50%'>";
	// /*	 
	echo "<p style='float:right;'>";
	echo @$_SESSION['last_projects_seen_' . md5($record_row['id'])] ? " شاهدت هذا &check; " : "";
	echo @$_SESSION['last_projects_seen_date_' . md5($record_row['id'])] ? @$_SESSION['last_projects_seen_date_' . md5($record_row['id'])] : "";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;  ";
	echo " مشاهدات ";
	echo "" . secure_outputs_oa($record_row['logo_img']);
	echo "&nbsp;&nbsp;&nbsp;&nbsp;  ";
	echo " التحميلات ";
	echo "" . secure_outputs_oa($record_row['downloads_num']);
	echo "</p>";
	 
	// */
	 
	echo "</td>";
	echo "</tr>";
	echo "</table>";

	echo "<table align='center' width='100%' border='0' >";

	echo "<tr>";
	echo "<td  >";
	 
	echo "<h1>";
	echo "" . secure_outputs_oa($record_row['name']);
	echo "</h1>";
	echo "<center>";
	echo " <img class='border1' src='" . $src_image_db . "' width='95%' height='auto' alt=' UPLOAD New ' />";
	echo "</center>";
	echo "</td>";
	echo "</tr>";

	echo "</table>";
	echo "<table align='center' width='100%' border='0' >";
	echo "<tr>";
	echo "<td>";
	$increased_num++;
	// echo $increased_num ;
	echo "</td>";


	echo "<td>";
	echo "" . secure_outputs_oa($record_row['logo_img']);
	echo "</td>";


	echo "<td>";
	echo "" . secure_outputs_oa($record_row['proj_class']);
	echo "</td>";


	echo "<td>";
	echo "" . secure_outputs_oa($record_row['user_id']);
	echo "</td>";


	echo "<td>";
	echo "" . secure_outputs_oa($record_row['name']);
	echo "</td>";


	echo "<td>";
	echo "" . secure_outputs_oa($record_row['description']);
	echo "</td>";


	echo "<td>";
	echo "" . secure_outputs_oa($record_row['published_date']);
	echo "</td>";


	echo "<td>";
	echo "" . secure_outputs_oa($record_row['date_last_update']);
	echo "</td>";


	echo "<td>";
	echo "" . secure_outputs_oa($record_row['proj_status']);
	echo "</td>";


	echo "<td>";
	echo "" . secure_outputs_oa($record_row['version_num']);
	echo "</td>";


	echo "<td>";
	echo "" . secure_outputs_oa($record_row['cat_id']);
	echo "</td>";


	echo "<td>";
	echo "" . secure_outputs_oa($record_row['downloads_num']);
	echo "</td>";



	// echo "<td>";

	// $dir_img= "uploads";
	$dir_img = "edu_uploads";
	 
	// }
	echo "</tr>";
	// echo "<hr>";
	// echo "</tr>";
	echo "</table>";
	// }

	?> 
	<?php
	echo "<a class='btn' href='" . "img.php?" . "input_img_search=" . @$key_img . "&e#btns_carts_1' >";
	echo " عرض صور المشروع";
	// echo "images   ";
	echo "</a>";
	// <h2>images</h2> 
	if ($record_row['id']) {
		$_REQUEST['input_img_search'] = "imgN_projects_tb_rec_record__" . $record_row['id'];
		$file_load_name_footer = "img_gallery.php";
		file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Images file Not found : " . $file_load_name_footer);
	}

	?>
	<?php
	// <h2>التعليقات</h2> 
	$file_load_name_footer = "projects_details_view_comments.php";
	file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Not found file: " . $file_load_name_footer);

	?>
<?php } // end if exists  
?>
<?php $file_load_name_footer = "load_all_includes_footer.php";
file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Not found file: " . $file_load_name_footer); ?>