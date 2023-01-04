<?php $file_load_name = "load_all_includes_header.php";
//echo htmlentities( htmlentities("/")); die;
file_exists($file_load_name) ? @include_once(@$file_load_name) : exit("Not found file: " . $file_load_name); 

				function  color_html_elements( $buf="",$element=""){ 					
					$buf = str_replace("&lt;".$element."", "&lt;<span style=\"color:#7ee787\">".$element."</span>", $buf);
					$buf = str_replace("&lt;/".$element."", "&lt;/<span style=\"color:#7ee787\">".$element."</span>", $buf);
					return $buf ;
				}
?>
<?php // if(!isset( $_SESSION['session_name_user_client'] ) ){ exit('<meta http-equiv="Refresh" content="0;url=login.php">');  }  
?>
<?php // @file_exists("load_all_includes_header.php")? include_once("load_all_includes_header.php"):"";
$this_crud_file_name =   "projects"  .  ".php"; // change the index name
$this_page_start_link = $this_crud_file_name . "?";
$pagesearch = $this_crud_file_name . "?Co=true";
$query = "";
$increased_num = "";

$name_of_ziped_file = "test2.zip";
$raw_name_file_zip = @$_GET['zip_name'] ? @$_GET['zip_name'] : "";
?>
<h1> Welcome <?php echo @$_SESSION['session_name_user_client']; ?>
	to Codes Page
