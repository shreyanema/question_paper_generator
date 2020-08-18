  $(document).ready(function() {
    $('#login_qpg').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: 'login_action.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        console.log(data);
        if(data =='2')
        {
          $("#login_error").html('Invalid username and password');
          $("#login_error").css('display','block');
        }
        else if(data =="master")
        {
          window.location.href ="admin/admin_dashboard.php"
        }
        else if (data =="user")
        {
           window.location.href ="user/user_dashboard.php"
        }
        else{
          console.log("session not set");
        }
        }
      });
     
      });
  });