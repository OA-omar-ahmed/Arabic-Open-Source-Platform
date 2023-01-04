<?php $file_load_name = "load_all_includes_header.php";
file_exists($file_load_name) ? @include_once(@$file_load_name) : exit("Not found file: " . $file_load_name);
if (!isset($_SESSION['session_name_user_client'])) {
	exit('<meta http-equiv="Refresh" content="0;url=login.php">');
}  ?>

<?php

$database = new MySQLDatabase;
$db = &$database;

// include_once "header.php";
// if(!isset( $_SESSION['session_name_user_client'] ) ){ echo'<meta http-equiv="Refresh" content="0;url=login.php">'; exit;}
// include_once "header.php";
/* ?>

__________________________ start database creation __________________________
<?php $hostname_con = "localhost"; $dbname_con = ""; $username_con = "root"; $hostpas_con = ""; $connection = mysqli_connect($hostname_con,$username_con,$hostpas_con,$dbname_con) or trigger_error(mysql_error(),E_USER_ERROR); if(!$connection){ echo("Database Connection failed: ".mysqli_error()); }else{ echo "Connected Successfully"; } $ccresultcc_1_bl159 = $database->query("CREATE DATABASE IF NOT EXISTS  `oa_opensource_proj_o_v4_os_db` "); 
if( $ccresultcc_1_bl159 ){ echo ("DataBase Created sucessfuly
^_^
" ); }else{ echo ""; die("DataBase exist, Or failed ".mysqli_error()); } ?>
__________________________
__________________________ start table creation __________________________

<?php
// */
// 
/* 
 $hostname_con = "localhost"; $dbname_con = "oa_opensource_proj_o_v4_os_db"; $username_con = "root"; $hostpas_con = ""; $connection = mysqli_connect($hostname_con,$username_con,$hostpas_con,$dbname_con) or trigger_error(mysql_error(),E_USER_ERROR); if(!$connection){ echo("Database Connection failed: ".mysqli_error()); }else{ echo "Connected Successfully"; } $ccresultcc_2_bl159 = $database->query("CREATE TABLE IF NOT EXISTS `tb_uploaded_file` ( `idfile` int(11) NOT NULL AUTO_INCREMENT, `srcfi` text NOT NULL,`fkid` text NOT NULL, PRIMARY KEY (`idfile`) ) ENGINE = MYISAM ; ");
if( $ccresultcc_2_bl159 ){ echo ("Table tb_uploaded_file Created Successfully " ); }else{ echo ""; echo("Table tb_uploaded_file exist, Or failed ".mysqli_error()); } ?>
©OmarAhmed_2017_2020 __________________________
__________________________ __________________________ __________________________ __________________________
__________________________ end database and table creation ________________

<?php

// */
?>
<?php
// // DB :   # oa_opensource_proj_o_v4_os_db 
// TB :      # tb_uploaded_file
// cols:     #  idfile srcfi fkid

// ref link: # id_to_ad 
?>
<?php
//1- Create a database connection (open the connection between the server and the database)

$hostname_con = "localhost";
$dbname_con = "oa_opensource_proj_o_v4_os_db";
$username_con = "root";
$hostpas_con = "";
$connection = mysqli_connect($hostname_con, $username_con, $hostpas_con, $dbname_con) or trigger_error(mysql_error(), E_USER_ERROR);
if (!$connection) {
	die("Database Connection failed: " . mysqli_error());
	// mysqli_error() // this fumction to show the errors and make it read able
}

?>
<?php
// functions new 
/*
			$key_img = "imgNew_persona_ex_" .$row[0];
			 $src =  view_file_src_by_id_from_tb_oa($key_img);
			  echo "<img src='".$pic_row['srcfi']."' width='90%' height='auto' />";
			  echo "<iframe src='".$pic_row['srcfi']."' width='90%' height='auto' ></iframe>";
		*/
