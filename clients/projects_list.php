<?php $file_load_name = "load_all_includes_header.php";
file_exists($file_load_name) ? @include_once(@$file_load_name) : exit("Not found file: " . $file_load_name); ?>
<?php // if(!isset( $_SESSION['session_name_user_client'] ) ){ exit('<meta http-equiv="Refresh" content="0;url=login.php">');  }  
?>
<?php // @file_exists("load_all_includes_header.php")? include_once("load_all_includes_header.php"):"";
$this_crud_file_name =   "projects_list"  .  ".php"; // change the index name
$this_page_start_link = $this_crud_file_name . "?";
$pagesearch = $this_crud_file_name . "?Co=true";
$query = "";
$increased_num = "";

if (!@$userID) {
    echo "<a href='login'>قم بتسجيل الدخول لعرض المزيد </a>";
}
// if( isset( $_GET['Co'] ) ){

$q = "";
$uid = @$_REQUEST['u_id'];
$uid = @$uid ? $uid : "";
$query  = "";
if (isset($uid) && !empty($uid) && @$uid != "") {

    $query  = "SELECT * FROM projects_tb";
    $query .= " WHERE ";
    $query .= " user_id='$uid' ";
    $query .= " AND ";
    $query .= " proj_status='Public' ";
    echo "<h3>";
    echo "عرض كل المشاريع ";
    echo " العامة ";
    echo " ل ";
    echo " @";
    echo secure_outputs_oa($get_user_info->get_user_name_by_id($uid));
    echo "</h3>";
} else
   if ((isset($_REQUEST['proj_class']) && @$_REQUEST['proj_class'] != "") || (isset($_REQUEST['input_search_']) && @$_REQUEST['input_search_'] != "")) {
    $input_search = isset($_REQUEST['proj_class'])?(string) trim(addslashes(strip_tags($_REQUEST['proj_class']))):"";
    $input_search = $input_search?$input_search:(string) trim(addslashes(strip_tags($_REQUEST['input_search_'])));
    $query .= "SELECT * FROM projects_tb";
    $query .= " WHERE ";
    $query .= " proj_class ='" . $input_search . "'";
    $query .= " OR ";
    $query .= " proj_class LIKE'%" . $input_search . "%'";
    $query .= "  ";
    $query .= strlen($input_search) > 11 ? " OR proj_class LIKE'%" . substr($input_search, 0, 10) . "%'" : "";
	if( isset($_REQUEST['input_search_'])){
    $query .= " OR ";
    $query .= " name LIKE'%" . $input_search . "%'";
    $query .= " OR ";
    $query .= " description LIKE'%" . $input_search . "%'";
	}
    echo "<br>";
    echo "<center>";
	echo "<h2>";
    echo "عرض كل المشاريع ";
    echo " العامة ";
    echo " ل ";
    echo "  ";
    echo $input_search;
    echo "</h2>";
    echo "</center>";
} else
   if (isset($_REQUEST['view_id']) && !empty($_REQUEST['view_id']) && $_REQUEST['view_id'] != "") {
    $input_view_id = (int)intval($_REQUEST['view_id']);
    $query .= "SELECT * FROM projects_tb";
    $query .= " WHERE ";
    $query .= " id ='" . $input_view_id . "'";
    $query .= " LIMIT 1 ";
} else {
    $query .= "SELECT * FROM projects_tb";
}


$record_result = $database->query($query);
if (!$record_result) {
    die("Database query failed" . mysqli_error());
}

$q_num = $database->num_rows($record_result);
?>
<h4> مرحبا
    <?php echo @$_SESSION['session_name_user_client'];  ?> في عرض كل المشاريع
</h4>
<?php
echo @$q_num ? $q_num . " العثور على نتائج. " : "";

