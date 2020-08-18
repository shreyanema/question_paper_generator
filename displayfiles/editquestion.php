<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();

if(isset($_POST['unit_fetch']))
{
    $query = "SELECT * from level";
    $result = $conn->query($query);
    $level = "<option value=''>Select Level </option>";
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $level.= "<option value='".$row['level_id']."'>".$row['level']."</option>";
        }
    }
    $level;
    echo  $level;
}
// on select class
if(isset($_POST['class_id']))
{
    $class_id =$_POST['class_id'];
   $data ="";
    // Objective  Type questions

	 $query = "SELECT q.*,c.*,s.*,u.*,sec.*,l.*,o.option_1,o.option_2,o.option_3,o.option_4,image.image_add,image.image_option_1,image.image_option_2,image.image_option_3,image.image_option_4,image.imagehin_add,image.imagehin_option_1,image.imagehin_option_2,image.imagehin_option_3,image.imagehin_option_4 from questions q LEFT JOIN image ON q.que_id = image.que_id LEFT JOIN options as o ON q.que_id = o.que_id ,class c,sub s,unit u,section sec ,level l where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id = s.sub_id and q.unit_id =u.unit_id and q.level_id = l.level_id and(q.section_id='1' OR q.section_id='2' OR q.section_id='3') and q.section_id = sec.section_id and q.hindi_trans ='2'";
	if(isset($_POST['sub_id']))
		{ $sub_id=$_POST['sub_id'];
            $query = "SELECT q.*,c.*,s.*,u.*,sec.*,l.*,o.option_1,o.option_2,o.option_3,o.option_4,image.image_add,image.image_option_1,image.image_option_2,image.image_option_3,image.image_option_4  from questions q LEFT JOIN image ON q.que_id = image.que_id LEFT JOIN options as o ON q.que_id = o.que_id ,class c,sub s,unit u,section sec ,level l where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id =u.unit_id and q.level_id = l.level_id  and(q.section_id='1' OR q.section_id='2' OR q.section_id='3') and q.section_id = sec.section_id  and q.hindi_trans ='2'";
			 if(isset($_POST['unit_id']))
			 { $unit_id=$_POST['unit_id'];
                  $query = "SELECT q.*,c.*,s.*,u.*,sec.*,l.*,o.option_1,o.option_2,o.option_3,o.option_4,image.image_add,image.image_option_1,image.image_option_2,image.image_option_3,image.image_option_4  from questions q LEFT JOIN image ON q.que_id = image.que_id LEFT JOIN options as o ON q.que_id = o.que_id ,class c,sub s,unit u,section sec ,level l where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id ='$unit_id' and u.unit_id ='$unit_id' and q.level_id = l.level_id  and(q.section_id='1' OR q.section_id='2' OR q.section_id='3') and q.section_id = sec.section_id  and q.hindi_trans ='2'";
				
				 if(isset($_POST['level_id']))
				 { $level_id = $_POST['level_id'];
                 $query = "SELECT q.*,c.*,s.*,u.*,sec.*,l.*,o.option_1,o.option_2,o.option_3,o.option_4,image.image_add,image.image_option_1,image.image_option_2,image.image_option_3,image.image_option_4  from questions q LEFT JOIN image ON q.que_id = image.que_id LEFT JOIN options as o ON q.que_id = o.que_id ,class c,sub s,unit u,section sec ,level l  where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id ='$unit_id' and u.unit_id ='$unit_id' and q.level_id ='$level_id' and  l.level_id = '$level_id'   and (q.section_id='1' OR q.section_id='2' OR q.section_id='3') and q.section_id = sec.section_id  and q.hindi_trans ='2'";
                
				 }
			 }
		}
       $data .='<table  id="showques_all_1"  class="table table-striped table-bordered">                    
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Unit</th>
                            <th>Section</th>
                            <th>level</th>
                            <th>Questions</th>
                            <th>Option A</th>
                            <th>Option B</th>
                            <th>Option C</th>
                            <th>Option D</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Active</th>
                        </tr>
                    </thead><tbody>';
        $result = $conn->query($query);
        if($result->rowCount()> 0){
        	while($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $que_id =$row['que_id'];
               if($row['image_add'] == null || $row['image_add'] == "")
               {
                 $image ='';
               }
               else{
                $image ='<img src="../upload_images/'.$row['image_add'].'">';
               }
               if($row['image_option_1'] == null || $row['image_option_1'] == "")
               {
                 $image_option1 ='';
               }
               else{
                $image_option1 ='<img src="../upload_images/'.$row['image_option_1'].'">';
               }
                if($row['image_option_2'] == null || $row['image_option_2'] == "")
               {
                 $image_option2 ='';
               }
               else{
                $image_option2 ='<img src="../upload_images/'.$row['image_option_2'].'">';
               }
                if($row['image_option_3'] == null || $row['image_option_3'] == "")
               {
                 $image_option3 ='';
               }
               else{
                $image_option3 ='<img src="../upload_images/'.$row['image_option_3'].'">';
               }
                 if($row['image_option_4'] == null || $row['image_option_4'] == "")
               {
                 $image_option4 ='';
               }
               else{
                $image_option4 ='<img src="../upload_images/'.$row['image_option_4'].'">';
               }

              if($row['activity_status'] =='1')
              {

              }
                 
                 
                $data .='<tr>
                            <td>'.$row["que_id"].'</td>
                            <td>'.$row['class'].'</td>
                            <td>'.$row['sub'].'</td>
                            <td>'.$row['unit'].'</td>
                            <td>'.$row['section'].'</td>
                            <td>'.$row['level'].'</td>          
                            <td>'.$row['question'].'<br>'.$image.'</td>
                            <td>'.$row["option_1"].'<br>'.$image_option1.'</td>
                            <td>'.$row["option_2"].'<br>'.$image_option2.'</td>
                            <td>'.$row["option_3"].'<br>'.$image_option3.'</td>
                            <td>'.$row["option_4"].'<br>'.$image_option4.'</td>
                            <td><a href="editque_page.php?queid='.$row["que_id"].'" class="text-white"><button class="btn btn-success" name="edit">Edit</button></a></td>
                            <td><button class="btn btn-danger" id="'.$row["que_id"].'" name="delete">Delete</button></td>';

                  if($row['activity_status'] =='1')
                  {
                     $data .= '<td><div id="activity'.$row["que_id"].'"><button class="btn btn-info text-white"  id="'.$row["que_id"].'" name="active">Active</button></div></td>
                        </tr>';
                  } 
                  else{
                     $data .= '<td><div id="activity'.$row["que_id"].'"><button class="btn btn-secondary" id="'.$row["que_id"].'" name="inactive" >Inactive</button></div></td>
                        </tr>';
                  }
                         
               
               
        		

        	}
       }
      
        $data .= "</tbody></table>";
        $data .='<script src="../dependencies/jquery/jquery.min.js" type="text/javascript"></script>
                      <script src="../dependencies/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script> 
                      <script src="../dependencies/datatables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script> 
                      <script>$("#showques_all_1").DataTable();</script>';

       //-----------------------------------------------------------------------------------------------------------------
       //------------------------------------------------------------------------------------------------------------------
       //-----------------------------------------------------------------------------------------------------------------------               
         // Objective hindi  Type questions
    $query = "SELECT q.*,c.*,s.*,u.*,sec.*,l.*,o.option_1,o.option_2,o.option_3,o.option_4,o.option_hin_1,o.option_hin_2, o.option_hin_3,o.option_hin_4,image.image_add,image.image_option_1,image.image_option_2,image.image_option_3,image.image_option_4,image.imagehin_add,image.imagehin_option_1,image.imagehin_option_2,image.imagehin_option_3,image.imagehin_option_4 from questions q LEFT JOIN image ON q.que_id = image.que_id LEFT JOIN options as o ON q.que_id = o.que_id ,class c,sub s,unit u,section sec ,level l  where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id = s.sub_id and q.unit_id =u.unit_id and q.level_id = l.level_id  and(q.section_id='1' OR q.section_id='2' OR q.section_id='3')  and q.section_id = sec.section_id and q.hindi_trans ='1'";
    if(isset($_POST['sub_id']))
        { $sub_id=$_POST['sub_id'];
            $query = "SELECT q.*,c.*,s.*,u.*,sec.*,l.*,o.option_1,o.option_2,o.option_3,o.option_4,o.option_hin_1,o.option_hin_2, o.option_hin_3,o.option_hin_4,image.image_add,image.image_option_1,image.image_option_2,image.image_option_3,image.image_option_4,image.imagehin_add,image.imagehin_option_1,image.imagehin_option_2,image.imagehin_option_3,image.imagehin_option_4 from questions q LEFT JOIN image ON q.que_id = image.que_id LEFT JOIN options as o ON q.que_id = o.que_id ,class c,sub s,unit u,section sec ,level l where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id =u.unit_id and q.level_id = l.level_id  and(q.section_id='1' OR q.section_id='2' OR q.section_id='3') and q.section_id = sec.section_id  and q.hindi_trans ='1'";
             if(isset($_POST['unit_id']))
             { $unit_id=$_POST['unit_id'];
                  $query = "SELECT q.*,c.*,s.*,u.*,sec.*,l.*,o.option_1,o.option_2,o.option_3,o.option_4,o.option_hin_1,o.option_hin_2, o.option_hin_3,o.option_hin_4,image.image_add,image.image_option_1,image.image_option_2,image.image_option_3,image.image_option_4,image.imagehin_add,image.imagehin_option_1,image.imagehin_option_2,image.imagehin_option_3,image.imagehin_option_4 from questions q LEFT JOIN image ON q.que_id = image.que_id LEFT JOIN options as o ON q.que_id = o.que_id ,class c,sub s,unit u,section sec ,level l  where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id ='$unit_id' and u.unit_id ='$unit_id' and q.level_id = l.level_id  and(q.section_id='1' OR q.section_id='2' OR q.section_id='3') and q.section_id = sec.section_id  and q.hindi_trans ='1'";
                
                 if(isset($_POST['level_id']))
                 { $level_id = $_POST['level_id'];
                 $query = "SELECT q.*,c.*,s.*,u.*,sec.*,l.*,o.option_1,o.option_2,o.option_3,o.option_4,o.option_hin_1,o.option_hin_2, o.option_hin_3,o.option_hin_4,image.image_add,image.image_option_1,image.image_option_2,image.image_option_3,image.image_option_4,image.imagehin_add,image.imagehin_option_1,image.imagehin_option_2,image.imagehin_option_3,image.imagehin_option_4 from questions q LEFT JOIN image ON q.que_id = image.que_id LEFT JOIN options as o ON q.que_id = o.que_id ,class c,sub s,unit u,section sec ,level l  where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id ='$unit_id' and u.unit_id ='$unit_id' and q.level_id ='$level_id' and  l.level_id = '$level_id'    and (q.section_id='1' OR q.section_id='2' OR q.section_id='3') and q.section_id = sec.section_id  and q.hindi_trans ='1'";
                
                 }
             }
        }
         $data .='<table  id="showques_all_2"  class="table table-striped table-bordered">                    
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Unit</th>
                            <th>Section</th>
                            <th>level</th>
                            <th>Questions</th>
                            <th>Option A</th>
                            <th>Option B</th>
                            <th>Option C</th>
                            <th>Option D</th>
                            <th>Questions (hindi)</th>
                            <th>Option A (hindi)</th>
                            <th>Option B (hindi)</th>
                            <th>Option C (hindi)</th>
                            <th>Option D (hindi)</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Active</th>
                        </tr>
                    </thead><tbody>';
        $result = $conn->query($query);
        if($result->rowCount()> 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $que_id =$row['que_id'];
               if($row['image_add'] == null || $row['image_add'] == "")
               {
                 $image ='';
               }
               else{
                $image ='<img src="../upload_images/'.$row['image_add'].'">';
               }
               if($row['image_option_1'] == null || $row['image_option_1'] == "")
               {
                 $image_option1 ='';
               }
               else{
                $image_option1 ='<img src="../upload_images/'.$row['image_option_1'].'">';
               }
                if($row['image_option_2'] == null || $row['image_option_2'] == "")
               {
                 $image_option2 ='';
               }
               else{
                $image_option2 ='<img src="../upload_images/'.$row['image_option_2'].'">';
               }
                if($row['image_option_3'] == null || $row['image_option_3'] == "")
               {
                 $image_option3 ='';
               }
               else{
                $image_option3 ='<img src="../upload_images/'.$row['image_option_3'].'">';
               }
                 if($row['image_option_4'] == null || $row['image_option_4'] == "")
               {
                 $image_option4 ='';
               }
               else{
                $image_option4 ='<img src="../upload_images/'.$row['image_option_4'].'">';
               }
               if($row['imagehin_add'] == null || $row['imagehin_add'] == "")
               {
                 $image_hin ='';
               }
               else{
                $image_hin ='<img src="../upload_images/'.$row['imagehin_add'].'">';
               }
               if($row['imagehin_option_1'] == null || $row['imagehin_option_1'] == "")
               {
                 $image_option1_hin ='';
               }
               else{
                $image_option1_hin ='<img src="../upload_images/'.$row['imagehin_option_1'].'">';
               }
                if($row['imagehin_option_2'] == null || $row['imagehin_option_2'] == "")
               {
                 $image_option2_hin ='';
               }
               else{
                $image_option2_hin ='<img src="../upload_images/'.$row['imagehin_option_2'].'">';
               }
                if($row['imagehin_option_3'] == null || $row['imagehin_option_3'] == "")
               {
                 $image_option3_hin ='';
               }
               else{
                $image_option3_hin ='<img src="../upload_images/'.$row['imagehin_option_3'].'">';
               }
                 if($row['imagehin_option_4'] == null || $row['imagehin_option_4'] == "")
               {
                 $image_option4_hin ='';
               }
               else{
                $image_option4_hin ='<img src="../upload_images/'.$row['imagehin_option_4'].'">';
               }


                 
                 
                $data .='<tr>
                            <td>'.$row["que_id"].'</td>
                            <td>'.$row['class'].'</td>
                            <td>'.$row['sub'].'</td>
                            <td>'.$row['unit'].'</td>
                            <td>'.$row['section'].'</td>
                            <td>'.$row['level'].'</td>          
                            <td>'.$row['question'].'<br>'.$image.'</td>
                            <td>'.$row["option_1"].'<br>'.$image_option1.'</td>
                            <td>'.$row["option_2"].'<br>'.$image_option2.'</td>
                            <td>'.$row["option_3"].'<br>'.$image_option3.'</td>
                            <td>'.$row["option_4"].'<br>'.$image_option4.'</td>
                            <td>'.$row['question_hin'].'<br>'.$image_hin.'</td>
                            <td>'.$row["option_hin_1"].'<br>'.$image_option1_hin.'</td>
                            <td>'.$row["option_hin_2"].'<br>'.$image_option2_hin.'</td>
                            <td>'.$row["option_hin_3"].'<br>'.$image_option3_hin.'</td>
                            <td>'.$row["option_hin_4"].'<br>'.$image_option4_hin.'</td>
                            <td><a href="editque_page.php?queid='.$row["que_id"].'" class="text-white"><button class="btn btn-success" name="edit">Edit</button></a></td>
                            <td><button class="btn btn-danger" id="'.$row["que_id"].'" name="delete">Delete</button></td>
                           
                        ';
                  if($row['activity_status'] =='1')
                  {
                     $data .= '<td><div id="activity'.$row["que_id"].'"><button class="btn btn-info text-white" id="'.$row["que_id"].'" name="active">Active</button></div></td>
                        </tr>';
                  } 
                  else{
                     $data .= '<td><div id="activity'.$row["que_id"].'"><button class="btn btn-secondary" id="'.$row["que_id"].'" name="inactive"  >Inactive</button></div></td>
                        </tr>';
                  }
               
               
                

            }
        }
      
        $data .= "</tbody></table>";
        $data .='<script src="../dependencies/jquery/jquery.min.js" type="text/javascript"></script>
                      <script src="../dependencies/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script> 
                      <script src="../dependencies/datatables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script> 
                      <script>$("#showques_all_2").DataTable();</script>';
 
  //-----------------------------------------------------------------------------------------------------------------
       //------------------------------------------------------------------------------------------------------------------
       //-----------------------------------------------------------------------------------------------------------------------               
         // Short answer   Type questions
    $shortdata ='';
    $query = "SELECT q.*,c.*,s.*,u.*,sec.*, l.*,image.image_add,image.imagehin_add from questions q LEFT JOIN image ON q.que_id = image.que_id ,class c,sub s,unit u,section sec ,level l where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id = s.sub_id and q.unit_id =u.unit_id and q.level_id = l.level_id and q.section_id='4'  and q.section_id = sec.section_id ";
    if(isset($_POST['sub_id']))
        { $sub_id=$_POST['sub_id'];
            $query = "SELECT q.*,c.*,s.*,u.*,sec.*, l.*,image.image_add,image.imagehin_add from questions q LEFT JOIN image ON q.que_id = image.que_id ,class c,sub s,unit u,section sec ,level l  where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id =u.unit_id and q.level_id = l.level_id   and q.section_id='4' and q.section_id = sec.section_id  ";
             if(isset($_POST['unit_id']))
             { $unit_id=$_POST['unit_id'];
                  $query = "SELECT q.*,c.*,s.*,u.*,sec.*, l.*,image.image_add,image.imagehin_add from questions q LEFT JOIN image ON q.que_id = image.que_id ,class c,sub s,unit u, section sec ,level l  where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id ='$unit_id' and u.unit_id ='$unit_id' and q.level_id = l.level_id  and q.section_id='4'  and q.section_id = sec.section_id ";
                
                 if(isset($_POST['level_id']))
                 { $level_id = $_POST['level_id'];
                 $query = "SELECT q.*,c.*,s.*,u.*,sec.*, l.*,image.image_add,image.imagehin_add  from questions q LEFT JOIN image ON q.que_id = image.que_id ,class c,sub s,unit u, section sec ,level l where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id ='$unit_id' and u.unit_id ='$unit_id' and q.level_id ='$level_id' and  l.level_id = '$level_id'   and q.section_id='4'  and q.section_id = sec.section_id ";
                
                 }
             }
        }

          $shortdata .='<table  id="showques_all_3"  class="table table-striped table-bordered">                    
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Unit</th>
                            <th>Section</th>
                            <th>level</th>
                            <th>Questions</th>      
                            <th>Questions (hindi)</th> 
                            <th>Edit</th>
                            <th>Delete</th>
                             <th>Active</th>
                        </tr>
                    </thead><tbody>';
        $result = $conn->query($query);
        if($result->rowCount()> 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $que_id =$row['que_id'];
               if($row['image_add'] == null || $row['image_add'] == "")
               {
                 $image ='';
               }
               else{
                $image ='<img src="../upload_images/'.$row['image_add'].'">';
               }
              
               if($row['imagehin_add'] == null || $row['imagehin_add'] == "")
               {
                 $image_hin ='';
               }
               else{
                $image_hin ='<img src="../upload_images/'.$row['imagehin_add'].'">';
               }
            

                 
                 
                $shortdata .='<tr>
                            <td>'.$row["que_id"].'</td>
                            <td>'.$row['class'].'</td>
                            <td>'.$row['sub'].'</td>
                            <td>'.$row['unit'].'</td>
                            <td>'.$row['section'].'</td>
                            <td>'.$row['level'].'</td>          
                            <td>'.$row['question'].'<br>'.$image.'</td>
                            
                            <td>'.$row['question_hin'].'<br>'.$image_hin.'</td>
                         
                             <td><a href="editque_page.php?queid='.$row["que_id"].'" class="text-white"><button class="btn btn-success" name="edit">Edit</button></a></td>
                            <td><button class="btn btn-danger" id="'.$row["que_id"].'" name="delete">Delete</button></td>
                           
                        ';
                  if($row['activity_status'] =='1')
                  {
                     $shortdata .= '<td><div id="activity'.$row["que_id"].'"><button class="btn btn-info text-white" id="'.$row["que_id"].'" name="active">Active</button></div></td>
                        </tr>';
                  } 
                  else{
                     $shortdata .= '<td><div id="activity'.$row["que_id"].'"><button class="btn btn-secondary" id="'.$row["que_id"].'" name="inactive"  >Inactive</button></div></td>
                        </tr>';
                  }               
            }
        }      
        $shortdata .= "</tbody></table>";
        $shortdata .='<script src="../dependencies/jquery/jquery.min.js" type="text/javascript"></script>
                      <script src="../dependencies/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script> 
                      <script src="../dependencies/datatables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script> 
                      <script>$("#showques_all_3").DataTable();</script>';


        //-----------------------------------------------------------------------------------------------------------------
       //------------------------------------------------------------------------------------------------------------------
       //-----------------------------------------------------------------------------------------------------------------------               
         // Long answer   Type questions
