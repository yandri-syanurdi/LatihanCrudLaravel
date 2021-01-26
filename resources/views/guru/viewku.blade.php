@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">

                                <!-- <form class="form-inline my-2 my-lg-0" method="GET" action="{{ URL::to('/siswa') }}">
                                    <input name="cari" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" >
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>

                                <br> -->


                                <form class="form-inline my-2 my-lg-0" method="GET" action="{{ URL::to('/guru') }}">
                                    <input name="cari" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" onchange="this.form.submit();" >
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onchange="this.form.submit();">Search</button>
                                </form>


                                  <br>
                                <form class="form-inline my-2 my-lg-0" method="GET" action="{{ URL::to('/guru') }}">
                                    <label for="exampleFormControlSelect1">Show</label>
                                    <select name="entri" class="form-control" id="exampleFormControlSelect1" onchange="this.form.submit();">
                                        <!-- <option value="3" type="submit">3</option>
                                        <option value="5" type="submit">5</option>
                                        <option value="10" type="submit">10</option> -->

                                        <option value="5" @if($keluar == '5') selected @endif>5</option>
                                        <option value="10" @if($keluar == '10') selected @endif>10</option>
                                        <option value="50" @if($keluar == '50') selected @endif>50</option>

                                    </select>
                                    <label for="exampleFormControlSelect1">entries</label>
                                </form>

                                <!-- <br> -->

                                <br>

                                <h3 class="panel-title">List Data Guru</h3>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>  Tambah Data Guru  </button>
                                </div> 
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Telepon</th>
                                            <th>Suku</th>
                                            <th>Alamat</th>
                                            <th>Avatar</th>
                                            <th>Download</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                            @foreach($file as $key=>$data)
                                            <tr>
                                                <td><a href="{{ URL::to('/guru/'.$data->id) }}">{{$data->nama}} {{$data->nama_belakang}}</a></td>
                                                <td>{{$data->jenis_kelamin}}</td>
                                                <td>{{$data->agama}}</td>
                                                <td>{{$data->telpon}}</td>
                                                <td>{{$data->suku}}</td>
                                                <td>{{$data->alamat}}</td>
                                           
                                                <td> <img src="{{url('images/'.$data->avatar)}}" class="img-circle" height="45px;" width="50px;">  </td>
                                                <td> <a href="{{ URL::to('/guru/download/'.$data->avatar) }}">Download</a> </td>
                                                <td>
                                                    <a href="{{ URL::to('/guru/'.$data->id) }}" class="btn btn-primary btn-sm">Show</a>
                                                    <a href="{{ URL::to('/guru/'.$data->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="{{ URL::to('/guru/'.$data->id.'/delete') }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>

                                  {!! $file->links() !!}

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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">

                    <form action="{{ URL::to('/guru/create') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Depan</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                        </div>

                         <div class="form-group">
                            <label for="exampleInputEmail1">Nama Belakang</label>
                            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                            
                        </div>


                         <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                   
                                <option value="L" >Laki-Laki</option>
                                <option value="P" >Perempuan</option>
                            </select>        
                        </div>


                         <div class="form-group">
                          <label for="exampleFormControlSelect1" >Tanggal Lahir</label>
                          <div class="row"> 
                          <div class="form-group">
                           
                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Day</label>
                                       {!!Form::selectrange('day',1,31,null,['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Month</label>
                                        {!!Form::selectMonth('month',null,['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                       <label>Year</label>
                                        {!!Form::selectYear('year',1970,date('Y-d-m'),null,['class'=>'form-control'])!!}
                                </div>
                        </div>
                        </div>
                        </div>


                         <div class="form-group">
                            <label for="exampleInputEmail1">Agama</label>
                            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
                        </div>


                       

                       

                        <div class="form-group">
                            <label for="exampleInputEmail1">Telepon</label>
                            <input name="telpon" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telepon">
                        </div>

                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1">Whatsapp Guru</label>
                            <input name="whatsapp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Whatsapp Guru">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Instagram Guru</label>
                            <input name="instagram" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Instagram Guru">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook Guru</label>
                            <input name="facebook" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Facebook Guru">
                        </div> -->

                        <div class="form-group">
                            <label for="exampleInputEmail1">Suku</label>
                            <input name="suku" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Suku">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat"></textarea>
                        </div>


                       

                        
                        <!-- <div class="form-group"> -->
                        <div class="form-group{{$errors->has('avatar') ? 'has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">avatar</label>
                            <input type="file" name="avatar" class="form-control">
                            @if($errors->has('avatar'))
                                <span class="help-block">{{$errors->first('avatar')}}</span>
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
        if (!form.avatar.value) {
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
            var posterValue = $('input[name=avatar]').fieldValue();
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
                window.location.href = "/laravel-crud/public/guru";
           
           
        }
    });
     
    })();
</script>



@stop










