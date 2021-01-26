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
                          
                            <h3 class="panel-title">Posts</h3>

                                <div class="right">
                                    <a href="{{route('posts.add')}}" class="btn btn-sm btn-primary">Add new post</a>
                                    <!-- <a href="{{ URL::to('/siswa/exportpdf') }}" class="btn btn-sm btn-primary">Export PDF</a> -->
                                    <!-- <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>  Tambah Data Siswa  </button> -->
                                </div> 
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>TITLE</th>
                                            <th>USER</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                            @foreach($posts as $post)
                                            <tr>
                                                <td>{{$post->id}}</td>
                                                <td>{{$post->title}}</td>
                                                <td>{{$post->user->name}}</td>
                                                <td>
                                                    <a target="_blank" href="{{route('site.single.post',$post->slug)}}" class="btn btn-info btn-sm">View</a>
                                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm delete">Delete</a>
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

@stop

@section('footer')
    <script>
        $('.delete').click(function(){
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
                    window.location = "siswa/"+siswa_id+"/delete";                
                } 
            });

        });
    </script>
@stop

