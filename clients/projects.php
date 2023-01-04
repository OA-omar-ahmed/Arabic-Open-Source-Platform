<?php $file_load_name = "load_all_includes_header.php";
file_exists($file_load_name) ? @include_once(@$file_load_name) : exit("Not found file: " . $file_load_name); ?>
<?php
if (!isset($_SESSION['session_name_user_client'])) {
  exit('<meta http-equiv="Refresh" content="0;url=login.php">');
}
@file_exists("load_all_includes_header.php") ? include_once("load_all_includes_header.php") : "";
$this_crud_file_name =   "projects"  .  ".php"; // change the index name
$this_page_start_link = $this_crud_file_name . "?";
$pagesearch = $this_crud_file_name . "?Co=true";
$query = "";
$increased_num = "";
// Delete // request to delete
if (isset($_GET['id_to_del']) && isset($userID) && !empty($_GET['id_to_del']) && !empty($userID)) {
  $id_to_delete_variable = mysqli_real_escape_string($connection, $_GET['id_to_del']);
  $query = "DELETE FROM projects_tb WHERE id='$id_to_delete_variable' ";
  $query .= " AND user_id='" . $userID . "' ";
  $result_del = mysqli_query($connection, $query);
  if ($result_del) {
    // success
    echo "Removed Successfully ";
    exit('<meta http-equiv="Refresh" content="0;url=projects.php">');
  } else {
    // fail  // Error to Add 
    echo "Error to Delete " . mysqli_error();
  }
  echo "<a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , Go Back</a>";
  echo " - <a href='?Co'> Home </a>";
  echo " - <a href='" . @$this_page_start_link . "Co&Ad=1'> &plus; View & Add New </a>";
  echo " <a href='" . $this_page_start_link . "Co=true'> View All Records </a>";
  exit;
}

