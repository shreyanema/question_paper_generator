<?php
	session_start();
    include("includes/config.php");
	$database = new Database();
	$conn = $database->getConnection();
	$email = $_POST['email'];
	$pass= $_POST['password'];
	 $query = "SELECT * from users where useremail ='$email' and password ='$pass'";
    $result = $conn->query($query);
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        	$_SESSION['useremail'] = $row['useremail'];
        	$_SESSION['type'] =$row['type'];
        	$_SESSION['user_id']=$row['user_id'];
            $_SESSION['username'] = $row['username'];
        }

        echo $_SESSION['type'];

    }
    else{
    	echo "2";
    }
   
 ?>