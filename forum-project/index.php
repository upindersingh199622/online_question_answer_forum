<?php
include('layout_manager.php');
include('content_function.php');
?>
<html>
	<head>
		<title>Login here</title> 
		<link  type="text/css" href="/forum-project/styles/main.css" rel="stylesheet">
	</head>

<body id="first">
	<div class="pane">
		<div class="header"><h1 class="brand-heading"><a href="/forum-project">Login</a></h1></div>
		<!--<a href="register.php">Register Here</a><br>
		<a href="login.php">Already a User? Login Here</a>
	</div>-->
	<div class="loginpane">
		<?php
				session_start();
				if(isset($_SESSION['username'])){
					logout();
				}
				else
				{
					if(isset($_GET['status'])){ 
						if($_GET['status'] == 'reg_success')
						{
							echo "<h1 style='color:green'>New User Registered Successfully!</h1>";
						}
						else if($_GET['status'] == 'login_fail'){
							echo "<h1 style='color:red'>Login Failed</h1>";
					}
					}
					loginform();
				}
		?>
	</div>
	<div class="content" href="brouch.php">
	</div>	
</body>
</html>
