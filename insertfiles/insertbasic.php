<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();
if(isset($_POST['abc']))
	{	$external_link = $_POST['abc'];
		//select counter
			$query = "SELECT * from counter  where counter_status='count'";
    			$result = $conn->query($query);
    		if($result->rowCount()> 0)
    		{
	        			while($row = $result->fetch(PDO::FETCH_ASSOC))
	        	 			{ $id =$row["counter_id"]; }

			    	//update counter
			    	$update = $conn->query("UPDATE counter set counter_status='whatever'where counter_id='$id'");
			    	//increment id
			      	$id = $id+1;
			        //insert new counter
			        $insert = $conn->query("INSERT into counter (counter_id,counter_status) values ('$id','count')");

		          $newimg ='../user/temp_upload_folder/QPG'.$id.'.png';
				if (!copy($external_link, $newimg)) {
			    	echo 0;
		        }else{
			   		 echo $id;
					}
			}
}
///image 
if(isset($_FILES['img_question']['name']))
	{  
			
			//select counter
			$query = "SELECT * from counter  where counter_status='count'";
    			$result = $conn->query($query);
    		if($result->rowCount()> 0)
    		{
	        			while($row = $result->fetch(PDO::FETCH_ASSOC))
	        	 			{ $id =$row["counter_id"]; }

	    	//update counter
	    	$update = $conn->query("UPDATE counter set counter_status='whatever'where counter_id='$id'");
	    	//increment id
	      	$id = $id+1;
	        //insert new counter
	        $insert = $conn->query("INSERT into counter (counter_id,counter_status) values ('$id','count')");
	        $filename = $_FILES['img_question']['name'];
			$file_ext = substr($filename, strripos($filename, '.')); // get file name
			$location = "../user/temp_upload_folder/".$filename;
			$uploadOk = 1;
			$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	         
			/* Valid Extensions */
			$valid_extensions = array("jpg","jpeg","png");
			/* Check file extension */
			 $newfilename ='../user/temp_upload_folder/QPG'.$id.$file_ext;
			if( !in_array(strtolower($imageFileType),$valid_extensions) ) 
				{  $uploadOk = 0;}
			if($uploadOk == 0)
				{$data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);}
			else
			{
			   	if(move_uploaded_file($_FILES['img_question']['tmp_name'],$newfilename))
			   	{
			      $data['filename'] = $newfilename;
			  	  $data['imagename'] ='QPG'.$id.$file_ext;
			      echo json_encode($data);
			        //delete old counters
			     $delete = $conn->query("DELETE  from counter where counter_status='whatever'");
			   	}
			   	else
			   	{   $data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data); 
			   	}
			}
		}
	}

//image hin

if(isset($_FILES['img_question_hin']['name']))
	{  		//select counter
			$query = "SELECT * from counter  where counter_status='count'";
    			$result = $conn->query($query);
    		if($result->rowCount()> 0)
    		{
	        			while($row = $result->fetch(PDO::FETCH_ASSOC))
	        	 			{ $id =$row["counter_id"]; }

	    	//update counter
	    	$update = $conn->query("UPDATE counter set counter_status='whatever'where counter_id='$id'");
	    	//increment id
	      	$id = $id+1;
	        //insert new counter
	        $insert = $conn->query("INSERT into counter (counter_id,counter_status) values ('$id','count')");
			$filename = $_FILES['img_question_hin']['name'];
			$file_ext = substr($filename, strripos($filename, '.')); // get file name
			$location = "../user/temp_upload_folder/".$filename;
			$uploadOk = 1;
			$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	         
			/* Valid Extensions */
			$valid_extensions = array("jpg","jpeg","png");
			/* Check file extension */
			 $newfilename ='../user/temp_upload_folder/QPG'.$id.$file_ext;
			if( !in_array(strtolower($imageFileType),$valid_extensions) ) 
				{  $uploadOk = 0;}
			if($uploadOk == 0)
				{$data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);}
			else
			{
			   	if(move_uploaded_file($_FILES['img_question_hin']['tmp_name'],$newfilename))
			   	{
			      $data['filename'] = $newfilename;
			      $data['imagename'] ='QPG'.$id.$file_ext;
			      echo json_encode($data);
			        //delete old counters
			     $delete = $conn->query("DELETE  from counter where counter_status='whatever'");
			   	}
			   	else
			   	{   $data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data); 
			   	}
			}
		}
	}
