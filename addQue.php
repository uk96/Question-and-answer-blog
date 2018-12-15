<html>
	<head>
		<title>Q&A - AddQuestion</title>
		<style>
		.wrapper-dropdown 
		{
			position: relative;
			width: 200px;
			padding: 10px;
			margin: 0 auto;

			background: #9bc7de;
			color: #fff;
			outline: none;
			cursor: pointer;

			font-weight: bold;
		}
		.purple-border textarea 
		{
			border: 1px solid #ba68c8;
		}
		.purple-border .form-control:focus 
		{
			border: 1px solid #ba68c8;
			box-shadow: 0 0 0 0.2rem rgba(186, 104, 200, .25);
		}
		* 
		{
			box-sizing: border-box;
		}

/* Create two equal columns that floats next to each other */
		.column1 
		{
			float: left;
			width: 30%;
			padding: 10px;
		}
		.column2 
		{
			float: left;
			width: 70%;
			padding: 10px;
		}
		.column3 
		{
			float: center;
			width: 100%;
			padding: 10px;
		}

/* Clear floats after the columns */
		.row:after 
		{
			content: "";
			display: table;
			clear: both;
			background-color: cyan;
		}
		
		</style>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
			<a class="navbar-brand" href="user_homepage.php"><font size="7">Q&A </font></a>
			<ul class="nav navbar-nav">
				<li><a class="nav-link" href="user_homepage.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a class="nav-link" href="addQue.php#contact"><span class="glyphicon glyphicon-phone"></span>Contact</a></li>
				<li><a class="nav-link" href="profile.php"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right ml-auto">
				<li class="nav-item">
					<button type="button" class="btn btn-default navbar-btn" onclick="window.location.href='logout.php'"><span class="glyphicon glyphicon-log-out"></span>LOGOUT</button>
				</li>
				<li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</nav>
		<div class="container-fluid" style="margin-top:80px">
		<form action="add_question_backend.php" method="post">
			<table width="60%" bgcolor="cyan" align="center">
			<tr>
				<td colspan="2" bgcolor="#5F9EA0">
				<h2 align="center" style="color:white">ADD QUESTION</h2>
				</td>
			</tr>
			<tr>
				<td>
				<h3>Question Type</h3>
				</td>
				<td>
				<select class="wrapper-dropdown" name="quet">
						<option value="sci"><b>SCIENCE</b></option>
						<option value="bm"><b>BASIC MATHS</b></option>
						<option value="com"><b>COMMERCE</b></option>
						<option value="prog"><b>PROGRAMMING</b></option>
						<option value="bref"><b>BOOK REFERENCES</b></option>
						<option value="emoad"><b>EMOTIONAL ADVICES</b></option>
						<option value="hob"><b>HOBBIES</b></option>
						<option value="tech"><b>TECHNOLOGY</b></option>
						<option value="gen"><b>GENERAL</b></option>
				</select>
				</td>
			</tr>
			
			<tr>
				<td>
				<h3>Add Question</h3>
				</td>
				<td>
				<div class="form-group purple-border">
					<textarea class="form-control" id="exampleFormControlTextarea4" name="question" rows="5" style="width:100%" placeholder="Write Question Here...."></textarea>
				</div>
				</td>
			</tr>
			
			<tr>
				<td>
				<h3>Question Description</h3>
				</td>
				<td>
				<div class="form-group purple-border">
					<textarea class="form-control" id="exampleFormControlTextarea4" name="question_description" rows="10" style="width:100%" placeholder="Write Question Description Here...."></textarea>
				</div>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" id="submit" value="ADD" class="btn button-success btn btn-primary btn-lg"  style="margin-top:10px;margin-right:40px" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
				</td>
			</tr>
			</table>
		</form>
		</div>
		<footer class="container-fluid text-center">
			<div align="center" id="Contact">
			
			</div>
		</footer>
	</body>
</html>
	