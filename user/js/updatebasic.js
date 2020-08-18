   //form submit
$(document).ready(function(){
   //class loader 
          var b ="2";
          $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET',  
          data:{b:b},
          success:function(data){
               console.log(data);
               $("#editclass_select").html(data); 
                $("#deleteclass_select").html(data); 
                $("#addsubclass_select").html(data);  
                $("#deletesubclass_select").html(data);     
          }

     });
  $("#btnaddclass").click(function(){
   var newclass = $("#addclassname").val();
   if(newclass=="" || newclass ==null)
   {
       Swal.fire({
                title: 'Error',
                text: "Please Enter Class",
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });
   }
   else{
   $.ajax({
    url:"../curd/class_curd.php",
    method: "POST",
    data:{newclass:newclass},
    dataType:"JSON",
    success:function(data){
            if(data.msg =='1')
            {
               Swal.fire({
                title: 'Class Added successfully',
                icon: 'success',
              }).then(() => {
                console.log('ok');
                location.reload(true);
              });
            }
            else{
              Swal.fire({
                title: 'Error',
                text: data.msg,
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });

            }
           
    }
   });
  }
 });
  $("#btneditclass").click(function(){
   var editclass_select = $("#editclass_select").val();
   var edited_class = $("#editclassname").val();
   if(editclass_select!="" && editclass_select !=null && edited_class!="" && edited_class!=null)
   {
   $.ajax({
    url:"../curd/class_curd.php",
    method: "POST",
    data:{editclass_select:editclass_select,edited_class:edited_class},
    dataType:"JSON",
    success:function(data){
            if(data.msg =='1')
            {
               Swal.fire({
                title: 'Class Edited successfully',
                icon: 'success',
              }).then(() => {
                console.log('ok');
               location.reload(true);
              });
            }
            else{
              Swal.fire({
                title: 'Error',
                text: data.msg,
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });

            }
             

    }
   });
   }
   else{
     if( editclass_select=="" || editclass_select ==null )
      {
        Swal.fire({
                title: 'Error',
                text: "Please select Class to  edit",
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });
       }
       else  {
          Swal.fire({
                title: 'Error',
                text: "Please enter Class to  edit",
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });
       }
  }
 });
  $("#btndeleteclass").click(function(){
      var deleteclass = $("#deleteclass_select").val();
      if(deleteclass!="" && deleteclass!=null)
      {
          Swal.fire({
                  title: 'Are you sure you want to delete this class?',
                  text: " Question and Subjects under this class also get deleted!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.value) {
                    $.ajax({
                      url: "../curd/class_curd.php",
                      method: "POST",
                      data:{deleteclass:deleteclass},
                      dataType:"JSON",
                      success:function(data){
                          Swal.fire({
                            title: 'Status',
                            html: data.msg,
                          }).then(() => {
                           console.log('ok');
                            location.reload(true);
                          });

                        }
                      
                });
                  }
                });
           
      }
      else{
       Swal.fire({
                title: 'Error',
                text: "Please select Class to delete",
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });
      } 
    });

//----------------------------------------

   $("#btnaddsub").click(function(){
      var addsubclass_select = $("#addsubclass_select").val();
      var addsubname = $("#addsubname").val();
      var subpapername = $("#subpapername").val();
      var subpapercode = $("#subpapercode").val();
      if(addsubclass_select!="" && addsubclass_select!=null && addsubname!="" && addsubname!=null && subpapername!="" && subpapername!=null && subpapercode!="" && subpapercode!=null)
      {
        $.ajax({
                url: "../curd/subject_curd.php",
                method:"POST",
                data:{addsubclass_select:addsubclass_select,addsubname:addsubname,subpapername:subpapername,subpapercode:subpapercode},
                dataType : "JSON",
                success:function(data)
                {
                   if(data.msg =='1')
                    {
                      Swal.fire({
                        title: 'Subject Added successfully',
                        icon: 'success',
                      }).then(() => {
                        console.log('ok');
                      location.reload(true);
                      });
                    }
                    else{
                      Swal.fire({
                        title: 'Error',
                        text: data.msg,
                        icon: 'error',
                      }).then(() => {
                        console.log('ok');
                     });

                }
              }
        });
      }
      else{
          Swal.fire({
                title: 'Error',
                text: "Please select and fill all the fields",
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });
      }
    });
  //subject loader
    $("#editclass_select").change(function(){
          var class_id =$("#editclass_select").val();
            $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET',  
          data:{class_id:class_id},
          success:function(data){
               console.log(data);
               $("#editsub_select").html(data);        
               }
          });
    });
     $("#editsub_select").change(function(){
     
       var editsubchange= $("#editsub_select").val();
       $.ajax({
                url: '../curd/subject_curd.php',
                method : "POST",
                data:{editsubchange:editsubchange},
                dataType: "JSON",
                success:function(data)
                {
                  $("#editsubname").val(data.subname);
                  $("#editpapername").val(data.papername);
                  $("#editpapercode").val(data.papercode);
                }
       });
    });
    
    $("#btneditsub").click(function(){
    
    var editclass_select=  $("#editclass_select").val();
    var editsub_select=  $("#editsub_select").val();
    var editsubname=  $("#editsubname").val();
    if(editclass_select!="" && editclass_select!=null && editsub_select != "" && editsub_select != null && editsubname !="" && editsubname != null)
    {
      $.ajax({
              url :'../curd/subject_curd.php',
              method : "POST",
              data : {editclass_select:editclass_select,editsub_select:editsub_select,editsubname:editsubname},
              dataType: "JSON",
              success:function(data)
              {
                  if(data.msg =='1')
                    {
                      Swal.fire({
                        title: 'Subject Edited successfully',
                        icon: 'success',
                      }).then(() => {
                        console.log('ok');
                      location.reload(true);
                      });
                    }
                    else{
                      Swal.fire({
                        title: 'Error',
                        text: data.msg,
                        icon: 'error',
                      }).then(() => {
                        console.log('ok');
                     });

                   }
              }
      });
    }
    else{
       Swal.fire({
                title: 'Error',
                text: "Please fill all the fields",
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });
    }
       });

    $("#deletesubclass_select").change(function(){
          var class_id =$("#deletesubclass_select").val();
            $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET',  
          data:{class_id:class_id},
          success:function(data){
               console.log(data);
               $("#deletesub_select").html(data);        
               }
          });
    });
   $("#btndeletesub").click(function(){
    var deletesubclass_select =$("#deletesubclass_select").val();
    var deletesub_select = $("#deletesub_select").val();
    if(deletesubclass_select!="" && deletesubclass_select!=null && deletesub_select!="" && deletesub_select!=null)
    {
        if(confirm("Are you sure you want to delete this subject? If you delete this then question under this subject will bo deleted."))
        {
          $.ajax({
                    url: "../curd/subject_curd.php",
                    method: "POST",
                    data: {deletesubclass_select:deletesubclass_select,deletesub_select:deletesub_select},
                    dataType: "JSON",
                    success:function(data)
                    {
                         Swal.fire({
                        title: 'Status',
                        html: data.msg,
                      }).then(() => {
                        console.log('ok');
                           location.reload(true);
                     });
                    }
          });
        }
    }
    else{
              Swal.fire({
                        title: 'Error',
                        html: 'Please select class and subject to delete subject',
                        icon:'error',
                      }).then(() => {
                        console.log('ok');
                     });
    }
   });
  });
 