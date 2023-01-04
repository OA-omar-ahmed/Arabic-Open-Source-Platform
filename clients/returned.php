  <?php  $file_load_name = "load_all_includes_header.php"; file_exists($file_load_name)? @include_once(@$file_load_name):exit("Not found file: ". $file_load_name); ?>
<?php // if(!isset( $_SESSION['session_name_user_client'] ) ){ exit('<meta http-equiv="Refresh" content="0;url=login.php">');  }  ?>
<?php 
// $hide_header="1";
 // @file_exists("load_all_includes_header.php")? include_once("load_all_includes_header.php"):"";
  $this_crud_file_name =   "returned"  .  ".php"; // change the index name
      $this_page_start_link = $this_crud_file_name."?";
	  $pagesearch= $this_crud_file_name."?Co=true"; 
	  $query=""; $increased_num="";
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



 


<?php
// This page name is returned.php // ////////////////////////////////////////////////////////////////////
// include_once( "includes/". "functions.php");
// include_once( "includes/". "connections.php");
// include_once( "includes/". "db_functions.php");
// include_once( "includes/". "sessions.php");
$pageo = "returned.php";
$pre_pg = $pageo."?";
$page = $pre_pg."route=topics&";
// include_once("header.php");
// functions should be before this & should be before header. php // <a href="?Co=1&Ad=true"> Add New CRUD </a> - // start header & css //

?>
 


<?php
     // /////////////////////################ S page) /////////////////////################
?>
<?php
// start this page header //
if( isset( $_REQUEST['ohide'] ) ){ } else {
?>
<a href="<?php echo $pre_pg; ?>Ad=true&Co=1"> Add <button>+ </button> </a> - <a href="<?php echo $pre_pg; ?>Co=true"> View all & Control ( RUD ) </a>

<button id="load_pgoAj5pre_" onclick="oAj5pre_fnWaL0adPg('<?php echo $pre_pg; ?>Co=1&ohide=2', 'oAj5pre_rsltpg1' )" title=" load Home page ">HOME</button>
<button onclick="oAj5pre_fnWaL0adPg('<?php echo $pre_pg; ?>Ad=true&ohide=1&Co=1', 'oAj5pre_rsltpg1' )" title=" load Add">+New</button>
<?php $pagesearch= $pageo."?Co=true"; ?>
<table style=" width:100%; " >
<tr style=" width:100%; ">
<form id="oAj5pre_frm1" name="oAj5pre_frmsea1" method="post" action="<?php echo $pagesearch ; if( isset( $_GET['cid'] ) ){ echo '&cid='. urlencode( $_GET['cid'] ); } echo '&cctxt=ee2'; ?>" >
<td style=" width:70%; ">
<input class="inpt-txt" type="text" style=" width:100%; " required="required" name="txt_search_all" id="txt_search_id" placeholder=" search

" style="border-radius: 8px; " />

</td>
<td style=" width:30%; ">
<input type="submit" name="btn_search_allTwo" id="btn_search_allT" value="Search" style="border-radius: 8px; background:#0078D4; color:#fff;" /> </form>
<input type="button" value=" GO SEARCH " onclick=" o_poAj5pre_fnpst( 'oAj5pre_frmsea1','ooAj5pre_rsltsea', '<?php echo $pre_pg; ?>Co=1&ohide=2' );" />
</td>
</tr> </table>

<br> <div id="ooAj5pre_rsltsea" > </div> <br>
<fieldset id="oAj5pre_rsltpg1" ></fieldset>
<?php } ?>
<button onclick="oAj5pre_fnWaL0adPg('<?php echo $pre_pg; ?>Co=1&ohide=2', 'oAj5pre_rsltpg1' )" title=" load Home page ">View All (REFRESH) </button> &nbsp;
<button onclick="oAj5pre_fnWaL0adPg('<?php echo $pre_pg; ?>Ad=true&ohide=1&Co=1', 'oAj5pre_rsltpg1' )" title=" load Add">+Add New (NEW POST)</button>

