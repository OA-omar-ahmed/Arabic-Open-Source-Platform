<?php session_start();
include_once('../includes/connection.php');
include_once('../includes/classes.php');
include_once('../includes/users.php');
include_once('../includes/functions.php');
// $users = $user->fetch_all();
// print_r($users );
?>


<?php
// select all pagination
$user = new Users;
// 1. the current page number ($current_page)
$page = isset($_GET['page']) && !empty($_GET['page']) ? (int)intval($_GET['page']) : 1;

// 2. records per page ($per_page)
$per_page = 3;

// 3. total record count ($total_count)
// $total_count = Users::count_all();
$total_count = $user->count_all();

// use pagination instead
$pagination = new Pagination($page, $per_page, $total_count);
$sql = "SELECT * FROM users_tb ";
// $sql .= " ORDER BY id DESC";
$users = $user->fetch_all_pagenation($sql, $per_page, $pagination->offset());

//	// all with no pagenation
// $users = $user->fetch_all($sql); // $users = $user->fetch_all();
if ($users) {
	echo " Total found: " . $total_count;
} else {
	die("No Such Records.");
}
?>

<html>

<head>
	<title>CRUD_Template__Eng__Omar_Ahmed</title>
	<link rel="stylesheet" href="../assets/style.css" />
</head>

<body>
	<div class="container">
		<a href="index.php" id="logo">CMS - Users</a>-<a href="add_user.php">[+]</a>

		<ol>
			<?php foreach ($users as $user) { ?>
				<li>
					<?php
					// $src_image_db = view_file_src_by_id_from_tb_oa($key_img);
					$src_image_db = get_user_photo_by_id($user['id']);
					echo " <img src='" . $src_image_db . "' width='50' height='50' class=\"radiues  personal-photo\" alt=' UPLOAD New ' />";
					?>

					<?php
					$key_img = "imgN_" . "users_tb_rec_record__" . $user['id'];
					echo " [<a title=\"Add image\" href='" . "img.php?" . "Co=true&Ad=1&id_to_ad=" . @$key_img . "&input_img_search=" . @$key_img . "' >";
					echo "&pluse;";
					echo "</a>] ";
					?>
					<a href="?id=<?php echo $user['id']; ?>#details">
						<?php echo $user['name']; ?></a>
					-<small>password <?php echo  $user['email']; ?></small>
				</li>
			<?php } ?>
		</ol>
	</div>

	<div id="pagination" style="clear: both;">
		<?php
		$page_to = "control_all_users.php?Co";
		if ($pagination->total_pages() > 1) {

			echo " <a href=\"" . $page_to . "&page=";
			echo "1";
			echo "\" title=\"First Page\"><button>&laquo;&laquo;</button></a> ";

			if ($pagination->has_previous_page()) {
				echo "<a href=\"" . $page_to . "&page=";
				echo $pagination->previous_page();
				echo "\">&laquo; Previous</a> ";
			}

			for ($i = 1; $i <= $pagination->total_pages(); $i++) {
				if ($i == $page) {
					echo " <span class=\"selected\">{$i}</span> ";
				} else {
					echo " <a href=\"" . $page_to . "&page={$i}\">{$i}</a> ";
				}
			}

			if ($pagination->has_next_page()) {
				echo " <a href=\"" . $page_to . "&page=";
				echo $pagination->next_page();
				echo "\">Next &raquo;</a> ";
			}
			echo " <a href=\"" . $page_to . "&page=";
			echo $pagination->total_pages();
			echo "\"  title=\"Latest Page\"><button>&raquo;&raquo;</button></a> ";
		}
		?>
	</div>
</body>

</html>




<fieldset id="details">
	<?php
	// //////////////////////////////////////details s ///////////////// <br><br><br><br>Details
	// Find by id
	$user = new Users;

	$email = isset($_GET['email']) && !empty($_GET['email']) ? (string)htmlentities($_GET['email']) : "";
	$id = isset($_GET['id']) && !empty($_GET['id']) ? (int)intval($_GET['id']) : "";
	if ($email) {
		$user->col_find = "email";
		$user_r = $user->fetch_data($email);
	} else if ($id) {
		$user->col_find = "id";
		$user_r = $user->fetch_data($id);
	} else {
		echo ("Enter User.");
	}
	//echo $user = $user->count_all();
	?>
	<?php
	if (@$user_r['id']) {
	?>
		<br><br><br><br>Details
		<li>
			<?php	 // $src_image_db = view_file_src_by_id_from_tb_oa($key_img);
			$src_image_db = get_user_photo_by_id($user_r['id']);
			echo " <img src='" . $src_image_db . "' width='250' height='250' class=\"radiues  personal-photo\" alt=' UPLOAD New ' />";
			?>

			<?php
			$key_img = "imgN_" . "users_tb_rec_record__" . $user_r['id'];
			echo " [<a title=\"Add image\" href='" . "img.php?" . "Co=true&Ad=1&id_to_ad=" . @$key_img . "&input_img_search=" . @$key_img . "' >";
			echo "&pluse;";
			echo "</a>] ";
			?>
			<br>
			<a href="user.php?id=<?php echo $user_r['id']; ?>">
				<?php echo $user_r['name']; ?></a>
			-<small>password <?php echo  $user_r['email']; ?></small>
		</li>

		<br><br><br><br>
	<?php
	} else {
		// echo("Sorry, No Such record."); 
	}
	?>

</fieldset>





















<?php /*  // edit ?>
<fieldset id="details">
<?php 
// ////////////////////////////////////// s ///////////////// <br><br><br><br>Details
	// Find by id
	 $user = new Users;
	
	 $email = isset($_GET['email'])&&!empty($_GET['email']) ? (string)htmlentities($_GET['email']) : "";
	 $id = isset($_GET['id'])&&!empty($_GET['id']) ? (int)intval($_GET['id']) :"";
	 if($email){
		 $user->col_find="email";
		$user_r = $user->fetch_data($email);
	 }
	 else if($id){
		 $user->col_find="id";
		  $user_r = $user->fetch_data($id);
	 }else{ die("No Such User");}
	 
	 if(@$user_r['id']){}else{ die("Sorry, No Such record.");}
	  //echo $user = $user->count_all();
 ?>
<br><br><br><br>Details
 <li>
				<?php 
								 // $src_image_db = view_file_src_by_id_from_tb_oa($key_img);
								 $src_image_db = get_user_photo_by_id($user_r['id'] );
								echo " <img src='". $src_image_db . "' width='250' height='250' class=\"radiues  personal-photo\" alt=' UPLOAD New ' />";
							?>
							
							<?php 
								$key_img = "imgN_". "users_tb_rec_record__" .$user_r['id'];
								echo "<a title=\"Add image\" href='". "img.php?"."Co=true&Ad=1&id_to_ad=". @$key_img . "&input_img_search=". @$key_img . "' >";
								echo "[&pluse;]";
								echo "</a>";
							?>
						<br>
							<a href="user.php?id=<?php echo $user_r['id']; ?>">
						<?php echo $user_r['name']; ?></a>
						-<small>password <?php echo  $user_r['email'] ; ?></small></li>
			 
<br><br><br><br> 

</fieldset>

<?php // */ // edit //e 
?>