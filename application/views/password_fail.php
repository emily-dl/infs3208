<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login page</title>
    <style>
    #we{
      position:relative;
    }
    #we video {
      height:100vh;
      width: 100%;
      background-position: absolute;
      z-index:10;
      object-fit:cover;}

    #we .content{
      height:100%;
      width: 100%;
      z-index:20;
      position:absolute;
      top:0;
      left:0;
    }
    
    </style>
  </head>
  <body>

  <div id="we">
    <video loop muted autoplay post="">
      <source src="<?php echo base_url('bg/waterfall.mp4'); ?>"  type="video/mp4">
    </video>

    <div class="content">
      <div class="container">
      <div class="col-8 offset-2">

      <br/><h1>Fail to update!</h1>
      <p>Fail to update the password due to the wrong password input. Your password must be at least 8 characters. 
      You also need to make sure that your re-type password is the same as your password. 
      Please go back to check again!</p>
      

      </div>
      </div>
    </div>
    
  </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
  
  </body>
</html>