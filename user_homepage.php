<html>
	<head>
		<title>
			Q&A
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<style>
			.card:hover{
				box-shadow: 10px 10px grey;
				transition: all 200ms ease-in;
				transform: scale(1.01);
			}
			a.card,a.card:hover {
				margin: 10 50; 
				color: #212529;
				text-decoration: none;
			}
			footer {
				background-color: #808080;
				padding: 25px;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
			<a class="navbar-brand" href="user_homepage.php"><font size="7">Q&A </font></a>
			<ul class="nav navbar-nav">
				<li class="active"><a class="nav-link" href="user_homepage.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a class="nav-link" href="#contact"><span class="glyphicon glyphicon-phone"></span>Contact</a></li>
				<li><a class="nav-link" href="profile.php"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
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
		<div class="container-fluid" style="margin-top:70px">
		<?php
			session_start();
			$conn=mysqli_connect("localhost","root","","q&a");
			$sql="select * from question";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result))
			{
				echo"<a href='display_question.php?questionId=".$row['QID']."' class='card' style='width: 100rem; display: inline-block;width: 100rem;'>";
				echo"<div class='card' >";
				echo"<div class='card-body'>";
				echo"<h3 class='card-title'>".$row['Question']."</h5>";
				echo"<p class='card-text'>Asked by ".$row['username']."</p>";
				echo"<span class='label label-success'>".$row['count']." answers</span>";
				echo"</div>";
				echo"</div>";
				echo"</a><br>";
			}
			mysqli_close($conn);
		?>
		</div>
		<footer class="page-footer font-small blue blue">
			<div align="center" id="Contact">
				Q&A allow user to add question and reply to the questions added by other users<br>
				<br>
				<br>
			</div>
		</footer>
	</body>
</html>