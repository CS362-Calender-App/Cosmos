<?php 

session_start();

include("connection.php");
include("function.php");



if($_SERVER['REQUEST_METHOD'] == "POST")
{

	//something was posted 
	$Name = $_POST['username'];
	$Email = $_POST['email'];
	$Password = $_POST['password'];
	
	if(!empty($Name) && !empty($Password) && !empty($Email) && !is_numeric($Name))
	{
		
		$query = "insert into users ( Name, Password, Email) values ( '$Name', '$Password', '$Email')";
		mysqli_query($con, $query);
			
		header("Location: login.php");
		die;
	}
	else
	{
		echo "Please enter some valid information!";
	}
}


 ?>


 <!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Cosmos - Register</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="main.css" type="text/css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css2?family=Sora:wght@700&display=swap" rel="stylesheet"> 
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 title">
					<span>Cosmos</span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2 menu-display">
					<div class="jumbotron box-transparent box-rounded notifier" style="padding: 0px;">
						<div class="btn-group-vertical" style="width: 100%;">
							<a class="btn btn-primary" href="index.html">Home</a>
							<a class="btn btn-primary" href="">Reminder</a>
							<a class="btn btn-primary" href="">Habits</a>
							<a class="btn btn-primary" href="">Progress</a>
						</div>
					</div>
				</div>
				<div class="col-sm-2">
				</div>
				<div class="col-sm-4">
					<div class="jumbotron box-transparent box-rounded">
						<h2 style="padding-bottom: 20px;">Register</h2>
						<form method = "POST">
							<div class="form-group">
								<label for="Username">Username</label>
								<input type="Username" class="form-control" name="username">
							
								<label for="Email">Email</label>
								<input type="Email" class="form-control" name="email">
							
								<label for="Password">Password</label>
								<input type="Password" class="form-control" name="password">
								<input id="button" type="submit" value="Register">
							</div>

							
							<!--<button type="submit" class="btn btn-default">Submit</button> -->
						</form>
					</div>
				</div>
				<div class="col-sm-4">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<div class="jumbotron box-transparent box-rounded">
						<p>Already have an account?</p>
						<!--<label>Click here</label> -->
						<br>
						<a type="button" class="btn btn-default" href="login.php">Click here</a>
					</div>
				</div>
				<div class="col-sm-4">
				</div>
			</div>
			<div class="row">
				<footer>@2021 - CPSC 362 - Group 2</footer>
			</div>
		</div>
	</body>
</html>