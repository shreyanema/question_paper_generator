<?php
session_start();
include_once "../includes/connection.php";
if($_POST['hindi_status'] == 2)
{
    $stmt = $conn->prepare("INSERT INTO questions(class_id, sub_id, unit_id, section_id, level_id, question, hindi_trans, img_status, added_by, activity_status) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param( "ssssssssss", $addque_class , $addque_sub, $addque_unit, $addque_section, $addque_level, $que, $hindi_status, $img_status, $addedby,$activity_status );
    $addque_class = htmlspecialchars(strip_tags($_POST["addque_class"]));
    $addque_sub = htmlspecialchars(strip_tags($_POST["addque_sub"]));
    $addque_unit = htmlspecialchars(strip_tags($_POST["addque_unit"]));
    $addque_section = htmlspecialchars(strip_tags( $_POST["addque_section"]));
    $addque_level = htmlspecialchars(strip_tags($_POST["addque_level"]));
    $que = htmlspecialchars(strip_tags($_POST["que"]));
    $hindi_status = htmlspecialchars(strip_tags($_POST["hindi_status"]));
    $img_status = htmlspecialchars(strip_tags($_POST["img_status"]));
    $addedby =  htmlspecialchars(strip_tags($_SESSION['user_id']));
    $activity_status = htmlspecialchars(strip_tags('1'));
    
    $execution = $stmt->execute();
    if($execution == true)
    {
        echo "Inserted Successfully!!!";
         $last_id = $conn->insert_id;
        if($_POST['addque_section'] == 1) //multiple choice questions
         {   $stmt = $conn->prepare("INSERT INTO options(que_id,option_1,option_2,option_3,option_4) VALUES (?,?,?,?,?)");
             $stmt->bind_param( "sssss", $last_que_id , $option_1, $option_2, $option_3, $option_4 );
             $last_que_id =htmlspecialchars(strip_tags($last_id));
             $option_1 =htmlspecialchars(strip_tags($_POST['option_1']));
             $option_2 =htmlspecialchars(strip_tags($_POST['option_2']));
             $option_3 =htmlspecialchars(strip_tags($_POST['option_3']));
             $option_4 =htmlspecialchars(strip_tags($_POST['option_4']));
             $execution = $stmt->execute();
            if($execution == true)
            {
                echo "Options Inserted Successfully!!!";
            }
            else{
                echo 'Options insertion Failed';
            }
            if($_POST['img_status'] == 1)
              { if($_POST['img_add']!=null && $_POST['img_add']!="")
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
                $stmt = $conn->prepare("INSERT INTO image(que_id,image_add,image_option_1,image_option_2,image_option_3,image_option_4) VALUES (?,?,?,?,?,?)");
                $stmt->bind_param( "ssssss", $queid_img ,$img_add, $img_add_o1, $img_add_o2, $img_add_o3, $img_add_o4 );
                $queid_img =htmlspecialchars(strip_tags($last_id));
                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
                $img_add_o1=htmlspecialchars(strip_tags($_POST['img_add_o1']));
                $img_add_o2 =htmlspecialchars(strip_tags($_POST['img_add_o2']));
                $img_add_o3 =htmlspecialchars(strip_tags($_POST['img_add_o3']));
                $img_add_o4 =htmlspecialchars(strip_tags($_POST['img_add_o4']));
                $execution = $stmt->execute();
                if($execution == true)
                {
                    echo "image  and options img Inserted Successfully!!!";
                }
                else{
                    echo 'image  and options img  insertion Failed';
                }  
            }
         }
        else if($_POST['addque_section'] == 2) //true or false
        {   
             $stmt = $conn->prepare("INSERT INTO options(que_id,option_1,option_2) VALUES (?,?,?)");
             $stmt->bind_param( "sss", $last_que_id , $option_1, $option_2);
             $last_que_id =htmlspecialchars(strip_tags($last_id));
             $option_1 =htmlspecialchars(strip_tags($_POST['option_1']));
             $option_2 =htmlspecialchars(strip_tags($_POST['option_2']));
             $execution = $stmt->execute();
            if($execution == true)
            {
                echo "options t/f Inserted Successfully!!!";
            }
            else{
                echo 'Options t/f insertion Failed';
            }
            if($_POST['img_status'] == 1)
            {    if($_POST['img_add']!=null && $_POST['img_add']!="")
                {
                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
                    $newadd ='../upload_images/'.$_POST['img_add'];
                    copy($oldadd,$newadd);
                }
                $stmt = $conn->prepare("INSERT INTO image(que_id,image_add) VALUES (?,?)");
                $stmt->bind_param( "ss", $queid_img ,$img_add);
                $queid_img =htmlspecialchars(strip_tags($last_id));
                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
                $execution = $stmt->execute();
                if($execution == true)
                {
                    echo "image Inserted Successfully!!!";
                }
                else{
                    echo 'image  insertion Failed';
                }   
            }
        }
        else{
            if($_POST['img_status'] == 1)
            {    if($_POST['img_add']!=null && $_POST['img_add']!="")
                {
                    $oldadd= '../user/temp_upload_folder/'.$_POST['img_add'];
                    $newadd ='../upload_images/'.$_POST['img_add'];
                    copy($oldadd,$newadd);
                }
                $stmt = $conn->prepare("INSERT INTO image(que_id,image_add) VALUES (?,?)");
                $stmt->bind_param( "ss", $queid_img ,$img_add);
                $queid_img =htmlspecialchars(strip_tags($last_id));
                $img_add =htmlspecialchars(strip_tags($_POST['img_add']));
                $execution = $stmt->execute();
                if($execution == true)
                {
                    echo "image Inserted Successfully!!!";
                }
                else{
                    echo 'image  insertion Failed';
                }  
            }
        }            
    }
    else {
        echo "Insertion Failed!!!";  
    }
}
if($_POST['hindi_status'] == 1)
{
    $stmt = $conn->prepare("INSERT INTO questions(class_id, sub_id, unit_id, section_id, level_id, question, hindi_trans, img_status, added_by, activity_status,question_hin) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param( "sssssssssss", $addque_class , $addque_sub, $addque_unit, $addque_section, $addque_level, $que, $hindi_status, $img_status, $addedby,$activity_status ,$hindi_question);
    $addque_class = htmlspecialchars(strip_tags($_POST["addque_class"]));
    $addque_sub = htmlspecialchars(strip_tags($_POST["addque_sub"]));
    $addque_unit = htmlspecialchars(strip_tags($_POST["addque_unit"]));
    $addque_section = htmlspecialchars(strip_tags( $_POST["addque_section"]));
    $addque_level = htmlspecialchars(strip_tags($_POST["addque_level"]));
    $que = htmlspecialchars(strip_tags($_POST["que"]));
    $hindi_status = htmlspecialchars(strip_tags($_POST["hindi_status"]));
    $img_status = htmlspecialchars(strip_tags($_POST["img_status"]));
    $addedby =  htmlspecialchars(strip_tags($_SESSION['user_id']));
    $activity_status = htmlspecialchars(strip_tags('1'));
    $hindi_question =htmlspecialchars(strip_tags($_POST['hindi_question']));
    $execution = $stmt->execute();
    if($execution == true){
        echo "Inserted hindi Successfully!!!";
          $last_id = $conn->insert_id;
        if($_POST['addque_section'] == 1) //multiple choice questions
         {
             $stmt = $conn->prepare("INSERT INTO options(que_id,option_1,option_2,option_3,option_4,option_hin_1,option_hin_2,option_hin_3,option_hin_4) VALUES (?,?,?,?,?,?,?,?,?)");
             $stmt->bind_param( "sssssssss", $last_que_id , $option_1, $option_2, $option_3, $option_4,$option_1_hin,$option_2_hin,$option_3_hin,$option_4_hin);
             $last_que_id =htmlspecialchars(strip_tags($last_id));
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
            if($_POST['img_status'] == 1)
            {    if($_POST['img_add']!=null && $_POST['img_add']!="")
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
        else if($_POST['addque_section'] == 2) //true or false
        {   $stmt = $conn->prepare("INSERT INTO options(que_id,option_1,option_2,option_hin_1,option_hin_2) VALUES (?,?,?,?,?)");
             $stmt->bind_param( "sssss", $last_que_id , $option_1, $option_2,$option_1_hin,$option_2_hin);
             $last_que_id =htmlspecialchars(strip_tags($last_id));

             $option_1 =htmlspecialchars(strip_tags($_POST['option_1']));
             $option_2 =htmlspecialchars(strip_tags($_POST['option_2']));
             $option_1_hin =htmlspecialchars(strip_tags($_POST['option_1_hin']));
             $option_2_hin =htmlspecialchars(strip_tags($_POST['option_2_hin']));
             $execution = $stmt->execute();
            if($execution == true)
            {
                echo "Options t/f hindi Inserted Successfully!!!";
            }
            else{
                echo 'Options t/f hindi insertion Failed';
            }
            if($_POST['img_status'] == 1)
            {    if($_POST['img_add']!=null && $_POST['img_add']!="")
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
        else{
            if($_POST['img_status'] == 1)
            {    if($_POST['img_add']!=null && $_POST['img_add']!="")
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
    else {
        echo "Insertion Failed!!!    hindi";  
    }

} 


?>



