
<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();
if(isset($_POST['que_id_del']))
{	$qid =$_POST['que_id_del'];
	
	
    $query ="SELECT * from options where que_id= '$qid'";
    $result = $conn->query($query);
    if($result->rowCount()> 0){
    	$stmt=$conn->prepare("DELETE FROM options WHERE que_id=:id");
	    $stmt->bindParam(":id",$qid,PDO::PARAM_INT);
	    $execute = $stmt->execute(); 
	    if($execute == true)
	    {
	    	$dataop ="1";
	    }
	    else{
	    	$dataop ="2";
	    }
    }
   $query ="SELECT * from image where que_id= '$qid'";
    $result = $conn->query($query);
    if($result->rowCount()> 0){
    	  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    	  	if($row['image_add']!='' &&  $row['image_add']!=null)
    	  	{
    	  		unlink('../upload_images/'.$row['image_add']);
    	  	}
    	  	if($row['image_option_1']!='' &&  $row['image_option_1']!=null)
    	  	{
    	  		unlink('../upload_images/'.$row['image_option_1']);
    	  	}
    	  	if($row['image_option_2']!='' &&  $row['image_option_2']!=null)
    	  	{
    	  		unlink('../upload_images/'.$row['image_option_2']);
    	  	}
    	  	if($row['image_option_3']!='' &&  $row['image_option_3']!=null)
    	  	{
    	  		unlink('../upload_images/'.$row['image_option_3']);
    	  	}
    	  	if($row['image_option_4']!='' &&  $row['image_option_4']!=null)
    	  	{
    	  		unlink('../upload_images/'.$row['image_option_4']);
    	  	}
    	  	if($row['imagehin_add']!='' &&  $row['imagehin_add']!=null)
    	  	{
    	  		unlink('../upload_images/'.$row['imagehin_add']);
    	  	}
    	  	if($row['imagehin_option_1']!='' &&  $row['imagehin_option_1']!=null)
    	  	{
    	  		unlink('../upload_images/'.$row['imagehin_option_1']);
    	  	}
    	  	if($row['imagehin_option_2']!='' &&  $row['imagehin_option_2']!=null)
    	  	{
    	  		unlink('../upload_images/'.$row['imagehin_option_2']);
    	  	}
    	  	if($row['imagehin_option_3']!='' &&  $row['imagehin_option_3']!=null)
    	  	{
    	  		unlink('../upload_images/'.$row['imagehin_option_3']);
    	  	}
    	  	if($row['imagehin_option_4']!='' &&  $row['imagehin_option_4']!=null)
    	  	{
    	  		unlink('../upload_images/'.$row['imagehin_option_4']);
    	  	}
    	  	$stmt=$conn->prepare("DELETE FROM image WHERE que_id=:id");
		    $stmt->bindParam(":id",$qid,PDO::PARAM_INT);
		    $execute = $stmt->execute(); 
		    if($execute == true)
		    {
		    	$dataim ="deleted";
		    }
		    else{
		    	$dataim ="not image deleted";
		    }
    	  }

    }

    $stmt=$conn->prepare("DELETE FROM questions WHERE que_id=:id");
    $stmt->bindParam(":id",$qid,PDO::PARAM_INT);
    $execute = $stmt->execute(); 
    if($execute == true)
    {
        $data ="2";
    }
    else{
        $data ="1";
    }

echo $data;
}
?>