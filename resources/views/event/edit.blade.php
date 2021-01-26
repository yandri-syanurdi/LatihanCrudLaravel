@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Data Event</h3>
                        </div>
                        <div class="panel-body">

                        <form action="{{ URL::to('/event/'.$event->id.'/update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Event</label>
                            <input name="acara" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Event" value="{{$event->acara}}">
                        </div>

                         <div class="form-group">
                          <label for="exampleFormControlSelect1" >Tanggal Mulai</label>
                          <div class="row"> 
                          <div class="form-group">
                           
                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Day</label>
                                        {!!Form::selectrange('daya',1,31,date('d',strtotime($event->tanggal_mulai)),['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Month</label>
                                         {!!Form::selectMonth('montha',date('m',strtotime($event->tanggal_mulai)),['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                       <label>Year</label>
                                       {!!Form::selectYear('yeara',1970,date('Y-d-m'),date('Y',strtotime($event->tanggal_mulai)),['class'=>'form-control'])!!}
                                </div>
                        </div>
                        </div>
                        </div>
                        
                         <div class="form-group">
                        <label for="exampleFormControlSelect1" >Tanggal Selesai</label>
                        <div class="row"> 
                          <div class="form-group">
                           
                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Day</label>
                                      {!!Form::selectrange('dayb',1,31,date('d',strtotime($event->tanggal_selesai)),['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Month</label>
                                        {!!Form::selectMonth('monthb',date('m',strtotime($event->tanggal_selesai)),['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                       <label>Year</label>
                                        {!!Form::selectYear('yearb',1970,date('Y-d-m'),date('Y',strtotime($event->tanggal_selesai)),['class'=>'form-control'])!!}
                                </div>
                        </div>
                        </div>
                        </div>
                        
                     

                        <div class="form-group">
                            <label for="exampleInputEmail1">Lokasi</label>
                            <input name="lokasi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Lokasi" value="{{$event->lokasi}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Kontak</label>
                            <input name="kontak" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kontak" value="{{$event->kontak}}">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Kegiatan</label>
                            <textarea name="kegiatan" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Kegiatan">{{$event->kegiatan}}</textarea>
                        </div>

                   
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Brosur</label>
                            <input type="file" name="brosur" class="form-control" value="{{$event->brosur}}" >
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
        if (!form.brosur.value) {
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
            var posterValue = $('input[name=brosur]').fieldValue();
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
                window.location.href = "/laravel-crud/public/event";
           
           
        }
    });
     
    })();
</script>



@stop





