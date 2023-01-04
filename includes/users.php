<?php
// 
/*
// Database Constants
defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER')   ? null : define("DB_USER", "gallery");
defined('DB_PASS')   ? null : define("DB_PASS", "phpOTL123");
defined('DB_NAME')   ? null : define("DB_NAME", "photo_gallery");
// // * /
?>
<?php
require_once(LIB_PATH.DS."config.php");

class MySQLDatabase {
	
	private $connection;
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	
  function __construct() {
    $this->open_connection();
		$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists( "mysql_real_escape_string" );
  }

	public function open_connection() {
		$this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
		if (!$this->connection) {
			die("Database connection failed: " . mysql_error());
		} else {
			$db_select = mysql_select_db(DB_NAME, $this->connection);
			if (!$db_select) {
				die("Database selection failed: " . mysql_error());
			}
		}
	}

	public function close_connection() {
		if(isset($this->connection)) {
			mysql_close($this->connection);
			unset($this->connection);
		}
	}

	public function query($sql) {
		$this->last_query = $sql;
		$result = mysql_query($sql, $this->connection);
		$this->confirm_query($result);
		return $result;
	}
	
	public function escape_value( $value ) {
		if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}
	
	// "database-neutral" methods
  public function fetch_array($result_set) {
    return mysql_fetch_array($result_set);
  }
  
  public function num_rows($result_set) {
   return mysql_num_rows($result_set);
  }
  
  public function insert_id() {
    // get the last id inserted over the current db connection
    return mysql_insert_id($this->connection);
  }
  
  public function affected_rows() {
    return mysql_affected_rows($this->connection);
  }

	private function confirm_query($result) {
		if (!$result) {
	    $output = "Database query failed: " . mysql_error() . "<br /><br />";
	    //$output .= "Last SQL query: " . $this->last_query;
	    die( $output );
		}
	}
	
}

$database = new MySQLDatabase();
$db =& $database;
// */
?>



<?php
// This is a helper class to make paginating 
/*
	class Pagination {
		
		  public $current_page;
		  public $per_page;
		  public $total_count;

		public function __construct($page=1, $per_page=20, $total_count=0){
			$this->current_page = (int)$page;
			$this->per_page = (int)$per_page;
			$this->total_count = (int)$total_count;
		}
		public function offset() {
			// Assuming 20 items per page:
			// page 1 has an offset of 0    (1-1) * 20
			// page 2 has an offset of 20   (2-1) * 20
			//   in other words, page 2 starts with item 21
			// return ($this->current_page - 1) * $this->per_page;
			$num_offset= ($this->current_page - 1) * $this->per_page;
			$num_offset=(int)intval(  $num_offset);
			$num_offset= is_int( $num_offset)&&( $num_offset>0)?$num_offset:"0";
			$num_offset= is_int( $num_offset)&&( $num_offset>$this->total_pages() )?$this->total_pages()-1:$num_offset ;
			return $num_offset;
		} 
		public function total_pages() {
			return ceil($this->total_count/$this->per_page);
		}			
		public function previous_page() {
			return $this->current_page - 1;
		}
		public function next_page() {
			return $this->current_page + 1;
		}
		public function has_previous_page() {
			return $this->previous_page() >= 1 ? true : false;
		}
		public function has_next_page() {
			return $this->next_page() <= $this->total_pages() ? true : false;
		}
	}
// */
?>



<?php 

