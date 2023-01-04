<?php $file_load_name = "load_all_includes_header.php";
file_exists($file_load_name) ? @include_once(@$file_load_name) : exit("Not found file: " . $file_load_name); ?>
<?php // if(!isset( $_SESSION['session_name_user_client'] ) ){ exit('<meta http-equiv="Refresh" content="0;url=login.php">');  }  
?>
<?php // @file_exists("load_all_includes_header.php")? include_once("load_all_includes_header.php"):"";
$this_crud_file_name =   "projects"  .  ".php"; // change the index name
$this_page_start_link = $this_crud_file_name . "?";
$pagesearch = $this_crud_file_name . "?Co=true";
$query = "";
$increased_num = "";
?>
<h1> Welcome <?php echo @$_SESSION['session_name_user_client']; ?></h1>

<?php
// $dir = "/tmp/";
$dir = "tmp/";
$dir = "uploads/";
$dir = @$_GET['dir_to_o'] ? @$_GET['dir_to_o'] : $dir;
$mdir = $dir;
$dir = str_replace("../", "", $dir);
$dir = str_replace("./", "", $dir);
//$dir =str_replace(".zip/",".zip",$dir);
// 
// 
echo $dir; //=basename($dir);
//echo $dir =basename($dir);
// die;
// if(file_exists($raw_name_file_zip)){
if (is_dir("" . $dir)) {
	echo  "<center>";
	print "Directory Name: " . "<a href=\"project_public.php?dir_to_o=" . urlencode($dir)  . "\">  ";
	echo "عذرهذا مجلد";
	echo "  افتح >> ";
	echo $dir . "</a>";
	echo  "</center>";
} else 
if (file_exists("" . $dir)) {
	// Open a known directory, and proceed to read its contents
	// if (is_file($dir)) {
	// if (is_dir($dir)) {
	// if ($dh = opendir($dir)) {
	echo "<h4>";
	print "Directory Name: " . "<a href=\"?dir_to_o=" . urlencode($dir)  . "\"> <button>" . $dir . "</button></a>   ";
	echo  "</h4>";
	echo "<ol>";
	$file = file_get_contents(basename($dir));
	// echo $file = file_get_contents(basename( str_replace("index.php","pr_".$_REQUEST['pagename'].".php", $_SERVER['PHP_SELF'])  ));
	// echo $file = file_get_contents(basename($_SERVER['PHP_SELF']));
	echo "<h2> Source Code Of: " . @$TEXT['global-sourcecode'] . " </h2>";
	echo "<textarea style='style:clear;' cols='100' rows='50'>";
	echo htmlspecialchars($file);
	echo "</textarea>";
	echo '<br><br>';
	/*
while (($file = readdir($dh)) !== false) {
	$f_type=filetype($dir . $file);
echo "<li>";
	// print "filename: $file   |  filetype: " . filetype($dir . $file) . "\n";
	print "filename: ". "<a href=\"" .$dir.$file ."\">".$file ."</a>  |  filetype: " . $f_type . "\n";
	if($f_type=="dir"){ print " Directory Name: ". "<a href=\"?dir_to_o=" .urlencode($dir.$file."/")  ."\"> <button>"."/".$file ."</button></a>   "; }
	if($f_type=="file"){ print " Directory Name: ". "<a href=\"?dir_to_o=" .urlencode($dir.$file."/")  ."\"> <button>"."/".$file ."</button></a>   "; }
echo "</li>";
}*/
	echo "</ol>";
	// closedir($dh);
	/// }
	//}
?>






	Examples
	Here is a simple example PHP scripts using the tokenizer that will read in a PHP file, strip all comments from the source
	and print the pure code only.
	Example 879. Strip comments with the tokenizer
	<?php
	/* 
// $source = file_get_contents("somefile.php");
$source = file_get_contents($mdir);
$tokens = token_get_all($source);
foreach ($tokens as $token) {
if (is_string($token)) {
// simple 1-character token
echo $token;
} else {
// token array
list($id, $text) = $token;
switch($id) {
case T_COMMENT:
case T_ML_COMMENT:
// no action on comments
break;
default:
// anything else -> output "as is"
echo $text;
break;
}
}
}
*/
	?>


<?php
}
?>



<?php $file_load_name_footer = "load_all_includes_footer.php";
file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Not found file: " . $file_load_name_footer); ?>