<?php 
session_start();

include("connection.php");
include("session.php");

$user_data = check_login($con);
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
				<div class="col-sm-7 top-padder">
					<div class="box-rounded jumbotron box-transparent box-rounded">
				            <div class="month">
				                <h3><i class="fas fa-angle-left prev"></i> </h3>
				                <div class="date">
				                    <h1></h1>
				                    <p></p>
				                </div>
				                <h3><i class="fas fa-angle-right next"></i></h3>
				            </div>
				            <div class="weekdays">
				                <div>Sun</div>
				                <div>Mon</div>
				                <div>Tue</div>
				                <div>Wed</div>
				                <div>Thu</div>
				                <div>Fri</div>
				                <div>Sat</div>
				            </div>
				            <div class="days">
							</div>
					</div>
				</div>
				<div class="col-sm-3 top-padder">
					<div class="jumbotron box-transparent box-rounded notifier">
						<h3>Quick Reminder</h3>
					</div>
					<div class="jumbotron box-transparent box-rounded notifier">
						<h3>Leaderboard</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
				</div>
				
				<div class="col-sm-2">
				</div>
				<div class="col-sm-7">
					<div class="jumbotron box-transparent box-rounded">
					</div>
					<footer>@2021 - CPSC 362 - Group 2</footer>
				</div>
				<div class="col-sm-3">
				</div>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>
