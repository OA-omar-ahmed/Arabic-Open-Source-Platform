\<?php isset($_SESSION) ? "" : @session_start();
$file_load_name = "load_all_includes_header.php";
file_exists($file_load_name) ? @include_once(@$file_load_name) : exit("Not found file: " . $file_load_name); ?>
<?php  // if(!isset( $_SESSION['session_name_user_client'] ) ){ exit('<meta http-equiv="Refresh" content="0;url=login.php">');  }  

// ######## chang this file name: ex: index.php
$this_crud_file_name =   "user_setting"  .  ".php"; // change the index name
$this_page_start_link = $this_crud_file_name . "?";
$query = "";
$increased_num = $query = "";
?>

<?php
// Delete
// request to delete
if (isset($_GET['id_to_del'])) {
	$id_to_delete_variable = mysqli_real_escape_string($connection, $_GET['id_to_del']);

    $query = "DELETE FROM users_tb WHERE id='$id_to_delete_variable' ";
    $result_del = mysqli_query($connection, $query);
    if ($result_del) {
        // success // Successfully // Successfully
        echo "Removed  "; echo "&check; نجاح  <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , تكرار العملية </a> - <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-2)){window.history.go(-2);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , Main  </a>. Thank You. "; 
    } else {
        // fail
        // Error to Add

        echo "Error to Delete " . mysqli_error();
    }

    echo "<a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , Go Back</a>";
    echo " - <a href='?Co'> Home </a>";
    echo " - <a href='" . @$this_page_start_link . "Co&Ad=1'> &plus; View & Add New </a>";
    echo " <a href='" . $this_page_start_link . "Co=true'> View All Records </a>";
    exit;
}
?>




<?php $pagesearch = $this_crud_file_name . "?Co=true"; ?>

<?php
// Start inserts

if (isset($_GET['Ad'])) {
?>

    <?php
    // Creat


    if (isset($_POST['input_submit'])) {

        $input_name = secure_inputs_oa($_POST['input_name']);
        $input_email = secure_inputs_oa($_POST['input_email']);
			$q = "SELECT * FROM users_tb  ";
			$q .= " WHERE  ";
			$q .= " email='$input_email' ";
			$q .= "  ";
			$result_show_existed_users = $database->query($q);
			if (!$result_show_existed_users) {
				die("Database query failed" . mysqli_error());
			} 
			$row_existed_user = mysqli_fetch_assoc($result_show_existed_users);

			 if (@$row_existed_user['name'] != "") {
						echo "<br>";
						echo "<br>";
						echo "<h1>";
						echo "Current Email Already exists";
						echo "</h1>";
						die;
			 }
       //  $input_user_password = secure_inputs_oa( md5($_POST['input_user_password']));
        $input_user_name = secure_inputs_oa($_POST['input_user_name']);
        $input_type_user = secure_inputs_oa($_POST['input_type_user']);
        $input_description_profile = secure_inputs_oa($_POST['input_description_profile']);
        $input_account_setting = secure_inputs_oa($_POST['input_account_setting']);
		
		$input_email = @$_POST['input_email'] ? secure_inputs_oa($_POST['input_email']) : die("Email required");
        $input_user_password = @$_POST['input_user_password'] ?  (($_POST['input_user_password'])) : "";
        $input_user_password = @$input_user_password? (md5($input_user_password)) : "";
        $query = "INSERT INTO users_tb ( name, email, user_password, user_name, type_user, description_profile, account_setting ) VALUES ( '$input_name','$input_email','$input_user_password','$input_user_name','$input_type_user','$input_description_profile','$input_account_setting')";

        if ($database->query($query)) {
            // success
            echo "Added "; echo "&check; نجاح  <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , تكرار العملية </a> - <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-2)){window.history.go(-2);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , Main  </a>. Thank You. ";
            echo "<br>";
            
            echo "<hr>";
        } else {
            // fail
            // Error to Add

            echo "Error to Add " . mysqli_error();
        }
        echo ('<meta http-equiv="Refresh" content="0;url=user_setting.php?Co=1">');
        echo "<a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\"> * ↩ Ok , Go Back</a>";
        echo " - <a href='?Co'> Home </a>";
        echo " - <a href='" . @$this_page_start_link . "Co&Ad=1'> &plus; View & Add New </a>";
        exit;
    }
    ?>
        <form name="form3a" action="<?php echo $this_page_start_link; ?>&Ad=true" method="post">
   
            
           <?php include_once "../views/forms/form_user.php"; ?>

                    <input name="input_submit" type="submit" value="INSERT" />
        </form>

<?php exit; }
//End inserts
?>



