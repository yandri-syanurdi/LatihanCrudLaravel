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

                                <h3 class="panel-title">List Artikel Belajar</h3>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>  Tambah Artikel Belajar  </button>
                                </div> 
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>JUDUL</th>
                                            <th>DETAIL</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                            @foreach($data as $key => $d)
                                            <tr>
                                                <td><a href="{{url('/artikel/read',array($d->id))}}">{!!$d->title!!}</a></td>
                                                <td>{!!$d->detail!!}</td>
                                                <td>
                                                    <a href="{{url('/artikel/read',array($d->id))}}" class="btn btn-primary btn-sm">Show</a>
                                                    <a href="{{url('/artikel/edit',array($d->id))}}" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="{{url('/artikel/delete',array($d->id))}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel Belajar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                            <div class="modal-body">
                                <form action="{{ URL::to('/artikel/create') }}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <textarea id="summernote" name="summernote" class="form-control">
                            
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
                                    <input type="button" name="clear" id="clear" class="btn btn-danger pull-right" value="Clear">
                                    {!!csrf_field()!!}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                </div>
            </div>
    </div>
@stop

@section('footer')

<script type="text/javascript">
        $(document).ready(function(){
            $('#summernote').summernote({
                // height: '500px',
                height: '300px',
                placeholder: 'Content here...',
                fontNames:['Arial','Arial Black','Times New Roman', 'Calibri', 'Courier New', 'Tahoma', 'Cambria','Khmer OS'],
            })
        })

        $('#clear').on('click',function(){
            $('#summernote').summernote('code',null);
        })
</script>   

@stop