// Start inserts 
if (isset($_GET['Ad'])) {
  // Creat
  if (isset($_POST['input_submit']) && isset($userID)) {

    $input_logo_img = secure_inputs_oa($_POST['input_logo_img']);
    $input_proj_class = secure_inputs_oa($_POST['input_proj_class']);
    $input_user_id = secure_inputs_oa($_POST['input_user_id']);
    $input_name = secure_inputs_oa($_POST['input_name']);
    $input_description = secure_inputs_oa($_POST['input_description']);
    $input_published_date = secure_inputs_oa($_POST['input_published_date']);
    $input_date_last_update = secure_inputs_oa($_POST['input_date_last_update']);
    $input_proj_status = secure_inputs_oa($_POST['input_proj_status']);
    $input_version_num = secure_inputs_oa($_POST['input_version_num']);
    $input_cat_id = secure_inputs_oa($_POST['input_cat_id']);
    $input_downloads_num = secure_inputs_oa($_POST['input_downloads_num']);

    $query = "INSERT INTO projects_tb ( logo_img, proj_class, user_id, name, description, published_date, date_last_update, proj_status, version_num, cat_id, downloads_num ) VALUES ( '$input_logo_img','$input_proj_class','$input_user_id','$input_name','$input_description','$input_published_date','$input_date_last_update','$input_proj_status','$input_version_num','$input_cat_id','$input_downloads_num')";

    if ($database->query($query)) {
      // success
      echo "Added Successfully. Thank You. ";

      echo "<hr>";
    } else {
      // fail
      // Error to Add

      echo "Error to Add " . mysqli_error();
    }
    echo ('<meta http-equiv="Refresh" content="0;url=projects.php?Co=1">');
    echo "<a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\"> * ↩ Ok , Go Back</a>";
    echo " - <a href='?Co'> Home </a>";
    echo " - <a href='" . @$this_page_start_link . "Co&Ad=1'> &plus; View & Add New </a>";
    exit;
  }
?>
  <table align="center" class="container">
    <form name="form3a" action="<?php echo $this_page_start_link; ?>Ad=true" method="post">
      <input name="input_user_id" type="hidden" value="<?php echo $userID; ?>" placeholder="user_id " title="user_id " />
      <input name="input_published_date" type="hidden" value="<?php echo date(" d/m/Y H:i"); ?>" placeholder="published_date " title="published_date " />
      <input name="input_date_last_update" type="hidden" value="-" placeholder="date_last_update " title="date_last_update " />
      <input name="input_downloads_num" type="hidden" value="عدد التحميلات 0" placeholder="downloads_num " title="downloads_num " />
      <input name="input_proj_class" type="hidden" value="Open Source - PHP" placeholder="proj_class " title="proj_class " />
      <input name="input_logo_img" type="hidden" value="عدد المشاهدات 1" placeholder="logo_img " title="logo_img " />

      <tr>
        <td> اسم المشروع </td>
        <td>
          <input name="input_name" type="search" required="required" value="" placeholder="العنوان " title="name " />
        </td>
      </tr>
      <tr>
        <td> الوصف </td>
        <td> <input name="input_description" type="search" value="" placeholder="الوصف " title="description " />
        </td>
      </tr>

      <tr>
        <td> من يستطيع رؤية مشروعك </td>
        <td>
          <select name="input_proj_status">
            <option value="Public">العامة - Public </option>
            <option value="Private">مسجلين الدخول - Private (Only Logged in)</option>
            <option value="only_me">انا فقط - Only Me</option>

          </select>
        </td>
      </tr>
      <tr>
        <td> القسم </td>
        <td>

          <select name="input_cat_id">
            <option value="Open Source Programming Projects">مصادر برمجية مفتوحة المصدر</option>
            <option value="Arabic Programming Language Recources">مصادر للغه برمجية عربية </option>
            <option value="Lessons">شروحات </option>
            <option value="Others">مصادر تعليمية اخرى </option>
          </select>
        </td>
      </tr>

      <tr>
        <td> رقم الاصدار </td>
        <td> <input name="input_version_num" type="search" value="1.1" placeholder="version_num " title="version_num " />
        </td>
      </tr>


      <tr>
        <td colspan=2>
          <input name="input_submit" type="submit" value="انشاء المشروع" />

    </form>
    </td>
    </tr>
  </table>


<?php }
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
    $input_logo_img = @$_POST['input_logo_img'] ? secure_inputs_oa($_POST['input_logo_img']) : "";
    $input_proj_class = @$_POST['input_proj_class'] ? secure_inputs_oa($_POST['input_proj_class']) : "";
    $input_user_id = @$_POST['input_user_id'] ? secure_inputs_oa($_POST['input_user_id']) : "";
    $input_name = @$_POST['input_name'] ? secure_inputs_oa($_POST['input_name']) : "";
    $input_description = @$_POST['input_description'] ? secure_inputs_oa($_POST['input_description']) : "";
    $input_published_date = @$_POST['input_published_date'] ? secure_inputs_oa($_POST['input_published_date']) : "";
    $input_date_last_update = @$_POST['input_date_last_update'] ? secure_inputs_oa($_POST['input_date_last_update']) : "";
    $input_proj_status = @$_POST['input_proj_status'] ? secure_inputs_oa($_POST['input_proj_status']) : "";
    $input_version_num = @$_POST['input_version_num'] ? secure_inputs_oa($_POST['input_version_num']) : "";
    $input_cat_id = @$_POST['input_cat_id'] ? secure_inputs_oa($_POST['input_cat_id']) : "";
    $input_downloads_num = @$_POST['input_downloads_num'] ? secure_inputs_oa($_POST['input_downloads_num']) : "";


    $query_edit = "UPDATE projects_tb SET
	logo_img = '$input_logo_img',
	proj_class = '$input_proj_class',
	user_id = '$input_user_id',
	name = '$input_name',
	description = '$input_description',
	published_date = '$input_published_date',
	date_last_update = '$input_date_last_update',
	proj_status = '$input_proj_status',
	version_num = '$input_version_num',
	cat_id = '$input_cat_id',
	downloads_num = '$input_downloads_num'
	WHERE id ='$id_to_edit_variable' ";
    $result_edit = $database->query($query_edit);
    if ($result_edit) {
      echo "Updated Successfully. Thanks. " . " ";
      echo "<br>";
      echo " id : $input_id ";
      echo " logo_img : $input_logo_img ";
      echo " proj_class : $input_proj_class ";
      echo " user_id : $input_user_id ";
      echo " name : $input_name ";
      echo " description : $input_description ";
      echo " published_date : $input_published_date ";
      echo " date_last_update : $input_date_last_update ";
      echo " proj_status : $input_proj_status ";
      echo " version_num : $input_version_num ";
      echo " cat_id : $input_cat_id ";
      echo " downloads_num : $input_downloads_num ";
      echo "<hr>";
    } else {
      echo "Error to Updated " . mysqli_error();
    }
    echo ('<meta http-equiv="Refresh" content="0;url=projects.php?Co=1&view_id=' . $input_id . '">');
    echo " <a href='" . $this_page_start_link . "view_id=" . @$id_to_edit_variable . "&Co=true'> * View Updated Results </a> ";
    echo " - <a class=\"go-back\" href=\"javascript:void(0);\" onclick=\"if(window.history.go(-1)){window.history.go(-1);}else{this.style.display='none';}\" title=\" Back - ↩⇐⇦ عودة\">↩ Ok , Go Back</a>";
    echo "<a href='" . $this_page_start_link . "Co=true'>View All </a>";
    echo " - <a href='?Co'> Home </a>";
    exit;
  }
  ?>

  <?php
  // show the wanted thing that you want to change
  $result_show_by_id = $database->query("SELECT * FROM projects_tb WHERE id='$id_to_edit_variable' ");
  if (!$result_show_by_id) {
    die("Database query failed" . mysqli_error());
  }
  $row_to_be_changed = mysqli_fetch_assoc($result_show_by_id);
  $lnk = "";
  $valId = isset($_GET['id_to_edit']) ? $_GET['id_to_edit'] : '';
  $lnk .= $this_page_start_link . 'id_to_edit=';
  $lnk .= $valId;
  $lnk .= "&";
  $lnk .= "idSec=" . intval($valId) . "";
  $lnk .= "&";
  $lnk .= "idSecH=";
  $lnk .= !empty($valId) ? md5($valId) : '';
  ?>
  <br>
  <br>
  <br>
  <table align="center" class="container">

    <tr>
      <td colspan=2>
        <form name="form1a" action="<?php echo $this_page_start_link . 'id_to_edit=';
                                    echo $valId = isset($_GET['id_to_edit']) ? $_GET['id_to_edit'] : '';
                                    echo "
        &";
                                    echo "idSec=" . intval($valId) . "";
                                    echo "&";
                                    echo "idSecH=";
                                    echo !empty($valId) ? md5($valId) : '';
                                    echo "";
                                    ?>" method="post">

          <input name="input_id" type="hidden" required="required" value="<?php if (isset($row_to_be_changed['id'])) {
                                                                            echo secure_outputs_oa($row_to_be_changed['id']);
                                                                          } ?>" placeholder="Enter id ">
          <input name="input_logo_img" type="hidden" required="required" value="<?php if (isset($row_to_be_changed['logo_img'])) {
                                                                                  echo secure_outputs_oa($row_to_be_changed['logo_img']);
                                                                                } ?>" placeholder="Enter logo_img ">
          <input name="input_proj_class" type="hidden" required="required" value="<?php if (isset($row_to_be_changed['proj_class'])) {
                                                                                    echo secure_outputs_oa($row_to_be_changed['proj_class']);
                                                                                  } ?>" placeholder="Enter proj_class ">
          <input name="input_user_id" type="hidden" required="required" value="<?php if (isset($row_to_be_changed['user_id'])) {
                                                                                  echo secure_outputs_oa($row_to_be_changed['user_id']);
                                                                                } ?>" placeholder="Enter user_id ">
          <input name="input_published_date" type="hidden" required="required" value="<?php if (isset($row_to_be_changed['published_date'])) {
                                                                                        echo secure_outputs_oa($row_to_be_changed['published_date']);
                                                                                      } ?>" placeholder="Enter published_date ">

          <input name="input_date_last_update" type="hidden" required="required" value="<?php if (isset($row_to_be_changed['date_last_update'])) {
                                                                                          echo secure_outputs_oa($row_to_be_changed['date_last_update']);
                                                                                        } ?>" placeholder="Enter date_last_update ">

          <input name="input_version_num" type="hidden" required="required" value="<?php if (isset($row_to_be_changed['version_num'])) {
                                                                                      echo secure_outputs_oa($row_to_be_changed['version_num']);
                                                                                    } ?>" placeholder="Enter version_num ">

          <input name="input_downloads_num" type="hidden" required="required" value="<?php if (isset($row_to_be_changed['downloads_num'])) {
                                                                                        echo secure_outputs_oa($row_to_be_changed['downloads_num']);
                                                                                      } ?>" placeholder="Enter downloads_num ">
      </td>
    </tr>

    <tr>
      <td> اسم المشروع </td>
      <td>
        <input name="input_name" type="search" required="required" value="<?php if (isset($row_to_be_changed['name'])) {
                                                                            echo secure_outputs_oa($row_to_be_changed['name']);
                                                                          } ?>" placeholder="العنوان " title="name " />
      </td>
    </tr>
    <tr>
      <td> الوصف </td>
      <td> <textarea name="input_description" placeholder="الوصف " title="description "><?php if (isset($row_to_be_changed['description'])) {
                                                                                          echo secure_outputs_oa($row_to_be_changed['description']);
                                                                                        } ?></textarea>
      </td>
    </tr>

    <tr>
      <td> من يستطيع رؤية مشروعك </td>
      <td>
        <select name="input_proj_status">
          <option value="<?php if (isset($row_to_be_changed['proj_status'])) {
                            echo secure_outputs_oa($row_to_be_changed['proj_status']);
                          } ?>">
            <?php if (isset($row_to_be_changed['proj_status'])) {
              echo secure_outputs_oa($row_to_be_changed['proj_status']);
            } ?>
            &check;
          </option>
          <option value="Public">العامة - Public </option>
          <option value="Private">مسجلين الدخول - Private (Only Logged in)</option>
          <option value="only_me">انا فقط - Only Me</option>

        </select>
      </td>
    </tr>
    <tr>
      <td> القسم / المجال </td>
      <td>

        <select name="input_cat_id">
          <option value="<?php if (isset($row_to_be_changed['cat_id'])) {
                            echo secure_outputs_oa($row_to_be_changed['cat_id']);
                          } ?>">
            <?php if (isset($row_to_be_changed['cat_id'])) {
              echo secure_outputs_oa($row_to_be_changed['cat_id']);
            } ?>
            &check;
          </option>
          <option value="Open Source Programming Projects">مصادر برمجية مفتوحة المصدر</option>
          <option value="Arabic Programming Language Recources">مصادر للغه برمجية عربية </option>
          <option value="Lessons">شروحات </option>
          <option value="Others">مصادر تعليمية اخرى </option>
        </select>
      </td>
    </tr>

    <tr>
      <td colspan=2>

        <input name="input_update" type="submit" value="UPDATE" />

        </form>

      </td>
    </tr>
  </table>