<?php /*start the update process */
if (isset($_GET['id_to_edit'])) {

    $id_to_edit_variable = secure_inputs_oa($_GET['id_to_edit']);
?>
    <?php
    /* Update
request to edit information */
    if (isset($_POST['input_update'])) {

        $input_id = @$_POST['input_id'] ? secure_inputs_oa($_POST['input_id']) : "";
        $input_name = @$_POST['input_name'] ? secure_inputs_oa($_POST['input_name']) : "";
        $input_email = @$_POST['input_email'] ? secure_inputs_oa($_POST['input_email']) : "";
        $input_user_password = @$_POST['input_user_password'] ?  (($_POST['input_user_password'])) : "";
        $input_user_password = @$input_user_password? (md5($input_user_password)) : "";
        $input_user_name = @$_POST['input_user_name'] ? secure_inputs_oa($_POST['input_user_name']) : "";
        $input_type_user = @$_POST['input_type_user'] ? secure_inputs_oa($_POST['input_type_user']) : "";
        $input_description_profile = @$_POST['input_description_profile'] ? secure_inputs_oa($_POST['input_description_profile']) : "";
        $input_account_setting = @$_POST['input_account_setting'] ? secure_inputs_oa($_POST['input_account_setting']) : "";


        $query_edit = "UPDATE users_tb SET

name = '$input_name',";
$query_edit  .= " email = '$input_email',";
$query_edit  .= $input_user_password?" user_password = '$input_user_password',":"";
$query_edit  .= " user_name = '$input_user_name',";
$query_edit  .= " type_user = '$input_type_user',
description_profile = '$input_description_profile',
account_setting = '$input_account_setting'
WHERE id ='$id_to_edit_variable'
";
        $result_edit = $database->query($query_edit);
        if ($result_edit) {
            echo "Updated &check; نجاح  <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , تكرار العملية </a> - <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-2)){window.history.go(-2);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , Main  </a>. Thanks. " . " ";
            echo "<br>";

            echo ('<meta http-equiv="Refresh" content="0;url=user_setting.php?Co=1">');
            echo "<hr>";
        } else {

            echo "Error to Updated " . mysqli_error();
        }

        echo " <a href='" . $this_page_start_link . "view_id=" . @$id_to_edit_variable . "&Co=true'> * View Updated Results </a> ";
        echo " - <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , Go Back</a>";
        echo "<a href='" . $this_page_start_link . "Co=true'>View All </a>";
        echo " - <a href='?Co'> Home </a>";
        exit;
    }
    ?>

    <?php
    // show the wanted thing that you want to change
    $result_show_by_id = $database->query("SELECT * FROM users_tb WHERE id='$id_to_edit_variable' ");
    if (!$result_show_by_id) {
        die("Database query failed" . mysqli_error());
    }

    $row_to_be_changed = mysqli_fetch_assoc($result_show_by_id);


        $key_img = "imgN_" . "users_tb_rec_record__" . $row_to_be_changed['id'];
         $src_image_db = get_user_photo_by_id($row_to_be_changed['id']);

        $edit_user_photo = "";
		$edit_user_photo .=  "<a href='" . "img.php?" . "Co=true&Ad=1&id_to_ad=" . @$key_img . "&input_img_search=" . @$key_img . "' >";
        $edit_user_photo =  " <img src='" . $src_image_db . "' width='100' height='100' class=\"personal-photo\" alt=' UPLOAD New ' />";
        $edit_user_photo =  " تعديل ";
        $edit_user_photo =  " صورتي الشخصية";
        $edit_user_photo =  "</a>";
		
    
    ?>

    <center class="container">
        <h2>تعديل البيانات</h2>
        <form name="form2" action="<?php echo $this_page_start_link . 'id_to_edit=';
                                    echo $valId = isset($_GET['id_to_edit']) ? $_GET['id_to_edit'] : ''; ?>" method="post">

            <input name="input_id" type="hidden" required="required" value="<?php if (isset($row_to_be_changed['id'])) {
                                                                                echo secure_outputs_oa($row_to_be_changed['id']);
                                                                            } ?>" placeholder="Enter id ">
            <input name="input_type_user" type="hidden" required="required" value="<?php if (isset($row_to_be_changed['type_user'])) {
                                                                                        echo secure_outputs_oa($row_to_be_changed['type_user']);
                                                                                    } ?>" placeholder="Enter type_user ">
            
           <?php echo @$edit_user_photo ; ?><br>
           <?php include_once "../views/forms/form_user.php"; ?>

            <br>
            <input name="input_update" type="submit" value="تعديل" title="UPDATE" />
        </form>
    </center>


