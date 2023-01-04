<?php

// number views process start
	if( isset($record_row[ 'id' ])&&!empty($record_row[ 'id' ])&&@$record_row[ 'id' ]!= @$_SESSION['last_projects_seen_'.md5(@$record_row[ 'id' ])] ){
		$number_seen_post=(int)intval($record_row[ 'logo_img' ]);
		$number_seen_post=$number_seen_post+1;
		$query_edit = "UPDATE projects_tb SET

		logo_img = '$number_seen_post' 
		WHERE id ='".$record_row[ 'id' ]."'
		";
		$result_edit = $database->query($query_edit);
		if($result_edit){
			 $_SESSION['last_projects_seen_'.md5($record_row[ 'id' ])]=$record_row[ 'id' ];
			 $_SESSION['last_projects_seen_date_'.md5($record_row[ 'id' ])]=date("d/m/Y H:i");

		}
	}

// view  process end


// number downloads process start
	if( isset($record_row[ 'id' ])&&!empty($record_row[ 'id' ])&&@$record_row[ 'id' ]&& isset(  $_REQUEST['download_proj'])&&!empty(  $_REQUEST['download_proj']) ){
		if( md5($record_row[ 'id' ])== @$_SESSION['last_projects_downloads_0o'.md5(@$record_row[ 'id' ])] ){
			$link_downlaa="project_public.php?dir_to_o=".$_REQUEST['dir_to_o'];
				 $redownload= "<a href=\"".$link_downlaa."\">Redownload  Again </a>";
				 

			echo "<center><h1> &check; Downloaded this succesfully. <br /> ".$redownload."</h1></center> "; }else{
			$number_seen_post=(int)intval($record_row[ 'downloads_num' ]);
			$number_seen_post=$number_seen_post+1;
			$query_edit = "UPDATE projects_tb SET

			downloads_num = '$number_seen_post' 
			WHERE id ='".$record_row[ 'id' ]."'
			";
			$result_edit = $database->query($query_edit);
			if($result_edit){
				 $_SESSION['last_projects_downloads_0o'.md5($record_row[ 'id' ])]=md5($record_row[ 'id' ]);
				  $redir_link_downlaa="projects_details.php?view_id=".$_REQUEST['view_id'];
				 $link_downlaa="uploads/".basename(strip_tags($_REQUEST['dir_to_o']));
				 echo "<iframe src=\"".$link_downlaa."\"></iframe>";
				 $link_downladQui="project_public.php?dir_to_o=".$_REQUEST['dir_to_o'];
				 $Click_redownload= "<a href=\"".$link_downladQui."\"> Click to quick download process. </a>";
			
				 echo "<h1>downloading ... Please Wait 5 seconds.. or ".$Click_redownload."</h1>";
				  exit('<meta http-equiv="Refresh" content="5;url='.$redir_link_downlaa.'">');  

			}
		}
	}

// downloads  process end

?>