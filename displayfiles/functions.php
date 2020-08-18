<?php
function generateobj($class_id,$sub_id,$unit_id,$level_id,$sno)
{   $database = new Database();
    $con = $database->getConnection();
	$query = "SELECT * from questions where class_id='$class_id' and sub_id='$sub_id' and unit_id='$unit_id' and level_id='$level_id' and activity_status='1' and (section_id='1' OR section_id='2' OR section_id='3') ORDER BY rand() limit 1";
    $result = $con->query($query);
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        	$question_id =$row['que_id'];
        	$section_id = $row['section_id'];
        	$question = $row['question'];
        	$hindi_trans =$row['hindi_trans'];
        	$img_status= $row['img_status'];
        	if($hindi_trans == '1')
        	{
        		$question_hin = $row['question_hin'];
        	}
        	
        }
     
       	$query2 = "SELECT * from options where que_id='$question_id'";
    	$result2 = $con->query($query2);
    	if($result2->rowCount()> 0){
        while($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
        	$option_1 = $row2['option_1'];
        	$option_2 = $row2['option_2'];
        	$option_3 = $row2['option_3'];
        	$option_4 = $row2['option_4'];
        	$option_hin_1 = $row2['option_hin_1'];
        	$option_hin_2 = $row2['option_hin_2'];
        	$option_hin_3 = $row2['option_hin_3'];
        	$option_hin_4 = $row2['option_hin_4'];
        }
       

       }
        else{
        	$option_1 = '';
        	$option_2 = '';
        	$option_3 = '';
        	$option_4 = '';
        	$option_hin_1 = '';
        	$option_hin_2 = '';
        	$option_hin_3 = '';
        	$option_hin_4 = '';

        }
       if($img_status == '1')
       {
       	$query3 = "SELECT * from image where que_id='$question_id'";
    	$result3 = $con->query($query3);
    	if($result3->rowCount()> 0){
        while($row3 = $result3->fetch(PDO::FETCH_ASSOC)) {
        	$que_img = $row3['image_add'];
        	$que_hin_img = $row3['imagehin_add'];
        	$image_option_1 = $row3['image_option_1'];
        	$image_option_2 = $row3['image_option_2'];
        	$image_option_3 = $row3['image_option_3'];
        	$image_option_4 = $row3['image_option_4'];
        	$imagehin_option_1 = $row3['imagehin_option_1'];
        	$imagehin_option_2 = $row3['imagehin_option_2'];
        	$imagehin_option_3 = $row3['imagehin_option_3'];
        	$imagehin_option_4 = $row3['imagehin_option_4'];

       			}
   			 }
   			 else{
   			$que_img = '';
        	$que_hin_img = '';
        	$image_option_1 = '';
        	$image_option_2 = '';
        	$image_option_3 = '';
        	$image_option_4 = '';
        	$imagehin_option_1 = '';
        	$imagehin_option_2 = '';
        	$imagehin_option_3 = '';
        	$imagehin_option_4 = '';

   			 }
		}
		$data='Que'.$sno.':-'.$question;
  			if( $img_status=='1' && $que_img!="" && $que_img!=null)
  			{
  				$data .='<br><img src="../upload_images/'.$que_img.'">';
  			}
  			if($section_id =='1')
  			{	if($option_1!= "" && $option_1!=null)
  				{
  					$data .= "<br>A.".$option_1;	
  				}
  				if( $img_status=='1' && $image_option_1!="" && $image_option_1!=null)
	  			{
	  				$data .='<br><img src="../upload_images/'.$image_option_1.'">';
	  			}
	  			if($option_2!= "" && $option_2!=null)
  				{
  					$data .= "<br>B.".$option_2;
  				}
  				if( $img_status=='1' && $image_option_2!="" && $image_option_2!=null)
	  			{
	  				$data .='<br><img src="../upload_images/'.$image_option_2.'">';
	  			}
	  			if($option_3!= "" && $option_3!=null)
  				{
  					$data .= "<br>C.".$option_3;
  				}
  				if( $img_status=='1' && $image_option_3!="" && $image_option_3!=null)
	  			{
	  				$data .='<br><img src="../upload_images/'.$image_option_3.'">';
	  			}
	  			if($option_4!= "" && $option_4!=null)
  				{
  					$data .= "<br>D.".$option_4;
  				}
  				if( $img_status=='1' && $image_option_4!="" && $image_option_4!=null)
	  			{
	  				$data .='<br><img src="../upload_images/'.$image_option_4.'">';
	  			}

  			}
  			if($section_id =='2')	
	  		{
	  			$data .= "<br>A.".$option_1;
	  			$data .= "<br>B.".$option_2;
	  		}
	  		if($hindi_trans == '1')
	  		{
	  			$data .='<br>प्रश्न'.$sno.':-'.$question_hin;
	  			if( $img_status=='1' && $que_hin_img!="" && $que_hin_img!=null)
	  			{
	  				$data .='<br><img src="../upload_images/'.$que_hin_img.'">';
	  			}
	  			if($section_id=='1')
	  			{
	  				$data .= "<br>A.".$option_hin_1;
	  				if( $img_status=='1' && $imagehin_option_1!="" && $imagehin_option_1!=null)
		  			{
		  				$data .='<br><img src="../upload_images/'.$imagehin_option_1.'">';
		  			}
	  				$data .= "<br>B.".$option_hin_2;
	  				if( $img_status=='1' && $imagehin_option_2!="" && $imagehin_option_2!=null)
		  			{
		  				$data .='<br><img src="../upload_images/'.$imagehin_option_2.'">';
		  			}
	  				$data .= "<br>C.".$option_hin_3;
	  				if( $img_status=='1' && $imagehin_option_3!="" && $imagehin_option_3!=null)
		  			{
		  				$data .='<br><img src="../upload_images/'.$imagehin_option_3.'">';
		  			}
	  				$data .= "<br>D.".$option_hin_4;
	  				if( $img_status=='1' && $imagehin_option_4!="" && $imagehin_option_4!=null)
		  			{
		  				$data .='<br><img src="../upload_images/'.$imagehin_option_4.'">';
		  			}
	  			}
	  			if($section_id =='2')
	  			{
	  				$data .= "<br>A.".$option_hin_1;
	  				$data .= "<br>B.".$option_hin_2;
	  			}
	  		}
  		
  		
			
	}
	else
	{
		$data ="Que".$sno.':- No Question';
	}
	return $data;
}
function generateshortlong($class_id,$sub_id,$unit_id,$section_id,$level_id,$sno){
 $database = new Database();
 $con = $database->getConnection();
 $query = "SELECT * from questions where class_id='$class_id' and sub_id='$sub_id' and unit_id='$unit_id' and level_id='$level_id' and activity_status='1' and section_id='$section_id' ORDER BY rand() limit 1";
    $result = $con->query($query);
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        	$question_id =$row['que_id'];
        	$section_id = $row['section_id'];
        	$question = $row['question'];
        	$hindi_trans =$row['hindi_trans'];
        	$img_status= $row['img_status'];
        	if($hindi_trans == '1')
        	{
        		$question_hin = $row['question_hin'];
        	}
        }
        if($img_status == '1')
       {
       	$query3 = "SELECT * from image where que_id='$question_id'";
    	$result3 = $con->query($query3);
    	if($result3->rowCount()> 0){
        while($row3 = $result3->fetch(PDO::FETCH_ASSOC)) {
        	$que_img = $row3['image_add'];
        	$que_hin_img = $row3['imagehin_add'];

       			}
   			 }
   			 else{
   			$que_img = '';
        	$que_hin_img = '';

   			 }
   				}
   		$data ='Que'.$sno.':-'.$question;
  			if( $img_status=='1' && $que_img!="" && $que_img!=null)
  			{ $imgsrc= '<br><img src="../upload_images/'.$que_img.'">';
  				$data .= $imgsrc;
  			}
  			if($hindi_trans == '1')
	  		{
	  			$data .='<br>प्रश्न'.$sno.':-'.$question_hin;
	  			if( $img_status=='1' && $que_hin_img!="" && $que_hin_img!=null)
	  			{ $imgsrc_hin ='<br><img src="../upload_images/'.$que_hin_img.'">';
	  				$data .=$imgsrc_hin;
	  			}
	  		}
	  		
	 }
	 else{
	 	$data = 'Que'.$sno.':- No questions';
	 }
	 return $data;
	}


?>