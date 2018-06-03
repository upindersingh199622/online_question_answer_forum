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
		replylink($_GET['cid'],$_GET['scid'],$_GET['tid']);
	?>
	</div>

		<?php
			
				disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']);
				echo "<div class='content'><p>ALL Replies(".countReplies($_GET['cid'], $_GET['scid'], $_GET['tid']).")</p></div>";/*number of replies*/
				dispreplies($_GET['cid'],$_GET['scid'],$_GET['tid']);
		?>
</body>
</html>
