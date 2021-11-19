<?php 
	session_start();

	include("connection.php");
	include("session.php");

	$user_data = check_login($con);

	$ID = $_SESSION['ID'];

	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$reminderDescription = $_POST['reminder_description'];
		$Date = $_POST['date'];
		$Time = $_POST['time'];
		$Location = $_POST['loaction'];
		$Recurrence = $_POST['recurrence'];
	
		if(!empty($reminderDescription) && !empty($Date) && !empty($Time)) {
			$addReminder = "INSERT INTO reminders (UserID, Description, Date, Time, Location, Reoccuring) 
							VALUES ('$ID', '$reminderDescription', '$Date', '$Time', '$Location', '$Recurrence')";
			mysqli_query($con, $addReminder);
			
			header("Location: reminders.php");
			die;
		} 
		else {
			echo "Please enter some valid information!";
		}
	}

	$result = "SELECT UserID, Description, Date, Time, Location, Reoccuring
			   FROM reminders
			   WHERE Date >= CURDATE() AND UserID = '$ID'
			   ORDER BY Date";
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
		<link rel="stylesheet" href="reminder.css" type="text/css">
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
						<h2>Reminders</h2>
						<div class = "scroll">
							<table>
								<?php 
									date_default_timezone_set('US/Pacific');
									$currDate = date("m/d/Y");

									if (mysqli_num_rows($result) > 0) {
										echo "<tr>";
											echo "<th>Reminder</th>";
											echo "<th>Date</th>";
											echo "<th>Time</th>";
											echo "<th>Location</th>";
											echo "<th>Recurrence</th>";
										echo "</tr>";

										while ($row = mysqli_fetch_array($result)) {
											$remUserID = $row[0];
											$remDescription = $row[1];
											$remDate = date("m/d/Y", strtotime($row[2]));
											$remTime = date("h:i a", strtotime($row[3]));
											$remLocation = $row[4];
											$remRecurring = $row[5];

											echo "<tr>";
												echo "<td>" . $remDescription . "</td>";
												echo "<td>" . $remDate . "</td>";
												echo "<td>" . $remTime . "</td>";
												echo "<td>" . $remLocation . "</td>";
												echo "<td>" . $remRecurring . "</td>";
											echo "</tr>";
										}
									}
								?>
							</table>
						</div>
					</div>
				</div>
				<div class="col-sm-3 create-reminder top-padder">
					<div class="jumbotron box-transparent box-rounded">
						<h2>Create a Reminder</h2>
						<br />
						<form method = "POST">
							<div class="form-group">
								<label for="reminder_description">Reminder Description</label>
								<input type="reminder_description" class="form-control" name="reminder_description">
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
								<label for="recurrence">Recurrence</label>
								<input type="recurrence" class="form-control" name="recurrence">
							</div>
							<button type="save" class="btn btn-default">Save</button>
						</form>
						<br />
					</div>
				</div>
			</div>
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
