<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Username: <input type="text"  value="admin" readonly><br>

	<?php
	if(isset($_SESSION['username']) && $_SESSION['username'] == "admin"){
	
		echo"<form action='addquestion.php' method='post' name='form'>
			<div>
				<label>Question Statment:</label>
				<input type='text' name='question' required><br>
				<label>Option A:</label>
				<input type='text' name='optiona' required><br>
				<label>Option B:</label>
				<input type='text' name='optionb' required><br>
				<label>Option C:</label>
				<input type='text' name='optionc' required><br>
				<label>Option D:</label>
				<input type='text' name='optiond' required><br>
				<label>Answer(Enter A/B/C/D)</label>
				<input type='text' name='answer' required>
				<input type='submit' name='submit' value='submit'>
			</div>
		</form>";
	}
	else{
		echo "You are not logged in.<br>";
		echo "<a href='login.php'>Login</a>";
	}
	?>
</body>
</html>