<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="try.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
    <title>Document</title>
</head>
<body style="background-color:#424242;">
<nav class="nav-wrapper valign-wrapper" style="height:13vh;background-color: #181818;">
    
<div class="row center-align " style="color:white;font-size:3rem;">
        overWrite
</div>
    
    
</nav>
<div class="row" style="position:relative;top:5vh;">
  <div class="col s12 l4 offset-l4" style="text-align:center">
    <div class="card  ">
      <div class="card-content">
        <h4 class="card-title center-align" style="color:black">Login</h4>
        <form id="forms">
       
          <div class="row">
            <div class="input-field col s11">
              <i class="material-icons prefix ">email</i>
              <input type="email" id="email" name="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s11">
              <i class="material-icons prefix">vpn_key</i>
              <input type="password" id="password" name="password" class="validate valid">
              <label for="password" class="active">Password</label>
            </div>
          </div>
          <div class="row center-align">
          <input type="button" value="Login" id="login" style=" width:30%; height:40px;background-color:black;color:white;cursor:pointer;">
            
          </div>
          <p class="center-align red-text" style="font-weight:normal;" id="logcomment"></p>
         
         
        </form>

      </div>
      
      
    </div>
    <a href="signin.php" class=" black-text  " style="font-weight:bolder;">Create new account</a>
    

    
    </div>
  </div>

   
   
<script src="login.js"></script>



</body></html>