if (!function_exists("view_file_src_by_id_from_tb_oa")) {
	function view_file_src_by_id_from_tb_oa($key = "")
	{
		global $connection;
		if ($key) {
			$query  = "SELECT * FROM tb_uploaded_file ";
			$query .= " WHERE fkid='" . $key . "' ";
			$query .= " ORDER BY fkid DESC ";
			$pic_result = $database->query($query);
			if (!$pic_result) {
				die("Database query failed" . mysqli_error());
			}
			$pic_row = $database->fetch_array($pic_result);
			return $pic_row['srcfi'];
		} else {
			return "";
		}
	}
}
?>
<?php /*  // this is for insert
			if( isset( $_REQUEST['id_to_ad'] ) ){  ?>
<input type="hidden" name="f_pro_img"
    value="<?php if( isset( $_REQUEST['id_to_ad'] ) ){ echo @$_REQUEST['id_to_ad']; }  ?>" required="required" />
<?php } else {  ?>
<textarea style="width:100%;  " name="id_to_ad" placeholder="Write here ... "
    required="required"><?php if( isset( $_REQUEST['id_to_ad'] ) ){ echo @$_REQUEST['id_to_ad']; }  ?></textarea>
<?php }  */  ?>

<?php // current
// from & into items pg
// ref link: # id_to_ad 
$pageo = "img.php";
$pre_pg = $pageo . "?";
$page = $pre_pg . "route=topics&";
$_GET['id_to_ad'] = @$_REQUEST['id_to_ad'] ? @$_REQUEST['id_to_ad'] : 1;  //id project
$fnam = "img.php?Ad=true&Co=true";
//include_once("header.php");
?>
<!--
   <a href="index.php?Co=1"> HOME </a>
   <a href="projects.php?Co"> Projects</a>
 - <a href="<?php echo $pre_pg; ?>Co=true#btns_carts_1">Gallery </a>
 - <a href="<?php echo  $pre_pg; ?>Ad=true&id_to_ad=h"> Add + </a>
 - <a href="<?php echo $pre_pg; ?>Co=true"> View all & Control ( RUD ) </a>
<a href="<?php echo $fnam; ?>Co=true"> Go to the referred page </a>
<form method="post" action="<?php echo  $pre_pg; ?>Ad=true&">
	<textarea name="id_to_ad" placeholder="Description. ." required></textarea>
	<input type="submit" value="Submit" name="submit" /> 
</form>
-->




<?php
/*
// or use this way
$connection = mysqli_connect("localhost","root","password");
//2- Select a database to use
$db_select = mysqli_select_db($connection, "db_oaopensource_img_users_cms" );
if(!$db_select){
die("Database Selection failed: ".mysqli_error());
}
*/

//4- querying in a database
//5- Close the connection


?>



<?php
if (!function_exists("validate_inpt")) {
	function validate_inpt($v = "", $required = "")
	{


		// global $connection;
		$v = stripslashes(trim($v));
		$v = trim(($v));
		// $v =(string)trim(strip_tags( nl2br( $v )));
		$v = $v;
		$v = stripslashes($v);
		$v = trim(str_replace("--", "  -  - ", str_replace("---", "--", $v)));
		$v = str_replace("..", "  .  .  ", str_replace("(", "   ( ", $v));
		$v = trim(addslashes($v));
		$v = $v;
		if ($required != "") {
			if ((int)strlen($v) >= (int) $required) {
				$v = $v;
				$v = isset($v) && !empty($v) ? trim(addslashes($v)) : die('Required');
			} else {
				die(" Input $v length Required Minimum " . $required . " character ");
			}
		}
		// $v = @$connection&&@$v?(string) mysqli_real_escape_string( $connection , $v ) :$v;

		$v = $v;
		return $v;
	}
}
// ex: // $add_cname_variable = @$_POST['thecname']? sec_inpt( $_POST['thecname'],2) : die("Name Required") ;

