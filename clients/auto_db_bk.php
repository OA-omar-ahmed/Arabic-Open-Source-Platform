<?php
// // DB :   # tst_db_uni 
// TB :      # tb_uploaded_file
// cols:     #  idfile srcfi fkid
$database_name = "oa_opensource_proj_o_v4_os_db";  // oa_opensource_proj_o_v4_os_db
// ref link: # id_to_ad 

function omar_ahmed_create_db($q = "")
{
  global $database_name;
  if ($q) {
    echo "<br><hr>" . $q . "<hr>";
    $hostname_con = "localhost";
    $dbname_con = "" . $database_name . "";
    $username_con = "root";
    $hostpas_con = "";
    $connection = mysqli_connect($hostname_con, $username_con, $hostpas_con, $dbname_con) or trigger_error(mysql_error(), E_USER_ERROR);
    if (!$connection) {
      echo ("Database Connection failed: " . mysqli_error());
    } else {
      echo "Connected Successfully";
    }
    $ccresultcc_2_bl159 = mysqli_query($connection, $q);
    // "CREATE TABLE IF NOT EXISTS `tb_uploaded_file` ( `idfile` int(11) NOT NULL AUTO_INCREMENT, `srcfi` text NOT NULL,`fkid` text NOT NULL, PRIMARY KEY (`idfile`) ) ENGINE = MYISAM ; "
    if ($ccresultcc_2_bl159) {
      echo ("Table tb_uploaded_file Created Successfully ");
    } else {
      echo "";
      echo ("Table tb_uploaded_file exist, Or failed " . mysqli_error());
    }
  }
}
?>
<?php  // /* 
?>

