<?php isset($_SESSION)?"":@session_start(); ?>
<?php // include_once "header.php";
$log_out="";
 if(isset( $_SESSION['session_name_user_client'] ) ){
 	$log_out="Logoff.php";
 	//echo '  <a href="'.$log_out.'">LogOff</a>';
 } else {
// echo'<meta http-equiv="Refresh" content="0;url=login.php">';exit;
}
?>
<html>
<head>
<link rel = "icon" type = "image/png" href = "uploads/icon.png"> 
				<!-- For apple devices --> 
				<link rel = "apple-touch-icon" type = "image/png" href ="uploads/icon.png"/> 
				</head>
				

<a href="index.php?Co">ًںڈ 
Home</a>
-
<a href="img.php?Co">Items</a>
- 
<a href="control_users.php?Ad=true&Co=1"> Users Dashboard - ( Register )<button>+ </button> </a>
- 
<?php echo '<a href="users_dashBoard.php">'. 'Users'  .'</a>'; ?>
- <?php if(!isset( $_SESSION['session_name_user_client'] ) ){ ?><a href="login.php" title="Login">LOGIN </a><?php }else{ ?><a href="logoff.php" title="Logout">LOGOUT </a> <?php }  ?>
 
<?php // echo '<a href="'.$log_out.'">LogOff</a>'; ?>
-
 <?php echo @$_SESSION['session_name_user_client'] ?  ' Welcome <a href="users_dashBoard.php">'. @$_SESSION['session_name_user_client']  .'</a>':""; ?>


<form method="post" action="img.php?Ad=true&">
<!--	<textarea name="id_to_ad" placeholder="Description. ." required></textarea>
-->
	<input type="submit" value="Add New Item" name="submit" /> 
</form>

