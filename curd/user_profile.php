<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();

if(isset($_POST["user_id"]))
{	$userid =$_POST["user_id"];
	$query = "SELECT password FROM users WHERE user_id='$userid' ";
	 $result = $conn->query($query);
	 if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		
			$password =$row["password"];
		
	 }
	}
	if($password ==$_POST["oldpass"])
	{  $newpass =$_POST["newpass"];
	
		$query ="UPDATE users SET password ='$newpass' WHERE user_id='$userid'";
		 $result = $conn->query($query);
		if($result)
		{
			echo "1";
		}
		else
		{
			echo "Something went error";
		}
	}
	else

		echo "Old password does not match";
}
?>