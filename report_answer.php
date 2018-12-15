<?php
	session_start();
	
	$conn=mysqli_connect("localhost","root","","q&a");
	$RID=$_GET['RID'];
	$UID=$_SESSION['UID'];
	$sql = "SELECT * FROM report_user where RID=$RID AND UID=$UID";
	$result = mysqli_query($conn, $sql);
	if(!isset($json)) {
       	$json= new StdClass();
    }
	if (mysqli_num_rows($result) > 0) {
		$json->count1=0;
	}
	else
	{
		$sql="INSERT INTO report_user (RID,UID) VALUES ('$RID','$UID');";
		if(mysqli_query($conn,$sql))
		{	
			$sql3 = "SELECT * FROM report_admin where RID=$RID";
			$result3 = mysqli_query($conn, $sql3);
			if (mysqli_num_rows($result3) > 0) {
				$sql="UPDATE report_admin SET count=count+1 WHERE RID=$RID";
				if(mysqli_query($conn,$sql))
				{
					$json->count1=1;
				}	
			}
			else
			{
				$sql5="INSERT INTO report_admin (RID) VALUES ('$RID');";
				if(mysqli_query($conn,$sql5))
				{
					$json->count1=1;
				}	
			}
		}
	}
    header("Content-Type: application/json");
	echo utf8_encode(json_encode($json));
?>