// class User extends DatabaseObject {
	

	  class Users {
		// method to get all data 
		
		public $table_name = "users_tb";
		public $col_id = "id";
		public $col_find = "id";
		public $col_for_login_1 = "email";
		public $col_for_login_2 = "user_name";
		public $col_for_login_pass = "user_password";
	
	// login methods
			/*
		public function login_db_confirm($email="",$pass="") {
				global $database;
				  $email = $email? (string) trim( addslashes(strip_tags($email  ))):$email;
				  $pass = @$pass?(string) trim( addslashes(strip_tags($pass ))) :$pass;
			//if($email&&$pass){
					$query  = "SELECT * FROM ".$this->table_name." ";
					$query .= " WHERE ";
					$query .= " ".$this->col_for_login_1."  ='".$email ."' ";
					$query .= " AND ";
					  $query .= " ".$this->col_for_login_pass." ='".md5($pass) ."'";
					   if(is_string($email)){
					  //if(is_numeric($email)){
						$query .= " OR ";
						$query .= " ".$this->col_for_login_2."  ='".$email ."' ";
						$query .= " AND ";
						$query .= " ".$this->col_for_login_pass." ='".md5($pass) ."'";
					  }
					$record_result = $database->query( $query ); 
					return $row = $database->fetch_array( $record_result ) ;
					// $record_result = mysqli_query( $query ); 
					//return $row = mysqli_fetch_array($record_result);
					
			//} else { return array("name"=>"","email"=>""); }
			}

		
		// queries 
		
		
		// public $connection;
			public function fetch_all() {
				  global $database;
				$query  = "SELECT * FROM ".$this->table_name." ";
					return $record_result = $database->query( $query );
			}
			public function fetch_all_pagenation($sql="",$per_page="",$offset="") {
				  global $database;
				  if($sql){
						$sql = $sql;
						$sql .= " LIMIT ".$per_page ." ";
						$sql .= " OFFSET ". $offset   ." ";
					}
				  $query  = $sql?$sql:"SELECT * FROM ".$this->table_name." ";
				   return $record_result = $this->count_all()?$database->query( $query ):die("");
					   
			}
				
			
		// method to get data by id 
			 public function fetch_data($article_id="") {
				global $database;
				$query  = "SELECT * FROM ".$this->table_name." ";
					$query .= " WHERE ";
					 $query .= " ".$this->col_find."  ='".$article_id ."' ";
					//$query .= " ".$this->col_id."  ='".$article_id ."' ";
					$record_result = $database->query( $query );
					return $row = $database->fetch_array($record_result);
			}
		*/
			public function get_user_name_by_id($user_id="") {
				global $database;
					$query  = "SELECT * FROM ".$this->table_name." ";
					$query .= " WHERE ";
					$query .= " ".$this->col_id."  ='".$user_id ."' ";
					$record_result = $database->query(  $query );
					  $row = $database->fetch_array($record_result);
					return @$row['name']?@$row['name']:"No name (Not logged in)";
			}
			public function count_all() {
				  global $database;
				  $sql = "SELECT COUNT(*) FROM ".$this->table_name;
				$result_set = $database->query($sql);
				  $row = $database->fetch_array($result_set);
				return array_shift($row);
			}
			/*
			public function find_by_sql($sql="") {
				global $database;
				$result_set = $database->query($sql);
				//$object_array = array();
				  $row = $database->fetch_array($result_set);
				 
				return $row;
			}
			public static function find_by_sql($sql="") {
				global $database;
				$result_set = $database->query($sql);
				$object_array = array();
				while ($row = $database->fetch_array($result_set)) {
				  $object_array[] = self::instantiate($row);
				}
				return $object_array;
			}
			public static function count_all() {
				global $database;
					$sql = "SELECT COUNT(*) FROM ".self::$table_name;
					$result_set = $database->query($sql);
					$row = $database->fetch_array($result_set);
				return array_shift($row);
			}
			*/
			

	}	
			
?>
<?php /*function redirect_page($link) { @HEADER("Location: ".$link."");//
		exit("<fieldset>Sorry Could Not Redirect This Page Automatically.  <a href=\"".$link."\"> Please Click This Link To Return Back </a></fieldset>");
		return 0;
	}	*/ ?>
	
	
	
	
	
	
	
	
	
<?php 
	// ============================-------------------[start database functions]-------------------============================ 
	// /*
	 
	function query_comments_by_project_id($project_id=""){
		global $connection;
			$project_id = (int)intval($project_id  ) ;
			$query  = "SELECT * FROM `comments_tb` ";
			$query .= " WHERE ";
			$query .= " `project_id` ='".$project_id ."' ";
			//$query .= " LIMIT 12 ";
			 $query .= " ORDER BY `id` ASC ";
			//$query .= " ORDER BY `id` DESC ";
			$record_result = "";
			$record_result = mysqli_query($connection, $query );
			if(!$record_result ){
				die("Database query failed".mysqli_error());
			}
		return $record_result;
	}
	function num_comments_by_project_id($project_id=""){
		$record_result =  query_comments_by_project_id( $project_id ) ;
		$q_num = mysqli_num_rows( $record_result ) ;
		return $q_num;
	}
		 // $src_image_db = get_user_photo_by_id($record_row[0] );
	 function get_user_photo_by_id($id=""){
		 if($id){
		$key_img = "imgN_". "users_tb_rec_record__" . $id;
		   $src_image_db = view_file_src_by_id_from_tb_oa($key_img);
		  //die; 
		  if(file_exists("".$src_image_db)){
			return $src_image_db;
		  } else{
			 return "uploads/default_user.jpg";
		 }
		 } else{
			 return "uploads/default_user.jpg";
		 }
	 }
	// */
	// ============================-------------------[end database functions]-------------------============================ 
