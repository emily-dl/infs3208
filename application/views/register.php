<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Register page</title>
    <style>
    #hero{
      position:relative;
    }
    #hero video {
      height:100vh;
      width: 100%;
      background-position: absolute;
      z-index:10;
      object-fit:cover;}

    #hero .content{
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

  <div id="hero">
    <video loop muted autoplay post="">
      <source src="<?php echo base_url('bg/cloud.mp4'); ?>"  type="video/mp4">
    </video>

    <div class="content">
      <div class="container">
      <div class="col-8 offset-2">

      <br/><h1>Create Account:</h1>
      <p>Please fill up the following details to create your user account.</p>
      <?php 
        if (isset($_SESSION['success'])){ ?>
          <div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
      <?php
        }
      ?>

<?php echo validation_errors('<div class="alert alert-danger">','</div>');?>

      <form action="" method="POST">
        <div class="form-group">
          <label for="username" >Username:</label>
          <input class="form-control" name="username"  value="<?php echo set_value('username'); ?>" id="username" type="text" >
        </div>

        <div class="form-group">
          <label for="email" >Email:</label>
          <input class="form-control" name="email"  value="<?php echo set_value('email'); ?>" id="email" type="text">
        </div>

        <div class="form-group">
          <label for="password" >Password:</label>
          <input class="form-control" name="password"  value="<?php echo set_value('password'); ?>" id="password" type="password">
        </div>

        <div class="form-group">
          <label for="password" >Re-enter Password:</label>
          <input class="form-control" name="password2"  value="<?php echo set_value('password2'); ?>" id="password" type="password">
        </div>
<!-- 
        <div class="form-group">
            <?php echo $captcha; ?>
        </div> -->

        <div class="text-center">
          <button class="btn btn-primary" name="register">Submit</button>
        </div>

        </form>


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