</h1>
<?php
if ($raw_name_file_zip) {
	// $zip = zip_open("tmp/".$raw_name_file_zip."");
	$zip = zip_open("uploads/" . $raw_name_file_zip . "");
	if ($zip) {
		$cout_links = "";
		while ($zip_entry = zip_read($zip)) {
			$name_files_name = "" . (zip_entry_name($zip_entry));
			$name_files_ids = "oa_" . md5($name_files_name);
			$cout_links .= "<li>";
			$cout_links .= "<a href=\"" . "project_page_zip_file.php?zip_name=" . $raw_name_file_zip . "&e#" . $name_files_ids . "\">" . htmlentities($name_files_name) . "</a>";
			$cout_links .= "</li>";
			// /*
			echo "<br />";
			echo "<br />";
			/*
			// white bk
			echo "
			<style>
			.block-code-line {  min-width:1600px; width:100%; overflow:scroll; color:gold;}
			.block-code-line ol  {background:rgba(30,30,30,.10);   border:1px solid #ccc;}
			 
			.block-code-line ol li { padding-left:15px; padding:1px; background:rgba(30,30,30,.5); color:rgb(103,136,196);   }
			.block-code-line li : hover { background:black;   }
			.block-code-line ol li p {  margin-left:20px; color:white; }
			.block-code-line ol li p : hover { background:black;   }
			 
			</style>
			";
			*/
			echo "
			<style>
			.width_max {  padding-left:3%; width:95%;   }
			.block-code-line   {   overflow:scroll;   background:#161b22;  color:#5c636d;}
			.border_5r { padding-top:5px;  border-radius:5px;}
			.block-code-line ol  { border-left:4px solid black;background:rgba(30,30,30,.98);   border:1px solid #ccc;}
			 
			.block-code-line ol li {  border-left:4px solid rgb(30,30,30); padding-left:15px; margin-top:1px;  margin-bottom:1px; background:rgba(30,30,30,.88); color:rgb(103,136,196);   }
			.block-code-line ol li:hover {  border-left:4px solid black; background:rgba(0,0,0,.2);  }
			.block-code-line ol li p { padding:2px; margin-left:20px; color:white; }
			 
			 
			</style>
			";

			echo "<fieldset  class=\"block-code-line \" style=\" \" >";

			echo "<h2 id=\"" . $name_files_ids . "\">Name: <a href=\"project_files_zip.php?zip_name=" . htmlentities(urlencode(@$_GET['ziped_fil'])) . "\">" . zip_entry_name($zip_entry) . "</a></h2> \n";
			echo "<div    class=\"width_max\" style=\"\" >";
			$path_partsa = pathinfo($name_files_name);
			$f_icon =  @$path_partsa["extension"] ? "" : " 📁";
			echo "<li> الاسم ومسار الملف/ Name: <b>" . @$f_icon . " " . zip_entry_name($zip_entry) . "</b></li>";
			if ($f_icon) {
				echo "<li>الحجم قبل الضغط  / Actual Filesize: " .  (zip_entry_filesize($zip_entry)) . "</li>";
				echo "<li>الحجم بعد الضغط  / Compressed Size: " . (zip_entry_compressedsize($zip_entry)) . "</li>";
			} else {
				echo "<li>الحجم قبل الضغط / Actual Filesize: " . size_in_txt(zip_entry_filesize($zip_entry)) . "</li>";
				echo "<li>الحجم بعد الضغط / Compressed Size: " . size_in_txt(zip_entry_compressedsize($zip_entry)) . "</li>";
			}
			echo "<li> نوع الضغط / Compression Method : " . zip_entry_compressionmethod($zip_entry) . "</li>";
			$codes_test_compil = "";
			if (zip_entry_open($zip, $zip_entry, "r")) {
				echo "File Contents:\n";
				$buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
				$buf = htmlentities($buf);
				$codes_test_compil = $buf;
				// start codes compile
				echo "<form action=\"compile.php\" method=\"post\" name=\"action_test_compile\" >";
				//echo "<input type=\"text\" value=\"".$codes_test_compil."\" name=\"inpt_test_compile\" >";
				echo "<textarea  style=\"width: 1px; height: 1px;\"   name=\"inpt_test_compile\" >" . $codes_test_compil . "</textarea>";
				echo "<input type=\"submit\"   name=\"inptSubmit_test_compile\" >";
				echo "</form>";
				// end codes compile
				  $buf = str_replace(" ", "&nbsp;", $buf);
				$buf = nl2br($buf);

				$buf = "<ol class=\"border_5r\" contenteditable=\"true\"><li>" . str_replace("<br />", "</li><li><p>", $buf) . "</p></li></ol>";
				$buf = str_replace("", "<li></li>", $buf);
				
				$buf = str_replace("&lt;div ", "&lt;<span style=\"color:#7ee787\">div</span> ", $buf);
				$buf = str_replace("&lt;/div ", "&lt;/<span style=\"color:#7ee787\">div</span> ", $buf);
				
				$buf = color_html_elements( $buf,"body");
				$buf = color_html_elements( $buf,"html");
				$buf = color_html_elements( $buf,"p");
				$buf = color_html_elements( $buf,"h1");
				$buf = color_html_elements( $buf,"head");
				$buf = color_html_elements( $buf,"a");
				 
				
				 
				$buf = str_replace("&lt;img ", "&lt;<span style=\"color:#7ee787\">img</span> ", $buf);
				$buf = str_replace("&lt;p ", "&lt;<span style=\"color:#7ee787\">p</span> ", $buf);
				$buf = str_replace("&lt;/p ", "&lt;/<span style=\"color:#7ee787\">p</span> ", $buf);

				echo "$buf\n";
				zip_entry_close($zip_entry);
			}
			$codes_test_compil .= "";
			echo "\n";
			echo "</div>";
			echo "</fieldset>";

			//	*/
		}
		zip_close($zip);
	}
}
?>


<?php
echo "<a href=\"" . "?zip_name=" . $name_of_ziped_file . "\">Get files of " . $name_of_ziped_file . "</a><br>";
echo "<ul>";
echo @$cout_links ? @$cout_links : "<h2><a href=\"" . "?zip_name=" . @$name_of_ziped_file . "\">Get files of " . @$name_of_ziped_file . "</a></h2>";
echo "</ul>";
?>


<br />
<br />
<br />
<br />
&copy;OmarAhmed



<?php $file_load_name_footer = "load_all_includes_footer.php";
file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Not found file: " . $file_load_name_footer); ?>