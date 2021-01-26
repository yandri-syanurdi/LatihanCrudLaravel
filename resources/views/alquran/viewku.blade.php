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

                                <h3 class="panel-title">List Penggalan Ayat Al-Qur'an</h3>
                                <div class="right">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i>  Tambah Penggalan Ayat Al-Qur'an  </button>
                                </div> 
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Penggalan Ayat</th>
                                            <th>Terjemahan</th>
                                            <th>Urutan Penggalan</th>
                                            <th>Urutan Ayat</th>
                                            <th>Nama Surat</th>
                                            <th>Gambar Ayat</th>
                                            <th>Video Terjemahan</th>
                                            <th>DOWNLOAD</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                            @foreach($file as $key=>$data)
                                            <tr>
                                                <td><a href="{{ URL::to('/alquran/'.$data->id) }}">{{$data->penggalan_ayat}}</a></td>
                                                <td>{{$data->terjemahan}}</td>
                                                <td>{{$data->urutan_penggalan}}</td>
                                                <td>{{$data->urutan_ayat}}</td>
                                                <td>{{$data->nama_surat}}</td>
                                                <td> <img src="{{url('storage/alquran/image/'.$data->gambar_ayat)}}" height="45px;" width="50px;">  </td>
                                                <td><iframe src="{{url('storage/alquran/video/'.$data->video_terjemahan)}}" style="width: 50px; height: 50px;"></iframe></td>
                                                <td> <a href="{{ URL::to('/alquran/download/'.$data->video_terjemahan) }}">Download</a> </td>
                                                <td>
                                                    <a href="{{ URL::to('/alquran/'.$data->id) }}" class="btn btn-primary btn-sm">Show</a>
                                                    <a href="{{ URL::to('/alquran/'.$data->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="{{ URL::to('/alquran/'.$data->id.'/delete') }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Penggalan Ayat Al-Qur'an</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">

                    <form action="{{ URL::to('/alquran/create') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Penggalan Ayat</label>
                            <input name="penggalan_ayat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Penggalan Ayat">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Terjemahan</label>
                            <input name="terjemahan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Terjemahan Ayat">
                        </div>

                         <div class="form-group">
                            <label for="exampleInputEmail1">Urutan Penggalan Ayat</label>
                            <input name="urutan_penggalan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Urutan Penggalan Ayat">
                        </div>


                         <div class="form-group">
                            <label for="exampleInputEmail1">Urutan Ayat</label>
                            <input name="urutan_ayat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Urutan Ayat">
                        </div>

                         <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Nama Surat</label>
                            <select name="nama_surat" class="form-control" id="exampleFormControlSelect1">
                                <option value="Al-Fatihah">Al-Fatihah</option>
                                <option value="Al-Baqarah">Al-Baqarah</option>
                                <option value="Ali ‘Imran">Ali ‘Imran</option>
                                <option value="An-Nisa’">An-Nisa’</option>
                                <option value="Al-Ma’idah">Al-Ma’idah</option>
                                <option value="Al-An’am">Al-An’am</option>
                                <option value="Al-A’raf">Al-A’raf</option>
                                <option value="Al-Anfal">Al-Anfal</option>
                                <option value="At-Taubah">At-Taubah</option>
                                <option value="Yunus ">Yunus </option>
                                <option value="Hud ">Hud </option>
                                <option value="Yusuf ">Yusuf </option>
                                <option value="Ar-Ra’d">Ar-Ra’d</option>
                                <option value="Ibrahim ">Ibrahim </option>
                                <option value="Al-Hijr">Al-Hijr</option>
                                <option value="An-Nahl">An-Nahl</option>
                                <option value=" Al-Isra’"> Al-Isra’</option>
                                <option value="Al-Kahf">Al-Kahf</option>
                                <option value="Maryam ">Maryam </option>
                                <option value="Ta Ha">Ta Ha</option>
                                <option value="Al-Anbiya">Al-Anbiya</option>
                                <option value="Al-Hajj"> Al-Hajj</option>
                                <option value="Al-Mu’minun">Al-Mu’minun</option>
                                <option value="An-Nur">An-Nur</option>
                                <option value="Al-Furqan">Al-Furqan</option>
                                <option value="Asy-Syu’ara’">Asy-Syu’ara’</option>
                                <option value="An-Naml">An-Naml</option>
                                <option value="Al-Qasas">Al-Qasas</option>
                                <option value="Al-‘Ankabut">Al-‘Ankabut</option>
                                <option value="Ar-Rum">Ar-Rum</option>
                                <option value="Luqman ">Luqman </option>
                                <option value="As-Sajdah">As-Sajdah</option>
                                <option value="Al-Ahzab">Al-Ahzab</option>
                                <option value="Saba’">Saba’</option>
                                <option value="Fatir ">Fatir </option>
                                <option value="Ya Sin">Ya Sin</option>
                                <option value="As-Saffat">As-Saffat</option>
                                <option value="Sad ">Sad </option>
                                <option value="Az-Zumar">Az-Zumar</option>
                                <option value="Al-Mu’min">Al-Mu’min</option>
                                <option value="Fussilat ">Fussilat </option>
                                <option value="Asy-Syura">Asy-Syura</option>
                                <option value="Az-Zukhruf">Az-Zukhruf</option>
                                <option value="Ad-Dukhan">Ad-Dukhan</option>
                                <option value="Al-Jasiyah">Al-Jasiyah</option>
                                <option value=" Al-Ahqaf"> Al-Ahqaf</option>
                                <option value="Muhammad">Muhammad</option>
                                <option value="Al-Fath">Al-Fath</option>
                                <option value="Al-Hujurat">Al-Hujurat</option>
                                <option value="Qaf ">Qaf </option>
                                <option value="Az-Zariyat">Az-Zariyat</option>
                                <option value="At-Tur">At-Tur</option>
                                <option value="An-Najm">An-Najm</option>
                                <option value="Al-Qamar">Al-Qamar</option>
                                <option value="Ar-Rahman">Ar-Rahman</option>
                                <option value="Al-Waqi’ah">Al-Waqi’ah</option>
                                <option value="Al-Hadid">Al-Hadid</option>
                                <option value="Al-Mujadilah">Al-Mujadilah</option>
                                <option value="Al-Hasyr">Al-Hasyr</option>
                                <option value="Al-Mumtahanah">Al-Mumtahanah</option>
                                <option value="As-Saff">As-Saff</option>
                                <option value="Al-Jumu’ah">Al-Jumu’ah</option>
                                <option value="Al-Munafiqun">Al-Munafiqun</option>
                                <option value="At-Tagabun">At-Tagabun</option>
                                <option value="At-Talaq">At-Talaq</option>
                                <option value="At-Tahrim">At-Tahrim</option>
                                <option value="Al-Mulk">Al-Mulk</option>
                                <option value="Al-Qalam">Al-Qalam</option>
                                <option value="Al-Haqqah">Al-Haqqah</option>
                                <option value="Al-Ma’arij">Al-Ma’arij</option>
                                <option value="Nuh ">Nuh </option>
                                <option value="Al-Jinn">Al-Jinn</option>
                                <option value="Al-Muzzammil">Al-Muzzammil</option>
                                <option value="Al-Muddassir">Al-Muddassir</option>
                                <option value="Al-Qiyamah">Al-Qiyamah</option>
                                <option value="Al-Insan">Al-Insan</option>
                                <option value="Al-Mursalat">Al-Mursalat</option>
                                <option value="An-Naba’">An-Naba’</option>
                                <option value="An-Nazi’at">An-Nazi’at</option>
                                <option value="‘Abasa">‘Abasa</option>
                                <option value="At-Takwir">At-Takwir</option>
                                <option value="Al-Infitar">Al-Infitar</option>
                                <option value="Al-Tatfif">Al-Tatfif</option>
                                <option value="Al-Insyiqaq">Al-Insyiqaq</option>
                                <option value="Al-Buruj">Al-Buruj</option>
                                <option value="At-Tariq">At-Tariq</option>
                                <option value="Al-A’la">Al-A’la</option>
                                <option value="Al-Gasyiyah">Al-Gasyiyah</option>
                                <option value="Al-Fajr">Al-Fajr</option>
                                <option value="Al-Balad">Al-Balad</option>
                                <option value="Asy-Syams">Asy-Syams</option>
                                <option value="Al-Lail">Al-Lail</option>
                                <option value="Ad-Duha">Ad-Duha</option>
                                <option value="Al-Insyirah">Al-Insyirah</option>
                                <option value="At-Tin">At-Tin</option>
                                <option value="Al-‘Alaq">Al-‘Alaq</option>
                                <option value="Al-Qadr">Al-Qadr</option>
                                <option value="Al-Bayyinah">Al-Bayyinah</option>
                                <option value="Az-Zalzalah">Az-Zalzalah</option>
                                <option value="Al-‘Adiyat">Al-‘Adiyat</option>
                                <option value="Al-Qari’ah">Al-Qari’ah</option>
                                <option value="At-Takasur">At-Takasur</option>
                                <option value="Al-‘Asr">Al-‘Asr</option>
                                <option value="Al-Humazah">Al-Humazah</option>
                                <option value="Al-Fil">Al-Fil</option>
                                <option value="Quraisy">Quraisy</option>
                                <option value="Al-Ma’un">Al-Ma’un</option>
                                <option value="Al-Kausar">Al-Kausar</option>
                                <option value="Al-Kafirun">Al-Kafirun</option>
                                <option value="An-Nasr">An-Nasr</option>
                                <option value="Al-Lahab">Al-Lahab</option>
                                <option value="Al-Ikhlas">Al-Ikhlas</option>
                                <option value="Al-Falaq">Al-Falaq</option>
                                <option value="An-Nas">An-Nas</option>
                                
                            </select>
                        </div>

                        

                        <div class="form-group{{$errors->has('gambar_ayat') ? 'has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Gambar Ayat</label>
                            <input type="file" name="gambar_ayat" class="form-control">
                            @if($errors->has('gambar_ayat'))
                                <span class="help-block">{{$errors->first('gambar_ayat')}}</span>
                            @endif
                        </div>
                        
                        <!-- <div class="form-group"> -->
                        <div class="form-group{{$errors->has('video_terjemahan') ? 'has-error' : ''}}">
                            <label for="exampleFormControlTextarea1">Video Terjemahan</label>
                            <input type="file" name="video_terjemahan" class="form-control">
                            @if($errors->has('video_terjemahan'))
                                <span class="help-block">{{$errors->first('video_terjemahan')}}</span>
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
        if (!form.video_terjemahan.value) {
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
            var posterValue = $('input[name=video_terjemahan]').fieldValue();
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
                window.location.href = "/laravel-crud/public/alquran";
           
           
        }
    });
     
    })();
</script>



@stop