function sec_inpt($v = "", $required = "")
{
	if ($v != "") {
		global $connection;
		$v = stripslashes(trim($v));
		// advance trimming // $v = trim(($v));
		// clean zeros // $v = isset( $v ) && ! empty( $v ) ? trim(addslashes( $v )): die('All Inputs Required');
		// Remove tags // $v =(string)trim(strip_tags( nl2br( $v )));
		$v = @$connection ? (string) mysqli_real_escape_string($connection, $v) : (string) trim(addslashes($v));

		$v = @$required ? validate_inpt($v) : $v;
	} else {
		$v = "";
	}

	$v = $v;
	return $v;
}
function sec_outpt($v = "")
{
	if (@$v != "") {
		$v = stripslashes(trim($v));
		$v = addslashes(trim($v));
		$v = htmlentities($v, ENT_COMPAT, 'UTF-8', false);
		// $v = html_entity_decode ( $v );  // $v =htmlentities( $v );
		//  $v = html_entity_decode ( $v );  // $v =htmlentities( $v );
	} else {
		$v = "";
	}
	$v = $v;
	return $v;
}
?>
<?php
if (!function_exists("sec_confirm_result")) {

	// 
	function sec_confirm_result($v = "")
	{
		if (isset($_GET[$v]) && isset($_GET[$v . 'H']) && $_GET[$v] != "" && $_GET[$v . 'H'] != "" && $_GET[$v . 'H'] == md5($_GET[$v])) {
			return 1;
		} else {
			die(' NoSuchResult[ErrorS1] ');
			return 0;
		}
	}
	//  function sec_confirm_result( $v=""){ if( isset( $_GET[$v] ) && isset( $_GET[$v.'H'] ) && $_GET[$v.'H']==md5($_GET[$v]) ){ return 1; }else{ return 0; die(' NoSuchResult[ErrorS1] '); } } 
}
?>

<?php if (!function_exists("sec_confirm_data")) {
	function sec_confirm_data($vr = "", $vl = "")
	{
		if ($vr != "" && $vl !== "") {
			return "$vr=" . ($vl) . "" . "&" . $vr . "H=" . md5($vl) . "";
		} else {
			return '';
		}
	}
} ?>

