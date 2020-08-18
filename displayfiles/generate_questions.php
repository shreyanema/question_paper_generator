<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();


/////////////////////////functions///////////////////
$examname = $_POST['examname'];
$session = $_POST['session'];
$year = $_POST['year'];
$gen_class = $_POST['gen_class'];
$gen_sub = $_POST['gen_sub'];
$gen_level = $_POST['gen_level'];

$query = "SELECT * from sub where sub_id='$gen_sub'";
    $result = $conn->query($query);
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        	$subject_name =$row['sub'];
        	$paper_code = $row['sub_code'];
        	$paper_name =$row['paper'];
        }
       }
$query2 = "SELECT * from class where class_id='$gen_class'";
    $result2 = $conn->query($query2);
    if($result2->rowCount()> 0){
        while($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
        	$class_name =$row2['class'];
        	
        }
       }
$paper_heading = "<div class='ui column' id='paper_head'>
		<p align='center'>
		<b>".$paper_code."</b><br>
		<b>".$class_name." ".$examname."</b><br>
		<b>".$session." ".$year."</b><br>
		<b>SUBJECT: ".$subject_name."</b><br>
		<b>".$paper_name."</b>
		</p>
	</div>";
$obj_head = "<div class='ui column '>
		<p align='center'><b>OBJECTIVE TYPE QUESTIONS</b></p>
		</div>";

include 'functions.php';
$obj1 = generateobj($gen_class,$gen_sub,'1',$gen_level,'1');
$obj2 = generateobj($gen_class,$gen_sub,'2',$gen_level,'2');
$obj3 = generateobj($gen_class,$gen_sub,'3',$gen_level,'3');
$obj4 = generateobj($gen_class,$gen_sub,'4',$gen_level,'4');
$obj5 = generateobj($gen_class,$gen_sub,'5',$gen_level,'5');
$short_head = "<div class='ui column '>
		<p align='center'><b>SHORT ANSWER TYPE QUESTIONS</b></p>
		</div>";
$long_head = "<div class='ui column '>
		<p align='center'><b>LONG ANSWER TYPE QUESTIONS</b></p>
		</div>";
		$or = "<div class='row'><div class='ui column '>
		<p align='center'><b>OR</b></p>
		</div></div>";
$short1 =  generateshortlong($gen_class,$gen_sub,'1','4',$gen_level,'1');
$short1_or =  generateshortlong($gen_class,$gen_sub,'1','4',$gen_level,'1_OR');

$short2 = generateshortlong($gen_class,$gen_sub,'2','4',$gen_level,'2');
$short2_or = generateshortlong($gen_class,$gen_sub,'2','4',$gen_level,'2_OR');

$short3 = generateshortlong($gen_class,$gen_sub,'3','4',$gen_level,'3');
$short3_or = generateshortlong($gen_class,$gen_sub,'3','4',$gen_level,'3_OR');

$short4 = generateshortlong($gen_class,$gen_sub,'4','4',$gen_level,'4');
$short4_or = generateshortlong($gen_class,$gen_sub,'4','4',$gen_level,'4_OR');

$short5 = generateshortlong($gen_class,$gen_sub,'5','4',$gen_level,'5');
$short5_or = generateshortlong($gen_class,$gen_sub,'5','4',$gen_level,'5_OR');

$long1 = generateshortlong($gen_class,$gen_sub,'1','5',$gen_level,'1');
$long1_or = generateshortlong($gen_class,$gen_sub,'1','5',$gen_level,'1_OR');

$long2 = generateshortlong($gen_class,$gen_sub,'2','5',$gen_level,'2');
$long2_or = generateshortlong($gen_class,$gen_sub,'2','5',$gen_level,'2_OR');

$long3 = generateshortlong($gen_class,$gen_sub,'3','5',$gen_level,'3');
$long3_or = generateshortlong($gen_class,$gen_sub,'3','5',$gen_level,'3_OR');

$long4 = generateshortlong($gen_class,$gen_sub,'4','5',$gen_level,'4');
$long4_or = generateshortlong($gen_class,$gen_sub,'4','5',$gen_level,'4_OR');

