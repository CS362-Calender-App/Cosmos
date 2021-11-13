<?php 
session_start();

include("connection.php");
include("session.php");

$user_data = check_login($con);

$result = "SELECT ID, UserID, Description, Date, Time, Points FROM habits";
$result = mysqli_query($con, $result);
 ?>

 <!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Cosmos - Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="main.css" type="text/css">
		<link rel="stylesheet" href="calendar.css" type="text/css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css2?family=Sora:wght@700&display=swap" rel="stylesheet"> 
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 title">
					<span>Cosmos</span>
				</div>
				<div class="col-sm-6 user-display">
					<br>
					<h2>Hello, <?php echo $user_data['Name']; ?></h2>
					<a type="button" class="btn btn-default" href="logout.php">Logout</a>
				</div>
			</div>
			<div class="row main-wrapper">
				<div class="col-sm-2 menu-display">
					<div class="jumbotron box-transparent box-rounded notifier btn-group-vertical" style="padding: 0px; height: auto;">
						<a class="btn btn-primary" href="index.php">Home</a>
						<a class="btn btn-primary" href="">Reminder</a>
						<a class="btn btn-primary" href="">Habits</a>
						<a class="btn btn-primary" href="">Progress</a>
					</div>
				</div>
				<div class="col-sm-9 top-padder">
					<div class="box-rounded jumbotron box-transparent box-rounded">
					<?php 
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result)) {
							echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5];
							echo "<br>";
						}
					}
					?>
					</div>
				</div>
				<div class="col-sm-1 top-padder">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
				</div>
				<div class="col-sm-2">
				</div>
				<div class="col-sm-9">
					<footer>@2021 - CPSC 362 - Group 2</footer>
				</div>
				<div class="col-sm-1">
				</div>
			</div>
		</div>
	</body>
</html>