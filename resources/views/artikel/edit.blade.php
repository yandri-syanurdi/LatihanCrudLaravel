@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inputs Artikel</h3>
                        </div>
                        <div class="panel-body">

                        <form action="{{ URL::to('/artikel/update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                        <label for="title">Title</label>
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <input type="text" name="title" id="title" class="form-control" value="{{$data->title}}">
                        </div>
                        <div class="form-group">
                        <textarea id="summernote" name="summernote" class="form-control">
                            {!!$data->detail!!}
                        </textarea>
                        </div>
                        <div class="form-group">
                        <input type="submit" name="send" id="send" value="Publish" class="btn btn-success">
                        <input type="button" name="clear" id="clear" class="btn btn-danger pull-right" value="Clear">
                        {!!csrf_field()!!}
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

