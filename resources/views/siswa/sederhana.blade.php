@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                            
                            <br>
                          
                            <h3 class="panel-title">List Data Pengguna</h3>

                                <div class="right">
                                    <a type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#importSiswa">Import XLS</a>
                                    <a href="{{ URL::to('/siswa/exportexcel') }}" class="btn btn-sm btn-primary">Export Excel</a>
                                    <a href="{{ URL::to('/siswa/exportpdf') }}" class="btn btn-sm btn-primary">Export PDF</a>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>  Tambah Data Pengguna  </button>
                                </div> 
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>NAMA LENGKAP</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>AGAMA</th>
                                            <th>ALAMAT</th>
                                            <th>AVATAR</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                            
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

                <!-- Modal Import siswa -->
                <div class="modal fade" id="importSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!!Form::open(['route' => 'siswa.import', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}

                        {!!Form::file('data_siswa')!!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <input type="submit" class="btn btn-sm btn-primary" value="Import">
                        </form>
                    </div>
                    </div>
                </div>
                </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">

                   
                      <form action="{{ URL::to('/all/create') }}" method="POST" enctype="multipart/form-data"> 
                        {{csrf_field()}}
                        <div class="form-group{{$errors->has('nama_depan') ? 'has-error' : ''}}">
                            <label for="exampleInputEmail1">Nama Depan</label>
                            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
                            @if($errors->has('nama_depan'))
                                <span class="help-block">{{$errors->first('nama_depan')}}</span>
                                <br>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Belakang</label>
                            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
                        </div>


                        <div class="form-group{{$errors->has('role') ? 'has-error' : ''}}">
                            <label for="exampleFormControlSelect1">Role Pengguna</label>
                            <select name="role" class="form-control" id="exampleFormControlSelect1">
                                
                                <option value="admin" {{(old('role') == 'admin') ? ' selected' : '' }} >admin</option>
                                <option value="guru" {{(old('role') == 'guru') ? ' selected' : '' }} >guru</option>
                                <option value="siswa" {{(old('role') == 'siswa') ? ' selected' : '' }} >siswa</option>
                                
                            
                            </select>
                            @if($errors->has('role'))
                                <span class="help-block">{{$errors->first('role')}}</span>
                            @endif
                        </div>



                        <div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                            @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>

                        <div class="form-group{{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                
                                <option value="L" {{(old('jenis_kelamin') == 'L') ? ' selected' : '' }} >Laki-Laki</option>
                                <option value="P" {{(old('jenis_kelamin') == 'P') ? ' selected' : '' }} >Perempuan</option>
                                
                            </select>
                            @if($errors->has('jenis_kelamin'))
                                <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                          <label for="exampleFormControlSelect1" >Tanggal Lahir</label>
                          <div class="row"> 
                          <div class="form-group">
                           
                                 <div class="col-lg-4 col-md-4">
                                     
                                        <label>Day</label>
                                       {!!Form::selectrange('day',1,31,null,['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                       
                                        <label>Month</label>
                                        {!!Form::selectMonth('month',null,['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                      
                                       <label>Year</label>
                                        {!!Form::selectYear('year',1970,date('Y-d-m'),null,['class'=>'form-control'])!!}
                                </div>
                        </div>
                        </div>
                        </div>

                        <div class="form-group{{$errors->has('agama') ? 'has-error' : ''}}">
                            <label for="exampleInputEmail1">Agama</label>
                            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}">
                         
                            @if($errors->has('agama'))
                                <span class="help-block">{{$errors->first('agama')}}</span>
                            @endif
                        </div>

                         <div class="form-group{{$errors->has('suku') ? 'has-error' : ''}}">
                            <label for="exampleInputEmail1">Suku</label>
                            <input name="suku" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Suku" value="{{old('suku')}}">
                         
                            @if($errors->has('suku'))
                                <span class="help-block">{{$errors->first('suku')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat">{{old('alamat')}}</textarea>
                        </div>

                       

                        

                        <div class="form-group{{$errors->has('avatar') ? 'has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Avatar</label>
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
    <script>
       
        $(document).ready(function(){
                $('#datatable').DataTable({
                    processing:true,
                    serverside:true,
                    ajax:"{{route('ajax.get.data.siswa')}}",
                    columns:[
                        {data:'nama_lengkap',name:'nama_lengkap'},
                        {data:'jenis_kelamin',name:'jenis_kelamin'},
                        {data:'agama',name:'agama'},
                        {data:'alamat',name:'alamat'}, 
                        {data:'gambarku',name:'gambarku'}, 
                        {data:'aksi',name:'aksi'}, 
                    ]
                });
                
                $('body').on('click','.delete',function(){
                    var siswa_id = $(this).attr('siswa-id');
                
                    swal({
                        title: "Yakin ?",
                        text: "Mau dihapus data siswa dengan id "+siswa_id + " ??",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                            console.log(willDelete);
                        if (willDelete) {
                            
                            window.location = "all/"+siswa_id+"/delete";
                        
                        } 
                    });

                });
        });
       
    </script>
@stop