<?php
     // ///////////////////// S Insert Query&Process ( would add links $pre_pg.'Ad=true&ohide=1&Co=1' /////////////////////################
?>
<?php
// Start inserts

if( isset( $_GET['Ad'] ) ){
?>

<?php
// Add new


if( isset( $_POST['submitInsert'] ) ){


    $add_order_number_variable = @$_POST['theorder_number'] ? @sec_inpt( $_POST['theorder_number'] ):'';
    $add_statues_order_variable = @$_POST['thestatues_order'] ? @sec_inpt( $_POST['thestatues_order'] ):'';
    $add_date_variable = @$_POST['thedate'] ? @sec_inpt( $_POST['thedate'] ):'';
if(
      $add_order_number_variable ==''    OR
      $add_statues_order_variable ==''    OR
      $add_date_variable ==''    ){
die(" Please Fill in ALL Inputs. All Inputs Are Required ");
}
  $query = "INSERT INTO ";
$query .= " `oa_opensource_proj_o_v4_os_db`.`returned_tb` ";
$query .= " (`order_number` ,`statues_order` ,`date`) ";
$query .= " VALUES ";
$query .= " ( '$add_order_number_variable','$add_statues_order_variable','$add_date_variable')";

if($database->query($query)){
// success
echo "Added Successfully ";
echo "<br>";
echo " ". sec_outpt( $add_order_number_variable )."
". sec_outpt( $add_statues_order_variable )."
". sec_outpt( $add_date_variable )." ";

echo "<hr>";
$id_ins = $database->insert_id();
 echo load_content_js_a($pre_pg."&Co=1&cid=".$id_ins);

 // /////////////// update
// 
}else{
// fail
// Error to Add

echo "Error to Add ". mysqli_error();

}

echo "<a href='?Co'>Go Back</a>";
exit;

}
?>
<form name="oAj5pre_frm3a" action="<?php echo $pre_pg; ?>Ad=true" method="post"> <table align=center >
<tr> <td colspan=2 > <h3> Form to Add New </h3> </td> </tr> <input class="btn-style1 danger-hover" type="reset" value="X" title="cancel" />

<tr> <td> order_number </td> <td> <input class="inpt-txt" name="theorder_number" type="search" value="" placeholder="order_number " />
</td> </tr>
<tr> <td> statues_order </td> <td> <input class="inpt-txt" name="thestatues_order" type="search" value="" placeholder="statues_order " />
</td> </tr>
<tr> <td> date </td> <td> <input class="inpt-txt" name="thedate" type="search" value="" placeholder="date " />
</td> </tr>


<tr> <td colspan=2>
<input class="btn-submit" name="submitInsert" type="submit" value="INSERT" />

&nbsp; <div class="btn-submit active-hover" onclick=" o_poAj5pre_fnpst('oAj5pre_frm3a','oAj5pre_rslt3ins', '<?php echo $pre_pg .'Ad=true&ohide=1&rnm=1' ; ?>' ); this.innerHTML= this.innerHTML + ' Posted '; " > + SUBMIT & + View </div> </td> </tr> </table>
</form> <div id="oAj5pre_rslt3ins"></div><hr>


<?php }
//End inserts
?>
<?php
     // E SelectQuery&Process ( would add links $pre_pg.'Ad=true&ohide=1&Co=1' /////////////////////################
?>

<?php
     // ///////////////////// S Update Query&Process // ////////////////////###################
