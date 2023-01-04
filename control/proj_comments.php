<?php 
$disable_form = $userID ? "" : "disabled";
?>

<?php
// Delete
// request to delete
if ($userID) {
	if (isset($_GET['id_comm3nt_to_del'])) {


		$id_to_delete_variable = mysqli_real_escape_string($connection, $_GET['id_comm3nt_to_del']);
		$id_to_delete_variable = (int)intval($id_to_delete_variable);
		if ($id_to_delete_variable) {
			$query = "DELETE FROM comments_tb WHERE id='$id_to_delete_variable' ";
			$result_del = mysqli_query($connection, $query);
			if ($result_del) {
				// success
				echo "<small></small> ";
				echo '<div class="alert success"><span class="closebtnalert">×</span><strong>تم  حذف التعليق!</strong></div>';
			} else {
				// fail
				// Error to Add

				echo "Error to Delete " . mysqli_error();
			}
		}
		 
	}
?>
	<?php
	?>
<?php
	// Creat


	if (isset($_POST['input_submit_comment'])) {

		$input_comment = secure_inputs_oa($_POST['input_comment']);
		$input_project_id = secure_inputs_oa($_POST['input_project_id']);
		$input_user_id = secure_inputs_oa($_POST['input_user_id']);
		$input_date = secure_inputs_oa($_POST['input_date']);

		$querya = "INSERT INTO comments_tb ( comment, project_id, user_id, date ) VALUES ( '$input_comment','$input_project_id','$input_user_id','$input_date')";

		if ($database->query($querya)) {
			// 
			echo "success inserted";
		} else {
			// fail
			// Error to Add
			echo "Error to Add " . mysqli_error();
		}
	 
	}
} // e if($userID
else {
	echo "<a href='login'>Login</a>";
	echo "<a href='login'>قم بتسجيل الدخول لاضافة تعليق والاستفادة من المصدر المفتوح</a>";
}
// projects_details_view_comments.php
 
$input_view_id = (int)intval($_REQUEST['view_id']);
$num_comments =  num_comments_by_project_id($input_view_id);
$record_result_comment =  query_comments_by_project_id($input_view_id);
?>
