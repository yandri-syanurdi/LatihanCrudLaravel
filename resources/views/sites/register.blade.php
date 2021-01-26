@extends('layouts.frontend')

@section('content')

<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Pendaftaran			
							</h1>	
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Pendaftaran</a></p>
						</div>	
					</div>
				</div>
			</section>

<section class="content">
    <div class="card">
      <div class="card-header">	
        <h4>Form Register</h4>
      </div>
      <div class="card-body">
        
	  <form action="{{ URL::to('/all/register') }}" method="POST" enctype="multipart/form-data"> 
                        {{csrf_field()}}

			<div class="form-group{{$errors->has('nisn') ? 'has-error' : ''}}">
                            <label for="exampleInputEmail1">NISN</label>
                            <input name="nisn" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NISN" value="{{old('nisn')}}">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            @if($errors->has('nisn'))
                                <span class="help-block">{{$errors->first('nisn')}}</span>
                            @endif
            </div>
			
			
			<div class="form-group{{$errors->has('nama_depan') ? 'has-error' : ''}}">
			<label for="exampleInputEmail1">Nama</label>
                            <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{old('nama_depan')}}">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            @if($errors->has('nama_depan'))
                                <span class="help-block">{{$errors->first('nama_depan')}}</span>
                            @endif
            </div>
			
		
			
			<div class="form-group{{$errors->has('email') ? 'has-error' : ''}}">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            @if($errors->has('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                            @endif
                        </div>
				


									
						
			
			
			
			<div class="form-group{{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                <!-- <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-Laki</option> -->
                                <!-- <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option> -->
                                
                                <option value="L" {{(old('jenis_kelamin') == 'L') ? ' selected' : '' }} >Laki-Laki</option>
                                <option value="P" {{(old('jenis_kelamin') == 'P') ? ' selected' : '' }} >Perempuan</option>
                                
                                
                                <!-- <option>3</option>
                                <option>4</option>
                                <option>5</option> -->
                            </select>
                            @if($errors->has('jenis_kelamin'))
                                <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                            @endif
                        </div>


		<div class="form-group{{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
			<label for="exampleInputEmail1">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir" value="{{old('tempat_lahir')}}">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            @if($errors->has('tempat_lahir'))
                                <span class="help-block">{{$errors->first('tempat_lahir')}}</span>
                            @endif
			</div>	
            

			<div class="form-group">
                          <label for="exampleFormControlSelect1" >Tanggal Lahir</label>
                          <div class="row"> 
                         
                           
                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Day</label>
                                       {!!Form::selectrange('day',1,31,null,['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                        <label>Month</label>
                                        {!!Form::selectMonth('month',null,['class'=>'form-control'])!!}
                                </div>

                                 <div class="col-lg-4 col-md-4">
                                        <!-- <label>Birth Date</label> -->
                                       <label>Year</label>
                                        {!!Form::selectYear('year',1970,date('Y-d-m'),null,['class'=>'form-control'])!!}
                                </div>
                     
                        </div>
            </div>
			
			
			<div class="form-group{{$errors->has('nama_ibu') ? 'has-error' : ''}}">
			<label for="exampleInputEmail1">Nama Ibu</label>
                            <input name="nama_ibu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Ibu" value="{{old('nama_ibu')}}">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            @if($errors->has('nama_ibu'))
                                <span class="help-block">{{$errors->first('nama_ibu')}}</span>
                            @endif
			</div>	
			
			<div class="form-group{{$errors->has('kontak_ortu') ? 'has-error' : ''}}">
			<label for="exampleInputEmail1">No Kontak Orang Tua</label>
                            <input name="kontak_ortu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Orang Tua" value="{{old('kontak_ortu')}}">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            @if($errors->has('kontak_ortu'))
                                <span class="help-block">{{$errors->first('kontak_ortu')}}</span>
                            @endif
			</div>	
			
			<div class="form-group{{$errors->has('sekolah_asal') ? 'has-error' : ''}}">
			<label for="exampleInputEmail1">Nama Asal Sekolah</label>
                            <input name="sekolah_asal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Asal Sekolah" value="{{old('sekolah_asal')}}">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            @if($errors->has('sekolah_asal'))
                                <span class="help-block">{{$errors->first('sekolah_asal')}}</span>
                            @endif
			</div>	
			
			
           

			<div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat Sekolah Asal</label>
                            <textarea name="alamat_sekolah" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat Sekolah Asal">{{old('alamat_sekolah')}}</textarea>
        	</div>

		


            <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="window.history.back();" class="btn btn-success">Kembali</button>
            </div>
          </form>
      </div>
    </div>
  </section>
  
@endsection



