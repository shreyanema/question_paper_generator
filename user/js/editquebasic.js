$(document).ready(function(){
	//class loader
	  var b ="2";
          $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET',  
          data:{b:b},
          success:function(data){
               console.log(data);
               $("#editque_class").html(data);        
          }
        });

	//on change class
     $("#editque_class").change(function(){
         var class_id =$("#editque_class").val();
           $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET',  
          data:{class_id:class_id},
          success:function(data){
               console.log(data);
               $("#editque_sub").html(data);        
               }
          });
 			$.ajax({
	          url:'../displayfiles/editquestion.php',
	          type:'POST',  
               dataType :'JSON',
	          data:{class_id:class_id},
	          success:function(data){
               
	          	   $("#objective_show").html(data.objective);
                       $('#short_show').html(data.short);
                       $("#long_show").html(data.long);
	          	}
	          });   
	   });
	//on change subject
	    $("#editque_sub").change(function(){
          var class_id =$("#editque_class").val();
          var sub_id =$("#editque_sub").val();
          $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET',  
          data:{sub_id:sub_id},
          success:function(data){
               console.log(data);
               $("#editque_unit").html(data);        
               }
          });
          $.ajax({
               url:'../displayfiles/editquestion.php',
               type:'POST',  
               dataType :'JSON',
               data:{class_id:class_id,sub_id:sub_id},
               success:function(data){
                       $("#objective_show").html(data.objective);
                       $('#short_show').html(data.short);
                       $("#long_show").html(data.long);
                    }
               }); 
       });
	//on change unit
	$("#editque_unit").change(function(){
          var class_id =$("#editque_class").val();
          var sub_id =$("#editque_sub").val();
		      var unit_id = $("#editque_unit").val();
          var unit_fetch  =$("#editque_unit").val();
          $.ajax({
               url:'../displayfiles/editquestion.php',
               type:'POST',  
               dataType :'JSON',
               data:{class_id:class_id,sub_id:sub_id,unit_id:unit_id},
               success:function(data){
                       $("#objective_show").html(data.objective);
                       $('#short_show').html(data.short);
                       $("#long_show").html(data.long);
                    }
               }); 
		$.ajax({
          url:'../displayfiles/editquestion.php',
          type:'POST',
          data:{unit_fetch:unit_fetch},
          success:function(data){
               console.log(data);
               $("#editque_level").html(data);        
               }
          });
	}); 

    
	//on change level
     $("#editque_level").change(function(){
          var class_id =$("#editque_class").val();
          var sub_id =$("#editque_sub").val();
          var unit_id = $("#editque_unit").val();
          var level_id = $('#editque_level').val();
           $.ajax({
               url:'../displayfiles/editquestion.php',
               type:'POST',  
               dataType :'JSON',
               data:{class_id:class_id,sub_id:sub_id,unit_id:unit_id,level_id:level_id},
               success:function(data){
                       $("#objective_show").html(data.objective);
                       $('#short_show').html(data.short);
                       $("#long_show").html(data.long);
                    }
               }); 
     });
	////// update question ////////////////
      //subject loader
     $("#classque_edit").change(function(){
          var class_id =$("#classque_edit").val();
            $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET',  
          data:{class_id:class_id},
          success:function(data){
               console.log(data);
               $("#subque_edit").html(data); 
               $("#subque_edit").val('');               
               }
          });

     });
     //level loader //input options loader
        $("#sectionque_edit").change(function(){
          var section_id =$("#section").val();
          var inputadd ="1";
          $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET', 
          dataType:'JSON', 
          data:{section_id:section_id,inputadd:inputadd},
          success:function(data){
               $("#options").html(data.inputadd); 
               $("#hindi_que").html("");    
               $("#options_hin").html(""); 
               $("#hindi_status").val("2"); 
               $("#image_que").html("");
               $("#image_que_hin").html("");
               $("#options_image").html("");
               $("#options_image_hin").html("");
               $("#img_status").val("2");

               }
          });
     });
          // on  add hindi translation
     $("#add_hindi_trans").click(function(){
        var section_id_for_hin = $("#sectionque_edit").val();
        if(section_id_for_hin =="" ||section_id_for_hin == null )
        {    Swal.fire({
                  title: 'Error',
                  text:'Please Select Section to enable hindi translation',
                  icon: 'error',
                }).then(() => {
                  console.log('hindi activated');
                    $("#hindi_que").html("");    
                    $("#options_hin").html("");
                });
          
               
              
          }
          else{
                 $.ajax({
               url:'../displayfiles/displaytotal.php',
               type:'GET', 
               dataType:'JSON', 
               data:{section_id_for_hin:section_id_for_hin},
               success:function(data){
                    $("#hindi_que").html(data.question_hin);    
                    $("#options_hin").html(data.option_hin); 
                    $("#hindi_status").val("1");//active
                    }
               });


          }
     });
           //remove hindi translation
     $("#rem_hindi_trans").click(function(){
              $("#hindi_que").html("");    
               $("#options_hin").html("");   
                 $("#hindi_status").val("2"); // inactive
                 console.log('hindi deactivated');
     });
 //add image
 $("#add_img").click(function(){
     var section =$("#sectionque_edit").val();
     var hindi_status =$("#hindi_status").val();
      if(section =="" ||section == null )
        {
           Swal.fire({
                  title: 'Error',
                  text:'Please Select Section to enable image',
                  icon: 'error',
                }).then(() => {
                  console.log('image activated');
                   $("#image_que").html("");
                     $("#image_que_hin").html("");
                     $("#options_image").html("");
                     $("#options_image_hin").html("");
                     $("#img_status").val("2");
                });
               
          }
     else{
     
    var add_img ='1';
        $.ajax({
               url:'../displayfiles/displaytotal.php',
               type:'GET', 
               dataType:'JSON', 
               data:{add_img:add_img},
               success:function(data){
                    $("#image_que").html(data.image_que);
                    if(section =='1')
                    { $("#options_image").html(data.options_img);}
                    if(hindi_status =='1')
                    { $("#image_que_hin").html(data.image_que_hin);
                       if(section =='1')
                       {
                         $("#options_image_hin").html(data.options_img_hin);
                       }
                    }                   
                    $("#img_status").val("1");
               }
        });
     }
 });
 //remove image
 $("#rem_image").click(function(){
          $("#image_que").html("");
          $("#image_que_hin").html("");
          $("#options_image").html("");
          $("#options_image_hin").html("");
          $("#img_status").val("2");
          console.log('image deactivated');
 });