<?php
  echo "<a href='" . $this_page_start_link . "Co=true'>Go Back</a>";
} //end the update process
?>









<?php $pagesearch = $this_crud_file_name . "?Co=true"; ?>
<?php
//  if( isset( $_GET['Co'] ) ){

$q = "";
$uid = @$userID ? $userID : "";
// if( isset( $uid ) && @$uid !="" ){

$query  = "SELECT * FROM projects_tb";
$query .= " WHERE ";
$query .= " user_id='$uid' ";
if (isset($_REQUEST['view_id']) && !empty($_REQUEST['view_id']) && $_REQUEST['view_id'] != "") {
  $input_view_id = (int)intval($_REQUEST['view_id']);
  $query .= " AND ";
  $query .= " id ='" . $input_view_id . "'";
  // $query .= " LIMIT 1 ";
  // $query .= " LIMIT 1 ";

} else
   if (isset($_POST['input_search']) && $_POST['input_search'] != "") {
  $input_search = (string) trim(addslashes(strip_tags($_POST['input_search'])));
  //$query .= "SELECT * FROM projects_tb";
  $query .= " AND ";
  $query .= " logo_img LIKE'%" . $input_search . "%'";
}
if (isset($_REQUEST['view_id']) && !empty($_REQUEST['view_id']) && $_REQUEST['view_id'] != "") {
  $query .= " LIMIT 1 ";
}

