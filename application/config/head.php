   
      <!DOCTYPE html>
<html>
<head>
	<title>Video Sharing</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="http://192.168.64.3/project/">Video Sharing Platform</a>
  <!--drop down bar for smaller screen-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!--mx-auto push all to the middle-->
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("account/login"); ?>">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("account/register"); ?>">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("upload"); ?>">Upload</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("user/profile"); ?>">Profile</a>
      </li>
    </ul>

    <?php echo form_open('Search/search_name', array('class' => 'form-inline search_form')); ?>
      <input class="form-control mr-sm-3" type="search" name='search' placeholder="Search Video" aria-label="Search">
      <button class="btn btn-light my-sm-1" type="submit">Search</button>
    </form>
  </div>
</nav>

</body>
</html>


<script>

</script>

</body>
</html>