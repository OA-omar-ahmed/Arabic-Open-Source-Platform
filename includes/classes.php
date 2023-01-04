<?php /***************************************************************************
*_==================================_IMPORTANT_:_==================================__
	**_This_is_an_educational_product_made_by_OmarAhmed_and_his_team._and_cannot_be_modified_for_other_than_personal_usage.
	**_This_product_cannot_be_redistributed_for_free_or_a_fee_without_written_permission_from_OmarAhmed.
	**_This_notice_may_not_be_removed_from_the_source_code.
****************************************************************************/ ?>
<?php
// /*
// Database Configuration  Constants
defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_NAME')   ? null : define("DB_NAME", "oa_opensource_proj_o_v4_os_db");
defined('DB_USER')   ? null : define("DB_USER", "root");
defined('DB_PASS')   ? null : define("DB_PASS", "");
// // */
?>
<?php
// require_once(LIB_PATH.DS."config.php");

class MySQLDatabase {
	// change the db info
	/*private $hostname_con = "localhost";
	private $dbname_con = "oa_opensource_proj_o_v4_os_db";
	private $username_con = "root";
	private $hostpas_con = "";
	*/
	private $hostname_con = DB_SERVER;
	private $dbname_con   = DB_NAME;
	private $username_con = DB_USER;
	private $hostpas_con  = DB_PASS;
	private $connection;
	// */
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;
		
  function __construct() {
    $this->open_connection();
		//$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists( "mysqli_real_escape_string" );
  }
	public function open_connection() {
		 $this->connection = mysqli_connect($this->hostname_con,$this->username_con,$this->hostpas_con,$this->dbname_con) or trigger_error(mysqli_error(),E_USER_ERROR);
			/*if(! @$this->connection ){
				   die("Database Connection failed: ".mysqli_error());
			}*/
			$this->confirm_query(@$this->connection);
			return $this->connection;
	}
	//Find: $database->query($connection,
	//Replace: $database->query($connection,
	public function query($sql) {
		$this->last_query = $sql;
		$result = mysqli_query( $this->connection, $sql);
		$this->confirm_query($result);
		return $result;
	}
	public function fetch_array($sql="") {
		$result = mysqli_fetch_array($sql);
		return $result;
	}
	public function num_rows($result_set) {
		return mysqli_num_rows($result_set);
    }
  
	public function insert_id() {
    // get the last id inserted over the current db connection
		return mysqli_insert_id($this->connection);
	}
	public function affected_rows() {
		return mysqli_affected_rows($this->connection);
	}
	private function confirm_query($result) {
		if (!$result) {
	    $output = "Database query failed: " . mysqli_error() . "<br /><br />";
	    //$output .= "Last SQL query: " . $this->last_query;
	    die( $output );
		}
	}
	
	
}

$database = new MySQLDatabase();
$connection = $database->open_connection();
// $db =& $database;

?>


<?php
// This is a helper class to make paginating 
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
			// return ($this->current_page - 1) * $this->per_page;
			$num_offset= ($this->current_page - 1) * $this->per_page;
			
			// avoid errors of ex. (&page=-2)
			$num_offset=(int)intval(  $num_offset);
			$num_offset= is_int( $num_offset)&&( $num_offset>0)?$num_offset:"0";
			
			// avoid max number more than the total of pages  ex. (Co&page=2000)
			$num_offset = $num_offset>($this->total_pages())?1+$this->total_pages():$num_offset;
			 
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
?>



