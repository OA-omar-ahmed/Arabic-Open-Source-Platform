<?php
	$staues_of_project="";
if($project_statues=="public"||$project_statues=="Public"){
  	// show for pulblic 
	 $project_statues_activation = true;
	$staues_of_project=" Public archive";
 } else if($project_statues=="Private"||$project_statues=="Private"){
	// show only for users logged in
	 if(isset( $_SESSION['session_name_user_client'] )&&isset( $_SESSION['userID'] )&&!empty( $_SESSION['session_name_user_client'] ) ){ 
	$staues_of_project=" Private archive";
		$project_statues_activation = true;
	 }else{
		 echo " <li><a href=\"login.php\" ><u>(".$project_name.")</u></br> <b>".$project_statues."</b> دخول .</a></li>";
		 
	 }
	 
 } else if($project_statues=="only_me"||$project_statues=="only_me"){
	// show only for me
	 if(isset( $_SESSION['userID'] )&&!empty( $_SESSION['userID'] )&& ( $_SESSION['userID']==@$record_row['user_id']  ) ){ 
	$staues_of_project=" Only me";
		$project_statues_activation = true;
	 }
	 
 } else {
	 $project_statues_activation = false;
	 echo " <li><a href=\"contactus.php\" ><u>(".$project_name.")</u></br> <b>".$project_statues."</b> دخول .</a></li>";
	 
 }
 
?>