<?php
    echo "<a href='" . $this_page_start_link . "Co=true'>Go Back</a>";
} //end the update process
?>



<?php /*start the update pass process */
if (isset($_GET['id_to_edit_pass'])) {
   $id_to_edit_variable = secure_inputs_oa($_GET['id_to_edit_pass']);
   $result_show_by_id = $database->query("SELECT * FROM users_tb WHERE id='$id_to_edit_variable' ");
    if (!$result_show_by_id) {
        die("Database query failed" . mysqli_error());
    }

    $row_to_be_changed = mysqli_fetch_assoc($result_show_by_id);
	echo " <br><br><br> <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , Go Back</a>";
    if (isset($_POST['input_update'])) {
 
        $input_user_password_old = @$_POST['input_user_password'] ? md5(($_POST['input_user_password'])) : "";
        $input_user_password = @$_POST['new_input_user_password'] ?  (md5($_POST['new_input_user_password'])) : $input_user_password_old;
        $new_input_user_password_conf = @$_POST['new_input_user_password_conf'] ?  (md5($_POST['new_input_user_password_conf'])) : "";
			if($row_to_be_changed['user_password']==$input_user_password_old){
				echo "Current Password correct";
			} else {
				echo "<h1>";
				echo "Current Password Not correct";
				echo "</h1>";
				die;
				
			}
			if( isset($new_input_user_password_conf)&& !empty($new_input_user_password_conf)&&$new_input_user_password_conf==$input_user_password){
				echo "New  Passwords matches";
			} else {
				echo "<h1>";
				echo "New  Passwords Not matches";
				echo " ";
				echo "</h1>";
				die;
				
			}

        $query_edit = "UPDATE users_tb SET user_password = '$input_user_password' WHERE id ='$id_to_edit_variable' ";
        $result_edit = $database->query($query_edit);
        if ($result_edit) {
            echo "Updated &check; نجاح  <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , تكرار العملية </a> - <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-2)){window.history.go(-2);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , Main  </a>. Thanks. " . " ";
            echo "<br>";

            echo ('<meta http-equiv="Refresh" content="9;url=user_setting.php?Co=1">');
            echo "<hr>";
        } else {

            echo "Error to Updated " . mysqli_error();
        }

        echo " <a href='" . $this_page_start_link . "view_id=" . @$id_to_edit_variable . "&Co=true'> * View Updated Results </a> ";
        echo " - <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , Go Back</a>";
        echo "<a href='" . $this_page_start_link . "Co=true'>View All </a>";
        echo " - <a href='?Co'> Home </a>";
        exit;
    }
    ?>

    <?php
    // show the wanted thing that you want to change
    
 
    ?>

    <center class="container">
        <h2>تعديل  كلمة المرور البيانات</h2>
        <form name="form3" action="<?php echo $this_page_start_link . '&id_to_edit_pass='; echo  isset($_GET['id_to_edit_pass']) ? $_GET['id_to_edit_pass'] : ''; ?>" method="post">
 
           <?php include_once "../views/forms/edit_user_pass.php"; ?>

            <br>
            <input name="input_update" type="submit" value="تعديل " title="UPDATE" />
        </form>
    </center>


<?php
    echo "<a href='" . $this_page_start_link . "Co=true'>Go Back</a>";
} //end the update process
?>




