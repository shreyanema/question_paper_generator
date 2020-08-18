<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();
if(isset($_POST['queid']))
{
	$queid = $_POST['queid'];
    $query = "SELECT q.*,o.*,i.image_add,i.image_option_1,i.image_option_2,i.image_option_3,i.image_option_4,i.imagehin_add,i.imagehin_option_1,i.imagehin_option_2,i.imagehin_option_3,i.imagehin_option_4 from questions as q LEFT JOIN image as i ON q.que_id = i.que_id LEFT JOIN options as o ON q.que_id = o.que_id where q.que_id = '$queid'";
    $result = $conn->query($query);
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          
             echo json_encode($row);

        }
    }
 }
 if(isset($_POST['que_id_deactivate']))
 {
 	$que_id_deactivate = $_POST['que_id_deactivate'];
 	 $result = $conn->query("UPDATE questions set activity_status = '2' where que_id ='$que_id_deactivate'");
 	 if($result)
 	 {
 	 	echo '<button class="btn btn-secondary" id="'.$que_id_deactivate.'" name="inactive" >Inactive</button>';
 	 }
 }
  if(isset($_POST['que_id_activate']))
 {
 	$que_id_activate = $_POST['que_id_activate'];
 	 $result = $conn->query("UPDATE questions set activity_status = '1' where que_id ='$que_id_activate'");
 	 if($result)
 	 {
 	 	echo '<button class="btn btn-info" id="'.$que_id_activate.'" name="active" >Active</button>';
 	 }
 }
 ?>