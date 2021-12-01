<?php 
session_start();

include("connection.php");
include("session.php");

$user_data = check_login($con);
$ID = $_SESSION['ID'];
$query = "SELECT ID, UserID, Name, Description, Date, Time, Points, Percentage FROM habits WHERE USERID = ".$ID; // ALL Data      
$result = mysqli_query($con, $query);                  



$missed = "SELECT * FROM habits WHERE Date < CURDATE()";	// Missed/Unlogged Habits
$upcoming = "SELECT * FROM habits WHERE Date > CURDATE() ORDER BY Date";	// Upcoming Habits 
$upcoming = mysqli_query($con, $upcoming);
$missed = mysqli_query($con, $missed);
 ?>
<!--------------------------
ACCESS DATA:
$row[0] = ID
$row[1] = USERID
$row[2] = Name (Of habit)
$row[3] = Description
$row[4] = Date
$row[5] = Time
$row[6] = Points 
$row[7] = Percentage
--------------------------->

 <!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Cosmos - Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="main.css" type="text/css">
		<link rel="stylesheet" href="calendar.css" type="text/css">
		<link rel="stylesheet" href="habits.css" type="text/css">
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
					<div>
					<div class="box-rounded box-transparent box-rounded habit-heading">
						<h2>Upcoming Habits</h2>
					</div>
					<div class="box-rounded jumbotron box-transparent box-rounded">
					<?php 
					if (mysqli_num_rows($upcoming) > 0) {
						while ($row = mysqli_fetch_array($upcoming)) {
							echo $row[2]." on ".$row[4];
							echo "<br>";
						}
					} elseif (mysqli_num_rows($upcoming) == 0) {
						echo "No Upcoming Habits to track";
					}
					// TEST: Functionality may not be needed 
					if (mysqli_num_rows($missed) > 0) {
						echo "<br>";
						echo "<br>";
						echo "Past Habits:  ";
						echo "<br>";
						while ($row = mysqli_fetch_array($missed)) {
							echo $row[2]." on ".$row[4];
							echo "<br>";
						}
					} elseif (mysqli_num_rows($missed) == 0) {
						echo "No past habits to display";
						echo "<br>";
					}
					?>
					</div>
					</div>

				</div>
				<div class="col-sm-7 top-padder">
					<div class="box-rounded box-transparent box-rounded habit-heading">
						<h2>Habits</h2>
					</div>
					<div style="padding: 0px; height: auto;">
						<?php
						if (mysqli_num_rows($result) > 0) {
							while ($row = $result->fetch_assoc()) {
								$progressbar = "progress-bar-success";
								$alertbar = "alert-success";
								if ($row['Percentage'] <= 30) {
									$progressbar = "progress-bar-danger";
									$alertbar = "alert-danger";
								} elseif ($row['Percentage'] <= 60) {
									$progressbar = "progress-bar-warning";
									$alertbar = "alert-warning";
								}
								echo ' 
								<div>
									<div class="alert '.$alertbar.'"><b>'.$row['Name'].'</b></div>
									<div class="progress">
										<div class="progress-bar '.$progressbar.' progress-bar-striped active" role="progressbar" aria-valuenow="70"  aria-valuemin="0" aria-valuemax="100" style="width:'.$row['Percentage'].'%">'.$row['Percentage'].'%</div>
									</div>
								</div> ';
							}
						}
						
						?>
					</div>
				</div>
				<div class="col-sm-3 top-padder">
					<div class="box-rounded box-transparent box-rounded habit-heading">
						<h2>Actions</h2>
					</div>
					<div class="box-rounded box-transparent box-rounded action-box">
						<h4>Add Habit</h4>
						<a type="button" class="btn btn-default" href="">Add</a>
					</div>
					<div class="box-rounded box-transparent box-rounded action-box">
						<h4>Edit Habit</h4>
						<a type="button" class="btn btn-default" href="">Edit</a>
					</div>
					<div class="box-rounded box-transparent box-rounded action-box">
						<h4>Delete Habit</h4>
						<a type="button" class="btn btn-default" href="">Delete</a>
					</div>
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
