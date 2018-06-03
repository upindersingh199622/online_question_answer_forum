<?php
include('layout_manager.php');
include('content_function.php');
?>
<html>
	<head>
		<title>MY Forum</title>
		<link  type="text/css" href="/forum-project/styles/main.css" rel="stylesheet">
	</head>

<body>
	<div class="pane">
		<div class="header"><h1><a href="/forum-project">Welcome to the Forum</a></h1></div>
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
	<div class="formdesc">
	</div>
	
	<div class="content">
		<?php 
				if(isset($_SESSION['username'])){
					
					echo "<form action='/forum-project/addnewtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'
							method='POST'>
							<p>Title: </p>
							<input type='text' id='topic' name='topic' size='100' />
							<p>Content: </p>
							<textarea id='content' name='content'></textarea><br  />
							<input type='submit' value='add new post' /></form>";
				}
				else{
					
					echo "<p>Please Login First or <a href = '/forum-project/register.php'>Click here</a> to register.</p>";
				}
				
		?>
	</div>
</body>
</html>
