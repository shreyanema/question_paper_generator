<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();
//total questions 
if(isset($_GET['a']))
{
	$query = "SELECT * from questions";
    $result = $conn->query($query);
    $totalque = $result->rowCount();
//total question by user
    $added_by = $_SESSION['user_id'];
    $query = "SELECT * from questions where added_by ='$added_by'";
    $result = $conn->query($query);
    $totalbyuser = $result->rowCount();
//total class
    $query = "SELECT * from class";
    $result = $conn->query($query);
    $totalclass = $result->rowCount();
//total subject
    $query = "SELECT * from sub";
    $result = $conn->query($query);
    $totalsub = $result->rowCount();
//total easy
    $query = "SELECT * from questions where level_id='1'";
    $result = $conn->query($query);
    $totaleasy = $result->rowCount();

//total moderate
    $query = "SELECT * from questions where level_id='2'";
    $result = $conn->query($query);
    $totalmoderate = $result->rowCount();
//total difficult
    $query = "SELECT * from questions where level_id='3'";
    $result = $conn->query($query);
    $totaldifficult = $result->rowCount();
//total objective
    $query = "SELECT * from questions where section_id='1' OR  section_id='2' OR section_id='3'";
    $result = $conn->query($query);
    $totalobj = $result->rowCount();
//total short
    $query = "SELECT * from questions where section_id='4'";
    $result = $conn->query($query);
    $totalshort = $result->rowCount();
//total long
    $query = "SELECT * from questions where section_id='5'";
    $result = $conn->query($query);
    $totallong = $result->rowCount();

    $data['totalque'] =$totalque;
    $data['totalbyuser'] =$totalbyuser;
    $data['totalclass'] =$totalclass;
    $data['totalsub'] =$totalsub;
    $data['totaleasy'] =$totaleasy;
    $data['totalmoderate'] =$totalmoderate;
    $data['totaldifficult'] =$totaldifficult;
    $data['totalobj'] =$totalobj;
    $data['totalshort'] =$totalshort;
    $data['totallong'] =$totallong;
    
    echo json_encode($data);
}
//class loader
if(isset($_GET['b']))
{
    $query = "SELECT * from class";
    $result = $conn->query($query);
     echo "<option value=''>Select Class</option>";
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='".$row['class_id']."'>".$row['class']."</option>";
        }
    }
}
//subject loader
if(isset($_GET['class_id']))
{   $class_id= $_GET['class_id'];
    $query = "SELECT * from sub where class_id='$class_id'";
    $result = $conn->query($query);
     echo "<option value=''>Select subject</option>";
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='".$row['sub_id']."'>".$row['sub']."</option>";
        }
    }
}
//unit loader
if(isset($_GET['sub_id']))
{   $query = "SELECT * from unit";
    $result = $conn->query($query);
     echo "<option value=''>Select Unit</option>";
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='".$row['unit_id']."'>".$row['unit']."</option>";
        }
    }
}
//section loader
if(isset($_GET['unit_id']))
{   $query = "SELECT * from section";
    $result = $conn->query($query);
     echo "<option value=''>Select Section</option>";
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='".$row['section_id']."'>".$row['section']."</option>";
        }
    }
}
//level loader
if(isset($_GET['section_id']))
{   $query = "SELECT * from level";
    $result = $conn->query($query);
     $level = "<option value=''>Select Level</option>";
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $level.= "<option value='".$row['level_id']."'>".$row['level']."</option>";
        }
    }
    if(isset($_GET['inputadd']))
    {
        $section_id =$_GET['section_id'];
        if($section_id =="1")//MCQ
        {
            $inputadd ='<div class="ui four column grid">
                            <div class="column">
                                <div class="ui sub header">Option 1</div>
                                <input type="text" id="option_1" name="option_1">
                            </div>
                            <div class="column">
                                <div class="ui sub header">Option 2</div>
                                <input type="text" id="option_2" name="option_2">
                            </div>
                            <div class="column">
                                <div class="ui sub header">Option 3</div>
                                <input type="text" id="option_3" name="option_3">
                            </div>
                            <div class="column">
                                <div class="ui sub header">Option 4</div>
                                <input type="text" id="option_4" name="option_4">
                            </div>
                        </div>
                        
                            ';
        }
        elseif ($section_id =='2')//true false
         {
             $inputadd ='<div class="ui two column grid">
                            <div class="column">
                                <input type="text" id="option_1" name="option_1" value="True">
                            </div>
                            <div class="column">
                                <input type="text" id="option_2" name="option_2" value="False">
                            </div>
                        </div>
                            ';
        }
        else {
            $inputadd ="";
        }
         $data['inputadd'] =$inputadd;
     }
     $data['level']= $level;
    
     echo json_encode($data);
}
//hindi trans add
if(isset($_GET['section_id_for_hin']))
{
    $id_section =$_GET['section_id_for_hin'];
    if( $id_section =="1")//mcq
    {
        $showhin_options =' 
                        <div class="ui four column grid">
                            <div class="column">
                                <div class="ui sub header">विकल्प 1</div>
                                <input type="text" id="option_1_hin" name="option_1_hin">
                            </div>
                            <div class="column">
                                <div class="ui sub header">विकल्प 2</div>
                                <input type="text" id="option_2_hin"  name="option_2_hin">
                            </div>
                            <div class="column">
                                <div class="ui sub header">विकल्प 3</div>
                                <input type="text" id="option_3_hin"  name="option_3_hin">
                            </div>
                            <div class="column">
                                <div class="ui sub header">विकल्प 4</div>
                                <input type="text" id="option_4_hin"  name="option_4_hin">
                            </div>
                        </div>
                       ';
    }
    else if($id_section =="2") //true/false
    {
        $showhin_options ='<div class="ui two column grid">
                            <div class="column">
                                <input type="text" id="option_1" name="option_1_hin" value="सही">
                            </div>
                            <div class="column">
                                <input type="text" id="option_2" name="option_2_hin" value="गलत">
                            </div>
                        </div>';
    }
    else{
         $showhin_options="";
    }
    $showhin_ques ='<div class="ui sub header">प्रश्न</div>
            <textarea rows="2" id="hindi_question" name="hindi_question"></textarea>
           ';
        $data['option_hin'] =$showhin_options;
        $data['question_hin'] =$showhin_ques;
        echo json_encode($data);

}
//add image
if(isset($_GET['add_img']))
{
    $data['image_que'] ='<div class="ui four column grid">
                            <div class="column">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_question">
                                    <label class="custom-file-label" for="img_question">Choose file</label>
                                </div>
                                    <label>or add image url:</label>
                                    <input type="text" id="img_question_url">
                                    <img id="showimage_img_question_url" src="" alt="no image added" length ="100" width ="100">
                                    <input type="hidden" id="img_add" name="img_add">
                            </div>
                        </div>';
    $data['image_que_hin']='<div class="ui four column grid">
                                <div class="column">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img_question_hin" >
                                        <label class="custom-file-label" for="img_question_hin">Choose file</label>
                                    </div>
                                        <label>or add image url:</label>
                                        <input type="text" id="img_question_hin_url" >
                                        <img id="showimage_img_question_hin_url" src="" alt="no image added" length ="100" width ="100">
                                         <input type="hidden" id="img_add_hin" name="img_add_hin">
                                </div>
                            </div>
                            ';
    $data['options_img'] ='<div class="ui four column grid">
                            <div class="column">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_option_1" >
                                    <label class="custom-file-label" for="img_option_1">Choose file</label>
                                </div>
                                 <label>or add image url:</label>
                                <input type="text" id="img_option1_url">
                                <img id="showimage_img_option1_url" name="showimage_img_option1_url" src="" alt="no image added" length ="100" width ="100">
                                 <input type="hidden" id="img_add_o1" name="img_add_o1">
                            </div>
                            <div class="column">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_option_2" >
                                    <label class="custom-file-label" for="img_option_2">Choose file</label>
                                </div>
                                 <label>or add image url:</label>
                                <input type="text" id="img_option2_url" >
                                <img id="showimage_img_option2_url" name="showimage_img_option2_url" src="" alt="no image added" length ="100" width ="100">
                                 <input type="hidden" id="img_add_o2" name="img_add_o2">
                            </div>
                            <div class="column">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_option_3" >
                                    <label class="custom-file-label" for="img_option_3">Choose file</label>
                                </div>
                                <label>or add image url:</label>
                                <input type="text" id="img_option3_url" >
                                <img id="showimage_img_option3_url" name="showimage_img_option3_url" src="" alt="no image added" length ="100" width ="100">
                                 <input type="hidden" id="img_add_o3" name="img_add_o3">
                            </div>
                            <div class="column">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_option_4" >
                                    <label class="custom-file-label" for="img_option_4">Choose file</label>
                                </div>
                                <label>or add image url:</label>
                                <input type="text" id="img_option4_url">
                                <img id="showimage_img_option4_url" name="showimage_img_option4_url" src="" alt="no image added" length ="100" width ="100">
                                 <input type="hidden" id="img_add_o4" name="img_add_o4">
                            </div>
                        </div>';
    $data['options_img_hin']='<div class="ui four column grid">
                            <div class="column">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_option_1_hin" >
                                    <label class="custom-file-label" for="img_option_1_hin">Choose file</label>
                                </div>
                                <label>or add image url:</label>
                                <input type="text" id="img_option1_hin_url" >
                                <img id="showimage_img_option1_hin_url" name="showimage_img_option1_hin_url" src="" alt="no image added" length ="100" width ="100">
                                 <input type="hidden" id="img_add_hin_o1" name="img_add_hin_o1">
                            </div>
                            <div class="column">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_option_2_hin" name="img_option_2_hin">
                                    <label class="custom-file-label" for="img_option_2_hin">Choose file</label>
                                </div>
                                <label>or add image url:</label>
                                <input type="text" id="img_option2_hin_url" >
                                <img id="showimage_img_option2_hin_url" name="showimage_img_option2_hin_url" src="" alt="no image added" length ="100" width ="100">
                                <input type="hidden" id="img_add_hin_o2" name="img_add_hin_o2">
                                
                            </div>
                            <div class="column">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_option_3_hin" >
                                    <label class="custom-file-label" for="img_option_3_hin">Choose file</label>
                                </div>
                                <label>or add image url:</label>
                                <input type="text" id="img_option3_hin_url">
                                <img id="showimage_img_option3_hin_url" name="showimage_img_option3_hin_url" src="" alt="no image added" length ="100" width ="100">
                                <input type="hidden" id="img_add_hin_o3" name="img_add_hin_o3">
                            </div>
                            <div class="column">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_option_4_hin" >
                                    <label class="custom-file-label" for="img_option_4_hin" >Choose file</label>
                                </div>
                                <label>or add image url:</label>
                                <input type="text" id="img_option4_hin_url" >
                                <img id="showimage_img_option4_hin_url" name="showimage_img_option4_hin_url" src="" alt="no image added" length ="100" width ="100">
                                <input type="hidden" id="img_add_hin_o4" name="img_add_hin_o4">
                            </div>
                            </div>';
    
    echo json_encode($data);
}
if(isset($_POST['pre_class']))
{
    $pre_class = $_POST['pre_class'];
    $pre_sub = $_POST['pre_sub'];
    $pre_unit = $_POST['pre_unit'];
    $pre_section = $_POST['pre_section'];
    $pre_level = $_POST['pre_level'];
   $query = "SELECT * from class where class_id='$pre_class'";
    $result = $conn->query($query);
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $classname =$row['class'];
        }
    }
    $query = "SELECT * from sub where sub_id='$pre_sub'";
    $result = $conn->query($query);
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $subname =$row['sub'];
        }
    }
     $query = "SELECT * from unit where unit_id='$pre_unit'";
    $result = $conn->query($query);
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $unitname =$row['unit'];
        }
    }
    $query = "SELECT * from section where section_id='$pre_section'";
    $result = $conn->query($query);
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $sectionname =$row['section'];
        }
    }
      $query = "SELECT * from level where level_id='$pre_level'";
    $result = $conn->query($query);
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $levelname =$row['level'];
        }
    }

    echo '<b>Class:-</b>'.$classname.'<br>  <b>Subject:-</b>'.$subname.'<br> <b>Unit:-</b>'.$unitname.'<br> <b>Section:-</b>'.$sectionname.' <br><b>Level:-</b>'.$levelname;
    

}
?>