<h1> اهلا بك يا 
    <?php echo @$_SESSION['session_name_user_client']; ?>
</h1>



<table style=" width:90%; " align=center>
    <tr style=" width:100%; ">
        <form id="form1" name="form1" method="post" action="<?php echo $pagesearch;
                                                            if (isset($_GET['cid'])) {
                                                                echo '&cid=' . urlencode($_GET['cid']);
                                                            }
                                                            echo '&cctxt=ee2'; ?>">
            <td style=" width:10%; ">
                <a href="<?php echo $this_page_start_link; ?>Ad=true"> اضف مستخدم &plus; </a>
                
            </td>
            <td style=" width:30%; ">
               <a href="<?php echo $this_page_start_link; ?>Co=1"> ادارة كل المستخدمين </a> |
                  <a href="<?php echo $this_page_start_link; ?>Co=true&view_id=<?php echo @$userID; ?>"> اعدادات حسابي
                </a> 
            </td>
            <td style=" width:60%; ">
                <input type="search" style=" width:100%; " required="required" name="input_search_" id="txt_search_id" placeholder=" بحث عن اشخاص  بالاسم... " style="border-radius: 8px; " />

            </td>
            <td style=" width:15%; ">
                <input type="submit" name="btn_search_" value="بحث" style="border-radius: 8px; background:#0078D4; color:#fff;" />
            </td>
        </form>
    </tr>
</table>



