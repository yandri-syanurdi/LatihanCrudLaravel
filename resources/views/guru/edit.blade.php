@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Data Guru</h3>
                        </div>
                        <div class="panel-body">

                        <form action="{{ URL::to('/guru/'.$guru->id.'/update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Depan</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$guru->nama}}">
                        </div>

                         <div class="form-group">
                            <label for="exampleInputEmail1">Nama Belakang</label>
                            <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$guru->nama_belakang}}">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                <option value="L" @if($guru->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                <option value="P" @if($guru->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                            </select>
                        </div>

                         <div class="form-group">
                          <label for="exampleFormControlSelect1" >Tanggal Lahir</label>
                          <div class="row"> 
                          <div class="form-group">
                           
                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Day</label>
                                        {!!Form::selectrange('day',1,31,date('d',strtotime($guru->tanggal_mulai)),['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Month</label>
                                         {!!Form::selectMonth('month',date('m',strtotime($guru->tanggal_mulai)),['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                       <label>Year</label>
                                       {!!Form::selectYear('year',1970,date('Y-d-m'),date('Y',strtotime($guru->tanggal_mulai)),['class'=>'form-control'])!!}
                                </div>
                        </div>
                        </div>
                        </div>


                         <div class="form-group">
                            <label for="exampleInputEmail1">Agama</label>
                            <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$guru->agama}}">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Telepon</label>
                            <input name="telpon" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telepon" value="{{$guru->telpon}}">
                        </div>

                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1">Whatsapp guru</label>
                            <input name="whatsapp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Whatsapp guru" value="{{$guru->whatsapp}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Instagram guru</label>
                            <input name="instagram" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Instagram guru" value="{{$guru->instagram}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook guru</label>
                            <input name="facebook" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Facebook guru" value="{{$guru->facebook}}">
                        </div> -->

                         <div class="form-group">
                            <label for="exampleInputEmail1">Suku</label>
                            <input name="suku" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Suku" value="{{$guru->suku}}">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat">{{$guru->alamat}}</textarea>
                        </div>

                   
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Avatar</label>
                            <input type="file" name="avatar" class="form-control" value="{{$guru->avatar}}" >
                        </div>

                         <div class="progress">
                                <div class="bar"></div >
                                <div class="percent" >0%</div >  
                                <div></div>
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










