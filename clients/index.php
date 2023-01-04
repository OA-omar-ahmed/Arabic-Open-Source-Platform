<?php

/***************************************************************************
 *_==================================_IMPORTANT_:_==================================
 **_This_is_an_educational_product_made_by_OmarAhmed_and_his_team.
 **_This_is_cannot_be_modified_for_other_than_personal_usage.
 **_This_product_cannot_be_redistributed_for_free_or_a_fee_without_written_permission_from_OmarAhmed.
 **_This_notice_may_not_be_removed_from_the_source_code.
 *_==================================_IMPORTANT_:_==================================
_______________________________________________________________________
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
________________________________©OMAR_AHMED_____________________________
|			  		 _______	 _______ 	 ___	 ___			   |
|					|		|	|	|	|	|	|	|	|			   |
|					|		|	|	|	|	|___|	|___|			   |
|					|		|	|	|	|	|	|	| \			  	   |
|					|_______|	|	|	|	|	|	|  \			   |
|______________________________________________________________________|
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                                #######   ###            
                                #	  #  #   #            
                                #©0marAhmed###            
                                #	  #  #   #            
                                #######  #   #
_______________________________________________________________________
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

 ****************************************************************************/
?>
<?php include_once("load_all_includes_header.php"); ?>
<html>

<head>
  <script src="./js/index-a30b17cdecae90149cf2.js.download"></script>
</head>
<?php if (!isset($_SESSION['session_name_user_client'])) {
  exit('<meta http-equiv="Refresh" content="0;url=login.php">');
}  ?>


 
<fieldset>
  <center>
      <h1>
      المنصة 
	  العربية 
	  للمصادر 
	  البرمجية
	    المفتوحة 
      </h1>
     <h4>
	  مشاركة 
	  وعرض 
	  المشاريع
	  المصادر 
	  البرمجية
	  
	  العربية
    </h4>
    <p>
      مجموعة ضخمة من أفضل البرامج مفتوحة المصدر في العالم ومعظمها يدعم اللغة العربية.

	   <br />
المنصة
 هو المكان الذي يبني فيه الناس البرامج. يستخدم يساعد المبرمجين وخاصة العرب الذي يصعب عليهم تعلم اللغات الانجليزية وغيرها لعمل مشروع وتقسيمها والمساهمة فيها.
    </p>
    <br>
    
	<br>
	<table  align="center" style="  width:90%; " >
		<tr style=" width:100%; ">
		<form id="form1" name="form1" method="post" action="<?php echo "projects_list.php?Co" ; if( isset( $_GET['cid'] ) ){ echo '&cid='. urlencode( $_GET['cid'] ); } echo '&cctxt=ee2'; ?>" >

		<td style=" width:15%; ">
		<input type="submit" name="btn_search_" value="بحث" style="border-radius: 8px; background:#0078D4; color:#fff;" />
		</td>
		<td style=" width:60%; ">
		<input type="search" style=" width:100%; " required="required" name="input_search_" id="txt_search_id" placeholder=" بحث عن مشروع  ..." style="border-radius: 8px; " />
		</td>
		<td style=" width:20%; ">
	 <a href="user_setting.php?Co">مساعدة من مجتمعنا</a>|
		</td>
		</form>
		</tr> </table>
		 
 <br>
     <br>
    
    <br>
    <div class="oa-box-shadow"  >
      <a href="projects_list.php?Co=1&proj_class=Open Source Programming Projects">مشاريع و مصادر برمجية مفتوحة المصدر - <br> Open Source Programming Projects</a>
    </div>
    <div class="oa-box-shadow"  >
      <a href="projects_list.php?Co=1&proj_class=Arabic Programming Language Recources">مصادر للغه برمجية عربية <br> Arabic Programming Language Recources</a>
    </div>
    <div class="oa-box-shadow" >
      <a href="projects_list.php?Co=1&proj_class=Lessons">شروحات<br>Lessons </a>
    </div>
    <div class="oa-box-shadow"    >
      <a href="projects_list.php?Co=1&proj_class=Others">مصادر تعليمية اخرى<br>Other recources </a>
    </div>
    <div class="oa-box-shadow"  >
      <a href="projects_list.php?Co=1&proj_class=Arabic">اللغات البرمجية </a> 
      <br>
	  &nbsp;|&nbsp;
	  <a href="projects_list.php?Co=1&input_search_=php"> PHP </a> 
	  &nbsp;|&nbsp;
	  <a href="projects_list.php?Co=1&input_search_=html"> HTML </a> 
	  &nbsp;|&nbsp;
	  <a href="projects_list.php?Co=1&input_search_=javascript"> Javascript </a> 
	  &nbsp;|&nbsp;
	  <a href="projects_list.php?Co=1&input_search_=c++"> C++ </a> 
	  &nbsp;|&nbsp;
	  <a href="projects_list.php?Co=1&input_search_=c#"> C# </a> 
	  &nbsp;|&nbsp;
	  
    </div>
    <div class="oa-box-shadow"  >
      <a href="projects_list.php?Co=1&proj_class=saas">Cloud - SaaS </a>
    </div>
  </center>
</fieldset>

<?php include_once "about.php"; ?>
<?php include_once "contactus.php"; ?>
<?php include_once "our_community.php"; ?>
<?php include_once "next_step.php"; ?>

 


<?php include_once("load_all_includes_footer.php"); ?>