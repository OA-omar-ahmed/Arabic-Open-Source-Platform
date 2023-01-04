<?php $file_load_name = "load_all_includes_header.php";
file_exists($file_load_name) ? @include_once(@$file_load_name) : exit("Not found file: " . $file_load_name); ?>
<?php // if(!isset( $_SESSION['session_name_user_client'] ) ){ exit('<meta http-equiv="Refresh" content="0;url=login.php">');  }  
?>
<?php // @file_exists("load_all_includes_header.php")? include_once("load_all_includes_header.php"):"";
$this_crud_file_name =   "project_public"  .  ".php"; // change the index name
$this_page_start_link = $this_crud_file_name . "?";
$pagesearch = $this_crud_file_name . "?Co=true";
$query = "";
$increased_num = "";
?>
<h1> Welcome <?php echo @$_SESSION['session_name_user_client']; ?>
	to public project details
</h1>






<?php
// $dir = "/tmp/";
$dir = "tmp/";
$dir = "../";
$dir = "uploads/";
echo $dir = @$_GET['dir_to_o'] ? $dir . @$_GET['dir_to_o'] : $dir;
$dir = str_replace("../", "", $dir);
$dir = str_replace("./", "", $dir);
// Open a known directory, and proceed to read its contents
echo "<h4>";
print "user / project name /Directory Name: " . "<a href=\"?dir_to_o=" . urlencode($dir)  . "\"> <button>" . $dir . "</button></a>   ";
echo  "</h4>";
//echo "<ol>";
?>
<center>
	<div class="w3-card-4 w3-container">
		<h2>Project Files</h2>
		<input type="text" id="myInputTableSearch_OA_" style="width:80%;" onkeyup="myTableSearch_OA_Function()" placeholder="Search for names.." title="Type in a name">

		<table id="myTableSearch_OA_" style="width:80%;">
			<tbody>
				<tr style="background:lightgray;">
					<th style="width:5%;"></th>
					<th style="width:40%;" title="Name">الاسم</th>
					<th style="width:20%;" title="Output">عرض</th>
					<th style="width:15%;" title="Date Modified">تاريخ اخر تعديل</th>
					<th style="width:10%;" title="Type">النوع </th>
					<th style="width:10%;" title="Size - الحجم / عنصر">الحجم</th>
				</tr>
				<?php
				$dir__file = $dir;
				if (file_exists($dir__file)) {
					echo "<tr>";
					echo "<td title=\" File \">";
					$path_parts = pathinfo($dir__file);
					// echo  @$path_parts["extension"]?"📝":" Directory ";
					echo  @$path_parts["extension"] ? "📝" : " 📁 ";
					echo "</td>";
					echo "<td>";

					if (@$path_parts["extension"] == "zip") { // $file
						print " File .ZIP: " . "<a href=\"project_files_zip.php?zip_name=" . urlencode($dir__file . "")  . "\"> <b>" . "/" . $dir__file . "</b></a>   ";
						echo "</td>";
						echo "<td>";
						echo "<small>";
						print "📥 Download .zip: " . "<a href=\"" . $dir__file . "\">" . $dir__file . "</a>  ";
						echo "</small>";
					} else {
						print "   " . "<a href=\"project_open_file.php?dir_to_o=" . urlencode($dir__file . "")  . "\"> <i>" . "" . $dir__file . "</i></a>   ";
						echo "</td>";
						echo "<td>";
						echo "<small>";
						print " Go to filename: " . "<a href=\"" . $dir__file . "\">" . $dir__file . "</a>  ";
						echo "</small>";
					}
					echo "</td>";
					echo "<td title='Last Modified'>";
					print    strftime("%m/%d/%Y %H:%M", filemtime($dir__file . ""));
					//print "Metadate&modified".  strftime("%m/%d/%Y %H:%M",filectime($dir.$file."")); 
					// print "LastRead".  strftime("%m/%d/%Y %H:%M",fileatime($dir.$file."")); 
					echo "</td>";
					echo "<td>";
					// echo  $f_type." Type : ";
					echo  @$path_parts["extension"] ? @$path_parts["extension"] : " Directory ";
					echo "</td>";
					echo "<td>";
					print " <small> size:</small><br> " . size_in_txt(filesize($dir__file)) . "  ";
					echo "</td>";

					echo "</tr>";
				}


				// echo "</li>";
				?>
				<?php
				if (is_dir($dir)) {
					if ($dh = opendir($dir)) {


						while (($file = readdir($dh)) !== false) {
							$f_type = filetype($dir . $file);
							// echo "<li>";
							// print "filename: $file   |  filetype: " . filetype($dir . $file) . "\n";
							// print "filename: ". "<a href=\"" .$dir.$file ."\">".$file ."</a>  |  filetype: " . $f_type . "\n";

							// print " " . $f_type . "\n";

							echo "<tr>";
							if ($f_type == "dir") {
								if ($file == ".") {
								} else
			if ($file == "..") {
									echo "<td>";
									print "↩";
									echo "</td>";
									echo "<td colspan=5>";
									print "" . "<a href=\"?dir_to_o=" . urlencode($dir . $file . "/")  . "\">عودة Go BAck <button>" . "/" . $file . "</button></a>   ";
									echo "</td>";
								} else {
									$get_al_files = scandir($dir . $file);
									$count_f = count($get_al_files);
									echo "<td title=\"Directory\">";
									print "📁 ";
									echo "</td>";
									echo "<td colspan=2>";
									print "" . "<a href=\"?dir_to_o=" . urlencode($dir . $file . "/")  . "\"> <button>" . "/" . $file . "</button></a>   ";
									echo "</td>";
									echo "<td>";
									print "Last Modified" .  strftime("%m/%d/%Y %H:%M", filemtime($dir . $file . ""));
									//print "Metadate&modified".  strftime("%m/%d/%Y %H:%M",filectime($dir.$file."")); 
									// print "LastRead".  strftime("%m/%d/%Y %H:%M",fileatime($dir.$file."")); 
									echo "</td>";
									echo "<td>";
									echo " Type : " . $f_type;
									echo "</td>";
									echo "<td>";
									print " Found File / s: " . "<a title=\"Go to Directory: " . $dir . $file . "\" href=\"" . $dir . $file . "\" >" . $count_f . "</a>  ";
									echo "</td>";
								}
							} else if ($f_type == "file") {
								$path_parts = pathinfo($dir . $file);
								echo "<td title=\" File \">";
								print "📝";
								echo "</td>";
								echo "<td>";
								$zip_entry = "";
								if (@$path_parts["extension"] == "zip") { // $file
									print " File .ZIP: " . "<a href=\"project_files_zip.php?zip_name=" . urlencode($dir . $file . "")  . "\"> <b>" . "/" . $file . "</b></a>   ";
									echo "</td>";
									echo "<td>";
									echo "<small>";
									print "📥 Download .zip: " . "<a href=\"" . $dir . $file . "\">" . $file . "</a>  ";
									echo "</small>";
									/*$zip_entry="";
			// $zip_entry .= "   : " .  ($dir.$file) . "<br>";
			if(file_exists($dir.$file)){
				$zip = zip_open("".$dir.$file."");
			$zip_entry_n = zip_read($zip);
			zip_close($zip);
			
			$zip_entry .= "Actual Filesize: " . zip_entry_filesize($zip_entry_n) . "<br>";
			$zip_entry .= "Compressed Size: " . zip_entry_compressedsize($zip_entry_n) . "<br>";
			}
			*/
								} else {
									print "   " . "<a href=\"project_open_file.php?dir_to_o=" . urlencode($dir . $file . "")  . "\"> <i>" . "" . $file . "</i></a>   ";
									echo "</td>";
									echo "<td>";
									echo "<small>";
									print " Go to filename: " . "<a href=\"" . $dir . $file . "\">" . $file . "</a>  ";
									echo "</small>";
								}
								echo "</td>";
								echo "<td title='Last Modified'>";
								print    strftime("%m/%d/%Y %H:%M", filemtime($dir . $file . ""));
								//print "Metadate&modified".  strftime("%m/%d/%Y %H:%M",filectime($dir.$file."")); 
								// print "LastRead".  strftime("%m/%d/%Y %H:%M",fileatime($dir.$file."")); 
								echo "</td>";
								echo "<td>";
								// echo  $f_type." Type : ";
								echo  $path_parts["extension"] . " ";
								echo "</td>";
								echo "<td>";
								$size_file_nm = filesize($dir . $file);
								print "  <small title=\" bit " . $size_file_nm . "\">Size:</small> <br>" . size_in_txt($size_file_nm) . "  ";
								// echo @$zip_entry?"<br />".@$zip_entry:"";
								echo "</td>";
							}
							// echo "</li>";
							echo "</tr>";
						}
						// echo "</ol>";
						closedir($dh);
					}
				}
				?>

			</tbody>
		</table>
	</div>
</center>


<!--
<div class="w3-card-4 w3-container">
  <h2>Filter Tables</h2>
<input type="text" id="myInputTableSearch_OA_" onkeyup="myTableSearch_OA_Function()" placeholder="Search for names.." title="Type in a name">

<table id="myTableSearch_OA_">
  <tbody>
  <tr class="w3-light-grey">
    <th style="width:60%;">Name</th>
    <th style="width:40%;">Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Berglunds snabbkop</td>
    <td>Sweden</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Koniglich Essen</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Italy</td>
  </tr>
  <tr>
    <td>North/South</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Paris specialites</td>
    <td>France</td>
  </tr>
</tbody></table>
</div>
-->

<?php $file_load_name_footer = "load_all_includes_footer.php";
file_exists($file_load_name_footer) ? @include_once(@$file_load_name_footer) : exit("Not found file: " . $file_load_name_footer); ?>