?>
<?php /*start the update process */
if( isset( $_GET['id_to_edit'] ) ){
sec_confirm_result('id_to_edit') ;
$id_to_edit_variable = sec_inpt( $_GET['id_to_edit']);
?>
<?php
/* Update
request to edit information */
if( isset( $_POST['update_action'] ) ){


$edit_id_variable = sec_inpt( $_POST['theid']); $edit_order_number_variable = sec_inpt( $_POST['theorder_number']); $edit_statues_order_variable = sec_inpt( $_POST['thestatues_order']); $edit_date_variable = sec_inpt( $_POST['thedate']);


$query_edit = "UPDATE `returned_tb` SET
";

$query_edit .= " `order_number`='$edit_order_number_variable', ";

$query_edit .= " `statues_order`='$edit_statues_order_variable', ";

$query_edit .= " `date`='$edit_date_variable' ";

$query_edit .= " WHERE `id` ='$id_to_edit_variable'
";
$result_edit = $database->query($query_edit);
if($result_edit){
echo "Updated Successfully - click refresh page button
" . " ";
echo "<br>";
echo " id : ". sec_outpt( $edit_id_variable ) ;
echo " order_number : ". sec_outpt( $edit_order_number_variable ) ;
echo " statues_order : ". sec_outpt( $edit_statues_order_variable ) ;
echo " date : ". sec_outpt( $edit_date_variable ) ;

echo "<hr>";

echo load_content_js_a($pre_pg."&Co=1&cid=".$edit_id_variable);
 
 // ///////// del
 // echo load_content_js_a($pre_pg);

}else{

echo "Error to Updated ". mysqli_error();
}

echo "<a href='".$pre_pg."Co=true'>Go Back</a>";
exit;


}
?>

<?php
// show the wanted thing that you want to change
$result_show_by_id = $database->query("SELECT * FROM returned_tb WHERE id='$id_to_edit_variable' ");
if(!$result_show_by_id){
die("Database query failed".mysqli_error());
}

$row_to_be_changed = mysqli_fetch_assoc($result_show_by_id);


$lnk="";
$valId= isset($_GET['id_to_edit'])?$_GET['id_to_edit']:'' ;
$lnk.= $pre_pg .'id_to_edit=';
$lnk.= $valId; $lnk.= "&"; $lnk.=isset($_GET['id_to_editH'])?'id_to_editH='. $_GET['id_to_editH'].'&':'' ;
$lnk.= "idSec=".intval( $valId ).""; $lnk.= "&"; $lnk.= "idSecH="; $lnk.= !empty($valId)?md5($valId):'';
?>

<form name="oAj5pre_frm1a" action="<?php echo @$lnk ? @$lnk :''; echo ""; ?>" method="post">
<table text-align=center align=center border=0 > <tr> <td colspan=2 > <h3> Update Form </h3> </td> </tr>
<!-- Enter The: -->
<tr> <td>
id : </td><td> <input class="inpt-txt" name="theid" type="search" value="<?php if( isset($row_to_be_changed['id']) ){ echo sec_outpt( $row_to_be_changed['id']); } ?>" class="inpt-txt" placeholder="Enter id .." />
</td> </tr>
<tr> <td>
order_number : </td><td> <input class="inpt-txt" name="theorder_number" type="search" value="<?php if( isset($row_to_be_changed['order_number']) ){ echo sec_outpt( $row_to_be_changed['order_number']); } ?>" class="inpt-txt" placeholder="Enter order_number .." />
</td> </tr>
<tr> <td>
statues_order : </td><td> <input class="inpt-txt" name="thestatues_order" type="search" value="<?php if( isset($row_to_be_changed['statues_order']) ){ echo sec_outpt( $row_to_be_changed['statues_order']); } ?>" class="inpt-txt" placeholder="Enter statues_order .." />
</td> </tr>
<tr> <td>
date : </td><td> <input class="inpt-txt" name="thedate" type="search" value="<?php if( isset($row_to_be_changed['date']) ){ echo sec_outpt( $row_to_be_changed['date']); } ?>" class="inpt-txt" placeholder="Enter date .." />
</td> </tr>

<tr>
<td>&nbsp;</td>
<td>
<input class="btn-submit" name="update_action" type="submit" value=" UPDATE " />

&nbsp; <div type="button" class="btn-submit active-hover" onclick=" this.innerHTML= this.innerHTML + ' .. Wait '; o_poAj5pre_fnpst('oAj5pre_frm1a','output2oAj5pre_', '<?php echo $lnk .'ohide=1&rnm=1' ; ?>' );" > + Edit & + See results + </div> </td> </tr> </table>
</form> <input type="button" class="btn-submit active-hover" value=" + Edit & + See results + " onclick=" o_poAj5pre_fnpst('oAj5pre_frm1a','output2oAj5pre_', '<?php echo $lnk .'ohide=1&rnm=1' ; ?>' );" /> <div id="output2oAj5pre_"></div><hr>


<?php
echo "<a href='".$pre_pg."Co=true'>Go Back</a>";
} //end the update process
?>