<?php /*start the update process */
if (isset($_GET['id_to_edit'])) {
	sec_confirm_result('id_to_edit') ?  sec_confirm_result('id_to_edit') : die("Required InData ");
	$id_to_edit_variable = sec_inpt($_GET['id_to_edit']);
?>
	<?php
	/* Update
		request to edit information */
	if (isset($_POST['update_action'])) {


		$edit_idfile_variable = sec_inpt($_POST['theidfile']);
		$edit_srcfi_variable = sec_inpt($_POST['thesrcfi']);
		$edit_fkid_variable = sec_inpt($_POST['thefkid']);

		// tb_uploaded_file // idfile srcfi fkid

		$query_edit = "UPDATE tb_uploaded_file SET ";
		$query_edit .= " srcfi = '$edit_srcfi_variable', fkid = '$edit_fkid_variable' ";
		$query_edit .= " WHERE idfile ='$id_to_edit_variable' ";
		$query_edit .= " ";
		$result_edit = $database->query($query_edit);
		if ($result_edit) {
			echo "Updated Successfully " . " ";
			echo "<br>";
			echo " idfile : $edit_idfile_variable";
			echo " srcfi : $edit_srcfi_variable";
			echo " fkid : $edit_fkid_variable";

			echo "<hr>";
		} else {

			echo "Error to Updated " . mysqli_error();
		}

		echo "<a href='" . $pre_pg . "Co=true'>Go Back</a>";
		exit;
	}
	?>

	<?php
	// show the wanted thing that you want to change
	$result_show_by_id = $database->query("SELECT * FROM tb_uploaded_file WHERE idfile='$id_to_edit_variable' ");
	if (!$result_show_by_id) {
		die("Database query failed" . mysqli_error());
	}

	$row_to_be_changed = mysqli_fetch_assoc($result_show_by_id);
	?>
	<center>
		<fieldset style="width:80%;
		margin:20px 5px; padding:5px; border:2px solid #ccc; color:gray; background:#f8f8f8; width:80%; 
		">
			<h2>Update Image Form </h2>
			<form action="<?php echo $pre_pg . 'id_to_edit=';
							echo $valId = isset($_GET['id_to_edit']) ? $_GET['id_to_edit'] : '';
							echo '&';
							echo isset($_GET['id_to_editH']) ? 'id_to_editH=' . $_GET['id_to_editH'] : '';
							echo '&';
							echo 'idSec=' . intval($valId) . "";
							echo "
            &";
							echo "idSecH=";
							echo !empty($valId) ? md5($valId) : '';
							echo ""; ?>" method="post">

				Enter The idfile : <input name="theidfile" type="text" value="<?php if (isset($row_to_be_changed['idfile'])) {
																					echo htmlentities($row_to_be_changed['idfile']);
																				} ?>" placeholder="Enter your idfile ">
				<br>
				Enter The srcfi : <input name="thesrcfi" type="text" value="<?php if (isset($row_to_be_changed['srcfi'])) {
																				echo htmlentities($row_to_be_changed['srcfi']);
																			} ?>" placeholder="Enter your srcfi ">
				<br>
				Enter The fkid : <input name="thefkid" type="text" value="<?php if (isset($row_to_be_changed['fkid'])) {
																				echo htmlentities($row_to_be_changed['fkid']);
																			} ?>" placeholder="Enter your fkid ">
				<br>

				<br>
				<input name="update_action" type="submit" value="UPDATE">

			</form>


		<?php
		echo "<a href='" . $pre_pg . "Co=true'>Go Back</a> 
		</fieldset>
		</center>
		<hr>
		";
		die;
	} //end the update process
		?>



		<?php
		// Delete
		// request to delete
		if (isset($_GET['id_to_del'])) {
			sec_confirm_result('id_to_del');
			if (isset($_GET['f_to_del'])) {
				sec_confirm_result('f_to_del');
			}
			$id_to_delete_variable = mysqli_real_escape_string($connection, $_GET['id_to_del']);
			$query = "DELETE FROM tb_uploaded_file WHERE idfile='$id_to_delete_variable' ";
			$result_del = mysqli_query($connection, $query);
			if ($result_del) {
				// success
				echo "Removed Successfully ";
				if (isset($_GET['f_to_del'])) {
					file_exists($_GET['f_to_del']) ? unlink($_GET['f_to_del']) : "No such related file";
				}
			} else {
				// fail 
				// Error to Add

				echo "Error to Delete " . mysqli_error();
			}

			echo "<a href='" . $pre_pg . "Co=true'>Go Back now </a>";
			exit;
		}
		?>








		<h1> Welcome
			<?php echo @$_SESSION['session_name_user_client']; ?> Projects photos
		</h1>



		<center>
			<fieldset style="width:80%;
   margin:40px auto; padding:5px; border:2px solid #ccc; color:gray; background:#f8f8f8; width:80%; 
