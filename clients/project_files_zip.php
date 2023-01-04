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
<h1> Welcome <?php echo @$_SESSION['session_name_user_client']; ?>
	to list of project page
</h1>
<?php
$name_of_ziped_file = "test2.zip";
$raw_name_file_zip = @$_GET['zip_name'] ? @$_GET['zip_name'] : "";
//
$raw_name_file_zip = str_replace("../", "", $raw_name_file_zip);
$raw_name_file_zip = str_replace("./", "", $raw_name_file_zip);
$raw_name_file_zip = str_replace(".zip/", ".zip", $raw_name_file_zip);
// 
// 
$raw_name_file_zip = basename($raw_name_file_zip);
// die;
// if(file_exists($raw_name_file_zip)){
// if(file_exists("tmp/".$raw_name_file_zip)){
if (file_exists("uploads/" . $raw_name_file_zip)) {
	// $zip = zip_open( "".$raw_name_file_zip."");
	//
	// $zip = zip_open("tmp/".$raw_name_file_zip."");
	$zip = zip_open("uploads/" . $raw_name_file_zip . "");
	if ($zip) {
		$cout_links = "";
		$f_icon = "";
		$nm_files_in_zip = 0;
		while ($zip_entry = zip_read($zip)) {
			$nm_files_in_zip++;
			// echo  @$path_parts["extension"]?"📝":" Directory ";
			/// 
			// $f_icon=  basename($name_files_name)?"📝":" 📁 ";
			// $f_icon=   ($name_files_name)?"📝":" 📁 ";


			$name_files_name = "" . (zip_entry_name($zip_entry));
			if ($name_files_name) {
				$name_files_ids = "oa_" . md5($name_files_name);
				$path_parts = pathinfo($name_files_name);
				$f_icon =  @$path_parts["extension"] ? "📝" : " 📁 ";
			}
			$cout_links .= "<li>";
			// $cout_links .= " "." &nbsp;&nbsp;&nbsp; ".$f_icon." &nbsp;&nbsp;&nbsp; "."";
			$cout_links .= "<a ";
			// $cout_links .= "style=\"float:left;\" ";
			$cout_links .= " href=\"" . "project_page_zip_file.php?ziped_fil=" . htmlentities(urlencode(@$_GET['zip_name'])) . "&zip_name=" . $raw_name_file_zip . "&e#" . $name_files_ids . "\">";
			$cout_links .= " <small style=\"color:darkgray;\">" . @$nm_files_in_zip . ". &nbsp; </small>";
			$cout_links .= "" . " &nbsp;&nbsp;&nbsp; " . $f_icon . " &nbsp;&nbsp;&nbsp; ";
			$cout_links .= "" . htmlentities($name_files_name) . "</a>";
			$cout_links .= "</li>";
			$cout_links .= "<p class=\"clear\">&nbsp;</p>";
			/*
			echo "<br />";
			echo "<br />";
			echo "<fieldset>";
			
			echo "<h2 id=\"" . $name_files_ids. "\">Name: " . zip_entry_name($zip_entry) . "</h2> \n";
			echo "Name: " . zip_entry_name($zip_entry) . "\n";
			echo "Actual Filesize: " . zip_entry_filesize($zip_entry) . "\n";
			echo "Compressed Size: " . zip_entry_compressedsize($zip_entry) . "\n";
			echo "Compression Method: " . zip_entry_compressionmethod($zip_entry) . "\n";
				if (zip_entry_open($zip, $zip_entry, "r")) {
					echo "File Contents:\n";
					$buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
					$buf = htmlentities($buf );
					$buf = nl2br($buf );
					echo "$buf\n";
					zip_entry_close($zip_entry);
				}
			echo "\n";
			echo "</fieldset>";
			*/
		}
		zip_close($zip);
	}
}
?>


<?php
echo "<a href=\"" . "?zip_name=" . $name_of_ziped_file . "\">Get files of " . $name_of_ziped_file . "</a><br>";
/*	echo "<h4>Choose file</h4>";
	echo "<ol>"; 
	echo "<li>"; 
		echo "<a href=\""."?zip_name="."zip_project.zip"."\">Get files of "."zip_project.zip"."</a><hr>";
	echo "</li>"; 
	echo "<li>"; 
		echo "<a href=\""."?zip_name="."test2.zip"."\">Get files of "."test2.zip"."</a><hr>";
	echo "</li>"; 
	echo "</ol>"; 
		// echo "<a href=\""."?zip_name=".$name_of_ziped_file."\">Get files of ".$name_of_ziped_file."</a><hr>";
	*/
echo "<fieldset>";
echo "<h4>" . "<a href=\"" . "project_public.php?dir_to_o=" . urlencode(htmlentities(@$raw_name_file_zip)) . "&e#" . "" . "\"> &lt;&lt; " . "  File of Project</a>" . "</u> 
		&lt;&lt; <u>" . "<a href=\"" . "project_files_zip.php?zip_name=" . urlencode(htmlentities(@$raw_name_file_zip)) . "&e#" . "" . "\"> " . " (" . $nm_files_in_zip . ") " . htmlentities(@$raw_name_file_zip) . "</a>" . "</u></h4>";
echo "<input type=\"text\" id=\"myFilterList_oa_eInput\" onkeyup=\"myFilterList_oa_eFunction()\" placeholder=\"Search for names..\" title=\"Type in a name\">";

echo "<ol id=\"myFilterList_oa_eUL\" >";
echo @$cout_links ? @$cout_links : "<center><h2> No  Compressed files/folders of ZIP file are found. <br><a href=\"" . "?zip_name=" . @$name_of_ziped_file . "\">Get files of " . @$name_of_ziped_file . "</a></h2></center>";
echo "</ol>";
echo "</fieldset>";
?>
<br />
<br />
<br />
<br />
&copy;OmarAhmed



<?php $file_load_name_footer = "load_all_includes_footer.php";
file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Not found file: " . $file_load_name_footer); ?>