<?php 
	  isset($_SESSION)?"":@session_start();  
	$pre_pg=@$pre_pg?$pre_pg:""; 
	$user_fullname=@$user_fullname?$user_fullname:""; 
	$userID=@$userID?$userID:""; 
 echo "<a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , Go Back</a>";
?>
<!--
_______________________________________________________________________
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
  <!-- s main header -->
   

<html encoding="utf-8" > 
	<head>
		<title> <?php echo $user_fullname? $user_fullname." | YOpenSources  ":" Login"; ?> -  		</title>
		<title><?php echo @$website_title; ?></title>
		<!-- OmarAhmed-PHP Template style CSS -->
		<link href="css/oa.css" rel="stylesheet">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="viewport" content="device-width">
		<link rel="stylesheet" href="../assets/css/style.css" />
	</head> 

  
   <body translate="no" dir="ltr" charset="utf-8" >
	 <ul class="head1 fixed_top" style=" text-decoration:right; ">
         <li class="headli" ><a href="index.php" title="Home" >🏠 الرئيسية </a></li>
         <li class="headli" ><a href="user_setting.php?Co&view_id=<?php echo @$userID?urlencode( @$userID):""; ?>" title="Account" >👤<?php echo @$user_fullname? @$user_fullname:""; ?> </a></li>
         <li class="headli" ><a href="projects.php?Ad=1" title="AboutUs" >&plus; مشاريعي  </a></li>
         <li class="headli" ><a href="projects_list" title="Projects List" >🌐 اخر الانظمة    و البرامج   </a></li>
         <table style=" float:right; width:300px; " >
			<tr style=" width:100%; ">
			<form id="form1" name="form1" method="post" action="<?php echo "projects_list.php?Co" ; if( isset( $_GET['cid'] ) ){ echo '&cid='. urlencode( $_GET['cid'] ); } echo '&cctxt=ee2'; ?>" >

			<td style=" width:15%; ">
			<input type="submit" name="btn_search_" value="بحث" style="border-radius: 8px; background:#0078D4; color:#fff;" />
			</td>
			<td style=" width:80%; ">
			<input type="search" style=" width:100%; " required="required" name="input_search_" id="txt_search_id" placeholder=" بحث عن مشروع  ..." style="border-radius: 8px; " />

			</td>
			</form>
			</tr> </table>
 
         <li class="headli" > <a href="<?php echo $pre_pg; ?>Co=1&Ad=1" title="Home" > <?php echo $pre_pg; ?></a> </li>
         <li style="float:left;" title=" SeeMore " class="headli" > <a href="<?php echo $user_fullname?"Logoff.php"/*"logout.php"*/:"login.php"; ?>" title="<?php echo $user_fullname?"Sign Out":"Login"; ?>" > <?php echo $user_fullname?"  خروج":"دخول"; ?></a> </li>
        
         <li style="float:left;" title=" SeeMore " class="headli" >
         <a href="#Menue" onclick="this.parentElement.parentElement.style.display='none';" > &times; </a>
         </li>
  
   </ul>
   
	<br />
	<br />
  