$longdata ="";
    $query = "SELECT q.*,c.*,s.*,u.*,sec.*, l.*,image.image_add,image.imagehin_add from questions q LEFT JOIN image ON q.que_id = image.que_id ,class c,sub s,unit u,section sec ,level l where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id = s.sub_id and q.unit_id =u.unit_id and q.level_id = l.level_id  and q.section_id='5'  and q.section_id = sec.section_id ";
    if(isset($_POST['sub_id']))
        { $sub_id=$_POST['sub_id'];
            $query = "SELECT q.*,c.*,s.*,u.*,sec.*, l.*,image.image_add,image.imagehin_add  from questions q LEFT JOIN image ON q.que_id = image.que_id ,class c,sub s,unit u,section sec ,level l where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id =u.unit_id and q.level_id = l.level_id   and q.section_id='5' and q.section_id = sec.section_id  ";
             if(isset($_POST['unit_id']))
             { $unit_id=$_POST['unit_id'];
                  $query = "SELECT q.*,c.*,s.*,u.*,sec.*, l.*,image.image_add,image.imagehin_add from questions q LEFT JOIN image ON q.que_id = image.que_id ,class c,sub s,unit u, section sec ,level l where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id ='$unit_id' and u.unit_id ='$unit_id' and q.level_id = l.level_id  and q.section_id='5'  and q.section_id = sec.section_id ";
                
                 if(isset($_POST['level_id']))
                 { $level_id = $_POST['level_id'];
                 $query = "SELECT q.*,c.*,s.*,u.*,sec.*, l.*,image.image_add,image.imagehin_add from questions q LEFT JOIN image ON q.que_id = image.que_id ,class c,sub s,unit u, section sec ,level l where q.class_id = '$class_id' and c.class_id ='$class_id' and q.sub_id ='$sub_id' and s.sub_id ='$sub_id' and q.unit_id ='$unit_id' and u.unit_id ='$unit_id' and q.level_id ='$level_id' and  l.level_id = '$level_id'   and q.section_id='5'  and q.section_id = sec.section_id ";
                
                 }
             }
        }

         $longdata .='<table  id="showques_all_4"  class="table table-striped table-bordered">                    
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Unit</th>
                            <th>Section</th>
                            <th>level</th>
                            <th>Questions</th>      
                            <th>Questions (hindi)</th> 
                            <th>Edit</th>
                            <th>Delete</th>
                             <th>Active</th>
                        </tr>
                    </thead><tbody>';
        $result = $conn->query($query);
        if($result->rowCount()> 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $que_id =$row['que_id'];
               if($row['image_add'] == null || $row['image_add'] == "")
               {
                 $image ='';
               }
               else{
                $image ='<img src="../upload_images/'.$row['image_add'].'">';
               }
              
               if($row['imagehin_add'] == null || $row['imagehin_add'] == "")
               {
                 $image_hin ='';
               }
               else{
                $image_hin ='<img src="../upload_images/'.$row['imagehin_add'].'">';
               }
            

                 
                 
                $longdata .='<tr>
                            <td>'.$que_id.'</td>
                            <td>'.$row['class'].'</td>
                            <td>'.$row['sub'].'</td>
                            <td>'.$row['unit'].'</td>
                            <td>'.$row['section'].'</td>
                            <td>'.$row['level'].'</td>          
                            <td>'.$row['question'].'<br>'.$image.'</td>
                            
                            <td>'.$row['question_hin'].'<br>'.$image_hin.'</td>
                         
                             <td><a href="editque_page.php?queid='.$row["que_id"].'" class="text-white"><button class="btn btn-success" name="edit">Edit</button></a></td>
                            <td><button class="btn btn-danger" id="'.$row["que_id"].'" name="delete">Delete</button></td>
                            
                        ';
                  if($row['activity_status'] =='1')
                  {
                    $longdata .= '<td><div id="activity'.$row["que_id"].'"><button class="btn btn-info text-white" id="'.$row["que_id"].'" name="active">Active</button></div></td>
                        </tr>';
                  } 
                  else{
                    $longdata .= '<td><div id="activity'.$row["que_id"].'"><button class="btn btn-secondary" id="'.$row["que_id"].'" name="inactive"  >Inactive</button></div></td>
                        </tr>';
                  }               
            }
        }      
        $longdata .= "</tbody></table>";
        $longdata .='<script src="../dependencies/jquery/jquery.min.js" type="text/javascript"></script>
                      <script src="../dependencies/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script> 
                      <script src="../dependencies/datatables/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script> 
                      <script>$("#showques_all_4").DataTable();</script>';
        $q['objective'] = $data;
        $q['short'] = $shortdata;
        $q['long'] = $longdata;

        echo json_encode($q);
}

?>