<?php

if( isset( $_POST['thmcid'] ) ){
odelete_multi( "returned_tb", "id" , "returned.php" ,"no_media" );

}
?> <?php
     // ///////////////////// S Delete Query&Process // ////////////////////###################
?>
<?php
// Delete
// request to delete
if( isset( $_GET['id_to_del'] ) ){
sec_confirm_result('id_to_del') ;
$id_to_delete_variable = mysqli_real_escape_string($connection, $_GET['id_to_del'] ) ;

$query = "DELETE FROM `returned_tb` WHERE `id` ='$id_to_delete_variable' ";
$result_del = mysqli_query( $connection,$query);
if($result_del){
// success
echo "Removed Successfully ";
echo load_content_js_a($pre_pg);

}else{
// fail
// Error to Add

echo "Error to Delete ". mysqli_error();

}

echo "<a href='".$pre_pg."Co=true'>Go Back now </a>";
exit;

}
?>
<?php
     // ///////////////////// S OOP Pagination Select Query&Process // ////////////////////###################
?> 

<?php
// select all pagination
	$obj1_returned = new Clsreturned;
	// 1. the current page number ($current_page)
	$page = isset($_GET['page'])&&!empty($_GET['page']) ? (int)intval($_GET['page']) : 1;

	// 2. records per page ($per_page)
	$per_page = 3;

	 // 3. total record count 
	  $total_count = $obj1_returned->count_all();
	
	// use pagination instead
	$pagination = new Pagination($page, $per_page, $total_count);
	$sql = "SELECT * FROM `returned_tb` ";
	// $sql .= " WHERE `statues_order` LIKE '%".sec_inpt($email)."%' ";
	// $sql .= " ORDER BY id DESC";
	$returnedo_ret_s = $obj1_returned->fetch_all_pagenation($sql,$per_page,$pagination->offset());
	 
	//	// all with no pagenation
	// $returnedo_ret_s = $obj1_returned->fetch_all($sql);
	// $returnedo_ret_s = $obj1_returned->fetch_all();
 if($returnedo_ret_s){ echo " Total found: ".$total_count; }else{die("No Such Records.");}
?>
 
<html>
		<!--
	<head>
		<title>CRUD_Template__Eng__Omar_Ahmed</title>
		<link rel="stylesheet" href="../assets/style.css" />
	</head>
	-->
	<body>
		<div class="container">