//image option 1
	if(isset($_FILES['img_option_1']['name']))
	{  		//select counter
			$query = "SELECT * from counter  where counter_status='count'";
    			$result = $conn->query($query);
    		if($result->rowCount()> 0)
    		{
	        			while($row = $result->fetch(PDO::FETCH_ASSOC))
	        	 			{ $id =$row["counter_id"]; }

	    	//update counter
	    	$update = $conn->query("UPDATE counter set counter_status='whatever'where counter_id='$id'");
	    	//increment id
	      	$id = $id+1;
	        //insert new counter
	        $insert = $conn->query("INSERT into counter (counter_id,counter_status) values ('$id','count')");
			$filename = $_FILES['img_option_1']['name'];
			$file_ext = substr($filename, strripos($filename, '.')); // get file name
			$location = "../user/temp_upload_folder/".$filename;
			$uploadOk = 1;
			$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	         
			/* Valid Extensions */
			$valid_extensions = array("jpg","jpeg","png");
			/* Check file extension */
			 $newfilename ='../user/temp_upload_folder/QPG'.$id.$file_ext;
			if( !in_array(strtolower($imageFileType),$valid_extensions) ) 
				{  $uploadOk = 0;}
			if($uploadOk == 0)
				{$data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);}
			else
			{
			   	if(move_uploaded_file($_FILES['img_option_1']['tmp_name'],$newfilename))
			   	{
			      $data['filename'] = $newfilename;
			   	 $data['imagename'] ='QPG'.$id.$file_ext;
			   	 echo json_encode($data);
			      //delete old counters
			     $delete = $conn->query("DELETE  from counter where counter_status='whatever'");

			   	}
			   	else
			   	{   $data['filename'] =0;
			  		$data['imagename'] =0;
			   		 echo json_encode($data); 
			   	}
			}
		}
	}
//image option 2
	if(isset($_FILES['img_option_2']['name']))
	{  		//select counter
			$query = "SELECT * from counter  where counter_status='count'";
    			$result = $conn->query($query);
    		if($result->rowCount()> 0)
    		{
	        			while($row = $result->fetch(PDO::FETCH_ASSOC))
	        	 			{ $id =$row["counter_id"]; }

	    	//update counter
	    	$update = $conn->query("UPDATE counter set counter_status='whatever'where counter_id='$id'");
	    	//increment id
	      	$id = $id+1;
	        //insert new counter
	        $insert = $conn->query("INSERT into counter (counter_id,counter_status) values ('$id','count')");
			$filename = $_FILES['img_option_2']['name'];
			$file_ext = substr($filename, strripos($filename, '.')); // get file name
			$location = "../user/temp_upload_folder/".$filename;
			$uploadOk = 1;
			$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	         
			/* Valid Extensions */
			$valid_extensions = array("jpg","jpeg","png");
			/* Check file extension */
			 $newfilename ='../user/temp_upload_folder/QPG'.$id.$file_ext;
			if( !in_array(strtolower($imageFileType),$valid_extensions) ) 
				{  $uploadOk = 0;}
			if($uploadOk == 0)
				{$data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);}
			else
			{
			   	if(move_uploaded_file($_FILES['img_option_2']['tmp_name'],$newfilename))
			   	{
			      $data['filename'] = $newfilename;
			     $data['imagename'] ='QPG'.$id.$file_ext;
			      echo json_encode($data);
              
			      //delete old counters
			     $delete = $conn->query("DELETE  from counter where counter_status='whatever'");

			   	}
			   	else
			   	{   $data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data); 
			   	}
			}
		}
	}
//image option 3
	if(isset($_FILES['img_option_3']['name']))
	{  
			//select counter
			$query = "SELECT * from counter  where counter_status='count'";
    			$result = $conn->query($query);
    		if($result->rowCount()> 0)
    		{
	        			while($row = $result->fetch(PDO::FETCH_ASSOC))
	        	 			{ $id =$row["counter_id"]; }

	    	//update counter
	    	$update = $conn->query("UPDATE counter set counter_status='whatever'where counter_id='$id'");
	    	//increment id
	      	$id = $id+1;
	        //insert new counter
	        $insert = $conn->query("INSERT into counter (counter_id,counter_status) values ('$id','count')");
			$filename = $_FILES['img_option_3']['name'];
			$file_ext = substr($filename, strripos($filename, '.')); // get file name
			$location = "../user/temp_upload_folder/".$filename;
			$uploadOk = 1;
			$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	         
			/* Valid Extensions */
			$valid_extensions = array("jpg","jpeg","png");
			/* Check file extension */
			 $newfilename ='../user/temp_upload_folder/QPG'.$id.$file_ext;
			if( !in_array(strtolower($imageFileType),$valid_extensions) ) 
				{  $uploadOk = 0;}
			if($uploadOk == 0)
				{$data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);}
			else
			{
			   	if(move_uploaded_file($_FILES['img_option_3']['tmp_name'],$newfilename))
			   	{
			      $data['filename'] = $newfilename;
			    $data['imagename'] ='QPG'.$id.$file_ext;
			      echo json_encode($data);
               
			      //delete old counters
			     $delete = $conn->query("DELETE  from counter where counter_status='whatever'");

			   	}
			   	else
			   	{   $data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data); 
			   	}
			}
		}
	}
