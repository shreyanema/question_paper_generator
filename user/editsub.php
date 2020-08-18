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
    	 <h5 class="card-title">Add Subject</h5>
    </div>
    <div class="card-body" style="background: #006868;color: #ffffff;">
    	 <label > Select Class :</label>
		<select class="form-control" id="addsubclass_select"></select>
    	 <label for="addsubname">Subject Name:</label>
		 <input  class="form-control" type="text" placeholder="Ex. Mathematics I" name="addsubname" id="addsubname">
		 <label for="subpapername">Paper Name:</label>
     <input  class="form-control" type="text" placeholder="Ex. Algebra"  name="subpapername" id="subpapername">
      <label for="subpapercode">Paper Code:</label>
     <input  class="form-control" type="number" placeholder="Ex. 706642" name="subpapercode" id="subpapercode">
      
    </div>
    <div class="card-footer" style="background: #008080;color: #ffffff;">
      <div class="row">
        <div class="col-sm"> <button class="btn" id="btnaddsub" style="background: #006868;color: #ffffff;">ADD SUBJECT</button></div>
        <div class="col-sm">
          <div id="addsubmessage"></div>
        </div>
      </div>
     
    </div>
  </div>
  <div class="card">
    <div class="card-header" style="background: #006868;color: #ffffff;">
    	 <h5 class="card-title">Edit Subject</h5>
    </div>
    <div class="card-body" style="background:#008080;color: #ffffff;">
     <label for="editclass_select">Class :</label>
		<select class="form-control" id="editclass_select"></select>
     <label for="editsub_select">Subject :</label>
    <select class="form-control" id="editsub_select"></select>
		<label for="editsubname"> Change Subject Name:</label>
		<input  class="form-control" type="text" name="editsubname" id="editsubname">
    <label for="editpapername"> Change Paper Name:</label>
    <input  class="form-control" type="text" name="editpapername" id="editpapername">
    <label for="editpapercode"> Change Paper code:</label>
    <input  class="form-control" type="text" name="editpapercode" id="editpapercode">
    </div>
    <div class="card-footer"  style="background: #006868;color: #ffffff;">
      <div class="row">
        <div class="col-sm"> <button class="btn" id="btneditsub" style="background: #008080;color: #ffffff;">EDIT SUBJECT</button>
        </div>
        <div class="col-sm"><div id="editsubmessage"></div></div>
      </div>
     
    </div>
  </div>
  <div class="card">
     <div class="card-header" style="background: #008080;color: #ffffff;">
    	 <h5 class="card-title">Delete Subject</h5>
    </div>
    <div class="card-body" style="background: #006868;color: #ffffff;">
      <label for="deletesubclass_select">Select Class:</label>
		 <select class="form-control" id="deletesubclass_select"></select>
      <label for="deletesub_select">Select Subject to delete:</label>
              <select class="form-control" id="deletesub_select"></select>
    </div>
    <div class="card-footer"  style="background: #008080;color: #ffffff;">
      <div class="row">
        <div class="col-sm"><button class="btn" id="btndeletesub" style="background: #006868;color: #ffffff;">DELETE CLASS</button>
        </div>
        <div class="col-sm"><div id="deletesubmessage"></div></div>
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