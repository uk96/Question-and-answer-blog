<?php
	session_start();
	$user=$_SESSION['username'];
?>
<html lang="en">
<head>
		<title>UserProfile</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<style>
			img {
				border-radius: 50%;
			}
		</style>
</head>
<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
			<a class="navbar-brand" href="user_homepage.php"><font size="7">Q&A </font></a>
			<ul class="nav navbar-nav">
				<li><a class="nav-link" href="user_homepage.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a class="nav-link" href="#contact"><span class="glyphicon glyphicon-phone"></span>Contact</a></li>
				<li class="active"><a class="nav-link" href="profile.php"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right ml-auto">
				<li class="nav-item">
					<button type="button" class="btn btn-default navbar-btn" onclick="window.location.href='addQue.php'"><span class="glyphicon glyphicon-plus"></span>ADD QUESTION</button>
				</li>
				<li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li class="nav-item">
					<button type="button" class="btn btn-default navbar-btn" onclick="window.location.href='logout.php'"><span class="glyphicon glyphicon-log-out"></span>LOGOUT</button>
				</li>
				<li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</nav>
		<div class="container-fluid" style="margin-top:80px">
			<div class="container">
				<div class="row">
					<div class="col-sm-4" style="background-color:white;">	
						<img src="Images\profile_pic\<?php echo $user.".jpg";?>" width="200px" height="200px">
					</div>
					<div class="col-sm-8" style="background-color:white;">
						<ul class="nav nav-tabs">
							<li class="active"><a href="profile.php">My Profile</a></li>
							<li><a href="user_question.php">Question</a></li>
							<li><a href="user_answer.php">Answer</a></li>
						</ul>
						<br>
						<div>
						<br>
						<?php
							$conn=mysqli_connect("localhost","root","","q&a");
							$sql="Select * from user where username='$user'";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
							if(mysqli_num_rows($result)>0)
							{
								echo"<h3><b>Username:</b>  $user<br></h3>";
								echo"<h3><b>Name:</b> ".$row['FirstName']." ".$row['LastName']."<br></h3>";
								echo"<h3><b>Email:</b> ".$row['Email']."<br></h3>";
							}
						?>
						<br>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>
