<?php
include('user_header.php');
if(!isset($_SESSION["type"]))
{  header("location:../index.php"); }
if($_SESSION["type"] == 'master')
{  header("location:../index.php"); }
$uname = $_SESSION['username'];

?>
<!------------------------------------------>
	<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
		<div class="card text-white mb-4" style="background-color: #008080;">
		    <div class="card-body">
		    	<div class="form-group ">
	          <label for="useremail">User Email:-</label>
	          <label   id="useremail"  name="useremail"><?php echo $_SESSION["useremail"];?></label>
	       </div>
		    	<div class="form-group ">
	          <label for="uname">Username</label>
	            <input   class="form-control"  id="uname" name="uname" type="text" value="<?php echo $uname;?>"  > 
	       </div>
	      
	        <div class="form-group ">
	          <label for="unit">Old Password</label>
	            <input   class="form-control"  id="oldpass" name="oldpass" type="password" > 

	        </div>
	        <div id="oldpassmessage" class="text-danger"></div>
	        <div class="form-group ">
	          <label for="section">New Password</label>
	            <input  class="form-control" type="password" id="newpass"  type="password" value=""> 

	        </div>
	        <div id="newpassmessage" class="text-danger"></div>
	        <div class="form-group ">
	        	<button class="btn " type="submit" name="submit" id="<?php echo $_SESSION['user_id']; ?>" style="background :#ffffff; color:#009999; text-align: center;">Click to set Changes</button>
	         <br>
	         <br>
	        <div id="message" class="text-danger"></div>
	        </div>
	     <div class="col-sm-4"></div>
	    </div>
		    </div>
		        
		        
		</div>
	
    <div class="col-sm-4">
		
	</div>
	  </div>  
<!----------------------------------------------------->    
<script type="text/javascript">
	
	</script>
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

  $(document).on('click', 'button[name="submit"]', function(){
  	
	  if($('#newpass').val() == '' || $("#newpass").val()==null)
	 {   Swal.fire({
                title: 'Error',
                text: "Please enter new password!!",
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });
	 }	
	 	 if($('#oldpass').val() == '' || $('#oldpass').val() ==null)
	 { Swal.fire({
                title: 'Error',
                text: "Please enter old password!!",
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });
	 }
  	if($('#uname').val() == '' || $('#uname').val() ==null)
	 { Swal.fire({
                title: 'Error',
                text: "Please enter username!!",
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });
	 }

	
	  
	 if($('#uname').val() != '' && $('#uname').val() !=null && $('#oldpass').val() != '' && $('#oldpass').val() !=null && $('#newpass').val() != '' && $("#newpass").val() !=null)
		{
		  var user_id = $(this).attr('id');
		  var uname  =$("#uname").val();
		  var oldpass = $("#oldpass").val();
		  var newpass= $("#newpass").val();
				$.ajax({
					url:"../curd/user_profile.php",
					method:"POST",
					data:{user_id:user_id,oldpass:oldpass,newpass:newpass,uname:uname},					
					success:function(data)
						{if(data=='1')
								{
									Swal.fire({
						                title: 'Password changed successfully',
						                icon: 'success',
						              }).then(() => {
						                console.log('ok');
						              });

								}
								else{
									Swal.fire({
						                title: 'Error',
						                html: data,
						                icon: 'error',
						              }).then(() => {
						                console.log('ok');
						              });
								}
							

						}
					});
		}
			});

</script>
</body>
</html>