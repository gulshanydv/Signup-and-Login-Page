<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,date) values ('$user_id','$user_name','$password',NOW())";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
    body{
        background-color: #333;
    }
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: darkgreen;
		border: none;
        border-radius: 5px;
        font-size: 16px;
	}

	#box{

		background-color:lightgoldenrodyellow;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

    a{
        font-size: 20px;
    }

    #head{
        font-size: 25px;
        margin: 10px;
        color: black;
        font-weight: 500;
    }

	</style>

	<div id="box">
		
		<form method="post">
			<div id="head"><p>Signup</p></div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
