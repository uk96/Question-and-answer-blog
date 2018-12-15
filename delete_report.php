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
			$sql = "DELETE FROM likes WHERE RID=$RID";
			if(mysqli_query($conn, $sql))
			{
				$sql = "DELETE FROM dislikes WHERE RID=$RID";
				if(mysqli_query($conn, $sql))
				{
					$sql2="select * from reply where RID=".$RID."";
					$result = mysqli_query($conn, $sql2);
					while($row2 = mysqli_fetch_assoc($result))
					{
						
						$sql1="UPDATE question SET count=count-1 WHERE QID=".$row2['QID'];
						if(mysqli_query($conn, $sql1))
						{
							$sql = "DELETE FROM reply WHERE RID=$RID";
							if(mysqli_query($conn, $sql))
							{
					
							}
						}
					}
				}
			}
		}
	}
?>