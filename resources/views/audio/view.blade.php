@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">

                                <form class="form-inline my-2 my-lg-0" method="GET" action="{{ URL::to('/siswa') }}">
                                    <input name="cari" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" >
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>

                                <br>

                                <h3 class="panel-title">List Audio Belajar</h3>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>  Tambah Audio Belajar  </button>
                                </div> 
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>KATEGORI</th>
                                            <th>DESKRIPSI</th>
                                            <th>AUDIO</th>
                                            <th>DOWNLOAD</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                            @foreach($file as $key=>$data)
                                            <tr>
                                                <td><a href="{{ URL::to('/audio/'.$data->id) }}">{{$data->nama}}</a></td>
                                                <td>{{$data->kategori}}</td>
                                                <td>{{$data->deskripsi}}</td>
                                                <td><iframe src="{{url('storage/audio/'.$data->audio)}}" style="width: 50px; height: 50px;"></iframe></td>
                                                <td> <a href="{{ URL::to('/audio/download/'.$data->audio) }}">Download</a> </td>
                                                <td>
                                                    <a href="{{ URL::to('/audio/'.$data->id) }}" class="btn btn-primary btn-sm">Show</a>
                                                    <a href="{{ URL::to('/audio/'.$data->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="{{ URL::to('/audio/'.$data->id.'/delete') }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Audio Belajar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">

                    <form action="{{ URL::to('/audio/create') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Audio</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Audio">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Kategori Audio</label>
                            <select name="kategori" class="form-control" id="exampleFormControlSelect1">
                                <option value="Matematika dasar">Matematika dasar</option>
                                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                <option value="Agama Islam">Agama Islam</option>
                                <option value="Pendidikan Pancasila">Pendidikan Pancasila</option>
                                <option value="Seni Budaya">Seni Budaya</option>
                                <option value="Pendidikan Jasmani">Pendidikan Jasmani</option>
                                <option value="Ilmu Pengetahuan Alam">Ilmu Pengetahuan Alam</option>
                                <option value="Ilmu Pengetahuan Sosial">Ilmu Pengetahuan Sosial</option>
                                <option value="Ketrampilan">Ketrampilan</option>
                                <option value="Tematik">Tematik</option>
                                <option value="Muatan Lokal">Muatan Lokal</option>
                                <option value="Bimbingan Konseling">Bimbingan Konseling</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deskripsi"></textarea>
                        </div>

                        
                        <!-- <div class="form-group"> -->

                        <!-- <div class="form-group{{$errors->has('audio') ? 'has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Audio</label>
                            <input type="file" name="audio" class="form-control">
                            @if($errors->has('audio'))
                                <span class="help-block">{{$errors->first('audio')}}</span>
                            @endif
                        </div> -->

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Audio</label>
                            <input type="file" name="audio" class="form-control">
                        </div>
                        

                    </div>
                    <div class="modal-footer">

                        <div class="progress">
                                <div class="bar"></div >
                                <div class="percent" >0%</div >  
                                <div></div>
                        </div>
                        
                        <!-- https://www.eplusgo.com/mengatur-tata-letak-gambar-dengan-css/ -->

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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










