<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();
if(isset($_POST['addsubclass_select']) && isset($_POST['addsubname']))
{   $msg ="";
	$class_id = $_POST['addsubclass_select'];
	$newsub = $_POST['addsubname'];
	$paper = $_POST['subpapername'];
	$papercode = $_POST['subpapercode'];
	$query = "SELECT * from sub where sub ='$newsub'";
	 $result = $conn->query($query);
    $num =$result->rowCount();
	if($num>0)
	{
		$msg .= "Subject already exist";
	}
	else
	{
		$query = "INSERT into sub(sub,class_id,sub_code,paper) values ('$newsub','$class_id','$papercode','$paper')";	
		 $result = $conn->query($query);
		if ($result)
		{ $msg.="1"; }
		else
		{ $msg."subject not added"; }
	}
	
  
   $data['msg'] = $msg;
   echo json_encode($data);
}

if(isset($_POST['editsubchange']))
{    $sub_id = $_POST['editsubchange'];
	$query= "SELECT * from sub where sub_id ='$sub_id'";
	 $result = $conn->query($query);
	 if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
	
		$data['subname'] = $row['sub'];
		$data['papername'] = $row['paper'];
		$data['papercode'] = $row['sub_code'];
		
	 }
	 }

	echo json_encode($data);
}
if(isset($_POST['editclass_select']) && isset($_POST['editsub_select']) && isset($_POST['editsubname']))
{	$class_id =$_POST['editclass_select'];
	$sub = $_POST['editsub_select'];
	$newsub = $_POST['editsubname'];
	$msg ="";
	
		$query = "UPDATE sub set sub ='$newsub' where sub_id = '$sub'  and class_id ='$class_id'";
		 $result = $conn->query($query);
		if ($result) {
			$msg .= '1';
		}
		else{
			$msg .= 'Subject not edited';
		}
   
   $data['msg'] = $msg;

   echo json_encode($data);
}

if(isset($_POST["deletesubclass_select"]) && isset($_POST['deletesub_select']))
{	$msg ="";
	$class =$_POST["deletesubclass_select"];
	$sub = $_POST['deletesub_select'];
	$query = "DELETE from questions where class_id ='$class' and sub_id = '$sub'";
	$result = $conn->query($query);
	if($result)
	{
		$msg .= '-> Question under  this subject are  Deleted';
	}
	else{
		$msg .= '-> Question under  this subject are not  Deleted';
	}
	$msg .="<br>";
	$query = "DELETE from sub where class_id ='$class'  and sub_id='$sub'";
	$result = $conn->query($query);
	if($result)
	{
		$msg .= '-> Subject deleted';
	}
	else{
	   $msg .= '-> Subject not deleted';
	}
  
   $data['msg'] = $msg;
 
   echo json_encode($data);
}
?>