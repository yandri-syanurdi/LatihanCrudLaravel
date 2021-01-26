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
                          
                            <h3 class="panel-title">Forum</h3>

                                <div class="right">
                                    <!-- <a href="{{route('posts.add')}}" class="btn btn-sm btn-primary">Tambah forum</a> -->
                                    <!-- <a type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>  Tambah forum  </a> -->
                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah forum</a>
                                    <!-- <a href="{{ URL::to('/siswa/exportpdf') }}" class="btn btn-sm btn-primary">Export PDF</a> -->
                                    <!-- <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>  Tambah Data Siswa  </button> -->
                                </div> 
                            </div>
                            <div class="panel-body">

                                    <ul class="list-unstyled activity-list">
                                        @foreach($forum as $frm)
										<li>
											<img src="{{$frm->user->siswa->getAvatar()}}" alt="Avatar" class="img-circle pull-left avatar">
											<p><a href="{{ URL::to('/forum/'.$frm->id.'/view') }}">{{$frm->user->siswa->nama_depan}} {{$frm->user->siswa->nama_belakang}} : {{$frm->judul}}</a>  <span class="timestamp">{{$frm->created_at->diffForHumans()}}</span></p>
										</li>
										@endforeach
									</ul>

                                <!-- <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>TITLE</th>
                                            <th>USER</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                            @foreach($forum as $frm)
                                            <tr>
                                                <td>{{$frm->id}}</td>
                                                <td>{{$frm->judul}}</td>
                                                <td>{{$frm->user->name}}</td>
                                                <td>
                                                    <a target="_blank" href="{{route('site.single.post',$frm->slug)}}" class="btn btn-info btn-sm">View</a>
                                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm delete">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table> -->
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Forum</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">

                
                    <!-- <form action="{{ URL::to('/forum/create') }}" method="POST" enctype="multipart/form-data">  -->
                    <form action="{{ URL::to('/forum/create') }}" method="POST"> 
                        {{csrf_field()}}
                      
                        <div class="form-group{{$errors->has('judul') ? 'has-error' : ''}}">
                            <label for="exampleInputEmail1">Judul</label>
                            <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul" value="{{old('judul')}}">
                           
                            @if($errors->has('judul'))
                                <span class="help-block">{{$errors->first('judul')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Konten</label>
                            <textarea name="konten" class="form-control" id="content" rows="3" placeholder="Content">{{old('content')}}</textarea>
                        </div>
       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            </div>

@endsection