<?php
	session_start();
	$username= $_POST["username"];
	$passwords= $_POST["password"];
	
	$conn=mysqli_connect("localhost","root","","q&a");
	$sql="Select * from user where username='$username'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if(mysqli_num_rows($result)>0)
	{
		
		if($row['UserName']==$username && $row['Password']==$passwords)
		{ 
			$_SESSION['username']=$username;
			$_SESSION['UID']=$row['UID'];
			if($row['UserType']=="user")
				header("Location: user_homepage.php");
			else	
				header("Location:admin_homepage.php");
		}
		else 
		{
			header("Location:registration.php");
		}
	}
	else
	{
		header("Location:registration.php");
	}
?>