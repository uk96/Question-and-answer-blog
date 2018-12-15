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
			#ip
			{
				border-radius: 25px;
				border: 2px solid #609;
				padding: 20px; 
				width: 200px;
				height: 15px;    
			}	
			#passwords
			{
				border-radius: 25px;
				border: 2px solid #609;
				padding: 20px; 
				width: 200px;
				height: 15px;    
			}
			#confirm_passwords
			{
				border-radius: 25px;
				border: 2px solid #609;
				padding: 20px; 
				width: 200px;
				height: 15px;    
			}
			table
			{
				-moz-border-radius: 12px;
				-webkit-border-radius: 12px;
				border-radius: 12px;
			}
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
			/* Remove the navbar's default margin-bottom and rounded borders */ 
			.navbar {
				margin-bottom: 0;
				border-radius: 0;
			}
			/* Add a gray background color and some padding to the footer */
			footer {
				background-color: #808080;
				padding: 25px;
			}
			.img
			{
				margin-top: 40px;
				position: relative;
			}
	
			.title-over
			{
				position: absolute;
				top: 100px; 
				left: 500px;
			}
		</style>
		
		<script src="http://lig-membres.imag.fr/donsez/cours/exemplescourstechnoweb/js_securehash/md5.js"></script>
		<script>
			function myfunction(){
				var message=document.getElementById("passwords").value;
				var message1=document.getElementById("confirm_passwords").value;
				var hash = calcMD5(message);
				var hash1=calcMD5(message1);
				document.getElementById("passwords").value=hash;
				document.getElementById("confirm_passwords").value=hash1;
			}
			function myfunction1(){
				var message=document.getElementById("password").value;
				var hash = calcMD5(message);
				document.getElementById("password").value=hash;
			}
		</script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
			<a class="navbar-brand" href="Registration.php"><font size="7">Q&A </font></a>
			<ul class="nav navbar-nav">
				<li class="active"><a class="nav-link" href="registration.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a class="nav-link" href="#contact"><span class="glyphicon glyphicon-phone"></span>Contact</a></li>
				<li><a class="nav-link" href="#contact"><span class="glyphicon glyphicon-user"></span>About</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right ml-auto">
				<li class="nav-item">
					<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#register"><span class="glyphicon glyphicon-list-alt"></span> REGISTER</button>
				</li>
				<li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li class="nav-item">
					<button type="button" class="btn btn-default navbar-btn" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-log-in"></span> LOGIN</button>
				</li>
				<li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
			</ul>
		</nav>
		
		
		<div class="modal" id="register">
			<div class="modal-dialog">
				<div class="modal-content">
				
					<div class="modal-header">
						<h4 class="modal-title">Registration</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
 
					<form method="post" action="register_process.php" enctype="multipart/form-data" >
						<div class="modal-body">
							<b>NAME</b>
							<input type="text" name="fname" placeholder="First Name" id="ip">
							<input type="text" name="lname" placeholder="Last Name" id="ip">
							<br>
							<br>
							<b>EMAIL</b>
							<input type="email" name="temail" placeholder="example@gmail.com" id="ip">
							<br>
							<br>
							<b>USER TYPE</b>
							<select class="wrapper-dropdown" name="usert">
								<option value="user"><b>USER</b></option>
								<option value="admin"><b>ADMIN</b></option>
							</select>
							<br>
							<br>
							<b>USERNAME</b>
							<input type="text" name="username" id="ip">
							<br>
							<br>
							<b>PASSWORD</b>
							<input type="password" name="pass" id="passwords">
							<br>
							<br>
							<b>CONFIRM PASSWORD</b>
							<input type="password" name="confirmpass" id="confirm_passwords">
							<br>
							<br>
							<b>PROFILE PIC</b>
							<input type="file" name="profile_pic" id="profile_pic">
							<br>
							<br>
							<b>INTEREST</b>
							<br>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" name="interest[]" value="Science"> <b>Science</b> 
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" name="interest[]" value="BM"> <b>Basic Maths</b> 
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" name="interest[]" value="Commerce"> <b>Commerce</b> 
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" name="interest[]" value="Programming"> <b>Programming</b>
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" name="interest[]" value="BookRef"> <b>Book Reference</b>
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label">				
									<input type="checkbox" class="form-check-input" name="interest[]" value="em"> <b>Emotional Advices</b>
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" name="interest[]" value="Hobbies"> <b>Hobbies</b>
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label">				
									<input type="checkbox" class="form-check-input" name="interest[]" value="Tech"> <b>Technology</b> 
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" name="interest[]" value="General"> <b>General</b> 
								</label>
							</div>
						</div>
        
						<div class="modal-footer">
							<button type="submit" value="Submit" class="btn btn-primary float-right" onclick="myfunction()">Register</button>
							<button type="reset" value="Reset" class="btn btn-primary float-right">Clear</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		
		<div class="modal" id="login">
			<div class="modal-dialog">
				<div class="modal-content">
				
					<div class="modal-header">
						<h4 class="modal-title">Sign In</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<form method="post" action="authentication.php">
						<div class="modal-body">
							<table bgcolor="cyan" width="100%">
								<tr>
									<td><label for="username">Username:</label></td>
									<td><input type="text" class="form-control" id="username" placeholder="Enter username" name="username"></td>
								</tr>
								<tr>
									<td><label for="pwd">Password:</label></td>
									<td><input type="password" class="form-control" id="password" placeholder="Enter password" name="password"></td>
								</tr>
							</table>
						</div>
        
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary float-right" onclick="myfunction1()">Submit</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="img">
			<img src="Images/1.jpg" width="100%" height="500px">
			<div class="title-over">
				<p><font size="15" color="white"> Q&A </font></p>    
			</div>
		</div>
		<footer class="panel-default">
			<div align="center" id="Contact">
				Q&A allow user to add question and reply to the questions added by other users<br>
				<br>
				<br>
			</div>
		</footer>
	</body>
</html>