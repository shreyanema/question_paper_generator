$(document).ready(function(){
  $("#preview_question").click(function(){
     if($("#class").val() == null || $("#class").val() == "" || $("#subject").val() == null || $("#subject").val() == "" || $("#unit").val() == null || $("#unit").val() =="" || $("#section").val() == null || $("#section").val() =="" || $("#level").val() == null || $("#level").val() == "")
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
       var pre_class = $("#class").val();
    var pre_sub = $("#subject").val();
    var pre_unit = $("#unit").val();
    var pre_section = $("#section").val();
    var pre_level = $("#level").val();
     $.ajax({
            url: "../displayFiles/displaytotal.php",
            type: "POST",
            data:{pre_class:pre_class,pre_sub:pre_sub,pre_unit:pre_unit,pre_section:pre_section,pre_level:pre_level},
            success:function(data)
            {
              Swal.fire({
                    title: 'Question Details',
                    text: 'all details',
                    html:data
                    })

            }
          });

     }
   
   
  });
  //form submit
    $('#insert_question').submit(function (e) {
    e.preventDefault();
    if($("#class").val() == null || $("#class").val() == "" || $("#subject").val() == null || $("#subject").val() == "" || $("#unit").val() == null || $("#unit").val() =="" || $("#section").val() == null || $("#section").val() =="" || $("#level").val() == null || $("#level").val() == "")
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
        url: '../insertFiles/insertquestion.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
        console.log(data);
       Swal.fire({
          title: 'Inserted Successfully',
          icon: 'success',
        }).then(() => {
           window.location.reload();
        });
        },
        error: function () {},
    });

     } 
  });

    //Question Image
    $("#image_que").on('change','#img_question_url',function(){
        var abc= $("#img_question_url").val();
        var newimg ='../user/temp_upload_folder/questionimage.png';
        $.ajax({
            url: "../insertfiles/insertbasic.php",
            type: "POST",
            data:{abc:abc,newimg:newimg},
            success:function(data)
            {   if(data != 0)
                {  
                  url ="temp_upload_folder/QPG"+data+".png";
                    $("#showimage_img_question_url").attr("src",url);
                    $("#img_question_url").val('');
                    $("#img_add").val('QPG'+data+'.png');
                }
                else{
                  alert('please select valid url');
                    $("#showimage_img_question_url").attr("src",'');
                    $("#img_question_url").val('');
                    $("#img_add").val('');
                    
                }
            }
        });
        
    });
    //Options image

       $("#options_image").on('change','#img_option1_url',function(){
        var abc= $("#img_option1_url").val();
        var newimg ='../user/temp_upload_folder/image_option1.png';
        $.ajax({
            url: "../insertfiles/insertbasic.php",
            type: "POST",
           data:{abc:abc,newimg:newimg},
            success:function(data)
            {  if(data != 0)
                {  url ="temp_upload_folder/QPG"+data+".png";
                    $("#showimage_img_option1_url").attr("src",url);
                    $("#img_option1_url").val('');
                     $("#img_add_o1").val('QPG'+data+'.png');
                }
                else{
                    alert('please select valid url');
                    $("#showimage_img_option1_url").attr("src",'');
                    $("#img_option1_url").val('');
                     $("#img_add_o1").val('');
                }
            }

            });
        
        });

       $("#options_image").on('change','#img_option2_url',function(){
        var abc= $("#img_option2_url").val();
         var newimg ='../user/temp_upload_folder/image_option2.png';
           $.ajax({
            url: "../insertfiles/insertbasic.php",
            type: "POST",
             data:{abc:abc,newimg:newimg},
            success:function(data)
            {   if(data != 0)
                {  url ="temp_upload_folder/QPG"+data+".png";
                    $("#showimage_img_option2_url").attr("src",url);
                    $("#img_option2_url").val('');
                     $("#img_add_o2").val('QPG'+data+'.png');
                }
                else{
                    alert('please select valid url');
                    $("#showimage_img_option2_url").attr("src",'');
                    $("#img_option2_url").val('');
                     $("#img_add_o2").val('');
                }
            }

            });
        });

        $("#options_image").on('change','#img_option3_url',function(){
        var abc= $("#img_option3_url").val();
         var newimg ='../user/temp_upload_folder/image_option3.png';
          $.ajax({
            url: "../insertfiles/insertbasic.php",
            type: "POST",
            data:{abc:abc,newimg:newimg},
            success:function(data)
            {   if(data != 0)
                {  url ="temp_upload_folder/QPG"+data+".png";
                    $("#showimage_img_option3_url").attr("src",url);
                    $("#img_option3_url").val('');
                     $("#img_add_o3").val('QPG'+data+'.png');
                }
                else{
                    alert('please select valid url');
                    $("#showimage_img_option3_url").attr("src",'');
                    $("#img_option3_url").val('');
                     $("#img_add_o3").val('');
                }
            }

            });
        });

        $("#options_image").on('change','#img_option4_url',function(){
        var abc= $("#img_option4_url").val();
         var newimg ='../user/temp_upload_folder/image_option4.png';
         $.ajax({
            url: "../insertfiles/insertbasic.php",
            type: "POST",
            data:{abc:abc,newimg:newimg},
            success:function(data)
            {  if(data != 0)
                {  url ="temp_upload_folder/QPG"+data+".png";
                    $("#showimage_img_option4_url").attr("src",url);
                    $("#img_option4_url").val('');
                     $("#img_add_o4").val('QPG'+data+'.png');
                }
                else{
                    alert('please select valid url');
                    $("#showimage_img_option4_url").attr("src",'');
                    $("#img_option4_url").val('');
                     $("#img_add_o4").val('');
                }
            }

            });
       });        
    //quesiton hindi image
    $("#image_que_hin").on('change','#img_question_hin_url', function(){
        var abc= $("#img_question_hin_url").val();
         var newimg ='../user/temp_upload_folder/questionimage_hin.png';
         $.ajax({
            url: "../insertfiles/insertbasic.php",
            type: "POST",
             data:{abc:abc,newimg:newimg},
            success:function(data)
            {  if(data != 0)
                {  url ="temp_upload_folder/QPG"+data+".png";
                    $("#showimage_img_question_hin_url").attr("src",url);
                     $("#img_question_hin_url").val('');
                     $("#img_add_hin").val('QPG'+data+'.png');
                }
                else{
                    alert('please select valid url');
                    $("#showimage_img_question_hin_url").attr("src",'');
                    $("#img_question_hin_url").val('');
                     $("#img_add_hin").val('');
                }
            }

            });
    });
    //options image
    $("#options_image_hin").on('change','#img_option1_hin_url',function(){
        var abc= $("#img_option1_hin_url").val();
         var newimg ='../user/temp_upload_folder/image_option1_hin.png';
         $.ajax({
            url: "../insertfiles/insertbasic.php",
            type: "POST",
            data:{abc:abc,newimg:newimg},
            success:function(data)
            {  if(data != 0)
                {  url ="temp_upload_folder/QPG"+data+".png";
                    $("#showimage_img_option1_hin_url").attr("src",url);
                     $("#img_option1_hin_url").val('');
                     $('#img_add_hin_o1').val('QPG'+data+'.png');
                }
                else{
                    alert('please select valid url');
                    $("#showimage_img_option1_hin_url").attr("src",'');
                    $("#img_option1_hin_url").val('');
                    $('#img_add_hin_o1').val('');
                }
            }

            });
    }); 
    $("#options_image_hin").on('change','#img_option2_hin_url',function(){
        var abc= $("#img_option2_hin_url").val();
         var newimg ='../user/temp_upload_folder/image_option2_hin.png';
        $.ajax({
            url: "../insertfiles/insertbasic.php",
            type: "POST",
            data:{abc:abc,newimg:newimg},
            success:function(data)
            {   if(data != 0)
                {  url ="temp_upload_folder/QPG"+data+".png";
                    $("#showimage_img_option2_hin_url").attr("src",url);
                    $("#img_option2_hin_url").val('');
                    $('#img_add_hin_o2').val('QPG'+data+'.png');
                }
                else{
                    alert('please select valid url');
                    $("#showimage_img_option2_hin_url").attr("src",'');
                    $("#img_option2_hin_url").val('');
                    $('#img_add_hin_o2').val('');
                }
            }

            });
    });
    $("#options_image_hin").on('change','#img_option3_hin_url',function(){
        var abc= $("#img_option3_hin_url").val();
         var newimg ='../user/temp_upload_folder/image_option3_hin.png';
        $.ajax({
            url: "../insertfiles/insertbasic.php",
            type: "POST",
            data:{abc:abc,newimg:newimg},
            success:function(data)
            {   if(data != 0)
                {  url ="temp_upload_folder/QPG"+data+".png";
                    $("#showimage_img_option3_hin_url").attr("src",url);
                     $("#img_option3_hin_url").val('');
                      $('#img_add_hin_o3').val('QPG'+data+'.png');
                }
                else{
                    alert('please select valid url');
                    $("#showimage_img_option3_hin_url").attr("src",'');
                    $("#img_option3_hin_url").val('');
                     $('#img_add_hin_o3').val('');
                }
            }

        });
    });
    $("#options_image_hin").on('change','#img_option4_hin_url',function(){
        var abc= $("#img_option4_hin_url").val();
         var newimg ='../user/temp_upload_folder/image_option4_hin.png';

          $.ajax({
            url: "../insertfiles/insertbasic.php",
            type: "POST",
             data:{abc:abc,newimg:newimg},
            success:function(data)
            {   if(data != 0)
                {  url ="temp_upload_folder/QPG"+data+".png";
                    $("#showimage_img_option4_hin_url").attr("src",url);
                     $("#img_option4_hin_url").val('');
                      $('#img_add_hin_o3').val('QPG'+data+'.png');
                }
                else{
                    alert('please select valid url');
                    $("#showimage_img_option4_hin_url").attr("src",'');
                    $("#img_option4_hin_url").val('');
                     $('#img_add_hin_o3').val('');
                }
            }

            });
    });    
