
<?php
     // ///////////////////// S functions ( would be moved to functions.php page) /////////////////////################
?>
<?php

if(! function_exists("validate_inpt")){
function   validate_inpt( $v="", $required =""){
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
}
// ex: // $add_cname_variable = @$_POST['thecname']? sec_inpt( $_POST['thecname'],2) : die("Name Required") ;
// }

if(! function_exists("sec_inpt")){
  function sec_inpt( $v="", $required =""){
    if( $v !="" ){
    global $connection;
    $v = @$v && (strlen($v)>2) && (strlen($v)<50)? trim(addslashes( stripslashes( trim(strip_tags(nl2br($v))) ) )):$v; // used forusername & email clear
    $v = stripslashes( trim($v));
    // advance trimming // $v = trim(($v));
    // clean zeros // $v = isset( $v ) && ! empty( $v ) ? trim(addslashes( $v )): die('All Inputs Required');
    // Remove tags // $v =(string)trim(strip_tags( nl2br( $v )));
    $v = @$connection?(string) mysqli_real_escape_string( $connection , $v ) :(string) trim(addslashes( $v )) ;
   
    $v = @$required? validate_inpt( $v ): $v ;
    } else { $v =""; }
   
    $v =$v;
  return $v;
  }
 
 
  function sec_outpt( $v=""){
    if( @$v !="" ){
    $v =trim( $v ); // // $v = htmlspecialchars ( $v ); // $v = htmlspecialchars_decode ( $v );
    // $v =htmlentities( $v );
    $v = htmlentities( $v , ENT_COMPAT, 'UTF-8',false ); // $v = html_entity_decode ( $v );

    } else { $v =""; }
    $v =$v;
    return $v;
  }
 
    }
 
 
?>

<?php
    /* $id_to_delete_variable = $vDel && isset( $vDel )&&! empty($vDel)? mysqli_real_escape_string($connection, $vDel ) :"" ;
    if( $id_to_delete_variable!="" && $edit_sec_variable[$i]!="" && o3rAhmd_enc_algorithm( $id_to_delete_variable )==$edit_sec_variable[$i] ){ echo " Authorized "; $secConf="1"; } else { die( " Not Authorized " ); $secConf=""; } // security confirm
    if($id_to_delete_variable!="" && $secConf!="" ){ // authorized
    */
  function o3rAhmd_enc_algorithm( $s=""){
        return $s =$s?substr( str_replace("+",".", base64_encode( sha1( md5( "B1 .". $s. "Om@rAhm3d". $s )) ) ) ,0,22) :"";
  }
?> <?php
function sec_confirm_result( $v=""){ if( isset( $_GET[$v] ) && isset( $_GET[$v.'H'] ) &&$_GET[$v]!=""&&$_GET[$v.'H']!="" && $_GET[$v.'H']== o3rAhmd_enc_algorithm( $_GET[$v]) ){ return 1; }else{ die(' NoSuchResult[ErrorS1] '); return 0; } }  
?> <?php
function sec_confirm_data( $vr="" , $vl="" ){ if($vr !=""&&$vl!==""){ return "$vr=". ( $vl ).""."&". $vr."H=". o3rAhmd_enc_algorithm( $vl).""; }else { return '';} }
?>




<?php
// func o js posts

function o3r_ajax_posts() {
$r = @$_POST['request_name_that_gather_all_requests'] ? explode("O|0_0|O", @$_POST['request_name_that_gather_all_requests'] ): @$_POST ; $rr=array(); $snm =0; foreach( $r as $key => $value ) { if(@$_POST['request_name_that_gather_all_requests']!=""&&$snm==0){ $rr= @$_POST['request_name_that_gather_all_requests']? explode( "o3r", $value ) : array( $key , $value ) ; if($rr[0] )$_POST[ $rr[0] ] = @$rr[1]? ($rr[1]) : "" ; }else { $rr= @$_POST['request_name_that_gather_all_requests']? explode( "o3r", $value ) : array( $key , $value ) ; if($rr[0])$_POST[ $rr[0] ] = @$rr[1]? urldecode($rr[1]) : "" ; } $snm++; }
}
@$_POST['request_name_that_gather_all_requests'] ? o3r_ajax_posts():"";
?>

<?php
// db func
/*
// this will delete also files if col 1 is src
odelete_multi( "departments_categories_tb", "id" , "departments_categories.php" , "remove_records_media");
*/

/*

odelete_multi( "departments_categories_tb", "id" , "departments_categories.php" , "no_media");
*/


function odelete_multi( $table ="" , $id ="" , $confirmed_page ="" , $remove_its_media ="" ){
global $connection, $pre_pg;
$remove_its_media = "";
if( $remove_its_media == "remove_records_media" ){ $remove_its_media = "remove_records_media"; }else{ $remove_its_media = ""; }

$table = @$table?$table:"";
$id =@$id?$id:"";
// Delete
// request to delete
if( isset( $_POST['thmcid'] ) && $table!="" && $id!="" ){
$edit_cid_variable = @$_POST['thmcid'] ; // sec_inpt( $_POST['thecid']);
$edit_na_variable = @$_POST['thmname'] ;
$edit_sec_variable = @$_POST['thmsec'] ? @$_POST['thmsec']: die( " No Authority Code " );
$secConf="";
echo " <hr> ". print_r($edit_cid_variable) ; echo " <hr> " . print_r($edit_na_variable) ; echo " <hr> ". print_r($edit_sec_variable) . " <hr> ";
echo " <hr> <h4> Deleting ";
$all_files = count($edit_cid_variable);
echo " (".$all_files.") Element. <br> </h4>";
$file_namec="";
if( $all_files <= 1 ) {
$file_namec .= $edit_cid_variable[0] ;
echo $edit_cid_variablec = @$edit_cid_variable[0] ;
echo @$edit_na_variable[$edit_cid_variable[0]]. " ". @$edit_sec_variable[$edit_cid_variable[0]] ." Only 1 . <hr> ";
$vDel = @$edit_cid_variablec?intval(trim(str_replace("-" ,"",$edit_cid_variablec ))) :"";
$id_to_delete_variable = $vDel && isset( $vDel )&&! empty($vDel)? mysqli_real_escape_string($connection, $vDel ) :"" ;
$id_to_delete_variable = (int) intval( $id_to_delete_variable ) ;
// $id_to_delete_variable = $id_to_delete_variable ;
if( $id_to_delete_variable && @$edit_sec_variable[$edit_cid_variable[0]]!="" && ( o3rAhmd_enc_algorithm( $id_to_delete_variable . $confirmed_page )=== @$edit_sec_variable[$edit_cid_variable[0]] ) &&($id_to_delete_variable>0) ){ echo " Authorized. "; $secConf="1"; } else { die( " Not Authorized " ); $secConf=""; }
// security confirm
if($id_to_delete_variable!="" && $id_to_delete_variable!=0 && $secConf!="" &&($id_to_delete_variable>0) ){
$query = "DELETE FROM ".$table." WHERE ".$id."='$id_to_delete_variable' LIMIT 1 ";
$result_del = mysqli_query( $connection,$query);
if($result_del){
// success
echo "Removed (1) Successfuly
✅
<br> ";

}else{
// fail
// Error to Add

echo "Error to Delete ". mysqli_error();

}
}
} else {
// $edit_cid_variable =
//
sort( $edit_cid_variable ) ;
// print_r( $edit_cid_variable ) ; die;
$ic=1;
for ($i = 0; $i < $all_files ; $i++) {
$ic++;
// echo $file_namec .= strstr( '' . $edit_cid_variable[$i] .'' , $file_namec )? "" : $edit_cid_variable[$i] ;
//
//#// echo $edit_cid_variable[$i]."<br> ";
//
if( $edit_cid_variable[$i]!="-" && $edit_cid_variable[$i]!="" && $edit_cid_variable[$i]!=" "){
//$file_namec .= $edit_cid_variable[$i] ;
//
$vDel = @$edit_cid_variable[$i]?intval(trim(str_replace("-" ,"",$edit_cid_variable[$i] ))) :"";
$id_to_delete_variable = ($vDel && isset( $vDel )&&! empty($vDel))? mysqli_real_escape_string($connection, $vDel ) :"" ;
$id_to_delete_variable = (int) intval( $id_to_delete_variable ) ;
/* if( $id_to_delete_variable && @$edit_sec_variable[$edit_cid_variable[0]]!="" && ( o3rAhmd_enc_algorithm( $id_to_delete_variable . $confirmed_page )=== @$edit_sec_variable[$edit_cid_variable[0]] ) &&($id_to_delete_variable>0) ){ echo " Authorized. "; $secConf="1"; } else { die( " Not Authorized " ); $secConf=""; }
// security confirm
if($id_to_delete_variable!="" && $id_to_delete_variable!=0 && $secConf!="" &&($id_to_delete_variable>0) ){ */
if( $id_to_delete_variable!="" && $edit_sec_variable[$edit_cid_variable[$i]] !="" && ( o3rAhmd_enc_algorithm( $id_to_delete_variable . $confirmed_page )=== $edit_sec_variable[$edit_cid_variable[$i]] ) &&($id_to_delete_variable>0) ){ echo " Multi Authorization. -; "; $secConf="1"; } else { die( $id_to_delete_variable . " Not Authorized " ); $secConf=""; }

// security confirm

$id_exists = ""; $fimg_namea ="";
if($id_to_delete_variable!="" && $id_to_delete_variable!=0 && $secConf!="" &&($id_to_delete_variable>0) ){
// if($id_to_delete_variable!="" && $secConf!="" ){
// if($id_to_delete_variable!=""){
// $query = "DELETE FROM ".$table." WHERE ".$id."='$id_to_delete_variable' ";
$id_exists = ""; $fimg_namea ="";
$queryS = "SELECT * FROM ".$table." WHERE ".$id."='$id_to_delete_variable' ";
$result_delS = mysqli_query( $connection ,$queryS);
$result_delS_e = mysqli_fetch_array( $result_delS); // mysqli_fetch_array
if($result_delS_e ){
// success

// echo " file nameee (" . $result_delS_e[1] . ") file nameee";
$id_exists = 1;
$fimg_namea = $result_delS_e[1] ;
} if($id_exists===1 && $result_delS_e[0]==$id_to_delete_variable){
$query = "DELETE FROM ".$table." WHERE ".$id."='$id_to_delete_variable' LIMIT 1 ";
$result_del = mysqli_query( $connection ,$query);
if($result_del){
// $result_delS_e[0]
// success


// this del also used if the tb upload files . will delete them


if( $remove_its_media == "remove_records_media" ){
$result_delS_e[1]&&@file_exists( $result_delS_e[1])? unlink( $result_delS_e[1] ). "1":"" ;
}

// $fimg_namea?odel_img_upload( $fimg_namea ):"";

// echo " id ". $result_delS_e[0] . " - fileName ".$result_delS_e[1] ."<br> <br> ";
echo $id_to_delete_variable." Removed Successfuly ✅
<br> ";
}else{
// fail
// Error to Add
echo "Error to Delete ". mysqli_error();
} } else{ echo " Already deleted " ; }
}
$file_namec .= $vDel. " - ". $edit_na_variable[$edit_cid_variable[$i]]. " - ". $edit_sec_variable[$edit_cid_variable[$i]] ." <hr> ";
}
}
$id_to_delete_variable=""; echo "<fieldset>". $file_namec . "</fieldset>" ;
}
// die( " die $edit_cid_variablec " );
// sec_confirm_result('id_to_del') ;
echo "<a href='".$pre_pg."Co=true'>Go Back now </a>"; exit; die;
}
}
?>
     <?php
// files func

function o_accepted_file_type( $img_file_name = "" ){
     $res=array( "ext"=> "" , "accepted_type"=> "" ); $img_file_name = @$img_file_name ? str_replace("..",".",str_replace("...",".", str_replace("//","/",str_replace("///","/", @$img_file_name )) )) :"";
     if( isset($img_file_name ) && @$img_file_name!="" ){
         
$validextensions = array("jpeg", "jpg", "png", "gif", "pdf" );
$ext = explode('.', basename( $img_file_name ) );
$file_extension = end($ext);
// $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];
$res = ! @file_exists(@$img_file_name)? array( "ext"=> $ext[count($ext) - 1] , "accepted_type"=> in_array($file_extension,$validextensions) ) : array( "ext"=> "" , "accepted_type"=> "" );
     }
     return $res ;
}


function odel_img_upload( $img_file_name = "" ){
     $res=""; $img_file_name = @$img_file_name ? str_replace("..",".",str_replace("...",".", str_replace("//","/",str_replace("///","/", @$img_file_name )) )) :""; $file_ext_type = $img_file_name? o_accepted_file_type( $img_file_name ) : array( "ext"=> "" , "accepted_type" => "" ) ; $ext = $file_ext_type['ext'] ? $file_ext_type['ext'] : "" ; $accepted_file = $file_ext_type['accepted_type'] ? $file_ext_type['accepted_type']:"" ;
     if( isset($img_file_name ) && $accepted_file !="" && @$img_file_name!="" ){
          $res = @file_exists(@$img_file_name)?@unlink( @$img_file_name ). "1":"" ;
     }
     return $res ;
}

function oimg_upload( $img_file_post_name = "" ){ $target_path="";


if( $img_file_post_name!="" ){
$target_path = ".ouploads/";
if(is_dir($target_path)==false){
mkdir("$target_path", 0700);
}
$file_ext_type = $_FILES[ $img_file_post_name]['name']? o_accepted_file_type( @$_FILES[ $img_file_post_name]['name'] ) : array( "ext"=> "" , "accepted_type" => "" ) ; $ext = $file_ext_type['ext'] ? $file_ext_type['ext'] : "" ; $accepted_file = $file_ext_type['accepted_type'] ? $file_ext_type['accepted_type']:"" ;
/* $validextensions = array("jpeg", "jpg", "png", "gif", "pdf" );
$ext = explode('.', basename( $_FILES[ $img_file_post_name]['name'] ));
$file_extension = end($ext); */
$target_path = $target_path . md5(uniqid()) . "." . $ext;

// $target_path = $target_path . date('Y-m-d-h-i-s',time()) . "." . $ext[count($ext) - 1];
// Approx. 100kb files can be uploaded.
if (($_FILES[$img_file_post_name]["size"] < 9000000) && $accepted_file && $accepted_file !="" ){
     if(move_uploaded_file($_FILES[$img_file_post_name]['tmp_name'], $target_path)) {
echo '<span align="center" id="noerror">image uploaded successfully! . </span><br/><br/>'; echo "<p align='center'> <img src='$target_path' width='200px' height='200px'/></p><br/>"; $fimg_name =$target_path;
/* echo'<meta http-equiv="Refresh" content="4;url='. $fnam .'&imgn='. urlencode( $target_path ) .'">'; */
     } else {
echo '<span id="error">please try again! .</span><br/><br/>';
     }
   } else {
     echo '<span id="error">***Invalid file Size or Type***</span><br/><br/>';
   }

     }
     return $target_path ;
    
     }
/*
   //#####// query Insert submit for src
     $fimg_name = ( isset( $_POST['submitup'] ) )? img_upload( "f_pro_img" ) : "" ;
   //#####// Button file upload form with button $_POST['submitup']
     <tr> <td width="33%"> Upload New Image:</td> <td width="67%">
     <input class="btn-style1" style="width:100%; " type="file" name="f_pro_img" value="select image" size="80" required="required" />
     </td> </td> </tr>
<center> <fieldset style="width:80%; margin:40px auto; padding:5px; border:2px solid #ccc; color:gray; background:#f8f8f8; width:80%; " >


     </fieldset> <center>
    


   //#####// inside the while loop view image
       if( ! empty( $pic_row['srcfi'] ) ){
     $g= strip_tags( trim( $pic_row['srcfi'] ));
     echo "<p align='center'> <img src='$g' width='200px' height='200px'/> </p> "; }
   //####// delete link
     echo "<a title='DELETE' class='btn-style1 danger-hover ' href='". $pre_pg. "Co=true". "&". sec_confirm_data('id_to_del', $pic_row[0]). "&". sec_confirm_data('f_to_del', $pic_row[1] )."";
     // $pic_row['srcfi']
     echo "' >";
     echo " x Delete ";
     echo "</a>";
     //#####// felete process
     echo "Removed Successfuly ";
     if( isset( $_GET['f_to_del'] ) ){
     file_exists($_GET['f_to_del'])?unlink($_GET['f_to_del']):"No such related file" ;
     } */ ?>
    
    
    
<?php


// end functions ///////////////////////////////////
?>


    
<?php


function load_content_js_a($pre_pg=""){
	$o ="";
	$rnd="a".rand();
	$o .= "<a  id=\"".$rnd."\" href=\"".$pre_pg."&Co=1\" onclick=\"oAj5pre_fnWaL0adPg('".$pre_pg."&ohide=1', 'content_body_js' ); return false;\" title=\" View All (REFRESH) \">تحديث</a> &nbsp;";
	$o .=  "<script>document.getElementById('".$rnd."').onclick();</script>";
	return $o ;
}

function load_content_js_a_1line($pre_pg=""){
	$o ="";
	$rnd="a".rand();
 	$o .= "<a  id=\"".$rnd."\" href=\"".$pre_pg."&Co=1\" onclick=\"oAj5pre_fnWaL0adPg('".$pre_pg."&ohide=1', 'content_body_js".$rnd."' ); document.getElementById('content_body_js').innerHTML=document.getElementById('content_body_js').innerHTML+document.getElementById('content_body_js".$rnd."').innerHTML;  return false;\" title=\" View All (REFRESH) \">تحديث</a> &nbsp;";
//	$o .= "<a  id=\"".$rnd."\" href=\"".$pre_pg."&Co=1\" onclick=\"oAj5pre_fnWaL0adPg('".$pre_pg."&ohide=1', 'content_body_js".$rnd."' ); document.getElementById('content_body_js').innerHTML=document.getElementById('content_body_js').innerHTML+document.getElementById('content_body_js".$rnd."').innerHTML; return false;\" title=\" View All (REFRESH) \">تحديث</a> &nbsp;";
	 $o .=  "<script>document.getElementById('".$rnd."').onclick();</script>";
	return $o ;
}
/*
// //////////////////// ex
// ///////// ins
$id_ins = $database->insert_id();
 echo load_content_js_a($pre_pg."&Co=1&cid=".$id_ins);

 // /////////////// update
// echo load_content_js_a($pre_pg."&Co=1&cid=".$edit_id_variable);
 
 // ///////// del
 // echo load_content_js_a($pre_pg);


*/
?>


