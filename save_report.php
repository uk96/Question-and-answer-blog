<?php
	session_start();
	
	$conn=mysqli_connect("localhost","root","","q&a");
	$RID=$_GET['RID'];
	$sql = "DELETE FROM report_admin WHERE RID=$RID";
	if(mysqli_query($conn, $sql))
	{
		$sql = "DELETE FROM report_user WHERE RID=$RID";
		if(mysqli_query($conn, $sql))
		{
			
		}
	}
?>