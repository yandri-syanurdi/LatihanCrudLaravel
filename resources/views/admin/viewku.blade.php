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

                                <h3 class="panel-title">List Data Admin</h3>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>  Tambah Data Admin  </button>
                                </div> 
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Whatsapp</th>
                                            <th>Instagram</th>
                                            <th>Facebook</th>
                                            <th>Alamat</th>
                                            <th>Profile</th>
                                            <th>Download</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                            @foreach($file as $key=>$data)
                                            <tr>
                                              <td><a href="{{ URL::to('/siswa/'.$data->id.'/profile') }}">{{$data->nama}}</a></td>
                                                <td><a href="{{ URL::to('/myadmin/'.$data->id) }}">{{$data->nama}}</a></td>
                                                <td>{{$data->telepon}}</td>
                                                <td>{{$data->whatsapp}}</td>
                                                <td>{{$data->instagram}}</td>
                                                <td>{{$data->facebook}}</td>
                                                <td>{{$data->alamat}}</td>
                                           
                                                <td> <img src="{{url('storage/admin/'.$data->profile)}}" height="45px;" width="50px;">  </td>
                                                <td> <a href="{{ URL::to('/myadmin/download/'.$data->profile) }}">Download</a> </td>
                                                <td>
                                                    <a href="{{ URL::to('/myadmin/'.$data->id) }}" class="btn btn-primary btn-sm">Show</a>
                                                    <a href="{{ URL::to('/myadmin/'.$data->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="{{ URL::to('/myadmin/'.$data->id.'/delete') }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">

                    <form action="{{ URL::to('/myadmin/create') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Admin</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Admin">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Telepon</label>
                            <input name="telepon" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Telepon">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Whatsapp Admin</label>
                            <input name="whatsapp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Whatsapp Admin">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Instagram Admin</label>
                            <input name="instagram" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Instagram Admin">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook Admin</label>
                            <input name="facebook" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Facebook Admin">
                        </div>

                        

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat"></textarea>
                        </div>

                        
                        <!-- <div class="form-group"> -->
                        <div class="form-group{{$errors->has('profile') ? 'has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Profile</label>
                            <input type="file" name="profile" class="form-control">
                            @if($errors->has('profile'))
                                <span class="help-block">{{$errors->first('profile')}}</span>
                            @endif
                        </div>
                        

                    </div>
                    <div class="modal-footer">

                        <div class="progress">
                                <div class="bar"></div >
                                <div class="percent" >0%</div >  
                                <div></div>
                        </div>

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
        if (!form.profile.value) {
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
            var posterValue = $('input[name=profile]').fieldValue();
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
                window.location.href = "/laravel-crud/public/myadmin";
           
           
        }
    });
     
    })();
</script>



@stop










