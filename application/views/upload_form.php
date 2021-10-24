<!DOCTYPE html>  
 <html>  
 <head>  
      <title>Video sharing | <?php echo $title; ?></title>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
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
 <!-- Display Message -->

 <div id="we">
    <video loop muted autoplay post="">
      <source src="<?php echo base_url('bg/bwalk.mp4'); ?>"  type="video/mp4">
    </video>

    <div class="content">
      <div class="container">
      <div class="col-12 offset-4">
 <br/> <h1>Video Upload:</h1><br/>
 <b><?php if(isset($filenames)) echo "Video(s) have been uploaded successfully"; ?></b>
    
    <!-- Form -->
    <form method='post' action='<?php echo base_url(); ?>upload' enctype='multipart/form-data'>

      <input type='file' name='files[]' multiple > <br/><br/>
      <input type='submit' value='Upload' name='upload' />
    </form>
</div>
      </div>
    </div>
    
  </div>

 
 </body>  
 </html>  
 
 