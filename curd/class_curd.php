<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();
if(isset($_POST["newclass"]))
{ $class= $_POST["newclass"];
    $query = "SELECT * from class where class = '$class'";
    $result = $conn->query($query);
    $num =$result->rowCount();
	if($num>0)
	{
		$msg= "Class already exist";
	}
	else{
		$query = "INSERT into class (class) VALUES ('$class')";
		$result = $conn->query($query);
	if($result)
	{
		$msg= '1';
	}
	else{
		$msg= "Class not Added";
	}
	}
	$data["msg"] = $msg;
	echo json_encode($data);
}
if(isset($_POST["editclass_select"])&& isset($_POST["edited_class"]))
{ $class= $_POST["edited_class"];
	$class_id = $_POST["editclass_select"];
	$query = "SELECT * from class where class = '$class'";
	$result = $conn->query($query);
  	$num =$result->rowCount();
	if($num>0)
	{
		$msg= "Class already exist";
	}
	else{
		$query = "UPDATE  class set class='$class' WHERE class_id= '$class_id'";
		$result = $conn->query($query);
	if($result)
	{
		$msg= "1";
	}
	else{
		$msg= "Class not Edited";
	}
	}
	$data["msg"] = $msg;
	echo json_encode($data);
}
if(isset($_POST["deleteclass"]))
{ $class= $_POST["deleteclass"];
	$msg ="";
	$query = "DELETE from questions where class_id = '$class'";
    $result = $conn->query($query);
		if($result)
		{
			$msg.= "-> Questions under this class are deleted  </br>";
		}
		else{
			$msg.= "-> Questions under this class are not deleted </br>";
		}		
	$msg.="<br>";
	$query = "DELETE from sub where class_id='$class'";
	 $result = $conn->query($query);
		if($result)
		{
			$msg.= "->Subjects under this class are deleted </br>";
		}
		else{
			$msg.= "-> Subjects under this class are not deleted </br>";
		}
$msg.="<br>";
$query = "DELETE from class where class_id='$class'";
 $result = $conn->query($query);
		if($result)
		{
			$msg.= "-> class deleted";
		}
		else{
			$msg.= "-> class not deleted";
		}
	
	$data["msg"] = $msg;
	echo json_encode($data);
}

?>