?>




<?php 

// ////////////// class User extends DatabaseObject {
	  class Clsorders_activities_tb {
		// method to get all data 
		
		public $table_name = "orders_activities_tb";
		public $col_id = "id";
		public $col_find = "id";
		public $col_for_login_1 = "final_statues";
		public $col_for_login_2 = "statues";
		public $col_for_login_pass = "description";
	
	// login methods
		public function login_db_confirm($email="",$pass="") {
				global $database;
				  $email = $email? (string) trim( addslashes(strip_tags($email  ))):$email;
				  $pass = @$pass?(string) trim( addslashes(strip_tags($pass ))) :$pass;
			//if($email&&$pass){
					$query  = "SELECT * FROM ".$this->table_name." ";
					$query .= " WHERE ";
					$query .= " ".$this->col_for_login_1."  ='".$email ."' ";
					$query .= " AND ";
					  $query .= " ".$this->col_for_login_pass." ='".md5($pass) ."'";
					   if(is_string($email)){
					  //if(is_numeric($email)){
						$query .= " OR ";
						$query .= " ".$this->col_for_login_2."  ='".$email ."' ";
						$query .= " AND ";
						$query .= " ".$this->col_for_login_pass." ='".md5($pass) ."'";
					  }
					$record_result = $database->query( $query ); 
					return $row = $database->fetch_array( $record_result ) ;
					// $record_result = mysqli_query( $query ); 
					//return $row = mysqli_fetch_array($record_result);
			}

			public function fetch_all() {
				  global $database;
				$query  = "SELECT * FROM `".$this->table_name."` ";
					return $record_result = $database->query( $query );
			}
			public function fetch_all_pagenation($sql="",$per_page="",$offset="") {
				  global $database;
				  if($sql){
						$sql = $sql;
						$sql .= " LIMIT ".$per_page ." ";
						$sql .= " OFFSET ". $offset   ." ";
					}
				  $query  = $sql?$sql:"SELECT * FROM `".$this->table_name."` ";
				   return $record_result = $this->count_all()?$database->query( $query ):die("");
			}
			
		// method to get data by id 
			 public function fetch_data($article_id="") {
				global $database;
				$query  = "SELECT * FROM `".$this->table_name."` ";
					$query .= " WHERE ";
					 $query .= " `".$this->col_find."`  ='".$article_id ."' ";
					//$query .= " ".$this->col_id."  ='".$article_id ."' ";
					$record_result = $database->query( $query );
					return $row = $database->fetch_array($record_result);
			}
			public function get_user_name_by_id($user_id="") {
				global $database;
					$query  = "SELECT * FROM ".$this->table_name." ";
					$query .= " WHERE ";
					$query .= " `".$this->col_id."`='".$user_id ."' ";
					$record_result = $database->query(  $query );
					  $row = $database->fetch_array($record_result);
					return $row['name'];
			}
			public function count_all() {
				  $sql = "SELECT COUNT(*) FROM ".$this->table_name;
				  global $database;
				$result_set = $database->query($sql);
				  $row = $database->fetch_array($result_set);
				return array_shift($row);
			}
	}	
			
?>








 
<?php 