$record_result = $database->query($query);
if (!$record_result) {
  die("Database query failed" . mysqli_error());
}
$q_num = $database->num_rows($record_result);
?>

<br />


<table style=" width:100%; ">
  <tr style=" width:100%; ">
    <form id="form1" name="form1" method="post" action="<?php echo $pagesearch;
                                                        if (isset($_GET['cid'])) {
                                                          echo '&cid=' . urlencode($_GET['cid']);
                                                        }
                                                        echo '&cctxt=ee2'; ?>">
      <td style=" width:5%; ">
        <a href="<?php echo $this_page_start_link; ?>Ad=true&Co=1" title="Add"> اضافة &plus; </a>
      </td>
      <td style=" width:5%; ">
        <a href="<?php echo $this_page_start_link; ?>Ad=true&Co=1" title="View"> عرض <button>+ </button> </a>
      </td>
      <td style=" width:10%; ">
        <a href="<?php echo $this_page_start_link; ?>Co=true" title="Edit and Delete"> ادارة </a>

      </td>
      <td style=" width:60%; ">
        <input type="search" style=" width:100%; " required="required" name="input_search_" id="txt_search_id" placeholder=" search

" style="border-radius: 8px; " />

      </td>
      <td style=" width:15%; ">
        <input type="submit" name="btn_search_" value="GO" style="border-radius: 8px; background:#0078D4; color:#fff;" />
      </td>
    </form>
  </tr>