<h1> Welcome  <?php echo @$_SESSION['session_name_user_client']; ?></h1>
			<a href="index.php" id="logo">CMS - Users</a>-<a href="add_user.php">[+]</a>
			<ol>
				<?php foreach ($returnedo_ret_s as $returnedo_ret_){ ?>
						<li>
							<?php 
							$key_img = "imgN_". md5("returned_tb") ."_rec_record__" .$returnedo_ret_['id'];
								   $src_image_db = view_file_src_by_id_from_tb_oa($key_img);
								// $src_image_db = get_user_photo_by_id($returnedo_ret_['id'] );
								echo " <img src='". $src_image_db . "' width='50' height='50' class=\"radiues  personal-photo\" alt=' UPLOAD New ' />";
							?>
							 
							<?php 
								$key_img = "imgN_". md5("returned_tb") ."_rec_record__" .$returnedo_ret_['id'];
								echo " [<a title=\"Add image\" href='". "img.php?"."Co=true&Ad=1&id_to_ad=". @$key_img . "&input_img_search=". @$key_img . "' >";
								echo "⩲";
								echo "</a>] ";
							?>
							<a href="?id=<?php echo $returnedo_ret_['id']; ?>#details">
						<?php echo $returnedo_ret_['order_number']; ?></a>
						-<small>  <?php echo $returnedo_ret_['statues_order'] ; ?></small>
						
						
							   
 								<?php echo sec_outpt( @$returnedo_ret_['id']); ?>
								

								

 								<?php echo sec_outpt( @$returnedo_ret_['order_number']); ?>
								

								

 								<?php echo sec_outpt( @$returnedo_ret_['statues_order']); ?>
								

								

 								<?php echo sec_outpt( @$returnedo_ret_['date']); ?>
								

								

								
						
						
						</li>
				<?php } ?>
			</ol>
		</div>
			 
		<div id="pagination" style="clear: both;">
		<?php
		// $page_to= "users".".php?Co";
		$page_to= @$this_crud_file_name."?Co";
			if($pagination->total_pages() > 1) {
				
					echo " <a href=\"".$page_to."&page=";
					echo "1";
					echo "\" title=\"First Page\"><button>««</button></a> ";
					
				if($pagination->has_previous_page()) { 
				echo "<a href=\"".$page_to."&page=";
			  echo $pagination->previous_page();
			  echo "\">« Previous</a> "; 
			}
 
				for($i=1; $i <= $pagination->total_pages(); $i++) {
					if($i == $page) {
						echo " <span class=\"selected\">{$i}</span> ";
					} else {
						echo " <a href=\"".$page_to."&page={$i}\">{$i}</a> "; 
					}
				}

				if($pagination->has_next_page()) { 
					echo " <a href=\"".$page_to."&page=";
					echo $pagination->next_page();
					echo "\">Next »</a> "; 
					
				}
					echo " <a href=\"".$page_to."&page=";
					echo $pagination->total_pages();
					echo "\"  title=\"Latest Page\"><button>»»</button></a> "; 
			}
		?>
		</div>
	</body>
</html>




	<?php 
	// //////////////////////////////////////details s /////////////////  View more Details page
		// Find by id
		 $obj_user = new Clsreturned;
		
		 $email = isset($_GET['email'])&&!empty($_GET['email']) ? (string)htmlentities($_GET['email']) : "";
		 $id = isset($_GET['id'])&&!empty($_GET['id']) ? (int)intval($_GET['id']) :"";
		 if($email){
			 $obj_user->col_find="email";
			$Rreturnedo_ret_ = $obj_user->fetch_data($email);
		 }
		 else if($id){
			 $obj_user->col_find="id";
			  $Rreturnedo_ret_ = $obj_user->fetch_data($id);
		 }else{ echo("View More Details about obj_user.");}
		  //echo $obj_user = $obj_user->count_all();
	 ?>
	<?php 
		 if(@$Rreturnedo_ret_['id']){
	?>
<fieldset id="details">
	 <br><br>Details
			<li>l
				<?php	 // $src_image_db = view_file_src_by_id_from_tb_oa($key_img);
									 $src_image_db = get_user_photo_by_id($Rreturnedo_ret_['id'] );
									echo " <img src='". $src_image_db . "' width='250' height ='250' class=\"radius  personal-photo\" alt=' UPLOAD New ' />";
								?>
								
								<?php 
									$key_img = "imgN_". md5("returned_tb") ."_rec_record__" .$Rreturnedo_ret_['id'];
									echo " <a title=\"Add image\" href='". "img.php?"."Co=true&Ad=1&id_to_ad=". @$key_img . "&input_img_search=". @$key_img . "' >";
									echo "[⩲]";
									echo "</a> ";
								?>
							<br>
							<a href="?id=<?php echo $returnedo_ret_['id']; ?>#details">
						<?php echo $returnedo_ret_['order_number']; ?></a>
						-<small>  <?php echo @$Rreturnedo_ret_['statues_order'] ; ?></small>
						

							 
							 
 								<?php echo sec_outpt( @$Rreturnedo_ret_['id']); ?>
								

								

 								<?php echo sec_outpt( @$Rreturnedo_ret_['order_number']); ?>
								

								

 								<?php echo sec_outpt( @$Rreturnedo_ret_['statues_order']); ?>
								

								

 								<?php echo sec_outpt( @$Rreturnedo_ret_['date']); ?>
								

								
							 
							  
							 
							<p>  <?php       

							 ?></p>

							 

							 </li>
				 
</fieldset>
	<br><br>
	<?php
		}else{
					// echo("Sorry, No Such record."); 
		} 
	?>









 
		
		
		
		
		
		
		
		
			<!--// e_________ooooooooooooooooooooooooooooooooooooooooooooOOP
					  
		-->
		
		

