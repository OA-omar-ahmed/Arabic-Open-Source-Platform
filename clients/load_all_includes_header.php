<?php isset($_SESSION) ? "" : @session_start();
$d_inc = "../includes/";
include_once($d_inc . "connection.php");
include_once($d_inc . 'classes.php');
include_once($d_inc . "functions.php");
include_once($d_inc . "functions_adv.php");
include_once($d_inc . "users.php");
$user_fullname = @$_SESSION['session_name_user_client'] ?  @$_SESSION['session_name_user_client'] : "";
$userID = @$_SESSION['userID']  ?  @$_SESSION['userID'] : "";
@$_GET['Co'] && !$userID
	|| @$_GET['dir_to_o'] && !$userID
	|| @$_GET['name'] && !$userID
	? redirect_page("login.php") : "";
$get_user_info =  new Users;
// echo "<h1>Users:".$get_user_info->count_all()."</h1>";
//if($userID){$get_user_info=  new Users;}
?>
<?php
isset($_GET['ohide']) ? "" : include_once("../assets/o_js/oa_js.php"); // js file
isset($hide_header) ? "" : include_once("../views/header.php");
/*?><a href="<?php echo $pre_pg; ?>&Co=1" onclick="oAj5pre_fnWaL0adPg(this.href+'&ohide=1', 'content_body_js' ); return false;" title=" View All (REFRESH) ">تحديث>>>></a> &nbsp;
<?php*/
echo isset($_GET['ohide']) ? "" : "<fieldset id=\"content_body_js\" >"; // start content js load  
$hide_header = "";
?>

<?php
// include in all pages //	if(!isset( $_SESSION['session_name_user_client'] ) ){ exit('<meta http-equiv="Refresh" content="0;url=login.php">');  } 
?>





<?php if (isset($_GET['ohide'])) {
} else { // ////////////////// start css & js & navigation

?>


<?php }
// end navigation main header
//
?>











<!-- Example page -->
<?php /*
<?php $file_load_name = "load_all_includes_header.php"; file_exists($file_load_name)? @include_once(@$file_load_name):exit("Not found file: ". $file_load_name);   if(!isset( $_SESSION['session_name_user_client'] ) ){ exit('<meta http-equiv="Refresh" content="0;url=login.php">');  }  ?>

<h1> Welcome <?php echo @$_SESSION['session_name_user_client']; ?></h1>
<?php 
		 
			# (c)OmarAhmed2021
			# Page Content Here
		 
?>


<?php $file_load_name_footer = "load_all_includes_footer.php"; file_exists($file_load_name_footer)? @include_once(@$file_load_name_footer):exit("Not found file: ". $file_load_name_footer); ?>

// */
?>
<!--
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
________________________________©OMAR_AHMED_____________________________
|			  		 _______	 _______ 	 ___	 ___			   |
|					|		|	|	|	|	|	|	|	|			   |
|					|		|	|	|	|	|___|	|___|			   |
|					|		|	|	|	|	|	|	| \			  	   |
|					|_______|	|	|	|	|	|	|  \			   |
|______________________________________________________________________|
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                                #######   ###            
                                #	  #  #   #            
                                #©0marAhmed###            
                                #	  #  #   #            
                                #######  #   #
_______________________________________________________________________
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


-->
