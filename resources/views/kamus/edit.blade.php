@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Data Kamus</h3>
                        </div>
                        <div class="panel-body">

                        <form action="{{ URL::to('/kamus/'.$kamus->id.'/update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bahasa Indonesia</label>
                            <input name="b_indonesia" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bahasa Indonesia" value="{{$kamus->b_indonesia}}">
                        </div>



                        <div class="form-group">
                            <label for="exampleInputEmail1">Bahasa Inggris</label>
                            <input name="b_inggris" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bahasa Inggris" value="{{$kamus->b_inggris}}">
                        </div>

                         

        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Video</label>
                            <input type="file" name="video_isyarat" class="form-control" value="{{$kamus->video_isyarat}}" >
                        </div>


                        <div class="progress">
                                <div class="bar"></div >
                                <div class="percent" >0%</div >  
                                <div></div>
                        </div>

                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                    
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop




@section('footer')


<script type="text/javascript">
 
    function validate(formData, jqForm, options) {
        var form = jqForm[0];
        if (!form.video_isyarat.value) {
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
            var posterValue = $('input[name=video_isyarat]').fieldValue();
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%' ;
            console.log("total " + total);
            console.log("position " + position );
            console.log("percentComplete" + percentComplete);
            console.log("event " + event);
            console.log("percentVal " + percentVal);
            bar.width(percentVal)
            percent.html(percentVal);
        },
        success: function(event, position, total, percentComplete) {
            
                var percentVal = 'Wait, Saving';
                bar.width(percentVal)
                percent.html(percentVal);
           
           
        },
        complete: function(xhr,event, position, total, percentComplete) {
                
                status.html(xhr.responseText);
                alert('Uploaded Successfully');
                window.location.href = "/laravel-crud/public/kamus";
           
           
        }
    });
     
    })();
</script>



@stop







