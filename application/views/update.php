<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>email update</title>
  </head>
  <body>
  <div class="container">

    <div class="col-8 offset-2">

      <h1>User Email update:</h1>

    </div>
      

    <div class='msg'></div>
    
    <?php // echo form_open('User/update'); ?>
        <div class="form-group">
          <label for="n_email" >New email:</label>
          <input class="form-control" name="n_email" id="n_email" type="n_email" >
        </div>


        <div class="text-center">
          <button class="btn btn-primary email_submit" name="submit">Submit</button>
        </div>

        <!-- </form> -->

        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script> 

  <script>
    $('.email_submit').click(function(){
     
      var email = $('#n_email').val()
      $.ajax({
            type:'POST',
            url:'e_update',
            data:{  
               email :email,
            },
            dataType:'text',
            success: function(resultData) {
                var result = JSON.parse(resultData);
                console.log(result);
                $('.msg').html(result);
               
            },
            error: function (request, status, error) {
                if(request.responseText == '') {
                    alert('fail to update email');
                }
                return false;
            }
        });
    });
    
  </script>

  </body>
</html>

