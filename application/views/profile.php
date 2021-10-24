<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <title>Login page</title>
    <style type="text/css">

#we{
      position:relative;
    }
    #we video {
      height:100%;
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

.container{
  margin-right:500px;
}

.profile 
{
    min-height: 300px;
    width: 490px;
    display: inline-block;
    }
figcaption.ratings
{
    margin-top:20px;
    }
figcaption.ratings a
{
    color:#f1c40f;
    font-size:11px;
    }
figcaption.ratings a:hover
{
    color:#f39c12;
    text-decoration:none;
    }
.divider 
{
    border-top:1px solid rgba(0,0,0,0.1);
    }
.emphasis 
{
    border-top: 4px solid transparent;
    }
.emphasis:hover 
{
    border-top: 4px solid #1abc9c;
    }
.emphasis h2
{
    margin-bottom:0;
    }



    </style>
  </head>
  <body>

  <div id="we">
    <video loop muted autoplay post="">
      <source src="<?php echo base_url('bg/ink.mp4'); ?>"  type="video/mp4">
    </video>

    <div class="content">
      <div class="container">
      <div class="col-8 offset-2">

      <h1>User Profile:</h1>

<?php 
  if (isset($_SESSION['success'])){ ?>
    <div class="alert alert-success"> <?php echo $_SESSION['success']; ?></div>
<?php
  }
?>
 
 <h2>Welcome,<?php echo $_SESSION['username'];?></h2>
 <br><br>
 <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
 
   <div class="well profile">
      <div class="col-sm-12">
          <div class="col-xs-12 col-sm-8">
              <h2><?php echo $_SESSION['username'];?></h2>
              <p><strong>Email: </strong> <?php echo $user_email?></p>

          </div>             
          
      </div>            
      <div class="col-xs-12 divider text-center">
          <div class="col-xs-12 col-sm-4 emphasis">
              <h2><strong> 622 </strong></h2>                    
              <p><small>Followers</small></p>
              <form action="<?php echo base_url("comments/comments"); ?>">
              <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Comments </button>
              </form>
          </div>
          <div class="col-xs-12 col-sm-4 emphasis">
              <h2><strong>245</strong></h2>                    
              <p><small>Following</small></p>
              <form action="<?php echo base_url("user/update"); ?>">
                  <input type='hidden' name='user_name' value='<?= $_SESSION['username']; ?>'>
                  <button class="btn btn-info btn-block"><span class="fa fa-user"></span> Update </button>
              </form>
          </div>
          
          </div>
               
  </div>
</div>
</div>

 <br><br>
 <h3><a href="<?php echo base_url(); ?>account/logout">Logout</a></h3>


</div>
      

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