</table>
<?php
echo @$q_num ? $q_num . " مشروع. " : "";
echo "<table align=center border=0 >";
// echo " "; echo " <td> # </td> ";
while ($record_row = $database->fetch_array($record_result)) {
	$project_statues = $record_row['proj_status'];
    $project_statues_activation = false;
    $project_name = $record_row['name'];
                
  echo "<tr>";
  echo "<td>";
  $increased_num++;
  echo $increased_num;
  echo "</td>";

  echo "<td>";

  // $dir_img= "uploads";
  $dir_img = "edu_uploads";

  // images from db
  // $key_img = "imgNew_persona_ex_" .$record_row[0];
  $key_img = "imgN_" . "projects_tb_rec_record__" . $record_row[0];
  $src_image_db = view_file_src_by_id_from_tb_oa($key_img);
  echo "<a href='" . "img.php?" . "Co=true&Ad=1&id_to_ad=" . @$key_img . "&input_img_search=" . @$key_img . "' >";
  echo " <img src='" . $src_image_db . "' width='100' height='100' alt=' UPLOAD New ' />";
  // echo "images [+] ";
  echo "&plus;";
  echo "</a>";
  echo "</td>";

  echo "<td width='20%'>";
  echo "<a href=\"" . "projects_list.php?view_id=" . $record_row['id']  . "\">";
  echo "<b>";
  echo " " . secure_outputs_oa($record_row['name']);
  echo "</b>";
  echo "</a>";
   include "../control/project_list_auth.php";
    ?><small style=" color:#333; background:white;"> <?php echo @$staues_of_project; ?></small><?php
  $description_project = secure_outputs_oa($record_row['description']);
  echo "<p title=\"" . $description_project . "\">";
  echo $description_project && strlen($description_project) >= 100 ? substr($description_project, 0, 99) . "..." : $description_project;
  echo "</p>";
  echo "</td>";
  echo "<td>";
  $key_img = "fiN" . md5("projects_OSP_rec_record__" . $record_row[0]);
  $src_image_db = view_file_src_by_id_from_tb_oa($key_img);
  echo "<a title='  ارفاق  ملفات للمشروع ' class='btn' href='" . "img.php?" . "Co=true&Ad=1&id_to_ad=" . @$key_img . "&input_img_search=" . @$key_img . "' >";
  // echo " <img src='". $src_image_db . "' width='100' height='100' alt=' UPLOAD New ' />";
  // echo " <img src='". $src_image_db . "' width='100' height='100' alt=' UPLOAD New ' />";
  echo "&plus;";
  if (@$src_image_db) {
    echo strstr($src_image_db, ".png") || strstr($src_image_db, ".jpg") || strstr($src_image_db, ".jpeg") || strstr($src_image_db, ".gif") ? " &check; <img src='" . $src_image_db . "' width='20' height='20' alt=' File UPLOADED  ' />" : " &check; <img src='" . "../assets/images/folder.png" . "' width='40' height='40' alt=' Folder UPLOADED ' />";
    // echo "  ارفاق  ملفات للمشروع "."(1+)";
    echo "   المشروع " . "(1+)";
    // echo " يوجد ملف للمشروع "."(1+)";
    // echo "Open Source Project [+] "."(1+)";
  } else {
    echo "  ارفاق   المشروع " . "(0)";
  }

  echo "</a>";
  echo "</td>";
 
  echo "<td>";
  echo " Views number";
  echo "" . secure_outputs_oa($record_row['logo_img']);
  echo "</td>";


  echo "<td> ";
  echo " Downloads number";
  echo "" . secure_outputs_oa($record_row['downloads_num']);
  echo "</td>";


  echo "<td>";
  echo "" . secure_outputs_oa($record_row['proj_class']);
  echo "</td>";


  // echo "<td>"; echo "". secure_outputs_oa( $record_row[ 'user_id' ] ) ; echo "</td>";



  echo "<td>";
  echo "" . secure_outputs_oa($record_row['published_date']);
  echo "</td>";


  echo "<td>";
  echo "" . secure_outputs_oa($record_row['date_last_update']);
  echo "</td>";


  echo "<td>";
  echo "" . secure_outputs_oa($record_row['proj_status']);
  echo "</td>";


  echo "<td>";
  echo "" . secure_outputs_oa($record_row['version_num']);
  echo "</td>";


  echo "<td>";
  echo "" . secure_outputs_oa($record_row['cat_id']);
  echo "</td>";



  // control
  // if( ! empty( $_GET['Co'] ) ){

  echo "<td>";
  echo "<a href='" . $this_page_start_link . "Co=true&id_to_edit=" . $record_row[0] . "' >";
  echo " تعديل ";
  echo "</a>";
  echo "</td>";

  echo " <td> ";
  echo "<a href='" . $this_page_start_link . "Co=true&id_to_del=" . $record_row[0] . "' >";
  echo " حذف ";
  echo "</a>";

  echo "</td>";
  // }
  echo "</tr>";
  // echo "<hr>";
}
// echo "</tr>";
echo "</table>";
// }
?>

<?php $file_load_name_footer = "load_all_includes_footer.php";
file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Not found file: " . $file_load_name_footer); ?>