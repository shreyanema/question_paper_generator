<?php
include('user_header.php');
if(!isset($_SESSION["type"]))
{  header("location:../index.php"); }
if($_SESSION["type"] == 'master')
{  header("location:../index.php"); }
?>
<!----------header-------------------->
<div class="ui segments">
	<div class="ui teal segment">
		<h3 class="text-center" style="color: teal;" >Questions</h3>
	</div>
  <div class="ui segment">
    <div class="ui four column grid">
      <div class="column">
        <div class="ui sub header">Class</div>
        <select  id="editque_class" name="editque_class" class="ui fluid search dropdown" ></select>
     </div>
      <div class="column">
        <div class="ui sub header">Subject</div>
        <select  id="editque_sub" name="editque_sub" class="ui fluid search dropdown" ></select>
     </div>
      <div class="column">
        <div class="ui sub header">Unit</div>
        <select  id="editque_unit" name="editque_unit" class="ui fluid search dropdown" ></select>
     </div>
     <div class="column">
        <div class="ui sub header">Level</div>
        <select  id="editque_level" name="editque_level" class="ui fluid search dropdown" ></select>
     </div>
    </div>
  </div>
</div>

<div class="ui styled fluid accordion">
  <div class="active title">
     <h5 class="text-center" style="color: teal;" >Objective Type Question</h5>
  </div>
  <div class="active content" >
    <div id ="objective_show"  class="table-responsive"></div>
  </div>
  <div class="title">
    <h5 class="text-center" style="color: teal;" >Short Answer Type Question</h5>
  </div>
  <div class="content">
   <div id ="short_show"  class="table-responsive"></div>
  </div>
  <div class="title">
    	<h5 class="text-center" style="color: teal;" >Long Answer Type Question</h5>
  </div>
  <div class="content">
     <div id ="long_show"  class="table-responsive"></div>
  </div>
</div>
<!----------footer------------------->

    </div>
  </div>
</div>
<script src="../dependencies/sweetalert/sweetalert2.min.js"></script>
<script src="../dependencies/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../dependencies/semantic/dist/semantic.min.js"></script>
<script src="js/editquebasic.js"></script>
<script type="text/javascript">
$('.ui.sidebar').sidebar({
    context: $('.bottom.segment')
  })
  .sidebar('attach events', '.menu .item');
$('.ui.accordion')
  .accordion()
;
</script>
</body>
</html>