//image option 4
	if(isset($_FILES['img_option_4']['name']))
	{  		//select counter
			$query = "SELECT * from counter  where counter_status='count'";
    			$result = $conn->query($query);
    		if($result->rowCount()> 0)
    		{
	        			while($row = $result->fetch(PDO::FETCH_ASSOC))
	        	 			{ $id =$row["counter_id"]; }

	    	//update counter
	    	$update = $conn->query("UPDATE counter set counter_status='whatever'where counter_id='$id'");
	    	//increment id
	      	$id = $id+1;
	        //insert new counter
	        $insert = $conn->query("INSERT into counter (counter_id,counter_status) values ('$id','count')");
			$filename = $_FILES['img_option_4']['name'];
			$file_ext = substr($filename, strripos($filename, '.')); // get file name
			$location = "../user/temp_upload_folder/".$filename;
			$uploadOk = 1;
			$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	         
			/* Valid Extensions */
			$valid_extensions = array("jpg","jpeg","png");
			/* Check file extension */
			 $newfilename ='../user/temp_upload_folder/QPG'.$id.$file_ext;
			if( !in_array(strtolower($imageFileType),$valid_extensions) ) 
				{  $uploadOk = 0;}
			if($uploadOk == 0)
				{$data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);}
			else
			{
			   	if(move_uploaded_file($_FILES['img_option_4']['tmp_name'],$newfilename))
			   	{
			      $data['filename'] = $newfilename;
			     $data['imagename'] ='QPG'.$id.$file_ext;
			      echo json_encode($data);
            
			      //delete old counters
			     $delete = $conn->query("DELETE  from counter where counter_status='whatever'");

			   	}
			   	else
			   	{   $data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data); 
			   	}
			}
		}	
	}
//image option hindi 1
	if(isset($_FILES['img_option_1_hin']['name']))
	{  
		//select counter
			$query = "SELECT * from counter  where counter_status='count'";
    			$result = $conn->query($query);
    		if($result->rowCount()> 0)
    		{
	        			while($row = $result->fetch(PDO::FETCH_ASSOC))
	        	 			{ $id =$row["counter_id"]; }

	    	//update counter
	    	$update = $conn->query("UPDATE counter set counter_status='whatever'where counter_id='$id'");
	    	//increment id
	      	$id = $id+1;
	        //insert new counter
	        $insert = $conn->query("INSERT into counter (counter_id,counter_status) values ('$id','count')");
			$filename = $_FILES['img_option_1_hin']['name'];
			$file_ext = substr($filename, strripos($filename, '.')); // get file name
			$location = "../user/temp_upload_folder/".$filename;
			$uploadOk = 1;
			$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	         
			/* Valid Extensions */
			$valid_extensions = array("jpg","jpeg","png");
			/* Check file extension */
			 $newfilename ='../user/temp_upload_folder/QPG'.$id.$file_ext;
			if( !in_array(strtolower($imageFileType),$valid_extensions) ) 
				{  $uploadOk = 0;}
			if($uploadOk == 0)
				{$data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);}
			else
			{
			   	if(move_uploaded_file($_FILES['img_option_1_hin']['tmp_name'],$newfilename))
			   	{
			      $data['filename'] = $newfilename;
				 $data['imagename'] ='QPG'.$id.$file_ext;
			      echo json_encode($data);
               
			      //delete old counters
			     $delete = $conn->query("DELETE  from counter where counter_status='whatever'");

			   	}
			   	else
			   	{   $data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);
			    }
			}
		}
	}
	//image option hindi 2
	if(isset($_FILES['img_option_2_hin']['name']))
	{  
		//select counter
			$query = "SELECT * from counter  where counter_status='count'";
    			$result = $conn->query($query);
    		if($result->rowCount()> 0)
    		{
	        			while($row = $result->fetch(PDO::FETCH_ASSOC))
	        	 			{ $id =$row["counter_id"]; }

	    	//update counter
	    	$update = $conn->query("UPDATE counter set counter_status='whatever'where counter_id='$id'");
	    	//increment id
	      	$id = $id+1;
	        //insert new counter
	        $insert = $conn->query("INSERT into counter (counter_id,counter_status) values ('$id','count')");
			$filename = $_FILES['img_option_2_hin']['name'];
			$file_ext = substr($filename, strripos($filename, '.')); // get file name
			$location = "../user/temp_upload_folder/".$filename;
			$uploadOk = 1;
			$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	         
			/* Valid Extensions */
			$valid_extensions = array("jpg","jpeg","png");
			/* Check file extension */
			 $newfilename ='../user/temp_upload_folder/QPG'.$id.$file_ext;
			if( !in_array(strtolower($imageFileType),$valid_extensions) ) 
				{  $uploadOk = 0;}
			if($uploadOk == 0)
				{$data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);}
			else
			{
			   	if(move_uploaded_file($_FILES['img_option_2_hin']['tmp_name'],$newfilename))
			   	{
			      $data['filename'] = $newfilename;
			      $data['imagename'] ='QPG'.$id.$file_ext;
			      echo json_encode($data);
              
			      //delete old counters
			     $delete = $conn->query("DELETE  from counter where counter_status='whatever'");

			   	}
			   	else
			   	{   $data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data); 
			   	}
			}
		}
	}