//image
    $("#image_que").on('change','#img_question',function(){
            var fd = new FormData();
            var files = $("#img_question")[0].files[0];
            fd.append("img_question",files);
            $.ajax({
                url: "../insertfiles/insertbasic.php",
                type: "POST",
                data: fd,
                dataType:"JSON",
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.filename != 0){ 
                       $("#showimage_img_question_url").attr("src",data.filename);
                       $("#img_add").val(data.imagename);
                    }
                    else{                               
                        alert("file not uploaded");
                        fd.append("img_question","");
                       $("#showimage_img_question_url").attr("src","");
                         $("#img_question_url").val('');
                          $("#img_add").val('');

                    }
                }
            });
    });
//image_hin
$("#image_que_hin").on('change','#img_question_hin',function(){
            var fd = new FormData();
            var files = $("#img_question_hin")[0].files[0];
            fd.append("img_question_hin",files);
            $.ajax({
                url: "../insertfiles/insertbasic.php",
                type: "POST",
                data: fd,
                dataType:"JSON",
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.filename != 0){ 
                       $("#showimage_img_question_hin_url").attr("src",data.filename);
                       $("#img_add_hin").val(data.imagename);
                    }
                    else{                               
                        alert("file not uploaded");
                        fd.append("img_question_hin","");
                       $("#showimage_img_question_hin_url").attr("src","");
                         $("#img_question_hin_url").val('');
                         $("#img_add_hin").val("");
                    }
                }
            });
    });
