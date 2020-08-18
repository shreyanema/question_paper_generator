
$(document).ready(function(){
 
	var a = '1';
	$.ajax({
		 url:'../displayfiles/displaytotal.php',
		  type:'GET',  
          data:{a:a},
          dataType:'JSON',
          success:function(data){
          	console.log(data);
          	$("#total_que").html(data.totalque);
          	$("#totalbyuser").html(data.totalbyuser);
          	$("#total_class").html(data.totalclass);
          	$("#total_sub").html(data.totalsub);
          	$("#total_easy").html(data.totaleasy);
          	$("#total_moderate").html(data.totalmoderate);
          	$("#total_difficult").html(data.totaldifficult);
               $("#total_obj").html(data.totalobj);
               $("#total_short").html(data.totalshort);
               $("#total_long").html(data.totallong);
          }

	});
     //class loader 
          var b ="2";
          $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET',  
          data:{b:b},
          success:function(data){
               console.log(data);
               $("#class").html(data);        
          }

     });
     //subject loader
     $("#class").change(function(){
          var class_id =$("#class").val();
            $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET',  
          data:{class_id:class_id},
          success:function(data){
               console.log(data);
               $("#subject").html(data);        
               }
          });

     });
     //unit loader
          $("#subject").change(function(){
          var sub_id =$("#subject").val();
          $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET',  
          data:{sub_id:sub_id},
          success:function(data){
               console.log(data);
               $("#unit").html(data);        
               }
          });

     });
     //section loader
          $("#unit").change(function(){
          var unit_id =$("#unit").val();
          $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET',  
          data:{unit_id:unit_id},
          success:function(data){
               $("#section").html(data);        
               }
          });

     });
     //level loader //input options loader
        $("#section").change(function(){
          var section_id =$("#section").val();
          var inputadd ="1";
          $.ajax({
          url:'../displayfiles/displaytotal.php',
          type:'GET', 
          dataType:'JSON', 
          data:{section_id:section_id,inputadd:inputadd},
          success:function(data){
               $("#level").html(data.level);
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
        var section_id_for_hin = $("#section").val();
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
     var section =$("#section").val();
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

});

