<html>
	<head>
		<title>
			
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
		</style>
		<script>
			function delete_report(val) {
				xmlhttp=new XMLHttpRequest();
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						var div = document.getElementById('report'+val);
						if (div) {
							div.parentNode.removeChild(div);
						}
					}
				}
				xmlhttp.open("GET","delete_report.php?RID="+val,true);
				xmlhttp.send();
			}
			function save_report(val) {
				xmlhttp=new XMLHttpRequest();
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						var div = document.getElementById('report'+val);
						if (div) {
							div.parentNode.removeChild(div);
						}
					}
				}
				xmlhttp.open("GET","save_report.php?RID="+val,true);
				xmlhttp.send();
			}
		</script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
			<a class="navbar-brand" href="admin_homepage.php"><font size="7">Q&A </font></a>
			<ul class="nav navbar-nav">
				<li class="active"><a class="nav-link" href="admin_homepage.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right ml-auto">
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
			$user=$_SESSION['username'];
			$conn=mysqli_connect("localhost","root","","q&a");
			$sql3="select * from report_admin";
			$result1 = mysqli_query($conn, $sql3);
			while($row1=mysqli_fetch_assoc($result1))
			{
				$sql2="select * from reply where RID='".$row1['RID']."'";
				$result = mysqli_query($conn, $sql2);
				while($row2 = mysqli_fetch_assoc($result))
				{
					echo"<div id='report".$row2['RID']."'>";
					echo"<div class='card' >";
					echo"<div class='card-header'><i>Reported by<i> ".$row1['Count']." people.";
					echo"</div>";
					echo"<div class='card-body'>";
					echo"<h3 class='card-title'>".$row2['Reply']."</h5>";
					echo"</div>";
					echo"<div class='card-footer'> <button type='button' class='btn btn-info' onClick='save_report(".$row2['RID'].")'> <span class='glyphicon glyphicon-ok'></span> </button>&nbsp; Save     <button type='button' class='btn btn-info' onClick='delete_report(".$row2['RID'].")'> <span class='glyphicon glyphicon-remove'></span> </button> Delete </div>";
					echo"</div>";
					echo"<br></div>";
				}
			}
			mysqli_close($conn);
		?>
		</div>
	</body>
</html>