@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Data Video Pelajaran</h3>
                        </div>
                        <div class="panel-body">

                        <form action="{{ URL::to('/video/'.$video->id.'/update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul" value="{{$video->nama}}">
                        </div>

                         <div class="form-group">
                            <label for="exampleFormControlSelect1">Tingkat</label>
                            <select name="nama_tingkat" class="form-control" id="exampleFormControlSelect1">
                                <option value="TK" @if($video->nama_tingkat == 'TK') selected @endif>TK</option>
                                <option value="SD" @if($video->nama_tingkat == 'SD') selected @endif>SD</option>
                                <option value="SMP" @if($video->nama_tingkat == 'SMP') selected @endif>SMP</option>
                                <option value="SMA" @if($video->nama_tingkat == 'SMA') selected @endif>SMA</option>
                                <option value="UMUM" @if($video->nama_tingkat == 'UMUM') selected @endif>UMUM</option>
                               
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Mata Pelajaran</label>
                            <select name="nama_mapel" class="form-control" id="exampleFormControlSelect1">
                                <option value="Matematika dasar" @if($video->nama_mapel == 'Matematika dasar') selected @endif>Matematika dasar</option>
                                <option value="Bahasa Indonesia" @if($video->nama_mapel == 'Bahasa Indonesia') selected @endif>Bahasa Indonesia</option>
                                <option value="Agama Islam" @if($video->nama_mapel == 'Agama Islam') selected @endif>Agama Islam</option>
                                <option value="Pendidikan Pancasila" @if($video->nama_mapel == 'Pendidikan Pancasila') selected @endif>Pendidikan Pancasila</option>
                                <option value="Seni Budaya" @if($video->nama_mapel == 'Seni Budaya') selected @endif>Seni Budaya</option>
                                <option value="Pendidikan Jasmani" @if($video->nama_mapel == 'Pendidikan Jasmani') selected @endif>Pendidikan Jasmani</option>
                                <option value="Ilmu Pengetahuan Alam" @if($video->nama_mapel == 'Ilmu Pengetahuan Alam') selected @endif>Ilmu Pengetahuan Alam</option>
                                <option value="Ilmu Pengetahuan Sosial" @if($video->nama_mapel == 'Ilmu Pengetahuan Sosial') selected @endif>Ilmu Pengetahuan Sosial</option>
                                <option value="Ketrampilan" @if($video->nama_mapel == 'Ketrampilan') selected @endif>Ketrampilan</option>
                                <option value="Tematik" @if($video->nama_mapel == 'Tematik') selected @endif>Tematik</option>
                                <option value="Muatan Lokal" @if($video->nama_mapel == 'Muatan Lokal') selected @endif>Muatan Lokal</option>
                                <option value="Bimbingan Konseling" @if($video->nama_mapel == 'Bimbingan Konseling') selected @endif>Bimbingan Konseling</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi">{{$video->deskripsi}}</textarea>
                        </div>

                   
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Video</label>
                            <input type="file" name="video" class="form-control" value="{{$video->video}}" >
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
                window.location.href = "/laravel-crud/public/video";
           
           
        }
    });
     
    })();
</script>



@stop



