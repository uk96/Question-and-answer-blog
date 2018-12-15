<?php
		session_start();
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "q&a";
		$user1=$_POST['username'];
		$_FILES['profile_pic']['name']=$user1.".jpg";
		$target = "images/profile_pic/"; 
		$target = $target . basename( $_FILES['profile_pic']['name']); 
		$pic=($_FILES['profile_pic']['name']);
		if(move_uploaded_file($_FILES['profile_pic']['tmp_name'],$target)) 
		{ 
			//echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
		} 
		else 
		{ 
			echo "Sorry, there was a problem uploading your file."; 
		} 
		$conn = new mysqli($servername,$username,$password,$dbname);
		$var1=implode(",",$_POST['interest']);
		$stmt = $conn->prepare("INSERT INTO user (FirstName, LastName, Email, UserType, UserName, Password, Interest,profile_pic) VALUES (?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssssssss", $_POST['fname'], $_POST['lname'], $_POST['temail'], $_POST['usert'],$_POST['username'], $_POST['pass'],$var1,$pic);
		$res = $stmt->execute();
		$conn->close();
		$conn1=mysqli_connect("localhost","root","","q&a");
		$sql1="Select * from user where username='$user1'";
		$result1 = mysqli_query($conn1, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$_SESSION['username']=$user1;
		$_SESSION['UID']=$row1['UID'];
		$var=$_SESSION['UID'];
		$usertype=$row1['UserType'];
		echo $usertype;
		if($usertype=="user")
			header("Location: user_homepage.php");
		else
			header("Location: admin_homepage.php");
?>