<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Video Sharing Platform</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<style>

</style>
<body>


<?php 
    $video_output = "";
    foreach($videos as $video){

      $video_name = $video->filename;
      $video_id = $video->id;
      $video_output .= 
      '<div alignment="center" class="embed-responsive embed-responsive-16by9">
          <video autoplay loop class="embed-responsive-item">
              <source video_id="'.$video_id.'" src="'.base_url().'uploads/'.$video_name.'" type="video/mp4">
          </video>
          <div class="text" >
            <br/><br/><h4 alignment="center">'.$video_name.'</h4>
          </div>
      </div>';
    }

    echo $video_output;
?>

<a link href='https://www.youtube.com'>Youtube</a>



<script>
window.onbeforeunload = function () {
    var scrollPos;
    if (typeof window.pageYOffset != 'undefined') {
        scrollPos = window.pageYOffset;
    }
    else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') {
        scrollPos = document.documentElement.scrollTop;
    }
    else if (typeof document.body != 'undefined') {
        scrollPos = document.body.scrollTop;
    }
    document.cookie = "scrollTop=" + scrollPos; //store the position to cookie
}
 
window.onload = function () {
    if (document.cookie.match(/scrollTop=([^;]+)(;|$)/) != null) {
        var arr = document.cookie.match(/scrollTop=([^;]+)(;|$)/); //if cookie is not null read the position
        document.documentElement.scrollTop = parseInt(arr[1]);
        document.body.scrollTop = parseInt(arr[1]);
    }

</script>

</body>
</html>