<?php
     // ///////////////////// e OOP Pagination Select Query&Process // ////////////////////###################
?> <?php
     // ///////////////////// S Select Query&Process // ////////////////////###################
?> <?php
if( isset( $_GET['Co'] ) ){

$q = ""; $uid=""; $searchW ="";
if( isset( $_GET['cid'] ) && $_GET['cid']!="" ){
        // $_REQUEST['cid']
    $q .= "SELECT * FROM returned_tb";
    $uid = (( @$_GET['cid']) && ( @$_GET['cid'] > 0 )) ? (int)intval( $_GET['cid'] ) : 0 ;
    $uid = (( @$uid) && ( (int)intval( $uid ) > 0 )) ? (int)intval( $uid ) :"";
        // NOTE: // :""; will not return the 0 records in db // :0; will enable 0 (This good to get the 0 category such as main category
    $q .= @$uid ? " WHERE id='$uid' " :"";
} else
if( isset( $_POST['txt_search_all'] ) && $_POST['txt_search_all']!="" ){
    $q .= "SELECT * FROM returned_tb";
    // $q .= " WHERE ";
    $searchW = @$_POST['txt_search_all']? (string)addslashes( $_POST['txt_search_all'] ) : "" ;
    $searchW = $searchW? sec_inpt( $searchW ) :"" ;
    $q .= $searchW? " WHERE order_number LIKE'%". $searchW ."%'" :"" ;
} else {
    $q .= "SELECT * FROM returned_tb";
}


$o_ret_result = $database->query( $q );
if(!$o_ret_result ){
die("Database query failed".mysqli_error());
}

$q_num = $database->num_rows( $o_ret_result ) ;

echo @$q_num? "(".@$q_num .") Result. ":"";
    echo @$_GET['msg']&& @$_GET['cid'] ?"<center><fieldset style=\"width:60%; background:gray ; color:white; \"><h3>". @$_GET['msg'] ."</h3> </fieldset></center> ":"";
// <!-- style-green style-blue style-lightblue style-black -->

if( isset( $_GET['select_al'] ) ){

echo " / <a href=\"". $pre_pg ."Co=true\" onclick=\"oAj5pre_fnWaL0adPg('". $pre_pg."ohide=1&Co=1". "&e', 'oAj5pre_rsltpg1' ); return false; \" title=\" Unselect All \" class=\"btn-style1\" >Unselect All</a> ";
} else {
echo " <a href=\"". $pre_pg ."Co=true&select_al=1\" onclick=\"oAj5pre_fnWaL0adPg('". $pre_pg."ohide=1&Co=1&select_al=1". "&e', 'oAj5pre_rsltpg1' ); return false; \" title=\" Select All \" class=\"btn-style1\" >Select All</a> ";
}

if( @$_GET['Co'] && @$_GET['Co']!="" ){
echo " <form method=\"post\" action=\"". $pre_pg ."Co=true\" > ";
echo " <input class=\"danger-btn\" type=\"submit\" name=\"multi_del\" value=\"DELETE SELECTED\" /> ";
}

echo "<table ";
// echo " class=\"style-lightblue\" ";
echo " class=\"style-black\" ";
echo " style=\"border:1px solid rgb(240,240,240); border-radius:2px;\" ";
echo " align=center border=0 >";
echo " <tr ";
echo " style=\"border:1px solid rgb(240,240,240); fon-size:11px; border-radius:1px; background:rgb(248,248,248);color:rgb(197,197,197);\" ";
echo " > ";

ECHO " <TD> ID </TD> ";
ECHO " <TD> ORDER_NUMBER </TD> ";
ECHO " <TD> STATUES_ORDER </TD> ";
ECHO " <TD> DATE </TD> ";
    echo " <td colspan=\"3\" > MANAGE </td> ";
echo " <td > ";
// echo " <hr> Select <br>";
echo " </td> ";
echo "</tr>"; // echo " ";
$cou="";
while( $o_ret_row = $database->fetch_array( $o_ret_result ) ){

echo "<tr>";
echo "<td>"; echo "". @sec_outpt( @$o_ret_row[ 'id' ] ) ; echo "</td>";
echo "<td>"; echo "". @sec_outpt( @$o_ret_row[ 'order_number' ] ) ; echo "</td>";
echo "<td>"; echo "". @sec_outpt( @$o_ret_row[ 'statues_order' ] ) ; echo "</td>";
echo "<td>"; echo "". @sec_outpt( @$o_ret_row[ 'date' ] ) ; echo "</td>";

echo "<td> <a class=\"btn-style1\" href=\"". @$pre_pg . "". "page_story=".intval( $o_ret_row[0] ) ."\">More..</a> </td>";
if( @$_GET['Co'] && @$_GET['Co']!="" ){
echo "<td>";
echo "<a class=\"btn-style1\" href='". $pre_pg;
echo "Co=true";
echo "&". sec_confirm_data('id_to_edit', $o_ret_row[0] );
// echo "&"; echo "idSec=".intval( $o_ret_row[0] ).""; echo "&"; echo "idSecH=".md5( $o_ret_row[0]).""; // echo "&"; // echo "id_to_edit=$o_ret_row[0]' ;
echo "' >";
echo " Edit ";
echo "</a>   "; echo" <fieldset class=\"btn-submit active-btn\" onclick=\"oAj5pre_fnWaL0adPg('". $pre_pg."ohide=1&Co=1&". sec_confirm_data('id_to_edit', $o_ret_row[0] )."&e', 'oAj5pre_rsltpg1' )\" title=\" load page \">Edit</fieldset> ";
echo " </td> ";

echo " <td> <a ";
  echo @$_GET['msg']&& @$_GET['cid'] ? " class=\"btn-submit danger-hover\" " : " class=\"btn-style1 danger-hover\" ";
echo " href='". $pre_pg;
echo "Co=true";
// echo "&"; echo "idSec=".intval( $o_ret_row[0]).""; echo "&"; echo "idSecH=".md5( $o_ret_row[0]).""; // echo "&"; echo "id_to_del=$o_ret_row[0]";
  echo @$_GET['msg']&& @$_GET['cid'] ? "&". sec_confirm_data('id_to_del', $o_ret_row[0] ):"";
echo "&cid=".intval( $o_ret_row[0] ).""; echo "&msg=". urlencode( " Are You Sure you want to delete ! " . @$o_ret_row[1] )."";
  echo @$_GET['msg']&& @$_GET['cid'] ?"&". sec_confirm_data('id_to_del', $o_ret_row[0] ):"";
 
echo "' >";
  echo @$_GET['msg']&& @$_GET['cid'] ?" <input type='button' autofocus='autofocus' value='Yes' /> ":"";
echo " Delete ";
echo "</a>";
// multi delete

echo " </td> <td> ";
echo " <label style=\"width:100%; display:block; \" >  <input style=\"width:35px; height:35px; \" ";
echo @$_GET['select_al']?" checked ":"";
echo " type=\"checkbox\" class=\"danger-btn\" name=\"thmcid[]\" value=\"". $o_ret_row[0] ."\" /> </label> ";
echo "<input style=\" \" type=\"hidden\" name=\"thmsec[". $o_ret_row[0] ."]\" value=\"". o3rAhmd_enc_algorithm( $o_ret_row[0] . 'returned.php' ) ."\" /> ";
echo "<input style=\" \" type=\"hidden\" name=\"thmname[". $o_ret_row[0] ."]\" value=\"". $o_ret_row[1] ."\" /> ";
}

echo "</td>"; echo "</tr>";
// echo "<hr>";
}
// echo "</tr>";

echo "</table>";
if( @$_GET['Co'] && @$_GET['Co']!="" ){
echo "</form>"; }

}
?>




