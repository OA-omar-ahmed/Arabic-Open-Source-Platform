				<?php
				
					// SELECT Query for  images CARTS (Gallery) 
					$searchword=""; $qv = ""; $and="";
					if( isset( $_REQUEST['input_img_search'] ) && !empty( $_REQUEST['input_img_search'] ) && $_REQUEST['input_img_search']!="" ){
					$qv .= "SELECT * FROM tb_uploaded_file";
						if( isset( $and) && $and =="1"){ $qv .= " AND "; } else { $and="1"; $qv .= " WHERE "; }
							$searchword_img = (string)addslashes( strip_tags($_REQUEST['input_img_search'] )) ;
							$qv .= " fkid LIKE'%".$searchword_img."%'"; 
						}
					$qv .= " ORDER BY idfile ASC";// idfile
					$v_pic_result = $database->query( $qv );
				if(!$v_pic_result ){
					die("Database qvuery failed".mysqli_error());
				}
				$countNmt=1;
				$v_num_pic_row = $database->num_rows( $v_pic_result ) ;
				echo @$searchword?" Found ( $v_num_pic_row ) Results about ".$searchword:" العثور على ( $v_num_pic_row ) مرفق   "."";
				 
			?>