<?php 
session_start();

include("connection.php");
include("session.php");

$user_data = check_login($con);

// $result = "SELECT ID, UserID, Description, Date, Time, Points FROM habits";
// $result = "SELECT ID, UserID, Description, Time, Points, Date FROM habits WHERE Date > now() ORDER BY date"
$missed = "SELECT * FROM habits WHERE Date < CURDATE()";					// Missed/Unlogged Habits
$upcoming = "SELECT * FROM habits WHERE Date > CURDATE() ORDER BY Date";		// Upcoming Habits
$upcoming = mysqli_query($con, $upcoming);
$missed = mysqli_query($con, $missed);
 ?>

<!-- 
SELECT now();  -- date and time
SELECT curdate(); --date
SELECT curtime(); --time in 24-hour format

$row[0] = ID
$row[1] = USERID
$row[2] = Description
$row[3] = Date
$row[4] = Time
$row[5] = Points 
-->

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
					if (mysqli_num_rows($upcoming) > 0) {
						echo "Upcoming Habits: ";
						echo "<br>";
						while ($row = mysqli_fetch_array($upcoming)) {
							echo $row[2]." on ".$row[3];
							echo "<br>";
						}
					} elseif (mysqli_num_rows($upcoming) == 0) {
						echo "No Upcoming Habits to track";
					// TEST: Functionality may not be needed 
					//Not getting to here	
					} elseif (mysqli_num_rows($missed) > 0) {
						echo "Past Habits:  ";
						while ($row = mysqli_fetch_array($missed)) {
							echo $row[2]." on ".$row[3];
							echo "<br>";
						}
					} elseif (mysqli_num_rows($missed) == 0) {
						echo "No past habits to display";
						echo "<br>";
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