//image option hindi 3
	if(isset($_FILES['img_option_3_hin']['name']))
	{  
		//select counter
			$query = "SELECT * from counter  where counter_status='count'";
    			$result = $conn->query($query);
    		if($result->rowCount()> 0)
    		{
	        			while($row = $result->fetch(PDO::FETCH_ASSOC))
	        	 			{ $id =$row["counter_id"]; }

	    	//update counter
	    	$update = $conn->query("UPDATE counter set counter_status='whatever'where counter_id='$id'");
	    	//increment id
	      	$id = $id+1;
	        //insert new counter
	        $insert = $conn->query("INSERT into counter (counter_id,counter_status) values ('$id','count')");
			$filename = $_FILES['img_option_3_hin']['name'];
			$file_ext = substr($filename, strripos($filename, '.')); // get file name
			$location = "../user/temp_upload_folder/".$filename;
			$uploadOk = 1;
			$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	         
			/* Valid Extensions */
			$valid_extensions = array("jpg","jpeg","png");
			/* Check file extension */
			 $newfilename ='../user/temp_upload_folder/QPG'.$id.$file_ext;
			if( !in_array(strtolower($imageFileType),$valid_extensions) ) 
				{  $uploadOk = 0;}
			if($uploadOk == 0)
				{$data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);}
			else
			{
			   	if(move_uploaded_file($_FILES['img_option_3_hin']['tmp_name'],$newfilename))
			   	{
			      $data['filename'] = $newfilename;
			     $data['imagename'] ='QPG'.$id.$file_ext;
			      echo json_encode($data);
              
			      //delete old counters
			     $delete = $conn->query("DELETE  from counter where counter_status='whatever'");

			   	}
			   	else
			   	{   $data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data); 
			   	}
			}
		}
	}
//image option hindi 4
	if(isset($_FILES['img_option_4_hin']['name']))
	{  
		//select counter
			$query = "SELECT * from counter  where counter_status='count'";
    			$result = $conn->query($query);
    		if($result->rowCount()> 0)
    		{
	        			while($row = $result->fetch(PDO::FETCH_ASSOC))
	        	 			{ $id =$row["counter_id"]; }

	    	//update counter
	    	$update = $conn->query("UPDATE counter set counter_status='whatever'where counter_id='$id'");
	    	//increment id
	      	$id = $id+1;
	        //insert new counter
	        $insert = $conn->query("INSERT into counter (counter_id,counter_status) values ('$id','count')");
			$filename = $_FILES['img_option_4_hin']['name'];
			$file_ext = substr($filename, strripos($filename, '.')); // get file name
			$location = "../user/temp_upload_folder/".$filename;
			$uploadOk = 1;
			$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
	         
			/* Valid Extensions */
			$valid_extensions = array("jpg","jpeg","png");
			/* Check file extension */
			 $newfilename ='../user/temp_upload_folder/QPG'.$id.$file_ext;
			if( !in_array(strtolower($imageFileType),$valid_extensions) ) 
				{  $uploadOk = 0;}
			if($uploadOk == 0)
				{$data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);}
			else
			{
			   	if(move_uploaded_file($_FILES['img_option_4_hin']['tmp_name'],$newfilename))
			   	{
			      $data['filename'] = $newfilename;
			     $data['imagename'] ='QPG'.$id.$file_ext;
			      echo json_encode($data);
        		
			      //delete old counters
			     $delete = $conn->query("DELETE  from counter where counter_status='whatever'");

			   	}
			   	else
			   	{   $data['filename'] =0;
			   		$data['imagename'] =0;
			   		 echo json_encode($data);
			    }
			}
		}
	}



?>
