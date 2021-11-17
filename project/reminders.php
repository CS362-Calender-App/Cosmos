<?php 
session_start();

include("connection.php");
include("session.php");

$user_data = check_login($con);

$result = "SELECT * FROM reminders WHERE Date >= CURDATE() ORDER BY Date";
$result = mysqli_query($con, $result);
 ?>

 <!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Cosmos - Reminders</title>
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
					<div class="jumbotron box-transparent box-rounded notifier" style="padding: 0px;">
						<div class="btn-group-vertical" style="width: 100%;">
							<a class="btn btn-primary" href="index.php">Home</a>
							<a class="btn btn-primary" href="reminders.php">Reminder</a>
							<a class="btn btn-primary" href="habits.php">Habits</a>
							<a class="btn btn-primary" href="">Progress</a>
						</div>
					</div>
				</div>
				<div class="col-sm-7 current-reminders top-padder">
					<div class="jumbotron box-transparent box-rounded">
						<table style = "table-layout: fixed;" align="center" width = "100%">
							<?php 
								if (mysqli_num_rows($result) > 0) {
									echo "<h2>Upcoming Reminders</h2>";

									echo "<tr'>";
										echo "<th>Reminder</th>";
										echo "<th>Date</th>";
										echo "<th>Time</th>";
										echo "<th>Location</th>";
										echo "<th>Reoccurance</th>";
									echo "</tr>";

									while ($row = mysqli_fetch_array($result)) {
										$remID = $row[0];
										$remUserID = $row[1];
										$remDescription = $row[2];
										$remDate = date("m/d/Y", strtotime($row[3]));
										$remTime = date("h:i A", strtotime($row[4]));
										$remLocation = $row[5];
										$remReoccuring = $row[6];
										
										if ($user_data['ID'] == $remUserID) {
											/*echo "<h5 style = 'text-align: left; font-family: Trebuchet MS; font-size: 15px;'>" . $remDescription . " "
													. $remDate . " " . $remTime . " " . $remLocation . " " . $remReoccuring . "</h5>";
											echo "<br />";*/

											echo "<tr style = 'text-align: left; font-family: Trebuchet MS; font-size: 15px;'>";
												echo "<td>" . $remDescription . "</td>";
												echo "<td>" . $remDate . "</td>";
												echo "<td>" . $remTime . "</td>";
												echo "<td>" . $remLocation . "</td>";
												echo "<td>" . $remReoccuring . "</td>";
											echo "</tr>";
										}
									}
								}
							?>
						</table>
					</div>
				</div>
				<div class="col-sm-3 create-reminder top-padder">
					<div class="jumbotron box-transparent box-rounded">
						<h2>Create a Reminder</h2>
						<br />
						<form method = "POST" style = "text-align: left;">
							<div class="form-group">
								<label for="description">Reminder</label>
								<input type="description" style = "font-family: Trebuchet MS;" class="form-control" name="description">
							</div>
							<br />
							<div class="form-group">
								<label for="date">Date</label>
								<input type="date" style = "font-family: Trebuchet MS;" class="form-control" name="date">
							</div>
							<br />
							<div class="form-group">
								<label for="time">Time</label>
								<input type="time" style = "font-family: Trebuchet MS;" class="form-control" name="time">
							</div>
							<br />
							<div class="form-group">
								<label for="loaction">Location</label>
								<input type="loaction" style = "font-family: Trebuchet MS;" class="form-control" name="loaction">
							</div>
							<br />
							<div class="form-group">
								<label for="reoccuring">Reoccuring</label>
								<input type="reoccuring" style = "font-family: Trebuchet MS;" class="form-control" name="reoccuring">
							</div>
						</form>
						<br />
						<button type="save" class="btn btn-default">Save</button>
					</div>
				</div>
			</div>
			<!--<div class="row">
				<div class="col-sm-12"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="jumbotron box-transparent box-rounded">
						<h2>Create a Reminder</h2>
						<br />
						<form method = "POST" style = "text-align: left;">
							<div class="form-group">
								<label for="description">Reminder</label>
								<input type="description" class="form-control" name="description">
							</div>
							<br />
							<div class="form-group">
								<label for="date">Date</label>
								<input type="date" class="form-control" name="date">
							</div>
							<br />
							<div class="form-group">
								<label for="time">Time</label>
								<input type="time" class="form-control" name="time">
							</div>
							<br />
							<div class="form-group">
								<label for="loaction">Location</label>
								<input type="loaction" class="form-control" name="loaction">
							</div>
							<br />
							<div class="form-group">
								<label for="reoccuring">Reoccuring</label>
								<input type="reoccuring" class="form-control" name="reoccuring">
							</div>
						</form>
						<br />
						<button type="save" class="btn btn-default">Save</button>
					</div>
				</div>
				<div class="col-sm-2"></div>
			/div>-->
			<div class="row">
				<div class="col-sm-12"></div>
				<div class="col-sm-2"></div>
				<div class="col-sm-7">
					<footer>@2021 - CPSC 362 - Group 2</footer>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>
