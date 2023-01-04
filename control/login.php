
<?php
if (isset($_POST['input_email'], $_POST['password'])) {
	$input_email = secure_inputs_oa($_POST['input_email']);
	$password = md5($_POST['password']);
}
if (empty($input_email) or empty($password)) {
	$error = "All fields Required.";
} else {
	// $users = new Users;
	// $row = $users->login_db_confirm($input_email, $password);
		// user correct 
	$q = "SELECT * FROM users_tb  ";
	$q .= " WHERE  ";
	$q .= " email='$input_email' ";
	$q .= " AND  ";
	$q .= " user_password='$password' ";
	$q .= "  ";
	$result_show_by_id = $database->query($q);
    if (!$result_show_by_id) {
        die("Database query failed" . mysqli_error());
    }
	$row = mysqli_fetch_assoc($result_show_by_id);
	if (@$row['name'] != "") {
		$_SESSION['logged_in'] = "1";
		$_SESSION['session_name_user_client'] = "" . $row['name'];
		$_SESSION['userID'] = "" . $row['id'];
		$_SESSION['logged_in_input_email'] = "" . $row['user_name'];
		echo "loged in Sucessfully ";
		echo " Welcome " . $_SESSION['logged_in_input_email'];
		echo ' <a href="index.php">Home</a>';
		redirect_page("index.php");
		die;
	} else {
		// user wrong usr+pass
		// $_SESSION['logged_in'] = "";
		echo "<center><br><br>";
		echo "<h2>Either the password or the e-mail is not correct.</h2> ";
		echo "Not logged in ";
		$_SESSION['logged_in'] = "";
		$_SESSION['session_name_user_client'] = "";
		$_SESSION['logged_in_input_email'] = "";
		$_SESSION = array();
		$_SESSION['session_name_user_client'] = "";
		session_destroy();
	}
}
?>