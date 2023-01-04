<html encoding="utf-8">

<head>
	<title> Login -
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="device-width">
</head>

<body>
	<style>
		a {
			color: rgb(0, 144, 232);
		}

		a:hover {
			color: darkorange;
		}

		.main_content {
			width: 99%;
			background: rgba(0, 222, 0, .1);
		}

		.left_content {
			width: 18%;
			margin: auto 8px;
			padding: 5px;
			height: 100%;
			float: left;
			background: rgb(23, 33, 44);
			color: rgb(200, 206, 221);
		}

		.middle_content {
			width: 75%;
			height: 100%;
			margin: auto 4px;
			padding: 5px;
			float: left;
			height: 100%;
			background: rgb(236, 239, 241);
		}

		.middle_header_nav {
			display: block;
			margin: 0px auto;
			padding: 20px;
			width: auto;
			overflow-y: hidden;
			overflow-x: auto;
			text-align: center;
			max-height: 200px;
			background: rgb(0, 144, 232);
		}

		.middle_header_nav a {
			font-weight: bolder;
			text-decoration: none;
			color: white;
			padding: 20px;
			margin: 20px auto;
		}

		.middle_header_nav a:hover {
			color: lightgreen;
			text-decoration: underline;
		}
	</style>
	<div class="main_content" style="">
		<!-- LEFT -->
		<div class="left_content">
			<h2 style="background:rgb(36,47,60); color:rgb(200,206,221);  text-align:left; max-height:800px; min-width:200px; "> DASHBOARD </h2>
			<h4 style=" text-align:center;">Develop OmarAhmed CMS</h4>
			<hr> <?php include_once "menu.php"; ?>
			<p>CMS Choices</p>
			<ol>
				<li><a href="control_all_pages.php">View All Pages</a></li>
				<li><a href="control_all_pages.php">Create All Pages</a></li>
				<li><a href="#Update">Update All Pages</a></li>
				<li><a href="control_all_pages.php">Delete All Pages</a></li>
			</ol>
		</div>


		<!-- Middle -->
		<div class="middle_content">

			<table border="0" align="center" width="100%" height="100%">
				<!-- header nav -->
				<div class="middle_header_nav" style=" ">

					<a href="#" style="">HOME</a>
					<a href="control_all_articles.php">START >> </a>
					<a href="../">VIEW WEBSITE</a>
					<a href="Logout.php">LOGOUT</a>

				</div>
				<!-- Content  -->
				<table width="100%" height="100%">
					<td width="100%" height="80%" style="background:white; color:#333;overflow:scroll; max-height:600px; ">



						<!-- Thumbnails  -->
						<table border="0" align="center" width="90%" height="100%">
							<tr>
								<td colspan="3">
									<p style="color:#ccc;">Here Some ContentHere Some ContentHere Some Content</p>
								</td>
							</tr>
							<tr>
								<td width="20%" height="80%" style=" text-align:center; ">
									<h2 style=" "><a href="add_page.php">PAGE [+]</a> </h2>
									<h4 style=" background:rgb(0,168,217); color:white;">Main Page ( 0 )</h4>

								</td>
								<td width="20%" height="50%" style=" text-align:center; ">
									<h2 style=" "> <a href="control_all_pages.php">CATEGORY [+]</a> </h2>
									<h4 style=" background:rgb(0,169,165); color:white;">Subcategory and Main Category.</h4>

								</td>
								<td width="20%" height="50%" style="text-align:center ;">
									<h2 style=" "><a href="add_article.php">POST [+]</a>
									</h2>
									<h4 style="background:rgb(210,42,98); color:white; ">Add the details.</h4>

								</td>

							</tr>
						</table>

					</td>
					</tr>
				</table>



		</div>

	</div>

</body>

</html>