<?php
/*
// simple query qq2
$qqt3333 = ""; $uid=""; $searchW ="";

    $qqt3333 .= "SELECT * FROM returned_tb ";
$o_ret_resultt3333 = $database->query( $qqt3333 );
if(!$o_ret_resultt3333 ){
die("Database query failed".mysqli_error());
}


$qq_numt3333 = $database->num_rows( $o_ret_resultt3333 ) ;

echo @$qq_numt3333 ? "(".@$qq_numt3333 .") Resultt3333 . ":"";
if( $qq_numt3333 !=""){
while( $o_ret_rowt3333 = $database->fetch_array( $o_ret_resultt3333 ) ){

// echo "<br>";
    echo @sec_outpt( @$o_ret_rowt3333[ 'id' ] ) ;
    echo "<br>";
    echo @sec_outpt( @$o_ret_rowt3333[ 'order_number' ] ) ;
    echo "<br>";
    echo @sec_outpt( @$o_ret_rowt3333[ 'statues_order' ] ) ;
    echo "<br>";
    echo @sec_outpt( @$o_ret_rowt3333[ 'date' ] ) ;
    echo "<br>";

     echo "<hr>";
}
}else { echo " No Results to show. "; }
*/
?>

<hr> <fieldset>

<?php
// /*
// simple query 3 for details page // you can reuse this by replace allthrdl to allthrdlTwo
$qqqHdallthrdlallthrdl3333 = ""; $page_i ="";
    // $page_i = @$_GET['page_story'] ? (string)addslashes(trim( $_GET['page_story'] )) : "" ; // validation for string
    $page_i = @$_GET['page_story'] ? (int)intval( $_GET['page_story'] ) : "" ; // validation for num

