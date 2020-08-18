<?php
include('admin_header.php');
if(!isset($_SESSION["type"]))
{  header("location:../index.php"); }
if($_SESSION["type"] == 'user')
{  header("location:../index.php"); }
?>
<div class="ui three column grid">
  <div class="column">
  	<div class="ui teal card">
	  	<div class="content">
	    	<div class="header"> Total No. of Questions</div>
	    	<div class="description" id="total_que">100</div>
	  	</div>
	</div>
  </div>
  
  <!--<div class="column">
  	<div class="ui teal card">
	  	<div class="content">
	    	<div class="header">No. of Questions by you</div>
	    	<div class="description" id="totalbyuser"></div>
	  	</div>
	</div>
  </div>-->
  <div class="column">
  	<div class="ui teal card">
	  	<div class="content">
	    	<div class="header">No. of Class</div>
	    	<div class="description" id="total_class"></div>
	  	</div>
	</div>
  </div>
  <div class="column">
  	<div class="ui teal card">
	  	<div class="content">
	    	<div class="header">No. of Subject</div>
	    	<div class="description" id="total_sub"></div>
	  	</div>
	</div>
  </div>
 </div>
  <div class="ui three column grid"> 
  <div class="column">
  	<div class="ui teal card">
	  	<div class="content">
	    	<div class="header">No. of Objective Question</div>
	    	<div class="description" id="total_obj"></div>
	  	</div>
	</div>
  </div>
  <div class="column">
  	<div class="ui teal card">
	  	<div class="content">
	    	<div class="header">No. of Short Questions </div>
	    	<div class="description" id="total_short"></div>
	  	</div>
	</div>
  </div>
  <div class="column">
  	<div class="ui teal card">
	  	<div class="content">
	    	<div class="header">No. of  Long Questions</div>
	    	<div class="description" id="total_long"></div>
	  	</div>
	</div>
  </div>
 </div>

 <div class="ui three column grid"> 
  <div class="column">
  	<div class="ui teal card">
	  	<div class="content">
	    	<div class="header">No. of Easy Question</div>
	    	<div class="description" id="total_easy"></div>
	  	</div>
	</div>
  </div>
  <div class="column">
  	<div class="ui teal card">
	  	<div class="content">
	    	<div class="header">No. of Moderate Questions </div>
	    	<div class="description" id="total_moderate"></div>
	  	</div>
	</div>
  </div>
  <div class="column">
  	<div class="ui teal card">
	  	<div class="content">
	    	<div class="header">No. of  Difficult Questions</div>
	    	<div class="description" id="total_difficult"></div>
	  	</div>
	</div>
  </div>
 </div>
<!----------------footer------------------------>
    </div>
  </div>
</div>
<script src="../dependencies/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../dependencies/semantic/dist/semantic.min.js"></script>
<script src="js/displaybasic_admin.js"></script>  
<script type="text/javascript">
$('.ui.sidebar').sidebar({
    context: $('.bottom.segment')
  })
  .sidebar('attach events', '.menu .item');

</script>
</body>
</html>

