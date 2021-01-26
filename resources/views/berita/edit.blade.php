@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Data Berita</h3>
                        </div>
                        <div class="panel-body">

                        <form action="{{ URL::to('/berita/'.$berita->id.'/update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul Berita</label>
                            <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Berita" value="{{$berita->judul}}">
                        </div>

                         <div class="form-group">
                          <label for="exampleFormControlSelect1" >Tanggal</label>
                          <div class="row"> 
                          <div class="form-group">
                           
                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Day</label>
                                        {!!Form::selectrange('day',1,31,date('d',strtotime($berita->tanggal)),['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Month</label>
                                         {!!Form::selectMonth('month',date('m',strtotime($berita->tanggal)),['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                       <label>Year</label>
                                       {!!Form::selectYear('year',1970,date('Y-d-m'),date('Y',strtotime($berita->tanggal)),['class'=>'form-control'])!!}
                                </div>
                        </div>
                        </div>
                        </div>
                        
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tempat</label>
                            <input name="tempat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat" value="{{$berita->tempat}}">
                        </div>

                      
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi">{{$berita->deskripsi}}</textarea>
                        </div>

                   
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Video</label>
                            <input type="file" name="video" class="form-control" value="{{$berita->video}}" >
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
        if (!form.video.value) {
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
            var posterValue = $('input[name=video]').fieldValue();
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
                window.location.href = "/laravel-crud/public/berita";
           
           
        }
    });
     
    })();
</script>



@stop





