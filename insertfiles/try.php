<?php
session_start();
include_once "../includes/connection.php";


if(isset($_POST['question_id']))
{ $que_id = $_POST['question_id'];
	if($_POST['hindi_status'] == '2')//hindi inactive
	{ //UPDATE Question 
		$questionhin ="";
	    $stmt = $conn->prepare("UPDATE  questions set class_id = ?, sub_id = ? , unit_id=?, section_id=?, level_id=?, question=?, hindi_trans=?, img_status=?, added_by=?, activity_status=?,question_hin =? where que_id=? ");
	    $stmt->bind_param("ssssssssssss", $editque_class , $editque_sub, $editque_unit, $editque_section, $editque_level, $que, $hindi_status, $img_status, $addedby, $activity_status, $question_hin, $question_id);
	    $editque_class = htmlspecialchars(strip_tags($_POST["classque_edit"]));
	    $editque_sub = htmlspecialchars(strip_tags($_POST["subque_edit"]));
	    $editque_unit = htmlspecialchars(strip_tags($_POST["unitque_edit"]));
	    $editque_section = htmlspecialchars(strip_tags( $_POST["sectionque_edit"]));
	    $editque_level = htmlspecialchars(strip_tags($_POST["levelque_edit"]));
	    $que = htmlspecialchars(strip_tags($_POST["que"]));
	    $hindi_status = htmlspecialchars(strip_tags($_POST["hindi_status"]));
	    $img_status = htmlspecialchars(strip_tags($_POST["img_status"]));
	    $addedby =  htmlspecialchars(strip_tags($_SESSION['user_id']));
	    $activity_status = htmlspecialchars(strip_tags('1'));
	    $question_hin =htmlspecialchars(strip_tags($questionhin));
	    $question_id = htmlspecialchars(strip_tags($que_id));
	    $execution = $stmt->execute();
	    if($execution == true)
	    {
	        echo "Updated  Successfully!!!";
	      	if($_POST['sectionque_edit'] == '1')
	        {//multiple
	         	$result = $conn->query("SELECT * from options where que_id ='$que_id'");
		      	echo 'no of rows'.$result->num_rows; 
	            if($$result->num_rows > 0)
	            {
	            	//update options
	            	$stmt = $conn->prepare("UPDATE options set option_1=?,option_2=?,option_3=?,option_4=? where que_id =?");
		            $stmt->bind_param( "sssss" , $option_1, $option_2, $option_3, $option_4, $ques_id );
		            $option_1 =htmlspecialchars(strip_tags($_POST['option_1']));
		            $option_2 =htmlspecialchars(strip_tags($_POST['option_2']));
		            $option_3 =htmlspecialchars(strip_tags($_POST['option_3']));
		            $option_4 =htmlspecialchars(strip_tags($_POST['option_4']));
		            $ques_id =htmlspecialchars(strip_tags($que_id));
		            $execution = $stmt->execute();
		            if($execution == true)
		            {
		                echo "Options multiple  updated Successfully!!!";
		            }
		            else{
		                echo 'Options  multiple updation Failed';
		            }

	            }
	            else
	            {
	            	//insert options
	            	$stmt = $conn->prepare("INSERT INTO options (que_id,option_1,option_2,option_3,option_4) VALUES (?,?,?,?,?)");
		            $stmt->bind_param( "sssss", $ques_id , $option_1, $option_2, $option_3, $option_4 );
		            $ques_id =htmlspecialchars(strip_tags($que_id));
		            $option_1 =htmlspecialchars(strip_tags($_POST['option_1']));
		            $option_2 =htmlspecialchars(strip_tags($_POST['option_2']));
		            $option_3 =htmlspecialchars(strip_tags($_POST['option_3']));
		            $option_4 =htmlspecialchars(strip_tags($_POST['option_4']));
		            $execution = $stmt->execute();
		            if($execution == true)
		            {
		                echo "Options multiple Inserted  updated Successfully!!!";
		            }
		            else{
		                echo 'Options multiple insertion updation Failed';
		            }

	            }
	   			//image
	            $query = 'SELECT * from image where que_id = "$que_id"';
        		$result = $conn->query($query);
	            if($result->num_rows > 0)
	            {
	            	if($_POST['img_status']=='1')
        		  	{  // update  image
        		  		//save images
		                if($_POST['img_add']!=null && $_POST['img_add']!="")
		                {   
		                	$oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                if($_POST['img_add_o1']!=null && $_POST['img_add_o1']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o1'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o1'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                if($_POST['img_add_o2']!=null && $_POST['img_add_o2']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o2'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o2'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                if($_POST['img_add_o3']!=null && $_POST['img_add_o3']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o3'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o3'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                if($_POST['img_add_o4']!=null && $_POST['img_add_o4']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o4'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o4'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                 	$stmt = $conn->prepare("UPDATE  image set image_add=?,image_option_1=?,image_option_2=?,image_option_3=?,image_option_4=? where que_id =?");
			                $stmt->bind_param( "ssssss" ,$img_add, $img_add_o1, $img_add_o2, $img_add_o3, $img_add_o4, $queid_img );
			                
			                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
			                $img_add_o1=htmlspecialchars(strip_tags($_POST['img_add_o1']));
			                $img_add_o2 =htmlspecialchars(strip_tags($_POST['img_add_o2']));
			                $img_add_o3 =htmlspecialchars(strip_tags($_POST['img_add_o3']));
			                $img_add_o4 =htmlspecialchars(strip_tags($_POST['img_add_o4']));
			                $queid_img =htmlspecialchars(strip_tags($que_id));
			                $execution = $stmt->execute();
			                if($execution == true)
			                {
			                    echo "image  and multiple updated Inserted Successfully!!!";
			                }
			                else{
			                    echo 'image  and multiple  updated insertion Failed';
			                }
        		  	}
        		  	else
        		  	{ //delete image
        		  	 	$stmt = $conn->prepare("DELETE image where que_id =?");
        		  	 	$stmt->bind_param( "s" ,$queid_img);
        		  	 	$queid_img =htmlspecialchars(strip_tags($que_id));
    		  	 	 	$execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image multiple deleted Successfully!!!";
		                }
		                else{
		                    echo 'image multiple deletion Failed';
		                }
        		  	}

	            }
	            else
	            {
	            	if($_POST['img_status']=='1')
        		  	{//insert imagee
	        		  	//save image
	        		  	if( $_POST['img_add']!=null && $_POST['img_add']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                    copy($oldadd,$newadd);
		                }
		                if($_POST['img_add_o1']!=null && $_POST['img_add_o1']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o1'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o1'];
		                    copy($oldadd,$newadd);
		                }
		                 if( $_POST['img_add_o2']!=null && $_POST['img_add_o2']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o2'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o2'];
		                    copy($oldadd,$newadd);
		                }
		                 if( $_POST['img_add_o3']!=null && $_POST['img_add_o3']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o3'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o3'];
		                    copy($oldadd,$newadd);
		                }
		                 if( $_POST['img_add_o4']!=null && $_POST['img_add_o4']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o4'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o4'];
		                    copy($oldadd,$newadd);
		                }
	        		  	$stmt = $conn->prepare("INSERT INTO image(que_id,image_add,image_option_1,image_option_2,image_option_3,image_option_4) VALUES (?,?,?,?,?,?)");
		                $stmt->bind_param( "ssssss", $queid_img ,$img_add, $img_add_o1, $img_add_o2, $img_add_o3, $img_add_o4 );
		                $queid_img =htmlspecialchars(strip_tags($que_id));
		                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
		                $img_add_o1=htmlspecialchars(strip_tags($_POST['img_add_o1']));
		                $img_add_o2 =htmlspecialchars(strip_tags($_POST['img_add_o2']));
		                $img_add_o3 =htmlspecialchars(strip_tags($_POST['img_add_o3']));
		                $img_add_o4 =htmlspecialchars(strip_tags($_POST['img_add_o4']));
		                $execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image  multiple img Inserted Successfully!!!";
		                }
		                else{
		                    echo 'image multiple img  insertion Failed';
		                } 
        		  	}

	            }

	        }
	        else if($_POST['sectionque_edit'] == '2')
	        {//true/false
	        	$query = 'SELECT * from options where que_id = "$que_id"';
		       	$result = $conn->query($query);
	            if($result->num_rows > 0)
	            {
                   //update options
	            	$stmt = $conn->prepare("UPDATE options set option_1=?,option_2=? where que_id =?");
		            $stmt->bind_param( "sss" , $option_1, $option_2, $ques_id );
		           
		            $option_1 =htmlspecialchars(strip_tags($_POST['option_1']));
		            $option_2 =htmlspecialchars(strip_tags($_POST['option_2']));
		             $ques_id =htmlspecialchars(strip_tags($que_id));
		            $execution = $stmt->execute();
		            if($execution == true)
		            {
		                echo "Options  t/f  updated Successfully!!!";
		            }
		            else{
		                echo 'Options t/f updation Failed';
		            }
	            }
	            else
	            {
	            	//insert options
	            	$stmt = $conn->prepare("INSERT INTO options(que_id,option_1,option_2) VALUES (?,?,?)");
		            $stmt->bind_param( "sss", $que_id , $option_1, $option_2);
		            $ques_id =htmlspecialchars(strip_tags($que_id));
		            $option_1 =htmlspecialchars(strip_tags($_POST['option_1']));
		            $option_2 =htmlspecialchars(strip_tags($_POST['option_2']));
		            $execution = $stmt->execute();
		            if($execution == true)
		            {
		                echo "Options t/f Inserted updated Successfully!!!";
		            }
		            else{
		                echo 'Options  t/f insertion updation Failed';
		            }
	            }
	   			//image
	            $query = 'SELECT * from image where que_id = "$que_id"';
        		$result = $conn->query($query);
	            if($result->num_rows > 0)
	            {
	            	if($_POST['img_status']=='1')
        		  	{ // update  image
        		  		//save images
		                if($_POST['img_add']!=null && $_POST['img_add']!="")
		                {   
		                	$oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
	                 	$stmt = $conn->prepare("UPDATE  image set image_add=? where que_id =?");
		                $stmt->bind_param( "ss" ,$img_add, $queid_img );
		                
		                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
		                $queid_img =htmlspecialchars(strip_tags($que_id));
		                $execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image t/f  updated Successfully!!!";
		                }
		                else{
		                    echo 'image t/f  updated  Failed';
		                }		
        		  	}
        		  	else
        		  	{ //delete image
        		  	 	$stmt = $conn->prepare("DELETE image where que_id =?");
        		  	 	$stmt->bind_param( "s" ,$queid_img);
        		  	 	$queid_img =htmlspecialchars(strip_tags($que_id));
    		  	 	 	$execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image t/f  deleted Successfully!!!";
		                }
		                else{
		                    echo 'image t/f deletion Failed';
		                }
        		  	}

	            }
	            else
	            {
	            	if($_POST['img_status']=='1')
        		  	{//insert image
		    		  	if($_POST['img_add']!=null && $_POST['img_add']!="")
			            {   
		                	$oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                     copy($oldadd,$newadd); 
			            }
	        		  	$stmt = $conn->prepare("INSERT INTO image(que_id,image_add) VALUES (?,?)");
		                $stmt->bind_param( "ss", $queid_img ,$img_add);
		                $queid_img =htmlspecialchars(strip_tags($que_id));
		                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
		                $execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image  updation Inserted Successfully!!!";
		                }
		                else{
		                    echo 'image updation insertion Failed';
		                }
        		  	}

	            }

	        }
	        else{
	        	//fill ups // short // long 
	        	$query = 'SELECT * from options where que_id = "$que_id"';
		       	$result = $conn->query($query);
	            if($result->num_rows > 0)
	            {

	            	//delete options
	            	$stmt = $conn->prepare("DELETE options where que_id =?");
    		  	 	$stmt->bind_param( "s" ,$queid_option);
    		  	 	$queid_option =htmlspecialchars(strip_tags($que_id));
		  	 	 	$execution = $stmt->execute();
	                if($execution == true)
	                {
	                    echo "options  deleted Successfully!!!";
	                }
	                else{
	                    echo 'options deletion Failed';
	                }
	            }
	           
	   			//image
	            $query = 'SELECT * from image where que_id = "$que_id"';
        		$result = $conn->query($query);
	            if($result->num_rows > 0)
	            {
	            	if($_POST['img_status']=='1')
        		  	{ // update  image
        		  		//save images
		                if($_POST['img_add']!=null && $_POST['img_add']!="")
		                {   
		                	$oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
	                 	$stmt = $conn->prepare("UPDATE  image set image_add=? where que_id =?");
		                $stmt->bind_param( "ss" ,$img_add, $queid_img );
		               
		                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
		                $queid_img =htmlspecialchars(strip_tags($que_id));
		                $execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image   updated Successfully!!!";
		                }
		                else{
		                    echo 'image   updated  Failed';
		                }		
        		  	}
        		  	else
        		  	{
        		  		//delete image
        		  	 	$stmt = $conn->prepare("DELETE image where que_id =?");
        		  	 	$stmt->bind_param( "s" ,$queid_img);
        		  	 	$queid_img =htmlspecialchars(strip_tags($que_id));
    		  	 	 	$execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image   deleted Successfully!!!";
		                }
		                else{
		                    echo 'image deletion Failed';
		                }
        		  	}

	            }
	            else
	            {
	            	if($_POST['img_status']=='1')
        		  	{//insert image
	        		  	if($_POST['img_add']!=null && $_POST['img_add']!="")
			            {   
		                	$oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                     copy($oldadd,$newadd); 
			            }
	        		  	$stmt = $conn->prepare("INSERT INTO image(que_id,image_add) VALUES (?,?)");
		                $stmt->bind_param( "ss", $queid_img ,$img_add);
		                $queid_img =htmlspecialchars(strip_tags($que_id));
		                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
		                $execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image  updation Inserted Successfully!!!";
		                }
		                else{
		                    echo 'image updation insertion Failed';
		                }
        		  	}

	            }
	        	
	        }
        	
	    }
	    else{
	    	echo "Updation Failed";
	    }

	}//hindi inactive close
	//----------------------------------------------------------------------------------------------->
	if($_POST['hindi_status'] == '1')//hindi active
	{
		//update question
    	$stmt = $conn->prepare("UPDATE  questions set class_id=?, sub_id=?, unit_id=?, section_id=?, level_id=?, question=?, hindi_trans=?, img_status=?, added_by=?, activity_status=?,question_hin =? where que_id=?");
	    $stmt->bind_param( "ssssssssssss", $editque_class , $editque_sub, $editque_unit, $editque_section, $editque_level, $que, $hindi_status, $img_status, $addedby,$activity_status,$question_hin,$question_id );
	    $editque_class = htmlspecialchars(strip_tags($_POST["classque_edit"]));
	    $editque_sub = htmlspecialchars(strip_tags($_POST["subque_edit"]));
	    $editque_unit = htmlspecialchars(strip_tags($_POST["unitque_edit"]));
	    $editque_section = htmlspecialchars(strip_tags( $_POST["sectionque_edit"]));
	    $editque_level = htmlspecialchars(strip_tags($_POST["levelque_edit"]));
	    $que = htmlspecialchars(strip_tags($_POST["que"]));
	    $hindi_status = htmlspecialchars(strip_tags($_POST["hindi_status"]));
	    $img_status = htmlspecialchars(strip_tags($_POST["img_status"]));
	    $addedby =  htmlspecialchars(strip_tags($_SESSION['user_id']));
	    $activity_status = htmlspecialchars(strip_tags('1'));
	    $question_hin =htmlspecialchars(strip_tags($_POST['hindi_question']));
	    $question_id = $_POST['question_id'];
	    $execution = $stmt->execute(); 
    	if($execution == true)
	    {
    		echo "Updated hin  Successfully!!!";
    		 if($_POST['sectionque_edit'] == '1')
	        {//multiple
	        	$query = 'SELECT * from options where que_id = "$que_id"';
		       	$result = $conn->prepare($query);
		       	$execution = $result->execute();
		       	echo 'no of rows options:-'.$conn->affected_rows.'question_id'.$que_id;
		       	$num =$conn->affected_rows;
	            if($num > 0)
	            {
	            	//update options
	            	//update options
	            	$stmt = $conn->prepare("UPDATE options set option_1=?,option_2=?,option_3=?,option_4=?,option_hin_1=?,option_hin_2=?,option_hin_3=?,option_hin_4=? where que_id =? ");
		            $stmt->bind_param( "sssssssss", $option_1, $option_2, $option_3, $option_4,$option_1_hin,$option_2_hin,$option_3_hin,$option_4_hin, $ques_id );
		          
		            $option_1 =htmlspecialchars(strip_tags($_POST['option_1']));
		            $option_2 =htmlspecialchars(strip_tags($_POST['option_2']));
		            $option_3 =htmlspecialchars(strip_tags($_POST['option_3']));
		            $option_4 =htmlspecialchars(strip_tags($_POST['option_4']));
		            $option_1_hin =htmlspecialchars(strip_tags($_POST['option_1_hin']));
		            $option_2_hin =htmlspecialchars(strip_tags($_POST['option_2_hin']));
		            $option_3_hin =htmlspecialchars(strip_tags($_POST['option_3_hin']));
		            $option_4_hin =htmlspecialchars(strip_tags($_POST['option_4_hin']));
		            $ques_id =htmlspecialchars(strip_tags($que_id));
		            $execution = $stmt->execute();
		            if($execution == true)
		            {
		                echo "Options hindi updation Inserted Successfully!!!";
		            }
		            else
		            {
		                echo 'Options hindi updation insertion Failed';
		               
		            }
	            }
	            else
	            {
	            	//insert options
		            $stmt = $conn->prepare("INSERT INTO options (que_id,option_1,option_2,option_3,option_4,option_hin_1,option_hin_2,option_hin_3,option_hin_4) VALUES (?,?,?,?,?,?,?,?,?)");
		            $stmt->bind_param( "sssssssss", $ques_id , $option_1, $option_2, $option_3, $option_4,$option_1_hin,$option_2_hin,$option_3_hin,$option_4_hin);
		            $ques_id =htmlspecialchars(strip_tags($que_id));
		            $option_1 =htmlspecialchars(strip_tags($_POST['option_1']));
		            $option_2 =htmlspecialchars(strip_tags($_POST['option_2']));
		            $option_3 =htmlspecialchars(strip_tags($_POST['option_3']));
		            $option_4 =htmlspecialchars(strip_tags($_POST['option_4']));
		            $option_1_hin =htmlspecialchars(strip_tags($_POST['option_1_hin']));
		            $option_2_hin =htmlspecialchars(strip_tags($_POST['option_2_hin']));
		            $option_3_hin =htmlspecialchars(strip_tags($_POST['option_3_hin']));
		            $option_4_hin =htmlspecialchars(strip_tags($_POST['option_4_hin']));
		            $execution = $stmt->execute();
		            if($execution == true)
		            {
		                echo "Options hindi Inserted Successfully!!!";
		            }
		            else{
		                echo 'Options hindi insertion Failed';
		            }
	            }
	   			//image
	            $query = 'SELECT * from image where que_id = "$que_id"';
        		$result = $conn->query($query);
	            if($result->num_rows > 0)
	            {
	            	if($_POST['img_status']=='1')
        		  	{ // update  image
        		  		//save image
	        		  	if($_POST['img_add']!=null && $_POST['img_add']!="")
		                {   
		                	$oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                if($_POST['img_add_o1']!=null && $_POST['img_add_o1']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o1'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o1'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                 if($_POST['img_add_o2']!=null && $_POST['img_add_o2']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o2'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o2'];
		                    if(!file_exists($newadd))
		                       {  copy($oldadd,$newadd); }
		                }
		                 if($_POST['img_add_o3']!=null && $_POST['img_add_o3']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o3'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o3'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                 if($_POST['img_add_o4']!=null && $_POST['img_add_o4']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o4'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o4'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                if($_POST['img_add_hin']!=null && $_POST['img_add_hin']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                if($_POST['img_add_hin_o1']!=null && $_POST['img_add_hin_o1']!="")
		                {
		                    $oldadd = '../user/temp_upload_folder/'.$_POST['img_add_hin_o1'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin_o1'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                if($_POST['img_add_hin_o2']!=null && $_POST['img_add_hin_o2']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin_o2'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin_o2'];
		                     if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                if($_POST['img_add_hin_o3']!=null && $_POST['img_add_hin_o3']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin_o3'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin_o3'];
		                     if(!file_exists($newadd))
		                       {  copy($oldadd,$newadd); }
		                }
		                if($_POST['img_add_hin_o4']!=null && $_POST['img_add_hin_o4']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin_o4'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin_o4'];
		                     if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
	        		  	$stmt = $conn->prepare("UPDATE  image set image_add=?,image_option_1=?,image_option_2=?,image_option_3=?,image_option_4=? imagehin_add=?,imagehin_option_1=?,imagehin_option_2=?,imagehin_option_3=?,imagehin_option_4=? where que_id =?");
		                $stmt->bind_param( "sssssssssss" ,$img_add, $img_add_o1, $img_add_o2, $img_add_o3, $img_add_o4, $queid_img );
		               
		                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
		                $img_add_o1=htmlspecialchars(strip_tags($_POST['img_add_o1']));
		                $img_add_o2 =htmlspecialchars(strip_tags($_POST['img_add_o2']));
		                $img_add_o3 =htmlspecialchars(strip_tags($_POST['img_add_o3']));
		                $img_add_o4 =htmlspecialchars(strip_tags($_POST['img_add_o4']));
		                $img_add_hin=htmlspecialchars(strip_tags($_POST['img_add_hin']));
		                $img_add_hin_o1 =htmlspecialchars(strip_tags($_POST['img_add_hin_o1']));
		                $img_add_hin_o2 =htmlspecialchars(strip_tags($_POST['img_add_hin_o2']));
		                $img_add_hin_o3 =htmlspecialchars(strip_tags($_POST['img_add_hin_o3']));
		                $img_add_hin_o4 =htmlspecialchars(strip_tags($_POST['img_add_hin_o4']));
		                 $queid_img =htmlspecialchars(strip_tags($que_id));
		                $execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image  and options img hin updated Inserted Successfully!!!";
		                }
		                else{
		                    echo 'image  and options img hin  updated Insertion Failed';
		                }
        		  	}
        		  	else
        		  	{ 
        		  		//delete image
        		  	 	$stmt = $conn->prepare("DELETE image where que_id =?");
        		  	 	$stmt->bind_param( "s" ,$queid_img);
        		  	 	$queid_img =htmlspecialchars(strip_tags($que_id));
    		  	 	 	$execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "Image   deleted Successfully!!!";
		                }
		                else{
		                    echo 'image deletion Failed';
		                }
        		  	}

	            }
	            else
	            {
	            	if($_POST['img_status']=='1')
        		  	{//insert image
	        		  	if($_POST['img_add']!=null && $_POST['img_add']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                    copy($oldadd,$newadd);
		                }
		                if($_POST['img_add_o1']!=null && $_POST['img_add_o1']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o1'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o1'];
		                    copy($oldadd,$newadd);
		                }
		                if($_POST['img_add_o2']!=null && $_POST['img_add_o2']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o2'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o2'];
		                    copy($oldadd,$newadd);
		                }
		                if($_POST['img_add_o3']!=null && $_POST['img_add_o3']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o3'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o3'];
		                    copy($oldadd,$newadd);
		                }
		                if($_POST['img_add_o4']!=null && $_POST['img_add_o4']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_o4'];
		                    $newadd ='../upload_images/'.$_POST['img_add_o4'];
		                    copy($oldadd,$newadd);
		                }
		                if($_POST['img_add_hin']!=null && $_POST['img_add_hin']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin'];
		                    copy($oldadd,$newadd);
		                }
		                if($_POST['img_add_hin_o1']!=null && $_POST['img_add_hin_o1']!="")
		                {
		                    $oldadd = '../user/temp_upload_folder/'.$_POST['img_add_hin_o1'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin_o1'];
		                    copy($oldadd,$newadd);
		                }
		                 if($_POST['img_add_hin_o2']!=null && $_POST['img_add_hin_o2']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin_o2'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin_o2'];
		                    copy($oldadd,$newadd);
		                }
		                if($_POST['img_add_hin_o3']!=null && $_POST['img_add_hin_o3']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin_o3'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin_o3'];
		                    copy($oldadd,$newadd);
		                }
		                if($_POST['img_add_hin_o4']!=null && $_POST['img_add_hin_o4']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin_o4'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin_o4'];
		                    copy($oldadd,$newadd);
		                }
		                $stmt = $conn->prepare("INSERT INTO image(que_id,image_add,image_option_1,image_option_2,image_option_3,image_option_4,imagehin_add,imagehin_option_1,imagehin_option_2,imagehin_option_3,imagehin_option_4) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		                $stmt->bind_param( "sssssssssss",$queid_img,$img_add, $img_add_o1, $img_add_o2, $img_add_o3, $img_add_o4,$img_add_hin,$img_add_hin_o1,$img_add_hin_o2,$img_add_hin_o3,$img_add_hin_o4);
		                $queid_img =htmlspecialchars(strip_tags($last_id));
		                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
		                $img_add_o1=htmlspecialchars(strip_tags($_POST['img_add_o1']));
		                $img_add_o2 =htmlspecialchars(strip_tags($_POST['img_add_o2']));
		                $img_add_o3 =htmlspecialchars(strip_tags($_POST['img_add_o3']));
		                $img_add_o4 =htmlspecialchars(strip_tags($_POST['img_add_o4']));
		                $img_add_hin=htmlspecialchars(strip_tags($_POST['img_add_hin']));
		                $img_add_hin_o1 =htmlspecialchars(strip_tags($_POST['img_add_hin_o1']));
		                $img_add_hin_o2 =htmlspecialchars(strip_tags($_POST['img_add_hin_o2']));
		                $img_add_hin_o3 =htmlspecialchars(strip_tags($_POST['img_add_hin_o3']));
		                $img_add_hin_o4 =htmlspecialchars(strip_tags($_POST['img_add_hin_o4']));
		                $execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image  and options img hin Inserted Successfully!!!";
		                }
		                else{
		                    echo 'image  and options img hin insertion Failed';
		                } 
        		  	}

	            }

	        }
	        else if($_POST['sectionque_edit'] == '2')
	        {//true/false
	        	$query = 'SELECT * from options where que_id = "$que_id"';
		       	$result = $conn->query($query);
	            if($result->num_rows > 0)
	            {
	            	//update options
	            	$stmt = $conn->prepare("UPDATE options set option_1=?,option_2=?,option_hin_1=?,option_hin_2=? where que_id =? ");
		            $stmt->bind_param( "sssss", $option_1, $option_2,$option_1_hin,$option_2_hin, $ques_id );
		            
		            $option_1 =htmlspecialchars(strip_tags($_POST['option_1']));
		            $option_2 =htmlspecialchars(strip_tags($_POST['option_2']));
		          
		            $option_1_hin =htmlspecialchars(strip_tags($_POST['option_1_hin']));
		            $option_2_hin =htmlspecialchars(strip_tags($_POST['option_2_hin']));
		            $ques_id =htmlspecialchars(strip_tags($que_id));
		          
		            $execution = $stmt->execute();
		            if($execution == true)
		            {
		                echo "Options t/f hindi updated   Successfully!!!";
		            }
		            else{
		                echo 'Options t/f hindi updated  Failed';
		            }
	            }
	            else
	            {
	            	//insert options
	            	$stmt = $conn->prepare("INSERT INTO options (que_id,option_1,option_2,option_hin_1,option_hin_2) VALUES (?,?,?,?,?)");
		            $stmt->bind_param( "sssss", $ques_id , $option_1, $option_2,$option_1_hin ,$option_2_hin);
		            $ques_id =htmlspecialchars(strip_tags($que_id));
		            $option_1 =htmlspecialchars(strip_tags($_POST['option_1']));
		            $option_2 =htmlspecialchars(strip_tags($_POST['option_2']));
		            $option_1_hin =htmlspecialchars(strip_tags($_POST['option_1_hin']));
		            $option_2_hin =htmlspecialchars(strip_tags($_POST['option_2_hin']));
		            $execution = $stmt->execute();
		            if($execution == true)
		            {
		                echo "Options t/f hindi Updated Inserted Successfully!!!";
		            }
		            else{
		                echo 'Options t/f hindi updated insertion Failed';
		            }
	            }
	   			//image
	            $query = 'SELECT * from image where que_id = "$que_id"';
        		$result = $conn->query($query);
	            if($result->num_rows > 0)
	            {
	            	if($_POST['img_status']=='1')
        		  	{ //update image
        		  		//save images
		                if($_POST['img_add']!=null && $_POST['img_add']!="")
		                {   
		                	$oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                 if($_POST['img_add_hin']!=null && $_POST['img_add_hin']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
	                 	$stmt = $conn->prepare("UPDATE  image set image_add=?,imagehin_add=? where que_id =?");
		                $stmt->bind_param( "sss" ,$img_add,$img_add_hin,$ $queid_img );
		                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
		                $img_add_hin=htmlspecialchars(strip_tags($_POST['img_add_hin']));
		                $queid_img =htmlspecialchars(strip_tags($que_id));
		                $execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image   updated Successfully!!!";
		                }
		                else{
		                    echo 'image   updated  Failed';
		                }		
        		  	}
        		  	else
        		  	{ //delete image
        		  	 	$stmt = $conn->prepare("DELETE image where que_id =?");
        		  	 	$stmt->bind_param( "s" ,$queid_img);
        		  	 	$queid_img =htmlspecialchars(strip_tags($que_id));
    		  	 	 	$execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image   deleted Successfully!!!";
		                }
		                else{
		                    echo 'image deletion Failed';
		                }
        		  	}

	            }
	            else
	            {
	            	if($_POST['img_status']=='1')
        		  	{//insert imagee
	        		  	 if($_POST['img_add']!=null && $_POST['img_add']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                    copy($oldadd,$newadd);
		                }
		                 if($_POST['img_add_hin']!=null && $_POST['img_add_hin']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin'];
		                    copy($oldadd,$newadd);
		                }
		                $stmt = $conn->prepare("INSERT INTO image(que_id,image_add,imagehin_add) VALUES (?,?,?)");
		                $stmt->bind_param( "sss",$queid_img,$img_add,$img_add_hin);
		                $queid_img =htmlspecialchars(strip_tags($last_id));
		                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
		                $img_add_hin=htmlspecialchars(strip_tags($_POST['img_add_hin']));
		                $execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image  and options img hin Inserted Successfully!!!";
		                }
		                else{
		                    echo 'image  and options img hin insertion Failed';
		                } 
        		  	}

	            }

	        }
	        else{
	        	//fill ups // short // long 
	        	$query = 'SELECT * from options where que_id = "$que_id"';
		       	$result = $conn->query($query);
	            if($result->num_rows > 0)
	            {
	            	//delete options
	            	$stmt = $conn->prepare("DELETE options where que_id =?");
    		  	 	$stmt->bind_param( "s" ,$queid_option);
    		  	 	$queid_option =htmlspecialchars(strip_tags($que_id));
		  	 	 	$execution = $stmt->execute();
	                if($execution == true)
	                {
	                    echo "options  deleted Successfully!!!";
	                }
	                else{
	                    echo 'options deletion Failed';
	                }
	            }
	          
	   			//image
	            $query = 'SELECT * from image where que_id = "$que_id"';
        		$result = $conn->query($query);
	            if($result->num_rows > 0)
	            {
	            	if($_POST['img_status']=='1')
        		  	{ // update  image
        		  		//save images
		                if($_POST['img_add']!=null && $_POST['img_add']!="")
		                {   
		                	$oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
		                 if($_POST['img_add_hin']!=null && $_POST['img_add_hin']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin'];
		                    if(!file_exists($newadd)) 
		                       {  copy($oldadd,$newadd); }
		                }
	                 	$stmt = $conn->prepare("UPDATE  image set image_add=?,imagehin_add=? where que_id =?");
		                $stmt->bind_param( "sss" ,$img_add,$img_add_hin,$ $queid_img );
		                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
		                $img_add_hin=htmlspecialchars(strip_tags($_POST['img_add_hin']));
		                $queid_img =htmlspecialchars(strip_tags($que_id));
		                $execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image   updated Successfully!!!";
		                }
		                else{
		                    echo 'image   updated  Failed';
		                }		
        		  	}
        		  	else
        		  	{
        		  		//delete image
        		  	 	$stmt = $conn->prepare("DELETE image where que_id =?");
        		  	 	$stmt->bind_param( "s" ,$queid_img);
        		  	 	$queid_img =htmlspecialchars(strip_tags($que_id));
    		  	 	 	$execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image   deleted Successfully!!!";
		                }
		                else{
		                    echo 'image deletion Failed';
		                }
        		  	}

	            }
	            else
	            {
	            	if($_POST['img_status']=='1')
        		  	{//insert image
        		  		 if($_POST['img_add']!=null && $_POST['img_add']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
		                    $newadd ='../upload_images/'.$_POST['img_add'];
		                    copy($oldadd,$newadd);
		                }
		                 if($_POST['img_add_hin']!=null && $_POST['img_add_hin']!="")
		                {
		                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add_hin'];
		                    $newadd ='../upload_images/'.$_POST['img_add_hin'];
		                    copy($oldadd,$newadd);
		                }
		                $stmt = $conn->prepare("INSERT INTO image(que_id,image_add,imagehin_add) VALUES (?,?,?)");
		                $stmt->bind_param( "sss",$queid_img,$img_add,$img_add_hin);
		                $queid_img =htmlspecialchars(strip_tags($last_id));
		                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
		                $img_add_hin=htmlspecialchars(strip_tags($_POST['img_add_hin']));
		                $execution = $stmt->execute();
		                if($execution == true)
		                {
		                    echo "image  and options img hin Inserted Successfully!!!";
		                }
		                else{
		                    echo 'image  and options img hin insertion Failed';
		                }  
        		  	}

	            }
	        	
	        }
    	}
    	else{
    		echo "Updation hin Failed";
    	}

	}//hindi inactive close

}
?>