//option 1
$("#options_image").on('change','#img_option_1',function(){
            var fd = new FormData();
            var files = $("#img_option_1")[0].files[0];
            fd.append("img_option_1",files);
            $.ajax({
                url: "../insertfiles/insertbasic.php",
                type: "POST",
                data: fd,
                dataType:"JSON",
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.filename != 0){ 
                       $("#showimage_img_option1_url").attr("src",data.filename);
                       $("#img_add_o1").val(data.imagename);
                    }
                    else{                               
                        alert("file not uploaded");
                        fd.append("img_option_1","");
                       $("#showimage_img_option1_url").attr("src","");
                         $("#img_option1_url").val('');
                         $("#img_add_o1").val('');
                    }
                }
            });
    });
//option 2
$("#options_image").on('change','#img_option_2',function(){
            var fd = new FormData();
            var files = $("#img_option_2")[0].files[0];
            fd.append("img_option_2",files);
            $.ajax({
                url: "../insertfiles/insertbasic.php",
                type: "POST",
                data: fd,
                dataType:"JSON",
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.filename != 0){ 
                       $("#showimage_img_option2_url").attr("src",data.filename);
                       $("#img_add_o2").val(data.imagename);
                    }
                    else{                               
                        alert("file not uploaded");
                        fd.append("img_option_2","");
                       $("#showimage_img_option2_url").attr("src","");
                         $("#img_option2_url").val('');
                          $("#img_add_o2").val('');

                    }
                }
            });
    });