">
				<?php
				// Start inserts
				$fimg_name = "";
				if (isset($_GET['Ad']) && !isset($_GET['id_to_ad'])) {
					echo " Please add image from item page.  not to add directly from this page.  Select which page the image is related to.  ";
				}
				//if( isset( $_GET['Ad'] ) && isset( $_GET['id_to_ad'] ) ){
				echo " Insert for Item id: " . $_GET['id_to_ad'] . " ";


				// upload file & create in db
				// sec_confirm_result('id_to_ad') ; 
				$add_fkid_variable = sec_inpt($_GET['id_to_ad']);

				?>
				<?php
				function img_upload($img_file_post_name = "")
				{
					$target_path = ""; // 	$img_file_post_name ="f_pro_img";
					//	$_FILES[ $img_file_post_name ] = 
					$fimg_name = "";
					$target_path = "";
					// $fnam = "news_control.php?Ad=true" ;
					if ($img_file_post_name != "") { // isset( $_POST['submitup'] ) ){
						// 	if( isset( $_GET['Ad'] ) && isset( $_GET['id_to_ad'] ) && $_GET['id_to_ad']!="" ){ 	echo sec_confirm_result( 'sec_id_to_ad' ) ;  	}

						$target_path = "uploads/";
						// Declaring Path for uploaded images.
						if (is_dir($target_path) == false) {
							mkdir("$target_path", 0700);		// Create directory if it does not exist
						}
						$validextensions = array("jpeg", "jpg", "png", "zip", "gif", "pdf", "ppt", "docx");
						// Extensions which are allowed.
						$ext = explode('.', basename($_FILES[$img_file_post_name]['name']));
						// Explode file name from dot(.)



						$file_extension = end($ext);
						// Store extensions in the variable.
						//echo "file_extension=$file_extension<br/>";

						$add_fkid_variable = @$_REQUEST['id_to_ad'] ? sec_inpt($_REQUEST['id_to_ad']) : "";
						$ext_fkid_variable = @$_REQUEST['uploaded_type'] ? sec_inpt($_REQUEST['uploaded_type']) : "";
						if ($add_fkid_variable && $ext_fkid_variable) {
							$target_path = $target_path . $add_fkid_variable . "." . $ext_fkid_variable;
							// $target_path = $target_path .$add_fkid_variable. "." . "png";     
						} else {
							// ///////// corrre 
							$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];
						}

						//$target_path = $target_path . date('Y-m-d-h-i-s',time()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.


						if (($_FILES[$img_file_post_name]["size"] < 9000000)
							// Approx. 100kb files can be uploaded.
							&& in_array($file_extension, $validextensions)
						) {
							if (move_uploaded_file(
								$_FILES[$img_file_post_name]['tmp_name'],
								$target_path
							)) {
								// If file moved to uploads folder.`
								echo '<span align="center" id="noerror">image uploaded successfully!
	  . </span><br/><br/>';
								echo  "<p align='center'>
	  <img  src='$target_path' width='200px' height='200px'/></p><br/>";

								$fimg_name = $target_path;
								// return $target_path ; 
								/* echo'<meta http-equiv="Refresh" content="4;url='. $fnam .'&imgn='. urlencode( $target_path ) .'">';
*/
							} else {
								//  If File Was Not Moved.
								echo  '<span id="error">please try again!
			.</span><br/><br/>';
							}
						} else {     //   If File Size And File Type Was Incorrect.
							echo  '<span id="error">***Invalid file 
	  Size or Type***</span><br/><br/>';
						}


						// return $fimg_name ?$fimg_name:"" ;
						// die();
					} // e submit
					return $target_path;
					// return $fimg_name ?$fimg_name:"" ;
					////----------------end upload----------------------------------------///

				}


				if (isset($_GET['Ad'])) {

					/* 
						
				//#####// query Insert submit for src
						$fimg_name = ( isset( $_POST['submitup'] )  )? img_upload( "f_pro_img" ) : "" ;
						
				//#####// Button file upload form with button $_POST['submitup']
						<tr>
						<td width="33%"> ًں“¤ 
						ط¥ط®طھط± طµظˆط±ظ‡:</td>
						<td width="67%">
						<input class="btn-style1" style="width:100%;  " type="file" name="f_pro_img" value="select image" size="80"  required="required" /></td>
						</td>
						</tr>
						
				//#####// inside the while loop view image 
						  if( ! empty( $pic_row['srcfi'] ) ){
						  		  $g= strip_tags( trim( $pic_row['srcfi'] ));  
						  		   echo  "<p align='center'>
						  		<img  src='$g' width='200px'  height='200px'/>
						  		</p><br/>"; echo "</td><td>";
						   }
						
				//####// delete link 
						echo "<a title='DELETE' class='btn-style1 danger-hover ' href='";
						echo $pre_pg;
						echo "Co=true";
						echo "&". sec_confirm_data('id_to_del', $pic_row[0]);
						echo "&".  sec_confirm_data('f_to_del', $pic_row[1] )."";  // $pic_row['srcfi']
						echo "' >";
						echo " ط­ط°ظپ Delete ";
						echo "</a>";
				//#####// felete process
						echo "Removed Successfully ";
						if( isset( $_GET['f_to_del'] ) ){
						file_exists($_GET['f_to_del'])?unlink($_GET['f_to_del']):"No such related file" ;
						}
						
			*/
				?>


					<?php // && @$_POST['f_pro_img']
					$fimg_name = (isset($_POST['submitup'])) ? @img_upload("f_pro_img") : "";
					if (isset($fimg_name) && !empty($fimg_name)) {
						echo " 
 File uploaded  " . @$fimg_name;
						// die;

						$add_srcfi_variable =   $fimg_name;
						// $add_fkid_variable = sec_inpt( $_REQUEST[ 'id_to_ad' ]);  // f_pro_img
						$add_fkid_variable = sec_inpt($_POST['id_to_ad']);  // f_pro_img
						echo $query = "INSERT INTO tb_uploaded_file ( srcfi, fkid ) VALUES ( '$add_srcfi_variable','$add_fkid_variable')";
						//die;
						if ($database->query($query)) {
							// success
							echo "Added Successfully ";
							echo "<br>";
							echo " $add_srcfi_variable
$add_fkid_variable ";
							echo '<meta http-equiv="Refresh" content="4;url=' . $pre_pg . 'Co=1&imgn=' . urlencode($add_srcfi_variable) . '">';
							echo "<hr>";
						} else {
							// fail
							// Error to Add

							echo "Error to Add " . mysqli_error();
						}

						echo "<a href='" .   @$page . "&Co'>Go Back</a>";
						exit;
					}
					//
					$added_link = "";
					$added_link .= @$_REQUEST['uploaded_type'] ? "uploaded_type=" . $_REQUEST['uploaded_type'] . "&" : "";
					// if( isset( $_GET['Ad'] ) && isset( $_GET['id_to_ad'] ) && $_GET['id_to_ad']!="" ){ echo sec_confirm_result('id_to_ad') ; }
					?>
					<h3> Add & Upload file </h3>

					<form action="<?php echo $pre_pg . $added_link; ?>Ad=true&<?php if (isset($_GET['id_to_ad']) && $_GET['id_to_ad'] != "") {
																					// echo $valId1 = isset($_GET['id_to_ad'])?'id_to_ad='.$_GET['id_to_ad'].'&':'' ;
																					//   echo $valId2 = isset($_GET['id_to_adH'])?'id_to_adH='.$_GET['id_to_adH'].'&':'' ;
																					// echo  ''. sec_confirm_data('id_to_ad', $_GET['id_to_ad'] ) ; 
																					echo  '' . sec_confirm_data('sec_id_to_ad', $_GET['id_to_ad']);
																				} ?> " method="POST" enctype="multipart/form-data">
						<table width="84%" style="color:#066;">

							<tr>
								<td width="33%">1- اختر :</td>
								<td width="67%">
									<input class="btn-style1" style="width:100%;  " type="file" name="f_pro_img" value="select image" size="20" required="required" />
								</td>
								</td>
							</tr>
							<tr>
								<td width="33%">

								</td>
								<td width="67%">
									<?php if (isset($_REQUEST['id_to_ad'])) {  ?>
										<input type="hidden" name="id_to_ad" value="<?php if (isset($_REQUEST['id_to_ad'])) {
																						echo @$_REQUEST['id_to_ad'];
																					}  ?>" required="required" />
										<input type="hidden" name="id_to_ad" value="<?php if (isset($_REQUEST['id_to_ad'])) {
																						echo @$_REQUEST['id_to_ad'];
																					}  ?>" required="required" />
									<?php } else {  ?>
										<textarea style="width:100%;  " name="id_to_ad" placeholder="Write here ... " required="required"><?php if (isset($_REQUEST['id_to_ad'])) {
																																				echo @$_REQUEST['id_to_ad'];
																																			}  ?></textarea>
									<?php }    ?>


									<p>
										&nbsp;

										<input class="btn-submit active-hover" name="submitup" type="submit" id="submit" title=" Submit /  Add new Post" value=" Upload " />
										<input style="float:right; " class="btn-style1" name="reset" type="reset" id="reset" tabindex="5" title="Cancel " value="[x]" />

									</p>

							</tr>
						</table>
					</form>

					<!--

