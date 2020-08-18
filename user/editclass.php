<?php
include('user_header.php');
if(!isset($_SESSION["type"]))
{  header("location:../index.php"); }
if($_SESSION["type"] == 'master')
{  header("location:../index.php"); }
?>
<style type="text/css">
	#addclasspage{
		color: #ffffff;
	}
</style>
	
<div class="card-group">
  <div class="card">
    <div class="card-header" style="background: #008080;color: #ffffff;">
    	 <h5 class="card-title">Add Class</h5>
    </div>
    <div class="card-body" style="background: #006868;color: #ffffff;">
    	 <label for="addclassname">Class Name:</label>
		 <input  class="form-control" type="text" name="addclassname" id="addclassname"><br>
		
      
    </div>
    <div class="card-footer" style="background: #008080;color: #ffffff;">
      <div class="row">
        <div class="col-sm">
           <button class="btn" id="btnaddclass" style="background: #006868;color: #ffffff;">ADD CLASS</button>
        </div>
        <div class="col-sm">  <div id="addclassmessage"></div></div>
      </div>   
    </div>
  </div>
  <div class="card">
    <div class="card-header" style="background: #006868;color: #ffffff;">
    	 <h5 class="card-title">Edit Class</h5>
    </div>
    <div class="card-body" style="background:#008080;color: #ffffff;">
     <label for="classname">Class :</label>
		<select class="form-control" id="editclass_select"></select>
		<label for="classname"> Change Class Name:</label>
		<input  class="form-control" type="text" name="editclassname" id="editclassname"><br>
    </div>
    <div class="card-footer"  style="background: #006868;color: #ffffff;">
         <div class="row">
        <div class="col-sm">
           <button class="btn" id="btneditclass" style="background: #008080;color: #ffffff;">EDIT CLASS</button>
        </div>
        <div class="col-sm">  <div id="editclassmessage"></div></div>
      </div>
     
    </div>
  </div>
  <div class="card">
     <div class="card-header" style="background: #008080;color: #ffffff;">
    	 <h5 class="card-title">Delete Class</h5>
    </div>
    <div class="card-body" style="background: #006868;color: #ffffff;">
      <label for="classname">Select Class:</label>
		   <select class="form-control" id="deleteclass_select"></select><br>
    </div>
    <div class="card-footer"  style="background: #008080;color: #ffffff;">
      <div class="row">
        <div class="col-sm">
          <button class="btn"  id="btndeleteclass" style="background: #006868;color: #ffffff;">DELETE CLASS</button>
        </div>
        <div class="col-sm"><div id="deleteclassmessage"></div></div>
      </div>
      
    </div>
  </div>
</div>
<!--------------------footer---------------------->

    </div>
  </div>
</div>
<script src="../dependencies/sweetalert/sweetalert2.min.js"></script>
<script src="../dependencies/jquery/jquery.min.js"></script>
<script src='js/updatebasic.js'></script>
<script type="text/javascript" src="../dependencies/semantic/dist/semantic.min.js"></script>
<script type="text/javascript">
$('.ui.sidebar').sidebar({
    context: $('.bottom.segment')
  })
  .sidebar('attach events', '.menu .item');

</script>
</body>
</html>