<?php
	session_start();
	
	$conn=mysqli_connect("localhost","root","","q&a");
  
    $topic=$_POST["quet"];
	$question=$_POST["question"];
	$question_description=$_POST["question_description"];
	$UID=$_SESSION["UID"];
	$username=$_SESSION["username"];
	
    $sql="INSERT INTO question(QType,Question,QDescp,UID,username) VALUES ('$topic','$question','$question_description','$UID','$username')";
    if(mysqli_query($conn,$sql))
    {
		header("Location: addQue.php");
		echo "Added Sucessfully";
	}
    else
    {
		header("Location: addQue.php");
		echo"Error<br/>";
    }
       
?>