<?php
if (isset($_GET['Co'])) {

    $q = "";
    $uid = @$uid ? $uid : "";
    if (isset($uid) && @$uid != "") {

        $query .= "SELECT * FROM users_tb";
        $query .= " WHERE ";
        $query .= " id='$uid' ";
    } else
   if (isset($_REQUEST['view_id']) && !empty($_REQUEST['view_id']) && $_REQUEST['view_id'] != "") {
        $input_view_id = (int)intval($_REQUEST['view_id']);
        $query .= "SELECT * FROM users_tb";
        $query .= " WHERE ";
        $query .= " id ='" . $input_view_id . "'";
        $query .= " LIMIT 1 ";
    } else
   if (isset($_REQUEST['input_search']) && $_REQUEST['input_search'] != "") {
        $input_search = (string) trim(addslashes(strip_tags($_REQUEST['input_search'])));
        $query .= "SELECT * FROM users_tb";
        $query .= " WHERE ";
        $query .= " name LIKE'%" . $input_search . "%'";
    } else {
        $query .= "SELECT * FROM users_tb";
    }


    $record_result = $database->query($query);
    if (!$record_result) {
        die("Database query failed" . mysqli_error());
    }

    $q_num = $database->num_rows($record_result);
    echo @$q_num ? $q_num . " مستخدم . " : "";
    echo "<table class='responsivetest' align=center border=1 >";
    /* 
echo " "; echo " <td> # </td> ";
echo " <td> id </td> "; echo " <td> name </td> "; echo " <td> email </td> "; 
/// echo " <td> user_password </td> "; 
echo " <td> user_name </td> "; echo " <td> type_user </td> "; echo " <td> description_profile </td> "; echo " <td> account_setting </td> "; echo " ";
*/
    while ($record_row = $database->fetch_array($record_result)) {

        echo "<tr>";
        echo "<td>";
        $increased_num++;
		if($record_row['id']==$userID){
        echo "&gt;";
		}
			
        echo $increased_num;
        echo "</td>";

        echo "<td>";
        // echo "". secure_outputs_oa( $record_row[ 'id' ] ) ;
        echo "</td>";

        echo "<td>";

        // $dir_img= "uploads";
        $dir_img = "edu_uploads";
          
        $key_img = "imgN_" . "users_tb_rec_record__" . $record_row[0];
         $src_image_db = get_user_photo_by_id($record_row[0]);

        echo "<a href='" . "img.php?" . "Co=true&Ad=1&id_to_ad=" . @$key_img . "&input_img_search=" . @$key_img . "' >";
        echo " <img src='" . $src_image_db . "' width='100' height='100' class=\"personal-photo\" alt=' UPLOAD New ' />";
         echo "صوري";
        echo "</a>";
        echo "</td>";

        echo "<td>";
        echo "" . secure_outputs_oa($record_row['name']);
        echo "</td>";
 
		if($record_row['id']==$userID){

        echo "<td>";
        echo "<a href='?Co=1&view_id=" . secure_outputs_oa($record_row['id']) . "' >";
        echo secure_outputs_oa($record_row['email']);
        echo "</a>";
        echo "</td>";
         
			
        echo "<td>";
		echo "<a href='projects.php?Co=1&Ad=1' >";
        // echo secure_outputs_oa( $record_row[ 'email' ] ) ;
        echo "مشروع &plus; ";
        echo "</a>";
        echo "<br>";
        echo "<hr>";
		echo "<a href='projects_list.php?Co=1&u_id=" . secure_outputs_oa($record_row['id']) . "' >";
        // echo secure_outputs_oa( $record_row[ 'email' ] ) ;
        echo "كيف يرى الاخرون مشاريعي ";
        echo "</a>";
		}else{
			
        echo "<td>";
         
        echo "&nbsp;";
        echo "</td>";
        echo "<td>";
         
        echo "<a href='projects_list.php?Co=1&u_id=" . secure_outputs_oa($record_row['id']) . "' >";
        // echo secure_outputs_oa( $record_row[ 'email' ] ) ;
        echo "  ";
        echo " مشاريع    ";
        echo "  ";
        echo "   ومشاركة ";
         echo secure_outputs_oa( $record_row[ 'name' ] ) ;
        echo "   الفعالة  ";
        echo "  ";
        echo "</a>";
		}
        echo "</td>";


        // echo "<td>";
        // echo "". secure_outputs_oa( $record_row[ 'user_password' ] ) ;
        // echo "</td>";


        echo "<td>";
        echo "" . secure_outputs_oa($record_row['user_name']);
        echo "</td>";


        echo "<td>";
        echo "" . secure_outputs_oa($record_row['type_user']);
        echo "</td>";


        echo "<td>";
        echo "" . secure_outputs_oa($record_row['description_profile']);
        echo "</td>";


        echo "<td>";
        echo "" . secure_outputs_oa($record_row['account_setting']);
        echo "</td>";



        // control
      if( ! empty( $_GET['Co'] ) ){

        echo "<td>";
        echo "<a href='" . $this_page_start_link . "Co=true&id_to_edit=" . $record_row[0] . "&view_id=" . $record_row[0] . "' >";
        echo " تعديل ";
        echo "</a>";
        echo "</td>";

        echo "<td>";
        echo "<a href='" . $this_page_start_link . "Co=true&id_to_edit_pass=" . $record_row[0] . "&view_id=" . $record_row[0] . "' >";
        echo " تعديل كلمة المرور ";
        echo "</a>";
        echo "</td>";

        echo "<td> ";
        echo "<a href='" . $this_page_start_link . "Co=true&id_to_del=" . $record_row[0] . "' >";
        echo " حذف ";
        echo "</a>";

        echo "</td>";
        }
        echo "</tr>";
        // echo "<hr>";
    }
    // echo "</tr>";
    echo "</table>";
}
?>






<?php /* (C)Omar Ahmed 2019-2021*/ ?>


<?php
/*
			# (c)OmarAhmed2021
			# Page Content Here
		*/
?>










<?php $file_load_name_footer = "load_all_includes_footer.php";
file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Not found file: " . $file_load_name_footer); ?>