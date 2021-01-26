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
                          
                            <h3 class="panel-title">Add new post</h3>    
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <!-- ini untuk form -->
                                        <form action="{{route('posts.create')}}" method="POST" enctype="multipart/form-data"> 
                                            {{csrf_field()}}
                        
                                            <div class="form-group{{$errors->has('title') ? 'has-error' : ''}}">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title" value="{{old('title')}}">
                                                @if($errors->has('title'))
                                                    <span class="help-block">{{$errors->first('title')}}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Content</label>
                                                <textarea name="content" class="form-control" id="content" rows="3" placeholder="Content">{{old('content')}}</textarea>
                                            </div>
                                       
                                      
                                    </div>

                                    <div class="col-md-4">
                                      
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="thumbnail" placeholder="url" >
                                        </div>
        
                                        <!-- <img id="holder" style="margin-top:15px;max-height:100px;"> -->
                                        <!-- <img id="holder" alt="Thumbnail : " style="margin-top:15px;max-height:100px;"> -->
                                        <!-- <div id='holder' style="margin-top:15px;max-height:100px;"></div> -->
                                       
                                         <!-- <div id='holder' style="margin-top:15px;max-height:100px;"></div> -->
                                         <div id='holder' style="margin-top:15px;max-height:100px;"></div>
                                         <br>
                                         <br>
                                         <br>
                                         <br>
                                         <br>
                                         <div class="input-group">
                                            <input type="submit" class="btn btn-info" value="Submit">
                                         </div>
                                         </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('footer')
    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
        $(document).ready(function(){
            // $('#lfm').filemanager('image');
           // localhost/filemanager?type=image
           //$('#lfm').filemanager('image', {prefix: "localhost/blog/public"});
            $('#lfm').filemanager('image', {prefix: "/laravel-crud/public/filemanager"});
        });
    </script>
@stop