?>
<center>
     <div class="container">
        <input type="text" id="myFilterList_oa_eInput" onkeyup="myFilterList_oa_eFunction()" placeholder="ابحث عن .." title="Type in a name">
        <br />
        <ul id="myFilterList_oa_eUL">
            <?php
            while ($record_row = $database->fetch_array($record_result)) {
                $src_image_db = view_src_project_image($record_row[0]);
                $project_statues = $record_row['proj_status'];
                $project_statues_activation = false;
                $project_name = $record_row['name'];
                include "../control/project_list_auth.php";
                if ($project_statues_activation === true) :
            ?>
                    <br>
                    <li>
                        <br>
                        <a style="text-align:left; padding:15px;" href="projects_details?view_id=<?php echo secure_outputs_oa($record_row['id']); ?>">
                            <i><img class="user_list_img" src="<?php echo get_user_photo_by_id($record_row['user_id']); ?>" width="30" height="30" />
                                <b style="color:blue;"><?php echo @$get_user_info ? secure_outputs_oa($get_user_info->get_user_name_by_id($record_row['user_id'])) : "@username"; ?></b> 
                            </i>
							&nbsp;&nbsp;&nbsp;
							<small style=" color:#333; background:white;"> <?php echo @$staues_of_project; ?></small>
                            
							<br>
                            <small style="float:right; color:lightblue;"> نشر في
                                <?php echo secure_outputs_oa($record_row['published_date']); ?>
                                <i style="float:right; color:#ccc;">
                                    <?php echo $record_row['date_last_update'] ? " updated " . secure_outputs_oa($record_row['date_last_update']) : ""; ?>
                                </i>
                            </small>
                            <span style="float:left; padding:5px;">
                                <?php echo " <img class='border1' src='" . $src_image_db . "' width='280' height='160' alt=' UPLOAD New ' />";  ?>
                            </span>
                            <h4>
                                <?php echo secure_outputs_oa($record_row['name']); ?>
                            </h4>
                            <p style="  margin-left:15px;">&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php echo secure_outputs_oa(@substr($record_row['description'], 0, 100) . "..."); ?> <u style=" color:blue; border-radius:22px;">المزيد</u>
                            </p>
								<br>
           &nbsp;&nbsp;&nbsp;&nbsp;
                            <form  style=" float:left;" action="projects_list.php?Co=1&proj_class=<?php echo urlencode(@$record_row['proj_class']); ?>">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                <button class=" " style="background:white; color:blue; border-radius:22px;" name="proj_class" value="<?php echo secure_outputs_oa(@$record_row['proj_class']); ?>"> 🏷️ &nbsp; 
                                    <?php echo secure_outputs_oa(@$record_row['proj_class']); ?>
                                </button>
                            </form>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
							<form  style=" float:left;" action="projects_list.php?Co=1&proj_class=<?php echo urlencode(@$record_row['cat_id']); ?>">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                <button  class=" " style="background:white; color:blue; border-radius:22px;" name="proj_class" value="<?php echo secure_outputs_oa(@$record_row['cat_id']); ?>"> #<?php echo secure_outputs_oa(@$record_row['cat_id']); ?>
                                </button>
                            </form>						
						<br> 
						<br> 
                         
							     &nbsp;<small style="color:gray;">&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    🌐 &nbsp;
                                    <?php echo secure_outputs_oa($record_row['proj_status']); ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php
										echo "&nbsp;&nbsp;&nbsp;&nbsp;  ";
										echo " مشاهدات ";
										echo "" . secure_outputs_oa($record_row['logo_img']);
										echo "&nbsp;&nbsp;&nbsp;&nbsp;  ";
										echo " التحميلات ";
										echo "" . secure_outputs_oa($record_row['downloads_num']);
										echo "&nbsp;&nbsp;&nbsp;&nbsp;  ";
									?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                </small>
                                
								<br>
                           <br>
                        </a>
                    </li>
            <?php

                endif;
            }
 
            ?>
        </ul>
    </div>
</center>

<br>
<?php $file_load_name_footer = "load_all_includes_footer.php";
file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Not found file: " . $file_load_name_footer); ?>