// ////////////// class User extends DatabaseObject {
	  class Clsdepartmentscategories_ {
		// method to get all data 
		
		public $table_name = "departments_categories_tb";
		public $col_id = "id";
		public $col_find = "id";
		public $col_for_login_1 = "cid";
		public $col_for_login_2 = "name";
		public $col_for_login_pass = "stat";
	
	// login methods
		public function login_db_confirm($email="",$pass="") {
				global $database;
				  $email = $email? (string) trim( addslashes(strip_tags($email  ))):$email;
				  $pass = @$pass?(string) trim( addslashes(strip_tags($pass ))) :$pass;
			//if($email&&$pass){
					$query  = "SELECT * FROM ".$this->table_name." ";
					$query .= " WHERE ";
					$query .= " ".$this->col_for_login_1."  ='".$email ."' ";
					$query .= " AND ";
					  $query .= " ".$this->col_for_login_pass." ='".md5($pass) ."'";
					   if(is_string($email)){
					  //if(is_numeric($email)){
						$query .= " OR ";
						$query .= " ".$this->col_for_login_2."  ='".$email ."' ";
						$query .= " AND ";
						$query .= " ".$this->col_for_login_pass." ='".md5($pass) ."'";
					  }
					$record_result = $database->query( $query ); 
					return $row = $database->fetch_array( $record_result ) ;
					// $record_result = $database->query( $query ); 
					//return $row = mysqli_fetch_array($record_result);
			}

			public function fetch_all() {
				  global $database;
				$query  = "SELECT * FROM `".$this->table_name."` ";
					return $record_result = $database->query( $query );
			}
			public function fetch_all_pagenation($sql="",$per_page="",$offset="") {
				  global $database;
				  if($sql){
						$sql = $sql;
						$sql .= " LIMIT ".$per_page ." ";
						$sql .= " OFFSET ". $offset   ." ";
					}
				  $query  = $sql?$sql:"SELECT * FROM `".$this->table_name."` ";
				   return $record_result = $this->count_all()?$database->query( $query ):die("");
			}
			
		// method to get data by id 
			 public function fetch_data($article_id="") {
				global $database;
				$query  = "SELECT * FROM `".$this->table_name."` ";
					$query .= " WHERE ";
					 $query .= " `".$this->col_find."`  ='".$article_id ."' ";
					//$query .= " ".$this->col_id."  ='".$article_id ."' ";
					$record_result = $database->query( $query );
					return $row = $database->fetch_array($record_result);
			}
			public function get_user_name_by_id($user_id="") {
				global $database;
					$query  = "SELECT * FROM ".$this->table_name." ";
					$query .= " WHERE ";
					$query .= " `".$this->col_id."`='".$user_id ."' ";
					$record_result = $database->query(  $query );
					  $row = $database->fetch_array($record_result);
					return $row['name'];
			}
			public function count_all() {
				  global $database;
				  $sql = "SELECT COUNT(*) FROM ".$this->table_name;
				$result_set = $database->query($sql);
				  $row = $database->fetch_array($result_set);
				return array_shift($row);
			}
	}	
			
?>
 
 
<?php 

// ////////////// class User extends DatabaseObject {
	  class Clssuggestions {
		// method to get all data 
		
		public $table_name = "suggestions_tb";
		public $col_id = "id";
		public $col_find = "id";
		public $col_for_login_1 = "suggestion_details";
		public $col_for_login_2 = "suggestion_name";
		public $col_for_login_pass = "notes";
	
	// login methods
		public function login_db_confirm($email="",$pass="") {
				global $database;
				  $email = $email? (string) trim( addslashes(strip_tags($email  ))):$email;
				  $pass = @$pass?(string) trim( addslashes(strip_tags($pass ))) :$pass;
			//if($email&&$pass){
					$query  = "SELECT * FROM ".$this->table_name." ";
					$query .= " WHERE ";
					$query .= " ".$this->col_for_login_1."  ='".$email ."' ";
					$query .= " AND ";
					  $query .= " ".$this->col_for_login_pass." ='".md5($pass) ."'";
					   if(is_string($email)){
					  //if(is_numeric($email)){
						$query .= " OR ";
						$query .= " ".$this->col_for_login_2."  ='".$email ."' ";
						$query .= " AND ";
						$query .= " ".$this->col_for_login_pass." ='".md5($pass) ."'";
					  }
					$record_result = $database->query( $query ); 
					return $row = $database->fetch_array( $record_result ) ;
					// $record_result = mysqli_query( $query ); 
					//return $row = mysqli_fetch_array($record_result);
			}

			public function fetch_all() {
				  global $database;
				$query  = "SELECT * FROM `".$this->table_name."` ";
					return $record_result = $database->query( $query );
			}
			public function fetch_all_pagenation($sql="",$per_page="",$offset="") {
				  global $database;
				  if($sql){
						$sql = $sql;
						$sql .= " LIMIT ".$per_page ." ";
						$sql .= " OFFSET ". $offset   ." ";
					}
				  $query  = $sql?$sql:"SELECT * FROM `".$this->table_name."` ";
				   return $record_result = $this->count_all()?$database->query( $query ):die("");
			}
			
		// method to get data by id 
			 public function fetch_data($article_id="") {
				global $database;
				$query  = "SELECT * FROM `".$this->table_name."` ";
					$query .= " WHERE ";
					 $query .= " `".$this->col_find."`  ='".$article_id ."' ";
					//$query .= " ".$this->col_id."  ='".$article_id ."' ";
					$record_result = $database->query( $query );
					return $row = $database->fetch_array($record_result);
			}
			public function get_user_name_by_id($user_id="") {
				global $database;
					$query  = "SELECT * FROM ".$this->table_name." ";
					$query .= " WHERE ";
					$query .= " `".$this->col_id."`='".$user_id ."' ";
					$record_result = $database->query(  $query );
					  $row = $database->fetch_array($record_result);
					return $row['name'];
			}
			public function count_all() {
				  global $database;
				  $sql = "SELECT COUNT(*) FROM ".$this->table_name;
				$result_set = $database->query($sql);
				  $row = $database->fetch_array($result_set);
				return array_shift($row);
			}
	}	
			
