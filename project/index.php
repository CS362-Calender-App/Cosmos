<?php 
session_start();

include("connection.php");
include("session.php");

$user_data = check_login($con);
$ID = $_SESSION['ID'];
$query = "SELECT * FROM habits WHERE ID = '$ID' limit 1";
$result = mysqli_query($con, $query);
		
if($result && mysqli_num_rows($result) > 0 ) 
	{
		$habits_data = mysqli_fetch_assoc($result);
	}

$arrayOfColors[0] = "#DF362D";
$arrayOfColors[1] = "#FF8370";
$arrayOfColors[2] = "#00B1B0";
$arrayOfColors[3] = "#FEC84D";
$arrayOfColors[4] = "#E42256";
$arrayOfColors[5] = "#01949A";
$arrayOfColors[6] = "#01949A";
$arrayOfColors[7] = "#01949A";
$arrayOfColors[8] = "#01949A";
$arrayOfColors[9] = "#01949A";
$arrayOfColors[10] = "#01949A";
$arrayOfColors[11] = "#01949A";
$arrayOfColors[12] = "#01949A";


$sql ="SELECT * FROM habits WHERE UserID = '$ID' ";
$result2 = mysqli_query($con, $sql);
$rowCount = mysqli_num_rows($result2);
$current  =0; 
$total = $rowCount*100;

$sql2 ="SELECT * FROM users ORDER BY points DESC LIMIT 2 ";
$result3 = mysqli_query($con, $sql2);
$rowCount2 = mysqli_num_rows($result3);
 ?>


 <!DOCTYPE html>
<html lang="en-US">
	<head>
		
		<title>Cosmos - Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="main.css" type="text/css">
		<link rel="stylesheet" href="calendar.css" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href="https://fonts.googleapis.com/css2?family=Sora:wght@700&display=swap" rel="stylesheet"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
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
						<a class="btn btn-primary" href="reminder.php">Reminder</a>
						<a class="btn btn-primary" href="habits.php">Habits</a>
						
					</div>
				</div>
				<div class="col-sm-7 calendar1 top-padder">
					<div class=" calendar box-rounded">
						<h2>Calendar</h2>
						
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
				            <div class="days"></div>
				       
					</div>
				</div>
				<div class="col-sm-3 top-padder">
					<div class="jumbotron box-transparent box-rounded notifier">
						<h3>Quick Reminder</h3>
					</div>
					<div class="jumbotron box-transparent box-rounded notifier">
						<h3>Leaderboard</h3>
							<?php 
								if($rowCount2 >0)
									{
										$index=0;
										while($row2 = mysqli_fetch_assoc($result3))
											{
											$index++;
											echo "<h3> $index. ".$row2['Name']." </h3>";
											}
									}
							?>
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
						<h3> Your Progression </h3>
						<div class="progress">
							<?php  
								if($rowCount >0)
									{
										$index=0;
										while($row = mysqli_fetch_assoc($result2))
											{
												$width = ($row['Percentage']/ $total)*100;
												$Description_= $row['Description'];
												echo"
													<div class= 'progress-bar' role = 'progressbar'
												        aria-valuenow = '60' aria-valuemin = '0' aria-valuemax = '100' style = 'width:".$width."%; background-color: ".$arrayOfColors[$index]." !important;' ".$width."% title =".$Description_."> 
												    </div>";
												$index++;
											}
									}
							?>										
							</div>
						</div>
					</div>
					
				</div>
				<div class="col-sm-3">
					<footer>@2021 - CPSC 362 - Group 2</footer>
				</div>
			</div>
		</div>
		<script src="script.js"></script>
	</body>
</html>