$(document).on('click','button[name="delete"]',function(){
    var que_id_del= $(this).attr('id');
  Swal.fire({
  title: 'Are you sure you want to delete question?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    $.ajax({
      url:'../deletefiles/deletequestion.php',
      data:{que_id_del:que_id_del},
      type:"POST",
      success:function(data){
        console.log(data);
        if(data == 2)
        {
          Swal.fire({
          title: 'Deleted',
          icon: 'success',
        }).then(() => {
              var class_id =$("#editque_class").val();
              var sub_id =$("#editque_sub").val();
              var unit_id = $("#editque_unit").val();
              var level_id = $('#editque_level').val();
                    if(class_id!='' && class_id!=null && sub_id!='' && sub_id!=null && unit_id!='' && unit_id!=null && level_id!='' && level_id!=null)
                     {
                      $.ajax({
                           url:'../displayfiles/editquestion.php',
                           type:'POST',  
                           dataType :'JSON',
                           data:{class_id:class_id,sub_id:sub_id,unit_id:unit_id,level_id:level_id},
                           success:function(data){
                                   $("#objective_show").html(data.objective);
                                   $('#short_show').html(data.short);
                                   $("#long_show").html(data.long);
                                }
                           });
                     }
                       else  if(class_id!='' && class_id!=null && sub_id!='' && sub_id!=null && unit_id!='' && unit_id!=null)
                         {
                          $.ajax({
                               url:'../displayfiles/editquestion.php',
                               type:'POST',  
                               dataType :'JSON',
                               data:{class_id:class_id,sub_id:sub_id,unit_id:unit_id},
                               success:function(data){
                                       $("#objective_show").html(data.objective);
                                       $('#short_show').html(data.short);
                                       $("#long_show").html(data.long);
                                    }
                               });
                         }
                          else if(class_id!='' && class_id!=null && sub_id!='' && sub_id!=null)
                           {
                            $.ajax({
                                 url:'../displayfiles/editquestion.php',
                                 type:'POST',  
                                 dataType :'JSON',
                                 data:{class_id:class_id,sub_id:sub_id},
                                 success:function(data){
                                         $("#objective_show").html(data.objective);
                                         $('#short_show').html(data.short);
                                         $("#long_show").html(data.long);
                                      }
                                 });
                           }

                         else
                         {
                          $.ajax({
                               url:'../displayfiles/editquestion.php',
                               type:'POST',  
                               dataType :'JSON',
                               data:{class_id:class_id},
                               success:function(data){
                                       $("#objective_show").html(data.objective);
                                       $('#short_show').html(data.short);
                                       $("#long_show").html(data.long);
                                    }
                               });
                         }
           
                    


              
            });
         
        }
        if(data == '1'){
         Swal.fire(
        
        'Not Deleted!',
        data,
        'error'
          )
        }
        
      }

      
    });
    
  }
})

});
$(document).on('click','button[name="active"]',function(){

  var que_id_deactivate =$(this).attr('id');
  $.ajax({
      url:'../displayfiles/update.php',
      data:{que_id_deactivate:que_id_deactivate},
      type:"POST",
      success:function(data){
        
        $('div#activity'+que_id_deactivate).html(data);
      }
    });
  });
$(document).on('click','button[name="inactive"]',function(){
 
   var que_id_activate =$(this).attr('id');
  $.ajax({
      url:'../displayfiles/update.php',
      data:{que_id_activate:que_id_activate},
      type:"POST",
      success:function(data){
        
        $('div#activity'+que_id_activate).html(data);
      }
    });
});

});