@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inputs Audio</h3>
                        </div>
                        <div class="panel-body">

                        <form action="{{ URL::to('/audio/'.$audio->id.'/update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Audio</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Audio" value="{{$audio->nama}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Kategori</label>
                            <select name="kategori" class="form-control" id="exampleFormControlSelect1">
                                <option value="Matematika dasar" @if($audio->kategori == 'Matematika dasar') selected @endif>Matematika dasar</option>
                                <option value="Bahasa Indonesia" @if($audio->kategori == 'Bahasa Indonesia') selected @endif>Bahasa Indonesia</option>
                                <option value="Agama Islam" @if($audio->kategori == 'Agama Islam') selected @endif>Agama Islam</option>
                                <option value="Pendidikan Pancasila" @if($audio->kategori == 'Pendidikan Pancasila') selected @endif>Pendidikan Pancasila</option>
                                <option value="Seni Budaya" @if($audio->kategori == 'Seni Budaya') selected @endif>Seni Budaya</option>
                                <option value="Pendidikan Jasmani" @if($audio->kategori == 'Pendidikan Jasmani') selected @endif>Pendidikan Jasmani</option>
                                <option value="Ilmu Pengetahuan Alam" @if($audio->kategori == 'Ilmu Pengetahuan Alam') selected @endif>Ilmu Pengetahuan Alam</option>
                                <option value="Ilmu Pengetahuan Sosial" @if($audio->kategori == 'Ilmu Pengetahuan Sosial') selected @endif>Ilmu Pengetahuan Sosial</option>
                                <option value="Ketrampilan" @if($audio->kategori == 'Ketrampilan') selected @endif>Ketrampilan</option>
                                <option value="Tematik" @if($audio->kategori == 'Tematik') selected @endif>Tematik</option>
                                <option value="Muatan Lokal" @if($audio->kategori == 'Muatan Lokal') selected @endif>Muatan Lokal</option>
                                <option value="Bimbingan Konseling" @if($audio->kategori == 'Bimbingan Konseling') selected @endif>Bimbingan Konseling</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi">{{$audio->deskripsi}}</textarea>
                        </div>

                   
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Audio</label>
                            <input type="file" name="audio" class="form-control" value="{{$audio->audio}}" >
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
        if (!form.audio.value) {
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
            var posterValue = $('input[name=audio]').fieldValue();
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
                window.location.href = "/laravel-crud/public/video";
           
           
        }
    });
     
    })();
</script>



@stop





