<?php

	function loginform(){
		
		echo "<form action ='/forum-project/validatelogin.php' method = 'POST' > 
				<form action='addnewuser.php' method='POST'>
				<p>Username:</p>
				<input type='text' id='usernameinput' name='usernameinput' required/>
				<p>Password:</p>
				<input type='password' id='passwordinput' name='passwordinput' required/><br><br>
				<input type='submit' value='Login'/>
				<button type='button' onclick='location.href = \"/forum-project/register.php\";'>Register</button>
			</form>";
	}
	
	function logout(){
		echo nl2br("<h1><p>Welcome ".$_SESSION['username']."!\nLooking good today!</p></h1>
					<form action ='/forum-project/logout.php' method = 'GET' > 
					<input type='submit' value='Logout'/></form>");
			

	}
?>