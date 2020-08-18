$(document).ready(function(){

	var queid = $('#question_id').val();

	$.ajax({
		url: '../displayfiles/update.php',
		type: 'POST',
		dataType :'JSON',
		data:{queid:queid},
		success: function(data)
		{
			console.log(data);
			$("#que").val(data.question);
				
			  var b ='2';
				$.ajax({
		          url:'../displayfiles/displaytotal.php',
		          type:'GET',  
		          data:{b:b},
		          success:function(response){
		               $("#classque_edit").html(response);
		               $("#classque_edit").val(data.class_id);        
		          }
				});
				var class_id =data.class_id;
            	$.ajax({
		          url:'../displayfiles/displaytotal.php',
		          type:'GET',  
		          data:{class_id:class_id},
		          success:function(response){
		          	   $("#subque_edit").html('');
		          	  $("#subque_edit").val('');
		                $("#subque_edit").html(response); 
		                $("#subque_edit").val(data.sub_id);      
		               }
		          });
            	 var sub_id =data.sub_id;
		         $.ajax({
		          url:'../displayfiles/displaytotal.php',
		          type:'GET',  
		          data:{sub_id:sub_id},
		          success:function(response){
		               $("#unitque_edit").html(response);
		                $("#unitque_edit").val(data.unit_id);

		               }
		          });
		          var unit_id =data.unit_id;
		          $.ajax({
			          url:'../displayfiles/displaytotal.php',
			          type:'GET',  
			          data:{unit_id:unit_id},
			          success:function(response){
			               $("#sectionque_edit").html(response); 
			               $("#sectionque_edit").val(data.section_id);       
			               }
			          });
			          var section_id =data.section_id;
			          var inputadd ="1";
			          $.ajax({
			          url:'../displayfiles/displaytotal.php',
			          type:'GET', 
			          dataType:'JSON', 
			          data:{section_id:section_id,inputadd:inputadd},
			          success:function(response){
			               $("#levelque_edit").html(response.level);
			               $("#levelque_edit").val(data.level_id);
			               $("#options").html(response.inputadd); 
			               $("#hindi_que").html("");    
			               $("#options_hin").html(""); 
			               $("#hindi_status").val("2"); 
			               $("#image_que").html("");
			               $("#image_que_hin").html("");
			               $("#options_image").html("");
			               $("#options_image_hin").html("");
			               $("#img_status").val("2");
			               if(data.section_id == '1'|| data.section_id =='2')
				          	{ 
									$("input#option_1").val(data.option_1);
									$("input#option_2").val(data.option_2);
									$("input#option_3").val(data.option_3);
									$("input#option_4").val(data.option_4);
									
										
								}

			               }
			          });	    
						     
			          if(data.hindi_trans =='1')
		       			{
		                var section_id_for_hin = data.section_id;
					         $.ajax({
					               url:'../displayfiles/displaytotal.php',
					               type:'GET', 
					               dataType:'JSON', 
					               data:{section_id_for_hin:section_id_for_hin},
					               success:function(hindi){
					                    $("#hindi_que").html(hindi.question_hin);    
					                    $("#options_hin").html(hindi.option_hin); 
					                    $("#hindi_status").val("1");//active
					                    $("textarea#hindi_question").val(data.question_hin);

										$("input#option_1_hin").val(data.option_hin_1);
										$("input#option_2_hin").val(data.option_hin_2);
										$("input#option_3_hin").val(data.option_hin_3);
										$("input#option_4_hin").val(data.option_hin_4);
								
					                    }
					               });

					      }
					      if(data.img_status =='1')
					      {

								     var section = data.section_id;
								     var hindi_status = data.hindi_trans;   
								     var add_img ='1';
								        $.ajax({
								               url:'../displayfiles/displaytotal.php',
								               type:'GET', 
								               dataType:'JSON', 
								               data:{add_img:add_img},
								               success:function(response){
								                    $("#image_que").html(response.image_que);
								                    $("input#img_add").val(data.image_add);
								                    $("img#showimage_img_question_url").attr("src","../upload_images/"+data.image_add);
								                    if(section =='1')
								                    { $("#options_image").html(response.options_img);
								                	   $("input#img_add_o1").val(data.image_option_1);
								                    	$("img#showimage_img_option1_url").attr("src","../upload_images/"+data.image_option_1);
								                    	$("input#img_add_o2").val(data.image_option_2);
								                    	$("img#showimage_img_option2_url").attr("src","../upload_images/"+data.image_option_2);
								                    	$("input#img_add_o3").val(data.image_option_3);
								                    	$("img#showimage_img_option3_url").attr("src","../upload_images/"+data.image_option_3);
								                    	$("input#img_add_o4").val(data.image_option_4);
								                    	$("img#showimage_img_option4_url").attr("src","../upload_images/"+data.image_option_4);
								            		}
								                    if(hindi_status =='1')
								                    { $("#image_que_hin").html(response.image_que_hin);
								                		$("input#img_add_hin").val(data.imagehin_add);
								                    	$("img#showimage_img_question_hin_url").attr("src","../upload_images/"+data.imagehin_add);
								                       if(section =='1')
								                       {
								                        $("#options_image_hin").html(response.options_img_hin);
								                        $("img#showimage_img_option1_hin_url").attr("src","../upload_images/"+data.imagehin_option_1);
								                    	$("input#img_add_hin_o1").val(data.imagehin_option_1);
								                    	$("img#showimage_img_option2_hin_url").attr("src","../upload_images/"+data.imagehin_option_2);
								                    	$("input#img_add_hin_o2").val(data.imagehin_option_2);
								                    	$("img#showimage_img_option3_hin_url").attr("src","../upload_images/"+data.imagehin_option_3);
								                    	$("input#img_add_hin_o3").val(data.imagehin_option_3);
								                    	$("img#showimage_img_option4_hin_url").attr("src","../upload_images/"+data.imagehin_option_4);
								                    	$("input#img_add_hin_o4").val(data.imagehin_option_4);
								                       }
								                    }                   
								                    $("#img_status").val("1");
								               }
								        });
								  
					      }
			       		
				    
						
				         
 
		}
	});
 $('#update_question').submit(function (e) {
    e.preventDefault();
    if($("#classque_edit").val() == null || $("#classque_edit").val() == "" || $("#subque_edit").val() == null || $("#subque_edit").val() == "" || $("#unitque_edit").val() == null || $("#unitque_edit").val() =="" || $("#sectionque_edit").val() == null || $("#sectionque_edit").val() =="" || $("#levelque_edit").val() == null || $("#levelque_edit").val() == "")
     {
      Swal.fire({
          title: 'Error',
          text:'please enter all the required field',
          icon: 'error',
        }).then(() => {
          console.log('ok');
        });

     }
     else{
       $.ajax({
        url: '../insertfiles/update_question.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
        console.log(data);
       Swal.fire({
          title: 'Update Successfully',
          icon: 'success',
        }).then(() => {
           window.location.href ='editque.php';
        });
        },
        error: function () {},
    });

     } 
  });
	
});