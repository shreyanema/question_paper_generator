
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
     //form submit
    $('#generatepaper_form').submit(function (e) {
    e.preventDefault();
    if($("#class").val()=='' || $("#class").val()==null ||  $("#subject").val()==null || $("#subject").val()=='')
    { 
      Swal.fire({
                title: 'Error',
                text:'Please select class and subject to generate paper',
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });

    }
    else{
          $.ajax({
        url: '../displayfiles/generate_questions.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
        
        $("#show_questions").html(data);
        },
        error: function () {},
    });

    }
   
  });
    $("#show_questions").on('click','button[name="change_obj"]' , function(){
      alert('hello');
      var chngobj_unit = $(this).attr("id");
      var chngobj_class = $("#paper_class").val();
      var chngobj_sub =  $("#paper_sub").val();
      var chngobj_level =  $("#paper_level").val();
       $.ajax({
        url: '../displayfiles/change_question.php',
        type: 'POST',  
        data:{chngobj_unit:chngobj_unit,chngobj_class:chngobj_class,chngobj_sub:chngobj_sub,chngobj_level:chngobj_level},
        success:function(data){
          if(chngobj_unit== '1')
            { $("#obj1").html(data);
            }
          else if (chngobj_unit== '2') 
            {$("#obj2").html(data); 
          }
          else if (chngobj_unit== '3') 
            {$("#obj3").html(data);
          }
          else if (chngobj_unit== '4') 
            {$("#obj4").html(data); 
           }
          else{
            $("#obj5").html(data);
        
          }
        }
    });
   });
      $("#show_questions").on('click','button[name="change_short"]' , function(){
      var chngshort_unit = $(this).attr("id");
      var chngshort_class = $("#paper_class").val();
      var chngshort_sub =  $("#paper_sub").val();
      var chngshort_level =  $("#paper_level").val();
       $.ajax({
        url: '../displayfiles/change_question.php',
        type: 'POST',  
        data:{chngshort_unit:chngshort_unit,chngshort_class:chngshort_class,chngshort_sub:chngshort_sub,chngshort_level:chngshort_level},
        success:function(data){
          if(chngshort_unit== '1')
            { $("#short1").html(data);
              }
          else if (chngshort_unit== '2') 
            {$("#short2").html(data); 
          }
          else if (chngshort_unit== '3') 
            {$("#short3").html(data);
            }
          else if (chngshort_unit== '4') 
            {$("#short4").html(data); 
          }
          else{
            $("#short5").html(data);
    
          }
        }
    });
   });

      $("#show_questions").on('click','button[name="change_short_or"]' , function(){
      var chngshort_or_unit = $(this).attr("id");
      var chngshort_or_class = $("#paper_class").val();
      var chngshort_or_sub =  $("#paper_sub").val();
      var chngshort_or_level =  $("#paper_level").val();
       $.ajax({
        url: '../displayfiles/change_question.php',
        type: 'POST',  
        data:{chngshort_or_unit:chngshort_or_unit,chngshort_or_class:chngshort_or_class,chngshort_or_sub:chngshort_or_sub,chngshort_or_level:chngshort_or_level},
        success:function(data){
          if(chngshort_or_unit== '1')
            { $("#short1_or").html(data);
             }
          else if (chngshort_or_unit== '2') 
            {$("#short2_or").html(data); 
           }
          else if (chngshort_or_unit== '3') 
            {$("#short3_or").html(data);
            }
          else if (chngshort_or_unit== '4') 
            {$("#short4_or").html(data); 
           }
          else{
            $("#short5_or").html(data);
            
          }
        }
    });
   });

       $("#show_questions").on('click','button[name="change_long"]' , function(){
      var chnglong_unit = $(this).attr("id");
      var chnglong_class = $("#paper_class").val();
      var chnglong_sub =  $("#paper_sub").val();
      var chnglong_level =  $("#paper_level").val();
       $.ajax({
        url: '../displayfiles/change_question.php',
        type: 'POST',  
        data:{chnglong_unit:chnglong_unit,chnglong_class:chnglong_class,chnglong_sub:chnglong_sub,chnglong_level:chnglong_level},
        success:function(data){
          if(chnglong_unit== '1')
            { $("#long1").html(data);
             }
          else if (chnglong_unit== '2') 
            {$("#long2").html(data); 
            }
          else if (chnglong_unit== '3') 
            {$("#long3").html(data);
             }
          else if (chnglong_unit== '4') 
            {$("#long4").html(data); 
            }
          else{
            $("#long5").html(data);
            
          }
        }
    });
   });
      $("#show_questions").on('click','button[name="change_long_or"]' , function(){
      var chnglong_or_unit = $(this).attr("id");
      var chnglong_or_class = $("#paper_class").val();
      var chnglong_or_sub =  $("#paper_sub").val();
      var chnglong_or_level =  $("#paper_level").val();
       $.ajax({
        url: '../displayfiles/change_question.php',
        type: 'POST',  
        data:{chnglong_or_unit:chnglong_or_unit,chnglong_or_class:chnglong_or_class,chnglong_or_sub:chnglong_or_sub,chnglong_or_level:chnglong_or_level},
        success:function(data){
          if(chnglong_or_unit== '1')
            { $("#long1_or").html(data);
              }
          else if (chnglong_or_unit== '2') 
            {$("#long2_or").html(data); 
            }
          else if (chnglong_or_unit== '3') 
            {$("#long3_or").html(data);
            }
          else if (chnglong_or_unit== '4') 
            {$("#long4_or").html(data); 
            }
          else{
            $("#long5_or").html(data);
         
          }
        }
    });
   });
     $("#show_questions").on('click','#generate_pdf' , function(){
      var pdfobj1 =$("#obj1").html();
      var pdfobj2 =$("#obj2").html();
      var pdfobj3 =$("#obj3").html();
      var pdfobj4 =$("#obj4").html();
      var pdfobj5 =$("#obj5").html();

      var pdfshort1 = $("#short1").html();
      var pdfshort2 = $("#short2").html();
      var pdfshort3 = $("#short3").html();
      var pdfshort4 = $("#short4").html();
      var pdfshort5 = $("#short5").html();

      var pdflong1= $("#long1").html();
      var pdflong2= $("#long2").html();
      var pdflong3= $("#long3").html();
      var pdflong4= $("#long4").html();
      var pdflong5= $("#long5").html();

      var pdfshort1_or =$("#short1_or").html();
      var pdfshort2_or =$("#short2_or").html();
      var pdfshort3_or =$("#short3_or").html();
      var pdfshort4_or =$("#short4_or").html();
      var pdfshort5_or =$("#short5_or").html();

      var pdflong1_or = $("#long1_or").html();
      var pdflong2_or = $("#long2_or").html();
      var pdflong3_or = $("#long3_or").html();
      var pdflong4_or = $("#long4_or").html();
      var pdflong5_or = $("#long5_or").html();

      var showheading = $("#paper_head").html();
      var maxm = $("#maxm").val();
      var time = $("#time").val();
         if(maxm =="" || maxm==null || time =="" || time == null)
         {
           if(maxm =="" || maxm==null )
           {
             Swal.fire({
                title: 'Error',
                text:'please enter maximum marks',
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });
           }
           else{
            Swal.fire({
                title: 'Error',
                text:'please enter Time ',
                icon: 'error',
              }).then(() => {
                console.log('ok');
              });
           }
         }
         else{
            $.ajax({ 
                    url: 'generatepdf.php',
                    type: 'POST',
                    data: {pdfobj1:pdfobj1,pdfobj2:pdfobj2,pdfobj3:pdfobj3,pdfobj4:pdfobj4,pdfobj5:pdfobj5,pdfshort1:pdfshort1,pdfshort2:pdfshort2,pdfshort3:pdfshort3,pdfshort4:pdfshort4,pdfshort5:pdfshort5,pdflong1:pdflong1,pdflong2:pdflong2,pdflong3:pdflong3,pdflong4:pdflong4,pdflong5:pdflong5,pdfshort1_or:pdfshort1_or,pdfshort2_or:pdfshort2_or,pdfshort3_or:pdfshort3_or,pdfshort4_or:pdfshort4_or,pdfshort5_or:pdfshort5_or,pdflong1_or:pdflong1_or,pdflong2_or:pdflong2_or,pdflong3_or:pdflong3_or,pdflong4_or:pdflong4_or,pdflong5_or:pdflong5_or,showheading:showheading,maxm:maxm,time:time},
                    success: function (data) {
                    
                    $("#booklet_pdf").html('<button type="button" class="ui teal button" id="booklet_pdfbtn" ><i class="fa fa-eye" aria-hidden="true"></i></button>');
                    },
                    error: function () {},
                });

              }
     
  });
$("#show_questions").on('click','#booklet_pdfbtn',function(){
      window.location.href = 'booklet.php';
});


});
