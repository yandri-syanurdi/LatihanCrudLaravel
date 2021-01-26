<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5.6 - File upload with progress bar - ItSolutionStuff.com</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <style>

        .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }

        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }

        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}

    </style>

</head>

<body>

 

<div class="container">

    <div class="card">

      <div class="card-header">

        <h2>Laravel 5.6 - File upload with progress bar - ItSolutionStuff.com</h2>

      </div>

      <div class="card-body">

            <form method="POST" action="{{ route('fileUploadPost') }}" enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <input name="file" id="poster" type="file" class="form-control"><br/>

                    <div class="progress">

                        <div class="bar"></div >

                        <div class="percent">0%</div >

                    </div>

                    <input type="submit"  value="Submit" class="btn btn-success">

                </div>

            </form>    

      </div>

    </div>

</div>

 

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>

<script src="http://malsup.github.com/jquery.form.js"></script>

 

<script type="text/javascript">

 

    function validate(formData, jqForm, options) {

        var form = jqForm[0];

        if (!form.file.value) {

            alert('File not found');

            return false;

        }

    }

 

    (function() {

 

    var bar = $('.bar');

    var percent = $('.percent');

    var status = $('#status');

 

    $('form').ajaxForm({

        beforeSubmit: validate,

        beforeSend: function() {

            status.empty();

            var percentVal = '0%';

            var posterValue = $('input[name=file]').fieldValue();

            bar.width(percentVal)

            percent.html(percentVal);

        },

        uploadProgress: function(event, position, total, percentComplete) {

            var percentVal = percentComplete + '%';

            bar.width(percentVal)

            percent.html(percentVal);

        },

        success: function() {

            var percentVal = 'Wait, Saving';

            bar.width(percentVal)

            percent.html(percentVal);

        },

        complete: function(xhr) {

            status.html(xhr.responseText);

            alert('Uploaded Successfully');

            window.location.href = "/laravel-crud/public/file-upload";

        }

    });

     

    })();

</script>

</body>

</html>