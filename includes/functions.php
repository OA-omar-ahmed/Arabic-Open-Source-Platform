<?php function redirect_page($link) { @HEADER("Location: ".$link."");//
		exit("<fieldset>Sorry Could Not Redirect This Page.  <a href=\"".$link."\"> Please Click This Link To Return Back </a></fieldset> " . '<meta http-equiv="Refresh" content="0;url='.$link.'">' );
		return 0;
	}	?><?php
function secure_inputs_oa($v=""){
  if($v){
    $v = stripslashes($v);
    $v = trim(addslashes($v));
    $v =$v;
    $v =$v;
  }
  return $v;
}

function secure_outputs_oa($v=""){
  if($v){
    $v = trim($v);

    // as remove lines tags to be in one line
      //     $v = nl2br($v);
    // clear tags
    $v = strip_tags($v);
    // as html entities:
      // $v = htmlentities( $v , ENT_COMPAT, 'UTF-8',false );
    $v = trim(addslashes($v));
    $v =$v;
}   return $v;
}

  function size_in_txt($size=0) {
		
		if($size>0) {
			if($size < 1024) {
				return "{$size} bytes";
			} elseif($size < 1048576) {
				$size_kb = round($size/1024);
				return "{$size_kb} KB";
			} else {
				$size_mb = round($size/1048576, 1);
				return "{$size_mb} MB";
			}
			return "0 Empty file";
		}
	}
?>



    <?php
        // // ###################### this is Example for how to use codes images if img.php not exists
        // // DB : # tst_db_uni
        // TB : # tb_uploaded_file
        // cols: # idfile srcfi fkid
       
        // ref link: # id_to_ad
    ?>
    <?php
        // functions new
        /*
        $key_img = "imgNew_persona_ex_" .$row[0];
        $src = view_file_src_by_id_from_tb_oa($key_img);
        echo "<img src='".$pic_row['srcfi']."' width='90%' height='auto' />";
        echo "<iframe src='".$pic_row['srcfi']."' width='90%' height='auto' ></iframe>";
        */
        if( ! function_exists("view_file_src_by_id_from_tb_oa")){
          function view_file_src_by_id_from_tb_oa($key=""){
            global $connection;
            if($key){
              $query = "SELECT * FROM tb_uploaded_file ";
              $query .= " WHERE fkid='".$key."' ";
              $query .= " ORDER BY fkid DESC ";
                $pic_result = mysqli_query($connection, $query );
                if(!$pic_result ){
                die("Database query failed".mysqli_error());
                }
                $pic_row = mysqli_fetch_array( $pic_result );
              //  echo "".@$pic_row?"aaaaaaaa".$pic_row['srcfi']:"";
              $file_name = @$pic_row?$pic_row['srcfi']:"";
              $file_name = @$file_name && file_exists(  $file_name ) ?$file_name:"../assets/images/oa_os_codes.jpg";
              $file_name = @$file_name && file_exists(  $file_name ) ?$file_name:"assets/images/oa_os_codes.jpg";
              return @$file_name  ;
            }else{
              return "";
            }
          }
        }


		if( ! function_exists("view_src_project_image")){
          function view_src_project_image($proj_id=""){
            global $connection;
            if($proj_id){
				$key_img = "imgN_". "projects_tb_rec_record__" .$proj_id;
				$src_image_db = view_file_src_by_id_from_tb_oa($key_img);
				return $src_image_db;

            }else{
              return "";
            }
          }
        }
    ?>
    <?php /* // this is for insert
        if( isset( $_REQUEST['id_to_ad'] ) ){ ?>
        <input type="hidden" name="f_pro_img" value="<?php if( isset( $_REQUEST['id_to_ad'] ) ){ echo @$_REQUEST['id_to_ad']; } ?>" required="required" />
        <?php } else { ?>
        <textarea style="width:100%; " name="id_to_ad" placeholder="Write here ... " required="required" ><?php if( isset( $_REQUEST['id_to_ad'] ) ){ echo @$_REQUEST['id_to_ad']; } ?></textarea>
        <?php } */ ?>
          <?php
            // SELECT Query for images CARTS (Gallery)
          /*
          $searchword=""; $qv = ""; $and="";
            $qv .= "SELECT * FROM tb_uploaded_file ";
            if( isset( $_REQUEST['input_img_search'] ) && !empty( $_REQUEST['input_img_search'] ) && $_REQUEST['input_img_search']!="" ){
            if( isset( $and) && $and =="1"){ $qv .= " AND "; } else { $and="1"; $qv .= " WHERE "; }
              $searchword_img = (string)addslashes( strip_tags($_REQUEST['input_img_search'] )) ;
              $qv .= " fkid LIKE'%".$searchword_img."%'";
            }
            $qv .= " ORDER BY idfile ASC";// idfile
            $v_pic_result = mysqli_query($connection, $qv );
          if(!$v_pic_result ){
            die("Database qvuery failed".mysqli_error());
          }
          $countNmt=1;
          $v_num_pic_row = mysqli_num_rows( $v_pic_result ) ;
          echo @$searchword?" Found ( $v_num_pic_row ) Results about ".$searchword:" Found ( $v_num_pic_row ) Results "."";
          if($v_num_pic_row>0){
            while( $v_pic_row = mysqli_fetch_array( $v_pic_result )){
            echo "<div ";
            echo " onclick=\" document.getElementById('omMdal').innerHTML = this.innerHTML; document.getElementById('myBtn').onclick(); \" ";
            echo " class=\"o_cart\">";
              echo "<fieldset style=\"height:300px; border:1px solid rgb(246,246,246); width:auto; \"> ";
                if( ! empty( $v_pic_row['srcfi'] ) ){
                $g= sec_outpt( trim( $v_pic_row['srcfi'] )) ;
                  echo " <a title=' Open Image Full Size ' href='$g' > <img src='$g' /> </a> ";
                }
                echo "<p>";
                echo sec_outpt( trim($v_pic_row['fkid'] )) ;
                echo "</p>";
              echo "</fieldset>";
            echo "</div>";
            }
          }
        */
        ?>
       
