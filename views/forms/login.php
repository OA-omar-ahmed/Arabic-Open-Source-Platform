
<html>

<head>
	<title>Login page - Open source projects by OA & team </title>
	<link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
	<br /><br />
	<center class="container">

		<a href="login.php" class="active" title="Login">تسجيل دخول</a> |
		<a href="register.php" id="logo" title="Register">انشاء حساب </a>
		<br />
		<br />
		<form action="login.php" method="post" autocomplete="off">
			<input type="email" name="input_email" autofocus="true" onmouseover=" this.focus(); " placeholder="الايميل" value="admin@gmail.com" required="" />
			<input type="password" name="password" value="admin" onmouseover=" this.focus(); " placeholder="كلمة المرور" required="" />
			<input type="submit" name="submit" value="موافق" title="Login" />
			 

		</form>
	</center>
</body>

</html>