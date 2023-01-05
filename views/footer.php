		<br />
		<center>
			<ul  class="footer" >
				<li class="headli" ><a href="index.php" title="Contact us" >البدء</a></li>
				<li class="headli" ><a href="about.php" title="AboutUs" >من نحن</a></li>
				<li class="headli" ><a href="contactus.php" title="Contact us" >تواصل معنا</a></li>
				<li class="headli" ><a href="index.php#ourteam" title="Policies" >اللوائح والقوانين</a></li>
				<li class="headli" ><a href="our_community.php#ourteam" title=" Our Community" >👥 مجتمعنا</a></li>
				<li class="headli" ><a href="video_about_project.mp4" title=" haw to use it " >📽️ كيفية الاستخدام</a></li>
				<li class="headli" ><a href="https://github.com/OA-omar-ahmed/Arabic-Open-Source-Platform" title="This Project in Github" ><img src="../assets/images/github_download.png" width="50" height="auto" /></a></li>
			</ul>
			<br />
			<br />
			  <p class="clear">&copy;OmarAhmed & OurTeam 2022 - <?php echo @date("Y")>"2022"?@date("Y"):"";?></p>
			<br />
		</center>
	<script>
		function myTableSearch_OA_Function() {
		  var input, filter, table, tr, td, i;
		  input = document.getElementById('myInputTableSearch_OA_');
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTableSearch_OA_");
		  tr = table.getElementsByTagName('tr');
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName('td')[0];
			if (td) {
			  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = '';
			  } else {
				tr[i].style.display = 'none';
			  }
			}       
		  }
		}
</script>

<script>
function myFilterList_oa_eFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById('myFilterList_oa_eInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myFilterList_oa_eUL");
    li = ul.getElementsByTagName('li');
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName('a')[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = '';
        } else {
            li[i].style.display = 'none';

        }
    }
}
</script>
   
	</body>				
</html>				