$long5 = generateshortlong($gen_class,$gen_sub,'5','5',$gen_level,'5');
$long5_or = generateshortlong($gen_class,$gen_sub,'5','5',$gen_level,'5_OR');
echo
'
	<div class="ui four column grid">
  			<div class="column">
			  	<div class="ui sub header">Maximum marks</div>
			  	<div class="ui input">
			  	<input type="number" id="maxm" value="40" ></div>
			 </div>
			  <div class="column">
			  	<div class="ui sub header">Time (in hrs)</div>
			  	<div class="ui input">
			  	<input type="number" id="time" value="3" ></div>
			 </div>
			   <div class="column">
			  	<button class="ui teal  button" type="button" id="generate_pdf" >Generate PDF</button>
			 </div>
			 <div class="column">
			 <div id="booklet_pdf"></div>
			 </div>
	</div> ';
echo '  		
<input type="hidden" value="'.$gen_class.'" name="paper_class" id="paper_class">
<input type="hidden" value="'.$gen_sub.'" name="paper_sub" id="paper_sub">
<input type="hidden" value="'.$gen_level.'" name="paper_level" id="paper_level">

';
echo "<hr>";
echo $paper_heading;
echo "<hr>";
echo $obj_head;
echo "<hr>";
echo "<div class='ui internally celled grid'>
      <div class='row'><div class='thirteen wide column' id='obj1'>";
		echo $obj1;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='1' name='change_obj' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo "<div class='row'><div class='thirteen wide column' id='obj2'>";
echo $obj2;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='2' name='change_obj' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo "<div class='row'><div class='thirteen wide column' id='obj3'>";
echo $obj3;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='3' name='change_obj'style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";
echo "<div class='row'><div class='thirteen wide column' id='obj4'>";
echo $obj4;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='4' name='change_obj' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";
echo "<div class='row'><div class='thirteen wide column' id='obj5'>";
echo $obj5;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='5' name='change_obj' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div></div>";
echo "<hr>";
echo $short_head;

echo "<hr>";

echo "<div class='ui internally celled grid'>
      <div class='row'><div class='thirteen wide column' id='short1'>";
echo $short1;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='1' name='change_short' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo $or;

echo "<div class='row'><div class='thirteen wide column' id='short1_or'>";
echo $short1_or;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='1' name='change_short_or' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo "<div class='row'><div class='thirteen wide column' id='short2'>";
echo $short2;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='2' name='change_short' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo $or;

echo "<div class='row'><div class='thirteen wide column' id='short2_or'>";
echo $short2_or;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='2' name='change_short_or' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo "<div class='row'><div class='thirteen wide column' id='short3'>";
echo $short3;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='3' name='change_short' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo $or;

echo "<div class='row'><div class='thirteen wide column' id='short3_or'>";
echo $short3_or;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='3' name='change_short_or' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo "<div class='row'><div class='thirteen wide column' id='short4'>";
echo $short4;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='4' name='change_short' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo $or;

echo "<div class='row'><div class='thirteen wide column' id='short4_or'>";
echo $short4_or;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='4' name='change_short_or' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo "<div class='row'><div class='thirteen wide column' id='short5'>";
echo $short5;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='5' name='change_short' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo $or;

echo "<div class='row'><div class='thirteen wide column' id='short5_or'>";
echo $short5_or;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='5' name='change_short_or' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div></div>";
echo '<hr>';
echo $long_head;
echo '<hr>';

echo "<div class='ui internally celled grid'>
      <div class='row'><div class='thirteen wide column' id='long1'>";
echo $long1;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='1' name='change_long' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo $or;

echo "<div class='row'><div class='thirteen wide column' id='long1_or'>";
echo $long1_or;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='1' name='change_long_or' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo "<div class='row'><div class='thirteen wide column' id='long2'>";
echo $long2;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='2' name='change_long' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo $or;

echo "<div class='row'><div class='thirteen wide column' id='long2_or'>";
echo $long2_or;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='2' name='change_long_or' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo "<div class='row'><div class='thirteen wide column' id='long3'>";
echo $long3;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='3' name='change_long' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo $or;

echo "<div class='row'><div class='thirteen wide column' id='long3_or'>";
echo $long3_or;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='3' name='change_long_or' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo "<div class='row'><div class='thirteen wide column' id='long4'>";
echo $long4;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='4' name='change_long' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo $or;

echo "<div class='row'><div class='thirteen wide column' id='long4_or'>";
echo $long4_or;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='4' name='change_long_or' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo "<div class='row'><div class='thirteen wide column' id='long5'>";
echo $long5;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='5' name='change_long' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";

echo $or;

echo "<div class='row'><div class='thirteen wide column' id='long5_or'>";
echo $long5_or;
echo "</div>
	  <div class='three wide column'>
		<button class='ui button' type='button' id='5' name='change_long_or' style='background:white;'><img src='../icon/reload.png'></button>
		</div></div>";
echo '<hr>';


?>