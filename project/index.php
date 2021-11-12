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
		<link rel="stylesheet" href="style.css" />
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
				       
<!-- 						<h2 style="text-align: left;">October</h2>
						<div class="table-responsive">
							<table class="table" align="center"> 		  
								<thead>
									<tr>
										<th class="day-title">Sun</th>
										<th class="day-title">Mon</th>
										<th class="day-title">Tue</th>
										<th class="day-title">Wed</th>
										<th class="day-title">Thu</th>
										<th class="day-title">Fri</th>
										<th class="day-title">Sat</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>1</td>
										<td>2</td>
									</tr>
									<tr>
										<td>3</td>
										<td>4</td>
										<td>5</td>
										<td>6</td>
										<td>7</td>
										<td>8</td>
										<td>9</td>
									</tr>
									<tr>
										<td>10</td>
										<td>11</td>
										<td>12</td>
										<td>13</td>
										<td>14</td>
										<td>15</td>
										<td>16</td>
									</tr>
									<tr>
										<td>17</td>
										<td>18</td>
										<td>19</td>
										<td>20</td>
										<td>21</td>
										<td>22</td>
										<td>23</td>
									</tr>
									<tr>
										<td>24</td>
										<td>25</td>
										<td>26</td>
										<td>27</td>
										<td>28</td>
										<td>29</td>
										<td>30</td>
									</tr>
									<tr>
										<td>31</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
 -->					</div>
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
