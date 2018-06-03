<?php
include('layout_manager.php');
include('content_function.php');
addview($_GET['cid'],$_GET['scid'],$_GET['tid']);
?>
<html>
	<head>
		<title>MY Forum</title>
		<link  type="text/css" href="/forum-project/styles/main.css" rel="stylesheet">
	</head>

<body>
	<div class="pane">
		<div class="header"><h1><a href="/forum-project">Welcome to the Forum</a></h1></div>
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
	<?php
		if(!isset($_SESSION['username'])){
			echo "<p>Please Login first or <a href=' /forum-project/register.php'>Click here</a>to register.</p>";
		}
		
	?>
	</div>
	<?php
		if(isset($_SESSION['username'])){
			replytopost($_GET['cid'],$_GET['scid'],$_GET['tid']);
			
		}
	?>
		<div class="content">
			
			<?php	disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']);
				?>
		</div>
</body>
</html>