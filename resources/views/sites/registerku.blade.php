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
    <!-- Register -->
    <section class="search-course-area relative" style="background: unset;">
			<!-- <div class="overlay overlay-bg"></div> -->
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-lg-3 col-md-6 search-course-left">
						<!-- <h1 class="text-white"> -->
                        <h1>
							Pendaftaran Online <br>
							Bergabung bersama kami
						</h1>
						<p>
							Dengan kurikulum yang update dengan kebutuhan pasar, kami menjamin lulusan akan mudah terserap di dunia kerja.
						</p>
						<!-- <div class="row details-content">
							<div class="col single-detials">
								<span class="lnr lnr-graduation-hat"></span>
								<a href="#"><h4>Expert Instructors</h4></a>		
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>						
							</div>
							<div class="col single-detials">
								<span class="lnr lnr-license"></span>
								<a href="#"><h4>Certification</h4></a>		
								<p>
									Usage of the Internet is becoming more common due to rapid advancement of technology and power.
								</p>						
							</div>								
						</div> -->
					</div>
					<!-- <div class="col-lg-9 col-md-6 search-course-right section-gap"> -->
					<div class="col-lg-49 col-md-6 search-course-right section-gap">
						
						<!-- <form class="form-wrap" action="#"> -->
						<!-- {{'nama'}} -->
						<!-- {!!'<b>Nama</b>'!!} -->
						{!!'<b>TURBO</b>'!!}
						<!-- {!! Form::open(['url' => 'foo/bar']) !!} -->

						<!-- {!! Form::open(['url' => '/postregister']) !!} -->
						{!! Form::open(['url' => '/postregister','class' => 'form-wrap']) !!}
						<!-- {{csrf_field()}} -->
							<!-- <h4 class="text-white pb-20 text-center mb-30">Search for Available Course</h4>		 -->
                            <h4 class="pb-20 text-center mb-30">Formulir Pendaftaran</h4>		
							{!!Form::text('nama_depan','',['class' => 'form-control','placeholder' => 'Nama Depan'])!!}
							{!!Form::text('nama_belakang','',['class' => 'form-control','placeholder' => 'Nama Belakang'])!!}
							{!!Form::text('agama','',['class' => 'form-control','placeholder' => 'Agama'])!!}
							{!!Form::textarea('alamat','',['class' => 'form-control','placeholder' => 'Alamat'])!!}
							<div class="form-select" id="service-select">
							<!-- {!!Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'],['class' => 'form-select','style' => 'display: none;', 'id' => 'service-select']);!!} -->
							<!-- {!!Form::select('jenis_kelamin', ['' => 'Pilih jenis kelamin','L' => 'Laki-laki', 'P' => 'Perempuan'],['style' => 'display: none;']);!!} -->
							{!!Form::select('jenis_kelamin', ['' => 'Pilih jenis kelamin','L' => 'Laki-laki', 'P' => 'Perempuan'],'L');!!}
							</div>
							{!!Form::email('email','',['class' => 'form-control','placeholder' => 'Email'])!!}
							{!!Form::password('password',['class' => 'form-control','placeholder' => 'Password'])!!}
							<!-- <input type="text" class="form-control" name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" > -->
							<!-- <input type="phone" class="form-control" name="phone" placeholder="Your Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Phone Number'" > -->	
							<!-- <input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" > -->
							
							<!-- <div class="form-select" id="service-select">
								<select style="display: none;">
									<option datd-display="">Choose Course</option>
									<option value="1">Course One</option>
									<option value="2">Course Two</option>
									<option value="3">Course Three</option>
									<option value="4">Course Four</option>
								</select>
								<div class="nice-select" tabindex="0"><span class="current">Choose Course</span><ul class="list">
								<li data-value="Choose Course" class="option seleceted">Choose Course</li><li data-value="1" class="option">Course One</li>
								<li data-value="2" class="option">Course Two</li><li data-value="3" class="option">Course Three</li>
								<li data-value="4" class="option">Course Four</li></ul></div>
							</div> -->

							<!-- <button class="primary-btn text-uppercase">Submit</button> -->
							<input type="submit" class="primary-btn text-uppercase" value="Kirim" style="text-align: center;">
						<!-- </form> -->
						{!!Form::close()!!}
					</div>
				</div>
			</div>	
		</section>
@stop