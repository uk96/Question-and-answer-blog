<html>
	<head>
		<title>
			
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
		</style>
		<script>
		function increment_likes(val) {
			val1="Likes"+val;
			console.log(val1);
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) {
					var arr =JSON.parse(this.responseText);
					var y=document.getElementById(val1).innerHTML;
					var a = parseInt(y);
					a=a+parseInt(arr.count1);
					document.getElementById(val1).innerHTML=""+a;
				}
			}
			xmlhttp.open("GET","increment_likes.php?RID="+val,true);
			xmlhttp.send();
		}
		function increment_dislikes(val) {
			val1="Dislikes"+val;
			console.log(val1);
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) {
					var arr =JSON.parse(this.responseText);
					var y=document.getElementById(val1).innerHTML;
					var a = parseInt(y);
					a=a+parseInt(arr.count1);
					document.getElementById(val1).innerHTML=""+a;
				}
			}
			xmlhttp.open("GET","increment_dislikes.php?RID="+val,true);
			xmlhttp.send();
		}
		function report(val) {
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) {
					var arr =JSON.parse(this.responseText);
					var value1=parseInt(arr.count1);
					if(value1==0)
						window.alert("You have already reported this answer.");
					else
						window.alert("Answer is reported.");
				}
			}
			xmlhttp.open("GET","report_answer.php?RID="+val,true);
			xmlhttp.send();
		}
</script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
			<a class="navbar-brand" href="user_homepage.php"><font size="7">Q&A </font></a>
			<ul class="nav navbar-nav">
				<li class="active"><a class="nav-link" href="user_homepage.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a class="nav-link" href="#"><span class="glyphicon glyphicon-phone"></span>Contact</a></li>
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
	<div>
		<?php
			session_start();
			$id = $_GET['questionId'];
			$conn=mysqli_connect("localhost","root","","q&a");
			$sql1="select * from question where QID='$id'";
			$result = mysqli_query($conn, $sql1);
			while($row1 = mysqli_fetch_assoc($result))
			{
				echo"<div><h2><b>".$row1['Question']."</b></h2></div>";
				echo"<div><h3>".$row1['QDescp']."</h3></div>";
			}

			$sql2="select * from reply where QID='$id'";
			$result = mysqli_query($conn, $sql2);
			while($row2 = mysqli_fetch_assoc($result))
			{
				echo"<div class='card'>";
					echo"<div class='card-header'><i>Replied by<i> ".$row2['Respondent'];
					echo"<button type='button' class='btn btn-primary btn-xs btn btn-danger float-right' onClick='report(".$row2['RID'].")'>Report</button></div>";
					echo"<div class='card-body'>".$row2['Reply']."</div>";
					echo"<div class='card-footer'> <button type='button' class='btn btn-info' onClick='increment_likes(".$row2['RID'].")'> <span class='glyphicon glyphicon-thumbs-up'></span> </button>&nbsp;<b id='Likes".$row2['RID']."'>".$row2['Likes']."</b> Likes     <button type='button' class='btn btn-info' onClick='increment_dislikes(".$row2['RID'].")'> <span class='glyphicon glyphicon-thumbs-down'></span> </button><b id='Dislikes".$row2['RID']."'>".$row2['Dislikes']."</b> Dislikes </div>";
				echo"</div><br><br>";
			}
			
			mysqli_close($conn);
		?>
	</div>
	
	<div class="card">
		<form action="add_reply.php" method="post">
		<input type="hidden" name="QID" value="<?php echo $id ?>"></input>
		<div class="card-header"><input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>"></input><?php echo $_SESSION['username'] ?></div>
		<div class="card-body">
			<div class="form-group purple-border">
				<textarea class="form-control" id="exampleFormControlTextarea4" name="reply" rows="10" style="width:70%" placeholder="Give Reply...."> </textarea>
			</div>
		</div> 
		<div class="card-footer"><button type="submit" class="btn btn-info"> <span class="glyphicon glyphicon-ok"></span> SUBMIT </button></div>
		</form>
	</div>
	</div>
	</body>
</html>