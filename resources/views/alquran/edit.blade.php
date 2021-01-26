@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Data Penggalan Ayat Al-Qur'an</h3>
                        </div>
                        <div class="panel-body">

                        <form action="{{ URL::to('/alquran/'.$alquran->id.'/update') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Penggalan Ayat</label>
                            <input name="penggalan_ayat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Penggalan Ayat" value="{{$alquran->penggalan_ayat}}">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Terjemahan</label>
                            <input name="terjemahan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Terjemahan" value="{{$alquran->terjemahan}}">
                        </div>

                         <div class="form-group">
                            <label for="exampleInputEmail1">Urutan Penggalan Ayat</label>
                            <input name="urutan_penggalan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Urutan Penggalan Ayat" value="{{$alquran->urutan_penggalan}}">
                        </div>


                         <div class="form-group">
                            <label for="exampleInputEmail1">Urutan Ayat</label>
                            <input name="urutan_ayat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Urutan Ayat" value="{{$alquran->urutan_ayat}}">
                        </div>

                         <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Nama Surat</label>
                            <select name="nama_surat" class="form-control" id="exampleFormControlSelect1">
                                <option value="Al-Fatihah" @if($alquran->nama_surat == 'Al-Fatihah') selected @endif>Al-Fatihah</option>
                                <option value="Al-Baqarah" @if($alquran->nama_surat == 'Al-Baqarah') selected @endif>Al-Baqarah</option>
                                <option value="Ali-Imran" @if($alquran->nama_surat == 'Ali-Imran') selected @endif>Ali-Imran</option>
                                <option value="An-Nisa" @if($alquran->nama_surat == 'An-Nisa') selected @endif>An-Nisa’</option>
                                <option value="Al-Maidah" @if($alquran->nama_surat == 'Al-Maidah') selected @endif>Al-Ma’idah</option>
                                <option value="Al-Anam" @if($alquran->nama_surat == 'Al-Anam') selected @endif>Al-An’am</option>
                                <option value="Al-Araf" @if($alquran->nama_surat == 'Al-Araf') selected @endif>Al-A’raf</option>
                                <option value="Al-Anfal" @if($alquran->nama_surat == 'Al-Anfal') selected @endif>Al-Anfal</option>
                                <option value="At-Taubah" @if($alquran->nama_surat == 'At-Taubah') selected @endif>At-Taubah</option>
                                <option value="Yunus" @if($alquran->nama_surat == 'Yunus') selected @endif>Yunus</option>
                                <option value="Hud" @if($alquran->nama_surat == 'Hud') selected @endif>Hud</option>
                                <option value="Yusuf" @if($alquran->nama_surat == 'Yusuf') selected @endif>Yusuf</option>
                                <option value="Ar-Rad" @if($alquran->nama_surat == 'Ar-Rad') selected @endif>Ar-Ra’d</option>
                                <option value="Ibrahim" @if($alquran->nama_surat == 'Ibrahim') selected @endif>Ibrahim</option>
                                <option value="Al-Hijr" @if($alquran->nama_surat == 'Al-Hijr') selected @endif>Al-Hijr</option>
                                <option value="An-Nahl" @if($alquran->nama_surat == 'An-Nahl') selected @endif>An-Nahl</option>
                                <option value="Al-Isra" @if($alquran->nama_surat == 'Al-Isra') selected @endif>Al-Isra’</option>
                                <option value="Al-Kahf" @if($alquran->nama_surat == 'Al-Kahf') selected @endif>Al-Kahf</option>
                                <option value="Maryam" @if($alquran->nama_surat == 'Maryam') selected @endif>Maryam</option>
                                <option value="Ta Ha" @if($alquran->nama_surat == 'Ta Ha') selected @endif>Ta Ha</option>
                                <option value="Al-Anbiya" @if($alquran->nama_surat == 'Al-Anbiya') selected @endif>Al-Anbiya</option>
                                <option value="Al-Hajj" @if($alquran->nama_surat == 'Al-Hajj') selected @endif>Al-Hajj</option>
                                <option value="Al-Muminun" @if($alquran->nama_surat == 'Al-Muminun') selected @endif>Al-Mu’minun</option>
                                <option value="An-Nur" @if($alquran->nama_surat == 'An-Nur') selected @endif>An-Nur</option>
                                <option value="Al-Furqan" @if($alquran->nama_surat == 'Al-Furqan') selected @endif>Al-Furqan</option>
                                <option value="Asy-Syuara" @if($alquran->nama_surat == 'Asy-Syuara') selected @endif>Asy-Syu’ara’</option>
                                <option value="An-Naml" @if($alquran->nama_surat == 'An-Naml') selected @endif>An-Naml</option>
                                <option value="Al-Qasas" @if($alquran->nama_surat == 'Al-Qasas') selected @endif>Al-Qasas</option>
                                <option value="Al-Ankabut" @if($alquran->nama_surat == 'Al-Ankabut') selected @endif>Al-‘Ankabut</option>
                                <option value="Ar-Rum" @if($alquran->nama_surat == 'Ar-Rum') selected @endif>Ar-Rum</option>
                                <option value="Luqman" @if($alquran->nama_surat == 'Luqman') selected @endif>Luqman</option>
                                <option value="As-Sajdah" @if($alquran->nama_surat == 'As-Sajdah') selected @endif>As-Sajdah</option>
                                <option value="Al-Ahzab" @if($alquran->nama_surat == 'Al-Ahzab') selected @endif>Al-Ahzab</option>
                                <option value="Saba" @if($alquran->nama_surat == 'Saba') selected @endif>Saba’</option>
                                <option value="Fatir" @if($alquran->nama_surat == 'Fatir') selected @endif>Fatir</option>
                                <option value="Ya Sin" @if($alquran->nama_surat == 'Ya Sin') selected @endif>Ya Sin</option>
                                <option value="As-Saffat" @if($alquran->nama_surat == 'As-Saffat') selected @endif>As-Saffat</option>
                                <option value="Sad" @if($alquran->nama_surat == 'Sad') selected @endif>Sad</option>
                                <option value="Az-Zumar" @if($alquran->nama_surat == 'Az-Zumar') selected @endif>Az-Zumar</option>
                                <option value="Al-Mumin" @if($alquran->nama_surat == 'Al-Mumin') selected @endif>Al-Mu’min</option>
                                <option value="Fussilat" @if($alquran->nama_surat == 'Fussilat') selected @endif>Fussilat</option>
                                <option value="Asy-Syura" @if($alquran->nama_surat == 'Asy-Syura') selected @endif>Asy-Syura</option>
                                <option value="Az-Zukhruf" @if($alquran->nama_surat == 'Az-Zukhruf') selected @endif>Az-Zukhruf</option>
                                <option value="Ad-Dukhan" @if($alquran->nama_surat == 'Ad-Dukhan') selected @endif>Ad-Dukhan</option>
                                <option value="Al-Jasiyah" @if($alquran->nama_surat == 'Al-Jasiyah') selected @endif>Al-Jasiyah</option>
                                <option value="Al-Ahqaf" @if($alquran->nama_surat == 'Al-Ahqaf') selected @endif>Al-Ahqaf</option>
                                <option value="Muhammad" @if($alquran->nama_surat == 'Muhammad') selected @endif>Muhammad</option>
                                <option value="Al-Fath" @if($alquran->nama_surat == 'Al-Fath') selected @endif>Al-Fath</option>
                                <option value="Al-Hujurat" @if($alquran->nama_surat == 'Al-Hujurat') selected @endif>Al-Hujurat</option>
                                <option value="Qaf" @if($alquran->nama_surat == 'Qaf') selected @endif>Qaf</option>
                                <option value="Az-Zariyat" @if($alquran->nama_surat == 'Az-Zariyat') selected @endif>Az-Zariyat</option>
                                <option value="At-Tur" @if($alquran->nama_surat == 'At-Tur') selected @endif>At-Tur</option>
                                <option value="An-Najm" @if($alquran->nama_surat == 'An-Najm') selected @endif>An-Najm</option>
                                <option value="Al-Qamar" @if($alquran->nama_surat == 'Al-Qamar') selected @endif>Al-Qamar</option>
                                <option value="Ar-Rahman" @if($alquran->nama_surat == 'Ar-Rahman') selected @endif>Ar-Rahman</option>
                                <option value="Al-Waqiah" @if($alquran->nama_surat == 'Al-Waqiah') selected @endif>Al-Waqi’ah</option>
                                <option value="Al-Hadid" @if($alquran->nama_surat == 'Al-Hadid') selected @endif>Al-Hadid</option>
                                <option value="Al-Mujadilah" @if($alquran->nama_surat == 'Al-Mujadilah') selected @endif>Al-Mujadilah</option>
                                <option value="Al-Hasyr" @if($alquran->nama_surat == 'Al-Hasyr') selected @endif>Al-Hasyr</option>
                                <option value="Al-Mumtahanah" @if($alquran->nama_surat == 'Al-Mumtahanah') selected @endif>Al-Mumtahanah</option>
                                <option value="As-Saff" @if($alquran->nama_surat == 'As-Saff') selected @endif>As-Saff</option>
                                <option value="Al-Jumuah" @if($alquran->nama_surat == 'Al-Jumuah') selected @endif>Al-Jumu’ah</option>
                                <option value="Al-Munafiqun" @if($alquran->nama_surat == 'Al-Munafiqun') selected @endif>Al-Munafiqun</option>
                                <option value="At-Tagabun" @if($alquran->nama_surat == 'At-Tagabun') selected @endif>At-Tagabun</option>
                                <option value="At-Talaq" @if($alquran->nama_surat == 'At-Talaq') selected @endif>At-Talaq</option>
                                <option value="At-Tahrim" @if($alquran->nama_surat == 'At-Tahrim') selected @endif>At-Tahrim</option>
                                <option value="Al-Mulk" @if($alquran->nama_surat == 'Al-Mulk') selected @endif>Al-Mulk</option>
                                <option value="Al-Qalam" @if($alquran->nama_surat == 'Al-Qalam') selected @endif>Al-Qalam</option>
                                <option value="Al-Haqqah" @if($alquran->nama_surat == 'Al-Haqqah') selected @endif>Al-Haqqah</option>
                                <option value="Al-Maarij" @if($alquran->nama_surat == 'Al-Maarij') selected @endif>Al-Ma’arij</option>
                                <option value="Nuh" @if($alquran->nama_surat == 'Nuh') selected @endif>Nuh</option>
                                <option value="Al-Jinn" @if($alquran->nama_surat == 'Al-Jinn') selected @endif>Al-Jinn</option>
                                <option value="Al-Muzzammil" @if($alquran->nama_surat == 'Al-Muzzammil') selected @endif>Al-Muzzammil</option>
                                <option value="Al-Muddassir" @if($alquran->nama_surat == 'Al-Muddassir') selected @endif>Al-Muddassir</option>
                                <option value="Al-Qiyamah" @if($alquran->nama_surat == 'Al-Qiyamah') selected @endif>Al-Qiyamah</option>
                                <option value="Al-Insan" @if($alquran->nama_surat == 'Al-Insan') selected @endif>Al-Insan</option>
                                <option value="Al-Mursalat" @if($alquran->nama_surat == 'Al-Mursalat') selected @endif>Al-Mursalat</option>
                                <option value="An-Naba" @if($alquran->nama_surat == 'An-Naba') selected @endif>An-Naba’</option>
                                <option value="An-Naziat" @if($alquran->nama_surat == 'An-Naziat') selected @endif>An-Nazi’at</option>
                                <option value="Abasa" @if($alquran->nama_surat == 'Abasa') selected @endif>‘Abasa</option>
                                <option value="At-Takwir" @if($alquran->nama_surat == 'At-Takwir') selected @endif>At-Takwir</option>
                                <option value="Al-Infitar" @if($alquran->nama_surat == 'Al-Infitar') selected @endif>Al-Infitar</option>
                                <option value="Al-Tatfif" @if($alquran->nama_surat == 'Al-Tatfif') selected @endif>Al-Tatfif</option>
                                <option value="Al-Insyiqaq" @if($alquran->nama_surat == 'Al-Insyiqaq') selected @endif>Al-Insyiqaq</option>
                                <option value="Al-Buruj" @if($alquran->nama_surat == 'Al-Buruj') selected @endif>Al-Buruj</option>
                                <option value="At-Tariq" @if($alquran->nama_surat == 'At-Tariq') selected @endif>At-Tariq</option>
                                <option value="Al-Ala" @if($alquran->nama_surat == 'Al-Ala') selected @endif>Al-A’la</option>
                                <option value="Al-Gasyiyah" @if($alquran->nama_surat == 'Al-Gasyiyah') selected @endif>Al-Gasyiyah</option>
                                <option value="Al-Fajr" @if($alquran->nama_surat == 'Al-Fajr') selected @endif>Al-Fajr</option>
                                <option value="Al-Balad" @if($alquran->nama_surat == 'Al-Balad') selected @endif>Al-Balad</option>
                                <option value="Asy-Syams" @if($alquran->nama_surat == 'Asy-Syams') selected @endif>Asy-Syams</option>
                                <option value="Al-Lail" @if($alquran->nama_surat == 'Al-Lail') selected @endif>Al-Lail</option>
                                <option value="Ad-Duha" @if($alquran->nama_surat == 'Ad-Duha') selected @endif>Ad-Duha</option>
                                <option value="Al-Insyirah" @if($alquran->nama_surat == 'Al-Insyirah') selected @endif>Al-Insyirah</option>
                                <option value="At-Tin" @if($alquran->nama_surat == 'At-Tin') selected @endif>At-Tin</option>
                                <option value="Al-Alaq" @if($alquran->nama_surat == 'Al-Alaq') selected @endif>Al-‘Alaq</option>
                                <option value="Al-Qadr" @if($alquran->nama_surat == 'Al-Qadr') selected @endif>Al-Qadr</option>
                                <option value="Al-Bayyinah" @if($alquran->nama_surat == 'Al-Bayyinah') selected @endif>Al-Bayyinah</option>
                                <option value="Az-Zalzalah" @if($alquran->nama_surat == 'Az-Zalzalah') selected @endif>Az-Zalzalah</option>
                                <option value="Al-Adiyat" @if($alquran->nama_surat == 'Al-Adiyat') selected @endif>Al-‘Adiyat</option>
                                <option value="Al-Qariah" @if($alquran->nama_surat == 'Al-Qariah') selected @endif>Al-Qari’ah</option>
                                <option value="At-Takasur" @if($alquran->nama_surat == 'At-Takasur') selected @endif>At-Takasur</option>
                                <option value="Al-Asr" @if($alquran->nama_surat == 'Al-Asr') selected @endif>Al-‘Asr</option>
                                <option value="Al-Humazah" @if($alquran->nama_surat == 'Al-Humazah') selected @endif>Al-Humazah</option>
                                <option value="Al-Fil" @if($alquran->nama_surat == 'Al-Fil') selected @endif>Al-Fil</option>
                                <option value="Quraisy" @if($alquran->nama_surat == 'Quraisy') selected @endif>Quraisy</option>
                                <option value="Al-Maun" @if($alquran->nama_surat == 'Al-Maun') selected @endif>Al-Ma’un</option>
                                <option value="Al-Kausar" @if($alquran->nama_surat == 'Al-Kausar') selected @endif>Al-Kausar</option>
                                <option value="Al-Kafirun" @if($alquran->nama_surat == 'Al-Kafirun') selected @endif>Al-Kafirun</option>
                                <option value="An-Nasr" @if($alquran->nama_surat == 'An-Nasr') selected @endif>An-Nasr</option>
                                <option value="Al-Lahab" @if($alquran->nama_surat == 'Al-Lahab') selected @endif>Al-Lahab</option>
                                <option value="Al-Ikhlas" @if($alquran->nama_surat == 'Al-Ikhlas') selected @endif>Al-Ikhlas</option>
                                <option value="Al-Falaq" @if($alquran->nama_surat == 'Al-Falaq') selected @endif>Al-Falaq</option>
                                <option value="An-Nas" @if($alquran->nama_surat == 'An-Nas') selected @endif>An-Nas</option>
                               
                            </select>
                        </div>

                        
                         <div class="form-group">
                            <label for="exampleFormControlTextarea1">Gambar Ayat</label>
                            <input type="file" name="gambar_ayat" class="form-control" value="{{$alquran->gambar_ayat}}" >
                        </div>

                   
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Video Terjemahan</label>
                            <input type="file" name="video_terjemahan" class="form-control" value="{{$alquran->video_terjemahan}}" >
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