if( isset($page_i ) && !empty( $page_i ) ){
// validation level 2
    $page_i = @$page_i? sec_inpt( $page_i ) :"" ;
    $qqqHdallthrdlallthrdl3333 .= "SELECT * FROM returned_tb ";
   
    $qqqHdallthrdlallthrdl3333 .= $page_i? " WHERE id ='". $page_i ."' " :"" ;
$o_ret_resultallthrdl3333 = $database->query( $qqqHdallthrdlallthrdl3333 );
if(!$o_ret_resultallthrdl3333 ){
die("Database query failed".mysqli_error());
}


$qqqHdallthrdl_numallthrdl3333 = $database->num_rows( $o_ret_resultallthrdl3333 ) ;

echo @$qqqHdallthrdl_numallthrdl3333 ? "(".@$qqqHdallthrdl_numallthrdl3333 .") Resultallthrdl3333 . ":"";
if( $qqqHdallthrdl_numallthrdl3333 !=""){
// while(
$o_ret_rowallthrdl3333 = $database->fetch_array( $o_ret_resultallthrdl3333 ) ;
// ){
// echo "<br>";
?>

      <p>   <?php echo @sec_outpt( @$o_ret_rowallthrdl3333[ 'id' ] ) ; ?>   </p>  
 
      <p>   <?php echo @sec_outpt( @$o_ret_rowallthrdl3333[ 'order_number' ] ) ; ?>   </p>  
 
      <p>   <?php echo @sec_outpt( @$o_ret_rowallthrdl3333[ 'statues_order' ] ) ; ?>   </p>  
 
      <p>   <?php echo @sec_outpt( @$o_ret_rowallthrdl3333[ 'date' ] ) ; ?>   </p>  
 
  
     <hr>

<?php // } // e while loop ?>
<?php }else { echo " No Result for this page. "; } ?>
<?php } else { echo " No such page. "; } // e page_story request ?>
<?php // */
?>

</fieldset> 






 
 <?php $file_load_name_footer = "load_all_includes_footer.php"; file_exists($file_load_name_footer)? @include_once(@$file_load_name_footer):exit("Not found file: ". $file_load_name_footer); ?>