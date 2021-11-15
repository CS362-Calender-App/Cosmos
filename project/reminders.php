<?php 
session_start();

include("connection.php");
include("session.php");

$user_data = check_login($con);

$result = "SELECT ID, UserID, Description, Date, Time, Location, Reoccuring FROM reminders";
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
					<h2> <?php echo $user_data['Name']; ?></h2>
                    <a type="button" class="btn btn-default" href="logout.php">Logout</a>
				</div>
            </div>
            <div class="row main-wrapper">
                <div class="col-sm-2 menu-display">
                    <div class="jumbotron box-transparent box-rounded notifier" style="padding: 0px;">
                        <div class="btn-group-vertical" style="width: 100%;">
                            <a class="btn btn-primary" href="index.php">Home</a>
                            <a class="btn btn-primary" href="reminders.php">Reminder</a>
                            <a class="btn btn-primary" href="">Habits</a>
                            <a class="btn btn-primary" href="">Progress</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 current-reminders top-padder">
                    <div class="jumbotron box-transparent box-rounded">
                        <h2>Upcoming Reminders</h2>
						<br />
                        <p style="text-align: left; font-family: Arial; font-size: 15px"> 
                            <?php 
                                if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_array($result)) {
										echo $row[2]." ".$row[3]." ".$row[4]." ".$row[5]." ".$row[6];
										echo "<br>";
									}
								}
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-12"></div>

				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="jumbotron box-transparent box-rounded">
                        <h2>Create a Reminder</h2>
						<br />
                        <form method = "POST">
							<div class="form-group">
								<label for="habit-title">Habit Title</label>
								<input type="habit-title" class="form-control" name="habit-title">
							</div>
							<br />
							<div class="form-group">
								<label for="description">Description</label>
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
			</div>
            <div class="row">
				<div class="col-sm-12"></div>
				
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<footer>@2021 - CPSC 362 - Group 2</footer>
				</div>
				<div class="col-sm-3"></div>
			</div>
    </div>
</html>