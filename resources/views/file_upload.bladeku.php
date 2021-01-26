
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - File Upload with Progressbar using Ajax jQuery</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="http://malsup.github.com/jquery.form.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Laravel 5.8 - File Upload with Progressbar using Ajax jQuery</h3>
     <br />
     <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">File Upload with Progressbar using Ajax jQuery</h3>
                </div>
                <div class="panel-body">
                    <br />
                    <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                            <div class="col-md-3" align="right"><h4>Select Image</h4></div>
                            <div class="col-md-6">
                              <input type="file" name="file" id="file" />
                            </div>
                            <div class="col-md-3">
                              <input type="submit" name="upload" value="Upload" class="btn btn-success" />
                            </div>
                        </div>
                    </form>
                    <br />
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow=""
                      aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        0%
                      </div>
                    </div>
                    <br />
                    <div id="success">

                    </div>
                    <br />
                </div>
            </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

    $('form').ajaxForm({
      beforeSend:function(){
        $('#success').empty();
      },
      uploadProgress:function(event, position, total, percentComplete)
      {
        $('.progress-bar').text(percentComplete + '%');
        $('.progress-bar').css('width', percentComplete + '%');
      },
      success:function(data)
      {
        if(data.errors)
        {
          $('.progress-bar').text('0%');
          $('.progress-bar').css('width', '0%');
          $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
        }
        if(data.success)
        {
          $('.progress-bar').text('Uploaded');
          $('.progress-bar').css('width', '100%');
          $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
          $('#success').append(data.image);
        }
      }
    });

});
</script>