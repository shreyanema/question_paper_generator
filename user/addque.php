<?php 
include('user_header.php');
if(!isset($_SESSION["type"]))
{  header("location:../index.php"); }
if($_SESSION["type"] == 'master')
{  header("location:../index.php"); }
?>
<script src="../dependencies/jquery/jquery.min.js"></script>

 <!--------------------header--complete-------------------->
 <button class="ui green button" id="mathimg">Open Math Editor</button>

<form class="basic-form ui form" id="insert_question" method="POST" action="../insertFiles/insertquestion.php" >
<div class="ui segments">
	<div class="ui segment" style="background: teal ; color: white;">
		<h3 class="text-center"  >Add Question</h3>
	</div>
	<div class="ui segment">
		<div class="ui five column grid">
		  <div class="column">
		  	<div class="ui sub header">Class<span style="color: red">*</span></div>
		  	<select  id="class" name="addque_class" class="ui fluid search dropdown" ></select>
		 </div>
		  <div class="column">
		  	<div class="ui sub header">Subject<span style="color: red">*</span></div>
		  	<select  id="subject" name="addque_sub" class="ui fluid search dropdown" ></select>
		 </div>
		  <div class="column">
		  	<div class="ui sub header">Unit<span style="color: red">*</span></div>
		  	<select  id="unit" name="addque_unit" class="ui fluid search dropdown" ></select>
		 </div>
		  <div class="column">
		  	<div class="ui sub header">Section<span style="color: red">*</span></div>
		  	<select  id="section" name="addque_section" class="ui fluid search dropdown" ></select>
		 </div>
		 <div class="column">
		  	<div class="ui sub header">Level<span style="color: red">*</span></div>
		  	<select  id="level" name="addque_level" class="ui fluid search dropdown" ></select>
		 </div>
		</div>
	</div>
	<div class="ui segment">
		<input type="hidden" name="hindi_status" id="hindi_status" value="2">
		<input type="hidden" name="img_status" id="img_status" value="2">
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
    		<textarea rows="2" name="que" required></textarea>
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
			<!--<div class="column">
				<div id="preview_button">
					<button class="ui green button" type="button" id="preview_question" >Preview</button>
				</div>
			</div>-->
			<div class="column">
				<button class="ui teal submit button" id="submit_btn" >Add Question</button>
			</div>
		</div>		
	</div>

</div>
</form>


    <!-----------footer ----->
  </div>
</div>
</div>

<script src="../dependencies/sweetalert/sweetalert2.min.js"></script>
<script src="../dependencies/jquery/jquery.min.js"></script>

<script src="../dependencies/semantic/dist/semantic.min.js"></script> 
<script src="js/displaybasic.js"></script>

<script src="js/insertbasic.js"></script>
<script>
$('.ui.sidebar').sidebar({
    context: $('.bottom.segment') 
  })
  .sidebar('attach events', '.menu .item');
$(".ui .dropdown").dropdown({
    allowAdditions: true
  });
$("#mathimg").click(function(){
          window.open( 
              "fmatheditor/editor.php", "_blank"); 
});

</script>


</body>
</html>