//option 3
$("#options_image").on('change','#img_option_3',function(){
            var fd = new FormData();
            var files = $("#img_option_3")[0].files[0];
            fd.append("img_option_3",files);
            $.ajax({
                url: "../insertfiles/insertbasic.php",
                type: "POST",
                data: fd,
                dataType:"JSON",
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.filename != 0){ 
                       $("#showimage_img_option3_url").attr("src",data.filename);
                       $("#img_add_o3").val(data.imagename);
                    }
                    else{                               
                        alert("file not uploaded");
                        fd.append("img_option_3","");
                       $("#showimage_img_option3_url").attr("src","");
                         $("#img_option3_url").val('');
                          $("#img_add_o3").val('');
                    }
                }
            });
    });
//option 4
$("#options_image").on('change','#img_option_4',function(){
            var fd = new FormData();
            var files = $("#img_option_4")[0].files[0];
            fd.append("img_option_4",files);
            $.ajax({
                url: "../insertfiles/insertbasic.php",
                type: "POST",
                data: fd,
                dataType:"JSON",
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.filename != 0){ 
                       $("#showimage_img_option4_url").attr("src",data.filename);
                       $("#img_add_o4").val(data.imagename);
                    }
                    else{                               
                        alert("file not uploaded");
                        fd.append("img_option_4","");
                       $("#showimage_img_option4_url").attr("src","");
                         $("#img_option4_url").val('');
                         $("#img_add_o4").val('');
                    }
                }
            });
    });
//option hin 1
$("#options_image_hin").on('change','#img_option_1_hin',function(){
            var fd = new FormData();
            var files = $("#img_option_1_hin")[0].files[0];
            fd.append("img_option_1_hin",files);
            $.ajax({
                url: "../insertfiles/insertbasic.php",
                type: "POST",
                data: fd,
                dataType:"JSON",
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.filename != 0){ 
                       $("#showimage_img_option1_hin_url").attr("src",data.filename);
                       $("#img_add_hin_o1").val(data.imagename);
                    }
                    else{                               
                        alert("file not uploaded");
                        fd.append("img_option_1_hin","");
                       $("#showimage_img_option1_hin_url").attr("src","");
                         $("#img_option1_hin_url").val('');
                           $("#img_add_hin_o1").val('');
                    }
                }
            });
    });
//option hin 2
$("#options_image_hin").on('change','#img_option_2_hin',function(){
            var fd = new FormData();
            var files = $("#img_option_2_hin")[0].files[0];
            fd.append("img_option_2_hin",files);
            $.ajax({
                url: "../insertfiles/insertbasic.php",
                type: "POST",
                data: fd,
                dataType:"JSON",
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.filename != 0){ 
                       $("#showimage_img_option2_hin_url").attr("src",data.filename);
                       $("#img_add_hin_o2").val(data.imagename);
                    }
                    else{                               
                        alert("file not uploaded");
                        fd.append("img_option_2_hin","");
                       $("#showimage_img_option2_hin_url").attr("src","");
                         $("#img_option2_hin_url").val('');
                           $("#img_add_hin_o2").val('');
                    }
                }
            });
    });
//option hin 3
$("#options_image_hin").on('change','#img_option_3_hin',function(){
            var fd = new FormData();
            var files = $("#img_option_3_hin")[0].files[0];
            fd.append("img_option_3_hin",files);
            $.ajax({
                url: "../insertfiles/insertbasic.php",
                type: "POST",
                data: fd,
                dataType:"JSON",
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.filename != 0){ 
                       $("#showimage_img_option3_hin_url").attr("src",data.filename);
                       $("#img_add_hin_o3").val(data.imagename);
                    }
                    else{                               
                        alert("file not uploaded");
                        fd.append("img_option_3_hin","");
                       $("#showimage_img_option3_hin_url").attr("src","");
                         $("#img_option3_hin_url").val('');
                           $("#img_add_hin_o3").val('');
                    }
                }
            });
    });
       
//option hin 4
$("#options_image_hin").on('change','#img_option_4_hin',function(){
            var fd = new FormData();
            var files = $("#img_option_4_hin")[0].files[0];
            fd.append("img_option_4_hin",files);
            $.ajax({
                url: "../insertfiles/insertbasic.php",
                type: "POST",
                data: fd,
                dataType:"JSON",
                contentType: false,
                processData: false,
                success: function(data){
                    if(data.filename != 0){ 
                       $("#showimage_img_option4_hin_url").attr("src",data.filename);
                       $("#img_add_hin_o4").val(data.imagename);
                    }
                    else{                               
                        alert("file not uploaded");
                        fd.append("img_option_4_hin","");
                       $("#showimage_img_option4_hin_url").attr("src","");
                         $("#img_option4_hin_url").val('');
                         $("#img_add_hin_o4").val('');
                    }
                }
            });
    });                       
});