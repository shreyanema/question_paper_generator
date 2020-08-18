<!DOCTYPE html>
<html>
<head>
	<title>Question Paper Generator</title>
	
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--Semantic UI-->
    <link rel="stylesheet" type="text/css" href="dependencies/semantic/dist/semantic.min.css" />
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="dependencies/bootstrap/dist/css/bootstrap.min.css" />
    
      <link rel="stylesheet" href="dependencies/fontawesome/css/all.min.css">

    <style type="text/css">
		
	    body > .grid {
	      height: 100%;
	     }
	    .image {
	      margin-top: -100px;
	    }
	    .column {
	      max-width: 450px;
	    }
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background: teal">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <p align="center"><h1 class="navbar-brand text-white ">Question Paper Generator</h1></p>
                    </li>
                    
                </ul>              
</nav>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui image header">
      <div class="content" style="color: teal;" >
        Log-in to your account
      </div>
    </h2>
    <form id="login_qpg" method="POST" action="login_action.php" class="ui large form">
      <div class="ui stacked secondary  segment">
        <div class="field">
         
            <input type="email" name="email" placeholder="E-mail address" required="">
          
        </div>
        <div class="field">
          
         
             <input type="password" name="password" placeholder="Password" required="">
         
        </div>
        <button class="ui fluid large teal submit button" id="login_btn">Login</button>
      </div>

   

    </form>
   <div class="ui error message" id="login_error" style="display: none;"></div>
    
  </div>
</div>
<script src="dependencies/jquery/jquery.min.js"></script>
<script src="action.js"></script>
  
</body>
</html>