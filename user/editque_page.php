<?php
include('user_header.php');
if(!isset($_SESSION["type"]))
{  header("location:../index.php"); }
if($_SESSION["type"] == 'master')
{  header("location:../index.php"); }

if(isset($_GET['queid'])){


?>
<button class="ui green button" id="mathimg">Open Math Editor</button>

<form class="basic-form ui form" id="update_question" method="POST" action="../insertfiles/update_question.php" >
<div class="ui segments">
	<div class="ui teal segment">
		<h3 class="text-center" style="color: teal;" >Edit Question</h3>
		<h5 class="text-center">Question Id :- <?php echo $_GET['queid']; ?></h5>
	</div>
	
  <input type="hidden" name="question_id" id="question_id" value="<?php echo $_GET['queid']; ?>">	
  <div class="ui segment">
    <div class="ui five column grid">
      <div class="column">
        <div class="ui sub header">Class</div>
        <select  id="classque_edit" name="classque_edit" class="ui fluid search dropdown" ></select>
     </div>
      <div class="column">
        <div class="ui sub header">Subject</div>
        <select  id="subque_edit" name="subque_edit" class="ui fluid search dropdown" ></select>
     </div>
      <div class="column">
        <div class="ui sub header">Unit</div>
        <select  id="unitque_edit" name="unitque_edit" class="ui fluid search dropdown" ></select>
     </div>
     <div class="column">
        <div class="ui sub header">Section</div>
        <select  id="sectionque_edit" name="sectionque_edit" class="ui fluid search dropdown" ></select>
     </div>
      <div class="column">
        <div class="ui sub header">Level</div>
        <select  id="levelque_edit" name="levelque_edit" class="ui fluid search dropdown" ></select>
     </div>
    </div>
  </div>

	<div class="ui segment">
		<input type="hidden" name="hindi_status" id="hindi_status" value="">
		<input type="hidden" name="img_status" id="img_status" value="">
		<div class="ui five column grid">
			<div class="column" style="color: teal;">
				<div class="ui">Hindi Translation
			<a class="item" id="add_hindi_trans">
				<i class="fa fa-plus-circle" aria-hidden="true" style="color: green;"></i>
     				</a>
     		<a class="item" id="rem_hindi_trans">
     			<i class="fa fa-times-circle" aria-hidden="true" style="color: red;"></i></a>
     			</div>
     		</div>
     		<div class="column" style="color: teal;">
				<div class="ui">Image
			<a class="item" id="add_img">
     				<i class="fa fa-plus-circle" aria-hidden="true" style="color: green;"></i></a>
     		<a class="item" id="rem_image">
     				<i class="fa fa-times-circle" aria-hidden="true" style="color: red;"></i></a>
     			</div>
     		</div>
		</div>
	</div>
	<div class="ui segment que_segment" >
		<div class="field">
    		<div class="ui sub header">Question</div>
    		<textarea rows="2" name="que" id ='que' required></textarea>
    	</div>
    		<div  class="field" id="image_que"></div>
  		<div class="field" id="options"></div>
  			<div class="field" id="options_image"></div>
  		<div class="field" id="hindi_que"></div>
  			<div class="field" id="image_que_hin"></div>
  		<div class="field" id="options_hin"></div>
  			<div class="field" id="options_image_hin"></div>  
	</div>
	<div class="ui segment">
		<div class="ui two column grid">
			<div class="column">
				<button class="ui teal submit button" id="submit_btn" >Update Question</button>
			</div>
		</div>		
	</div>

</div>
</div>
</form>

<?php } ?>
<!-----------------------------footer-------------------->
	    </div>
  </div>
</div>
<script src="../dependencies/sweetalert/sweetalert2.min.js"></script>
<script src="../dependencies/jquery/jquery.min.js"></script>

<script src="../dependencies/semantic/dist/semantic.min.js"></script> 
<script src="js/editquebasic.js"></script>
<script src="js/editquestion.js"></script>
<script src="js/insertbasic.js"></script>
<script>
$('.ui.sidebar').sidebar({
    context: $('.bottom.segment') 
  })
  .sidebar('attach events', '.menu .item');

$("#mathimg").click(function(){
          window.open( 
              "fmatheditor/editor.php", "_blank"); 
});

</script>


</body>
</html>