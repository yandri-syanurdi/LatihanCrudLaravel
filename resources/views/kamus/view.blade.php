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

                                <form class="form-inline my-2 my-lg-0" method="GET" action="{{ URL::to('/kamus') }}">
                                    <input name="cari" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" onchange="this.form.submit();" >
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onchange="this.form.submit();">Search</button>
                                </form>


                                  <br>
                                <form class="form-inline my-2 my-lg-0" method="GET" action="{{ URL::to('/kamus') }}">
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

                                <h3 class="panel-title">Daftar Data Kamus</h3>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>  Tambah Data Kamus  </button>
                                </div> 
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Bahasa Indonesia</th>
                                            <th>Bahasa Inggris</th>
                                            <!-- <th>Video Terjemahan</th> -->
                                            <th>DOWNLOAD</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                            @foreach($file as $key=>$data)
                                            <tr>
                                                <td><a href="{{ URL::to('/kamus/'.$data->id) }}">{{$data->b_indonesia}}</a></td>
                                                <td>{{$data->b_inggris}}</td>
                                                <!-- <td><iframe src="{{url('storage/kamus/'.$data->video_isyarat)}}" style="width: 50px; height: 50px;"></iframe></td> -->
                                                <td> <a href="{{ URL::to('/kamus/download/'.$data->video_isyarat) }}">Download</a> </td>
                                                <td>
                                                    <a href="{{ URL::to('/kamus/'.$data->id) }}" class="btn btn-primary btn-sm">Show</a>
                                                    <a href="{{ URL::to('/kamus/'.$data->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="{{ URL::to('/kamus/'.$data->id.'/delete') }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kamus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">

                    <form action="{{ URL::to('/kamus/create') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bahasa Indonesia</label>
                            <input name="b_indonesia" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bahasa Indonesia">
                        </div>


                         <div class="form-group">
                            <label for="exampleInputEmail1">Bahasa Inggris</label>
                            <input name="b_inggris" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bahasa Inggris">
                        </div>

                        

                        
                        <!-- <div class="form-group"> -->
                        <div class="form-group{{$errors->has('video_isyarat') ? 'has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Video</label>
                            <input type="file" name="video_isyarat" class="form-control">
                            @if($errors->has('video_isyarat'))
                                <span class="help-block">{{$errors->first('video_isyarat')}}</span>
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
        if (!form.video_isyarat.value) {
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
            var posterValue = $('input[name=video_isyarat]').fieldValue();
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
                window.location.href = "/laravel-crud/public/kamus";
           
           
        }
    });
     
    })();
</script>



@stop







