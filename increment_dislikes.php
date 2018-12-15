<?php
	session_start();
	
	$conn=mysqli_connect("localhost","root","","q&a");
	$RID=$_GET['RID'];
	$UID=$_SESSION['UID'];
	$sql = "SELECT * FROM dislikes where RID=$RID AND UID=$UID";
	$result = mysqli_query($conn, $sql);
	if(!isset($json)) {
       	$json= new StdClass();
    }
	if (mysqli_num_rows($result) > 0) {
			$row = $result->fetch_assoc();
			if($row['count']==1)
			{
				$sql="UPDATE dislikes SET count=0 WHERE RID=$RID and UID=$UID";
				if(mysqli_query($conn,$sql))
				{	
					$sql="UPDATE reply SET Dislikes=Dislikes-1 WHERE RID=$RID";
					if(mysqli_query($conn,$sql))
					{
						$json->count1=-1;
					}	
				}
			}
			else
			{
				$sql="UPDATE dislikes SET count=1 WHERE RID=$RID and UID=$UID";
				if(mysqli_query($conn,$sql))
				{	
					$sql="UPDATE reply SET Dislikes=Dislikes+1 WHERE RID=$RID";
					if(mysqli_query($conn,$sql))
					{
						$json->count1=1;
					}	
				}
			}
	}
	else
	{
		$sql="INSERT INTO dislikes (RID,UID,count) VALUES ('$RID','$UID','1');";
		if(mysqli_query($conn,$sql))
		{	
			$sql="UPDATE reply SET Dislikes=Dislikes+1 WHERE RID=$RID";
			if(mysqli_query($conn,$sql))
			{
				$json->count1=1;
			}	
		}
	}
    header("Content-Type: application/json");
	echo utf8_encode(json_encode($json));
?>