?>
 







 
<?php 

// ////////////// class User extends DatabaseObject {
	  class Clsreturned {
		// method to get all data 
		
		public $table_name = "returned_tb";
		public $col_id = "id";
		public $col_find = "id";
		public $col_for_login_1 = "statues_order";
		public $col_for_login_2 = "order_number";
		public $col_for_login_pass = "date";
	
	// login methods
		public function login_db_confirm($email="",$pass="") {
				global $database;
				  $email = $email? (string) trim( addslashes(strip_tags($email  ))):$email;
				  $pass = @$pass?(string) trim( addslashes(strip_tags($pass ))) :$pass;
			//if($email&&$pass){
					$query  = "SELECT * FROM ".$this->table_name." ";
					$query .= " WHERE ";
					$query .= " ".$this->col_for_login_1."  ='".$email ."' ";
					$query .= " AND ";
					  $query .= " ".$this->col_for_login_pass." ='".md5($pass) ."'";
					   if(is_string($email)){
					  //if(is_numeric($email)){
						$query .= " OR ";
						$query .= " ".$this->col_for_login_2."  ='".$email ."' ";
						$query .= " AND ";
						$query .= " ".$this->col_for_login_pass." ='".md5($pass) ."'";
					  }
					$record_result = $database->query( $query ); 
					return $row = $database->fetch_array( $record_result ) ;
					// $record_result = mysqli_query( $query ); 
					//return $row = mysqli_fetch_array($record_result);
			}

			public function fetch_all() {
				  global $database;
				$query  = "SELECT * FROM `".$this->table_name."` ";
					return $record_result = $database->query( $query );
			}
			public function fetch_all_pagenation($sql="",$per_page="",$offset="") {
				  global $database;
				  if($sql){
						$sql = $sql;
						$sql .= " LIMIT ".$per_page ." ";
						$sql .= " OFFSET ". $offset   ." ";
					}
				  $query  = $sql?$sql:"SELECT * FROM `".$this->table_name."` ";
				   return $record_result = $this->count_all()?$database->query( $query ):die("");
			}
			
		// method to get data by id 
			 public function fetch_data($article_id="") {
				global $database;
				$query  = "SELECT * FROM `".$this->table_name."` ";
					$query .= " WHERE ";
					 $query .= " `".$this->col_find."`  ='".$article_id ."' ";
					//$query .= " ".$this->col_id."  ='".$article_id ."' ";
					$record_result = $database->query( $query );
					return $row = $database->fetch_array($record_result);
			}
			public function get_user_name_by_id($user_id="") {
				global $database;
					$query  = "SELECT * FROM ".$this->table_name." ";
					$query .= " WHERE ";
					$query .= " `".$this->col_id."`='".$user_id ."' ";
					$record_result = $database->query(  $query );
					  $row = $database->fetch_array($record_result);
					return $row['name'];
			}
			public function count_all() {
				  global $database;
				  $sql = "SELECT COUNT(*) FROM ".$this->table_name;
				$result_set = $database->query($sql);
				  $row = $database->fetch_array($result_set);
				return array_shift($row);
			}
	}	
			
?>
 