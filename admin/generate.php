<?php
include 'admin_header.php';
if(!isset($_SESSION["type"]))
{  header("location:../index.php"); }
if($_SESSION["type"] == 'user')
{  header("location:../index.php"); }
?>
<div class="ui teal segments">
<form action="../displayfiles/generate_questions.php" method="POST" id="generatepaper_form">
<div class="ui segments">
	<div class="ui teal segment" style="background: teal; color :white;">
		<h3 class="text-center"  >Generate Question Paper</h3>
	</div>
		<div class="ui segment" style="background: teal; color :white;">
		<div class="ui three column grid">
		  <div class="column">
		  	<div class="ui sub header" style="color: white">Name of Exam</div>
		  	<input type="radio" class="ui radio" name="examname" value ="SEMESTER EXAMINATION" checked ><label>Semester Examination</label><br>
		  	<input type="radio"class="ui radio" name="examname" value ="YEARLY EXAMINATION" ><label>Yearly Examination</label>

		 </div>
		  <div class="column">
		  	<div class="ui sub header" style="color: white">Session</div>
		  	<select class="ui fluid search dropdown" id="session" name="session" required>
         	 	<option value="NOVEMBER-DECEMBER">NOVEMBER-DECEMBER</option>
         	 	<option value="APRIL-MAY">APRIL-MAY</option></select>
		 </div>
		 <div class="column">
		  	<div class="ui sub header" style="color: white">Year</div>
		  	<div class="ui input">
		  	<input type="text" name="year" value="2020-21" required ></div>
		 </div>
		</div>
	</div>
	<div class="ui segment" style="background: teal; color :white;">
		<div class="ui three column grid">
		  <div class="column">
		  	<div class="ui sub header" style="color: white">Class</div>
		  	<select  id="class" name="gen_class" class="ui fluid search dropdown"></select>
		 </div>
		  <div class="column">
		  	<div class="ui sub header" style="color: white">Subject</div>
		  	<select  id="subject" name="gen_sub" class="ui fluid search dropdown"></select>
		 </div>
		 <div class="column">
		  	<div class="ui sub header" style="color: white">Level</div>
		  	<select  id="level" name="gen_level" class="ui fluid search dropdown" >
		  		<option value="1">Easy</option>
		  		<option value="2">Moderate</option>
		  		<option value="3">Difficult</option>
		  	</select>
		 </div>
		</div>
	</div>
	<div class="ui segment" style="background: teal; color :white;">
		<div class="ui one column grid">
			  <div class="column">
			  	<button type="submit" class="ui inverted  button">Generate Paper</button>
			 </div>
		 </div>
		
	</div>

	
	</div>
	
</form>
<div class="ui segment" id="show_questions">
</div>
</div>
<!----------------footer---------------------->
  </div>
</div>
</div>

<script src="../dependencies/sweetalert/sweetalert2.min.js"></script>
<script src="../dependencies/jquery/jquery.min.js"></script>

<script src="../dependencies/semantic/dist/semantic.min.js"></script> 
<script src="js/displaybasic_admin.js"></script>
<script>
$('.ui.sidebar').sidebar({
    context: $('.bottom.segment') 
  })
  .sidebar('attach events', '.menu .item');
$(".ui .dropdown").dropdown({
    allowAdditions: true
  });

</script>

</body>
</html>
