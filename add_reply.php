<?php
	session_start();
	
	$conn=mysqli_connect("localhost","root","","q&a");
  
    $username=$_POST['username'];
	$QID=$_POST['QID'];
	$reply=$_POST['reply'];
    $sql="INSERT INTO reply(Reply,Respondent,QID) VALUES('$reply','$username','$QID')";
    if(mysqli_query($conn,$sql))
    {
		$sql1="UPDATE question SET count=count+1 WHERE QID=$QID";
		if(mysqli_query($conn,$sql1))
			header("Location:display_question.php?questionId=$QID");
	}
       
?>