<form action="<?php echo $pre_pg; ?>Ad=true" method="post">

Enter The idfile <input name="theidfile" type="text" value="" placeholder="idfile ">
<br>
Enter The srcfi <input name="thesrcfi" type="text" value="" placeholder="srcfi ">
<br>
Enter The fkid <input name="thefkid" type="text" value="" placeholder="fkid ">
<br>


<br>
<input name="submit" type="submit" value="INSERT">

</form>
-->
			</fieldset>
		</center>
	<?php  }
				//End inserts
	?>







	<?php $pagesearch = $pageo . "?Co=true"; ?>
	<style>
		.btn-submit,
		input[submit] {
			padding: 9px 14px;
			margin: 5px auto;
			border-radius: 8px;
			background: #643590;
			color: #0078D4;
		}

		.btn-style1 {
			padding: 5px 7px;
			margin: 5px 10px;
			border-radius: 2px;
			background: white;
			border: 1px solid #ccc;
			color: gray;
		}

		.btn-submit:hover,
		.btn-style1:hover {
			background: rgba(0, 0, 0, 0.1);
			color: black;
			font-weight: bolder;
		}

		.danger-hover:hover,
		.danger-hover:active {
			background: darkred;
			color: white;
		}

		.active-hover:hover,
		.active-hover:active {
			background: rgb(0, 158, 73);
			color: white;
		}
	</style>
	<center>
		<fieldset style="width:80%;
			margin:20px 5px; padding:5px; border:2px solid #ccc; color:gray; background:#f8f8f8; width:80%; 
			">
			<table style=" width:100%; " align="center">
				<tr style=" width:100%; ">
					<form id="form1" name="form1" method="post" action="<?php echo $pagesearch;
																		if (isset($_GET['cid'])) {
																			echo '&cid=' . urlencode($_GET['cid']);
																		}
																		echo '&cctxt=ee2'; ?>">
						<td style=" width:70%; ">
							<input type="text" style=" padding:15px; border:2px solid #ccc; border-radius:7px; width:100%; " required="required" name="input_img_search" id="txt_search_id" placeholder=" ًں”چ Search
			
			" style="border-radius: 8px; " />

						</td>
						<td style=" width:30%; ">
							<input type="submit" name="btn_search_allTwo" id="btn_search_allT" value=" ًں”چ Search" class="btn-submit" />
						</td>
					</form>
				</tr>
			</table>
		</fieldset>
	</center>
 



	<?php  
	$link_get_project_id =  "";
	$link_get_project_id .= isset($_REQUEST['id_to_ad']) && !empty($_REQUEST['id_to_ad']) ? "&id_to_ad=" . strip_tags($_REQUEST['id_to_ad']) : "";
	$link_get_project_id .= isset($_REQUEST['input_img_search']) && !empty($_REQUEST['input_img_search']) ? "&input_img_search=" . strip_tags($_REQUEST['input_img_search']) : "";
	?>
	<a href="<?php echo $pre_pg . $link_get_project_id; ?>&Co=true"> ادارة </a>
	| <a href="<?php echo $pre_pg . $link_get_project_id; ?>&Ad=1&Co=true">اضف +</a>
	| <a href="<?php echo $pre_pg . $link_get_project_id; ?>">عرض</a>

	<?php include_once "img_gallery.php";  ?>


	<?php // include_once "footer.php";  
	?>