<hr />
<h1>DB: <?php echo $database_name; ?></h1>
__________________________ start database creation __________________________ <?php $hostname_con = "localhost";
                                                                              $dbname_con = "";
                                                                              $username_con = "root";
                                                                              $hostpas_con = "";
                                                                              $connection = mysqli_connect($hostname_con, $username_con, $hostpas_con, $dbname_con) or trigger_error(mysql_error(), E_USER_ERROR);
                                                                              if (!$connection) {
                                                                                echo ("Database Connection failed: " . mysqli_error());
                                                                              } else {
                                                                                echo "Connected Successfully";
                                                                              }
                                                                              $ccresultcc_1_bl159 = mysqli_query($connection, "CREATE DATABASE IF NOT EXISTS  `" . $database_name . "` ");
                                                                              if ($ccresultcc_1_bl159) {
                                                                                echo ("DataBase Created sucessfuly
^_^
");
                                                                              } else {
                                                                                echo "";
                                                                                die("DataBase exist, Or failed " . mysqli_error());
                                                                              } ?>

<hr />
<h2>tb_uploaded_file</h2>
__________________________
__________________________ start table creation __________________________ <?php $hostname_con = "localhost";
                                                                            $dbname_con = "" . $database_name . "";
                                                                            $username_con = "root";
                                                                            $hostpas_con = "";
                                                                            $connection = mysqli_connect($hostname_con, $username_con, $hostpas_con, $dbname_con) or trigger_error(mysql_error(), E_USER_ERROR);
                                                                            if (!$connection) {
                                                                              echo ("Database Connection failed: " . mysqli_error());
                                                                            } else {
                                                                              echo "Connected Successfully";
                                                                            }
                                                                            $ccresultcc_2_bl159 = mysqli_query($connection, "CREATE TABLE IF NOT EXISTS `tb_uploaded_file` ( `idfile` int(11) NOT NULL AUTO_INCREMENT, `srcfi` text NOT NULL,`fkid` text NOT NULL, PRIMARY KEY (`idfile`) ) ENGINE = MYISAM ; ");
                                                                            if ($ccresultcc_2_bl159) {
                                                                              echo ("Table tb_uploaded_file Created Successfully ");
                                                                            } else {
                                                                              echo "";
                                                                              echo ("Table tb_uploaded_file exist, Or failed " . mysqli_error());
                                                                            } ?>
©OmarAhmed_2017_2022 __________________________
__________________________ __________________________ __________________________ __________________________ __________________________ end database and table creation ________________

<?php

// */
?>



<hr />
<h2>comments_tb</h2>
<?php // echo omar_ahmed_create_db("CREATE TABLE IF NOT EXISTS `comments_tb` ( `id` int(11) NOT NULL AUTO_INCREMENT, `comment` text NOT NULL,`project_id` text NOT NULL,`user_id` text NOT NULL,`date` text NOT NULL, PRIMARY KEY (`id`) ) ENGINE = MYISAM ; "); 
?>
<br>


<hr />
<h2>ins</h2>
<?php echo omar_ahmed_create_db("CREATE TABLE     IF NOT EXISTS `comments_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT ,
  `comment` text NOT NULL,
  `project_id` text NOT NULL,
  `user_id` text NOT NULL,
  `date` text NOT NULL, PRIMARY KEY (`id`) ) ENGINE = MYISAM  ;"); ?>
<br>




<hr />
<h2>comments_tb ins</h2>
<?php echo omar_ahmed_create_db("INSERT INTO `comments_tb` (`id`, `comment`, `project_id`, `user_id`, `date`) VALUES
(1, 'dddddddd', '12', '4', 'hidden'),
(2, 'very nice', '1', '1', '02/03/2022 17:45'),
(3, 'hello', '1', '1', '02/03/2022 17:46'),
(4, 'hello', '1', '1', '02/03/2022 17:46'),
(5, 'hello', '1', '1', '02/03/2022 17:46'),
(6, 'hello', '1', '1', '02/03/2022 17:46'),
(7, 'hello', '1', '1', '02/03/2022 17:46'),
(8, 'hello', '1', '1', '02/03/2022 17:46'),
(9, 'hello', '1', '1', '02/03/2022 17:46'),
(10, 'aaaaaaa', '1', '1', '02/03/2022 17:56'),
(11, 'dfdsf', '1', '1', '02/03/2022 17:56'),
(12, 'dfdsf', '1', '1', '02/03/2022 17:56'),
(13, 'dfdsf', '1', '1', '02/03/2022 17:56'),
(14, 'dfdsf', '1', '1', '02/03/2022 17:56'),
(15, 'dfdsf', '1', '1', '02/03/2022 17:56'),
(16, 'جميللل', '3', '1', '02/03/2022 19:02'),
(17, 'جميللل', '3', '1', '02/03/2022 19:02'),
(28, 'very nice', '2', '1', '02/03/2022 19:34'),
(40, 'niccce', '1', '3', '02/04/2022 23:19'),
(41, 'thank you', '2', '3', '02/04/2022 23:46');
");

// die;
?>
<br>




<hr />
<h2> projects_tb</h2>
<?php echo omar_ahmed_create_db("CREATE TABLE  IF NOT EXISTS `projects_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo_img` text NOT NULL,
  `proj_class` text NOT NULL,
  `user_id` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `published_date` text NOT NULL,
  `date_last_update` text NOT NULL,
  `proj_status` text NOT NULL,
  `version_num` text NOT NULL,
  `cat_id` text NOT NULL,
  `downloads_num` text NOT NULL, PRIMARY KEY (`id`) ) ENGINE = MYISAM  ;"); ?>
<br>



<hr />
<h2>ins </h2>
<?php echo omar_ahmed_create_db("INSERT INTO `projects_tb` (`id`, `logo_img`, `proj_class`, `user_id`, `name`, `description`, `published_date`, `date_last_update`, `proj_status`, `version_num`, `cat_id`, `downloads_num`) VALUES
(1, 'logo hidden', 'PHP', '1', 'Open source project php', 'this is lesson of php this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C# this is lesson of C#', 'hidden', '', 'hidden - open', 'v1', 'hidden - open source', 'hidden - 1'),
(2, 'عدد المشاهدات 1', 'Open Source - PHP', '3', 'Open source project php LMS', 'Learning management system', '22/01/2022 19:04', '-', 'Public', '1', 'Open Source Programming Projects', 'عدد التحميلات 0'),
(3, 'عدد المشاهدات 1', 'Open Source - PHP', '1', 'open source HTML & Text editor by omar ahmed', 'open source HTML & Text editor by omar ahmed.', '28/01/2022 19:56', '-', 'Public', '1', 'Open Source Programming Projects', 'عدد التحميلات 0');"); ?>
<br>




<hr />
<h2> tb_uploaded_file</h2>
<?php echo omar_ahmed_create_db("CREATE TABLE  IF NOT EXISTS `tb_uploaded_file` (
  `idfile` int(11) NOT NULL,
  `srcfi` text NOT NULL,
  `fkid` text NOT NULL, PRIMARY KEY (`id`) ) ENGINE = MYISAM  ;
"); ?>
<br>




<hr />
<h2>ins</h2>
<?php echo omar_ahmed_create_db("INSERT INTO `tb_uploaded_file` (`idfile`, `srcfi`, `fkid`) VALUES
(1, 'uploads/419bf9a23a21d0ae44364618517f0f82.png', '1'),
(2, 'uploads/aa24558276307fb84144533f2c0ee285.png', '1'),
(3, 'uploads/2253596e3adf79326676f963fef2403e.png', '1'),
(4, 'uploads/9650b20859176c81d19a70ccac79fbb4.png', 'imgN_users_tb_rec_record__1'),
(5, 'uploads/4ed697f1a454a06b1a5135acef36dbac.png', 'imgN_users_tb_rec_record__2'),
(6, 'uploads/f08fd9622f61540bcc905d6d42ebc2b8.png', 'imgN_projects_tb_rec_record__1'),
(8, 'uploads/d4dae29dc375f2d69c0cc6024c5e5aeb.zip', 'fiN4306735f8f7afd7f63d8c3bd14161ce9'),
(9, 'uploads/7df148bbf2c0f3b91aa5afc8ef1f3750.png', 'imgN_projects_tb_rec_record__2'),
(10, 'uploads/51bc551ea43a537a300e9ed0d2a11388.zip', 'fiN7bd3a145fcd546b99f88c63977282169'),
(11, 'uploads/fb92dbe3e0cbfa992bb09d41148ea520.png', 'imgN_projects_tb_rec_record__3'),
(12, 'uploads/03468ed8834095e564fce43393e77d14.zip', 'fiN402ebbf409c9d05bf158124979173e24'),
(13, 'uploads/ee028526830d4c644d2056545f4d294d.png', ''),
(14, 'uploads/108c81dc2e7aee5a2a5564ee9a201c98.png', 'imgN_users_tb_rec_record__3');"); ?>
<br>



<hr />
<h2> users_tb</h2>
<?php echo omar_ahmed_create_db("CREATE TABLE  IF NOT EXISTS `users_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_name` text NOT NULL,
  `type_user` text NOT NULL,
  `description_profile` text NOT NULL,
  `account_setting` text NOT NULL, PRIMARY KEY (`id`) ) ENGINE = MYISAM  ;
"); ?>
<br>




<hr />
<h2>ins</h2>
<?php echo omar_ahmed_create_db("INSERT INTO `users_tb` (`id`, `name`, `email`, `user_password`, `user_name`, `type_user`, `description_profile`, `account_setting`) VALUES
(1, 'Omar Ahmed', 'omar@gmail.com', 'd4466cce49457cfea18222f5a7cd3573', 'omar', 'Owner & Team Leader', 'this is omar is developer and not a user-company-team', '1'),
(2, 'Omar Ahmed', 'omarahmed.edu@gmail.com', 'd4466cce49457cfea18222f5a7cd3573', 'omar_ahmed', 'Developer-Programmar', 'this is omar is developer and not a user-company-team', 'العامة'),
(3, 'Doaa Asaf', 'doaa@gmail.com', 'd4466cce49457cfea18222f5a7cd3573', 'doaa', 'team_member', 'i am contributer', '1'),
(4,  'سماء الزنداني', 'samaa@gmail.com', 'd4466cce49457cfea18222f5a7cd3573', 'samaa', 'team_member', 'i am programmer', '1'),
(5, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'community', 'i am contributer ', '1');
"); ?>
<?php /* echo omar_ahmed_create_db("INSERT INTO `users_tb` (`id`, `name`, `email`, `user_password`, `user_name`, `type_user`, `description_profile`, `account_setting`) VALUES
(1, 'Omar Ahmed', 'omar@gmail.com', '04ea44663cfebbfd64f1a440791334e0', 'omar', 'Developer-Programmar', 'this is omar is developer and not a user-company-team', '1'),
(2, 'Omar Ahmed', 'omarahmed.edu@gmail.com', 'd4466cce49457cfea18222f5a7cd3573', 'omar_ahmed', 'Developer-Programmar', 'this is omar is developer and not a user-company-team', 'العامة'),
(3, 'Doaa Asaf', 'doaa@gmail.com', '04ea44663cfebbfd64f1a440791334e0', 'doaa', '1', 'i am programmer', '1'),
(4, 'سماء الزنداني', 'samaa@gmail.com', '04ea44663cfebbfd64f1a440791334e0', 'samaa', '1', 'i am programmer', '1');
"); */ ?>

<br>




<hr />
<h2>comments_tb</h2>
<?php echo omar_ahmed_create_db("CREATE TABLE  IF NOT EXISTS `categories_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `sub_cat` text NOT NULL,
  `user_id` text NOT NULL,
  `statues` text NOT NULL, PRIMARY KEY (`id`) ) ENGINE = MYISAM  ;
"); ?>
<br>




<?php /*  ?>
 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 

 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 

 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 
 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 

 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 

 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 
 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 

 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 

 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 
 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 

 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 

 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 
 
 <hr /><h2>comments_tb</h2>
<?php echo omar_ahmed_create_db(""); ?> 
 <br>

 <?php // */  ?>

<?php
/* 
$hostname_con = "localhost"; $dbname_con = "".$database_name.""; $username_con = "root"; $hostpas_con = "";
$connection = mysqli_connect($hostname_con,$username_con,$hostpas_con,$dbname_con) or trigger_error(mysql_error(),E_USER_ERROR);
if(!$connection){ echo("Database Connection failed: ".mysqli_error()); }else{ echo "Connected Successfully"; }
$ccresultcc_2_bl1035 = mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `comments_tb` ( `id` int(11) NOT NULL AUTO_INCREMENT, `comment` text NOT NULL,`project_id` text NOT NULL,`user_id` text NOT NULL,`date` text NOT NULL, PRIMARY KEY (`id`) ) ENGINE = MYISAM ; ");
if( $ccresultcc_2_bl1035 ){ echo ("Table comments_tb Created Successfully " ); }else{ echo ""; echo("Table comments_tb exist, Or failed ".mysqli_error()); } ?>
©OmarAhmed_2017_2021 __________________________
__________________________ __________________________ __________________________ __________________________ __________________________ end database and table creation __________________________ __________________________ __________________________ __________________________ __________________________










<hr /><h2> categories_tb </h2>

__________________________ start table creation __________________________
<?php $hostname_con = "localhost"; $dbname_con = "".$database_name.""; $username_con = "root"; $hostpas_con = "";
$connection = mysqli_connect($hostname_con,$username_con,$hostpas_con,$dbname_con) or trigger_error(mysql_error(),E_USER_ERROR);
if(!$connection){ echo("Database Connection failed: ".mysqli_error()); }else{ echo "Connected Successfully"; }
$ccresultcc_2_bl1235 = mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `categories_tb` ( `id` int(11) NOT NULL AUTO_INCREMENT, `name` text NOT NULL,`sub_cat` text NOT NULL,`user_id` text NOT NULL,`statues` text NOT NULL, PRIMARY KEY (`id`) ) ENGINE = MYISAM ; ");
if( $ccresultcc_2_bl1235 ){ echo ("Table categories_tb Created Successfully " ); }else{ echo ""; echo("Table categories_tb exist, Or failed ".mysqli_error()); } ?>
©OmarAhmed_2017_2021 __________________________
__________________________ __________________________ __________________________ __________________________ __________________________ end database and table creation __________________________ __________________________ __________________________ __________________________ __________________________

<?php // */ ?>





©OmarAhmed_2017_2022 __________________________