<?php // ##################################### end function codes         ?>
       
       




<?php
  // ######## how to organize your website
    // # after you create folder call includes this will be includes:
        // include_once("../includes/connection.php");
        // include_once("../includes/functions.php");
        // include_once("header.php");

?>
 
<?php function validate_inpt( $v="", $required =""){

     
    // global $connection;
    $v = stripslashes(trim($v)); $v = trim(($v));
    // $v =(string)trim(strip_tags( nl2br( $v )));
    $v =$v;
    $v = stripslashes($v);
    $v = trim( str_replace( "--","  -  - ", str_replace( "---","--", $v ) ) ) ;
    $v = str_replace("..","  .  .  ", str_replace("(","   ( ", $v ) ) ;
    $v = trim(addslashes($v));
    $v =$v;
    if( $required !="" ){ if( (int)strlen($v) >= (int) $required ){ $v =$v; $v = isset( $v ) && ! empty( $v ) ? trim(addslashes( $v )): die('Required'); } else { die(" Input $v length Required Minimum ". $required." character "); }}
    // $v = @$connection&&@$v?(string) mysqli_real_escape_string( $connection , $v ) :$v;
   
    $v =$v;
  return $v ;
}
// ex: // $add_cname_variable = @$_POST['thecname']? secure_inputs_oa( $_POST['thecname'],2) : die("Name Required") ;
 
?>
<?php

// 
function input_security_url_recive( $v=""){  return 1;   }   
//  function input_security_url_recive( $v=""){ if( isset( $_GET[$v] ) && isset( $_GET[$v.'H'] ) && $_GET[$v.'H']==md5($_GET[$v]) ){ return 1; }else{ return 0; die(' NoSuchResult[ErrorS1] '); } } 

?>

<?php function input_security_url_send( $vr="" , $vl="" ){ if($vr !=""&&$vl!==""){ return "$vr=". ( $vl )."" ; }else { return '';} } ?>










<?php // ============================-------------------[end database functions]-------------------============================ ?>






<?php // ============================-------------------[start database functions]-------------------============================ ?>
