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

      <br/><h1>User login:</h1>
      <p>Please enter your username and password.</p>
      <?php 
        if (isset($_SESSION['error'])){ ?>
          <div class="alert alert-danger"> <?php echo $_SESSION['error']; }
          
          // check if the cookie is set, if yes, set the type 1, if not, set the type 2
          if (isset($_COOKIE['username'])){
            $type = 1;
          }
          else{
            $type = 2;
          }
          
      ?>
      

<?php echo validation_errors('<div class="alert alert-danger">','</div>');?>

      <?php echo form_open('Account/login'); ?>
          <input type="hidden" value="<?php echo $type?>" name="logintype"/>
        <div class="form-group">
          <label for="username" >Username:</label>
          <input class="form-control" name="username" id="username" type="text" value="<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username'];?>">
        </div>


        <div class="form-group">
          <label for="password" >Password:</label>
          <input class="form-control" name="password" id="password" type="password" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password'];?>">

 
          <br/>
        <div class="text-left">
          <input type="checkbox" id="remember" name="remember">
          <label for="remember_me"> Remember me</label><br>
        </div>

        <div class="text-right">
          <a href="<?php echo base_url("account/username_check"); ?>" >Forget password?</a>
        </div>

        <div class="text-center">
          <button class="btn btn-primary" name="login" type="submit">Login</button>
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