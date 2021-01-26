@extends('layouts.master')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop
@section('content')
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				@if(session('sukses'))
					<div class="alert alert-success" role="alert">
						{{session('sukses')}}
					</div>
				@endif

				@if(session('error'))
					<div class="alert alert-danger" role="alert">
						{{session('error')}}
					</div>
				@endif

					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
                                    <!-- <img src="{{asset('images/'.$siswa->avatar)}}" class="img-circle" alt="Avatar"> -->
                                    <img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar" width="100px" height="100px">
									    <!-- <img src="{{asset('admin/assets/img/user-medium.png')}}" class="img-circle" alt="Avatar"> -->
										<h3 class="name">{{$siswa->nama_depan}} {{$siswa->nama_belakang}}</h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												{{$siswa->mapel->count()}} <span>Mata Pelajaran</span>
											</div>
											<div class="col-md-4 stat-item">
												{{$siswa->totalNilai()}} <span>Total Nilai</span>
											</div>
											<div class="col-md-4 stat-item">
												{{$siswa->rataRataNilai()}} <span>Rata-rata Nilai</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Data diri</h4>
										<ul class="list-unstyled list-justify">
                                            <li>Nama Lengkap <span>{{$siswa->nama_depan}} {{$siswa->nama_belakang}}</span></li>
											<li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
											<li>Agama <span>{{$siswa->agama}}</span></li>
                                            <li>Alamat <span>{{$siswa->alamat}}</span></li>

											<!-- <li>Role <span>{{auth()->user()->role}}</span></li>
											<li>Nama <span>{{auth()->user()->name}}</span></li> -->
											<!-- <li>Role <span>{{auth()->user()->role}}</span> -->
											<!-- <li>Email <span>{{auth()->user()->email}}</span></li> -->
											<!-- <li>Nama <span>{{auth()->user()->password}}</span></li> -->


                                            <li>
                                                 <div class="text-center"><a href="{{ URL::to('/siswa/'.$siswa->id.'/edit') }}" class="btn btn-warning">Edit Profile</a></div>
                                            </li>
                                        </ul>
                                        <!-- <div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div> -->
									</div>
									
									<!-- <div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div> -->
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- <button type="button" class="btn btn-primary">Primary</button> -->
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
									Tambah Nilai
								</button>
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Mata Pelajaran</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>KODE</th>
												<th>NAMA</th>
												<!-- <th>SEMESTER</th> -->
												<th>NILAI</th>
												<th>GURU</th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											@foreach($siswa->mapel as $mapel)
											<tr>
												<!-- <td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												<td>{{$mapel->pivot->nilai}}</td> -->

												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<!-- <td>{{$mapel->semester}}</td> -->
												<td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="{{ URL::to('/api/siswa/'.$siswa->id.'/editnilai') }}" data-title="Masukkan nilai">{{$mapel->pivot->nilai}}</a></td>
												<!-- <td><a href="{{ URL::to('/siswa/'.$siswa->id.'/editnilai') }}" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="{{ URL::to('/api/siswa/'.$siswa->id.'/editnilai') }}" data-title="Masukkan nilai">{{$mapel->pivot->nilai}}</a></td> -->
												<!-- <td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="api/siswa/{{$siswa->id}}/editnilai" data-title="Masukkan nilai">{{$mapel->pivot->nilai}}</a></td> -->
												<!-- <td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/post" data-title="Masukkan nilai">{{$mapel->pivot->nilai}}</a></td> -->
												<!-- <td><a href="#" id="username" data-type="text" data-pk="{{$mapel->id}}" data-url="/post" data-title="Masukkan nilai">{{$mapel->pivot->nilai}}</a></td> -->
												
												<!-- <td><a href="#">{{$mapel->guru->nama}}</a></td> -->
												<!-- <td><a href="/guru/{{$mapel->guru->id}}/profile">{{$mapel->guru->nama}}</a></td> -->
												<!-- <td><a href="/guru/{{$mapel->guru_id}}/profile">{{$mapel->guru->nama}}</a></td> -->
												<td><a href="{{ URL::to('/guru/'.$mapel->guru_id.'/profile') }}">{{$mapel->guru->nama}}</a></td>
												<!-- <td><a href="{{ URL::to('/siswa/'.$siswa->id.'/'.$mapel->id.'/deletenilai') }}" class="btn btn-primary btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Show</a></td>
												<td><a href="{{ URL::to('/siswa/'.$siswa->id.'/'.$mapel->id.'/deletenilai') }}" class="btn btn-warning btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Edit</a></td> -->
												<td><a href="{{ URL::to('/siswa/'.$siswa->id.'/'.$mapel->id.'/deletenilai') }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Hapus</a></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							
								<div class="panel">
								<h3> Tekan Ctrl+R untuk mereload Chart Nilai Siswa setelah nilai siswa di edit</h3>
								<br>
								<br>
									<div id="chartNilai"></div>
								</div>

							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
        </div>

		<div class="panel-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>RANKING</th>
						<th>NAMA</th>
						<th>NILAI</th>
					</tr>
				</thead>
				<tbody>
					@php
						$ranking = 1;
					@endphp
					@foreach(ranking5Besar() as $s)
					<tr>
						<td>{{$ranking}}</td>
						<td>{{$s->nama_lengkap()}}</td>
						<td>{{$s->rataRataNilai}}</td>
					</tr>
					@php
						$ranking++;
					@endphp
					@endforeach
				</tbody>
			</table>
		</div>


		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
				<!-- <form action="/siswa/{{$siswa->id}}/addnilai" method="POST" enctype="multipart/form-data">  -->
				<form action="{{ URL::to('/siswa/'.$siswa->id.'/addnilai') }}" method="POST" enctype="multipart/form-data"> 
                        {{csrf_field()}}
                        <!-- <div class="form-group"> -->
                        <!-- <div class="form-group has-error"> -->
						
						<div class="form-group">
							<label for="mapel">Mata Pelajaran</label>
							<select class="form-control" id="mapel" name="mapel">
							@foreach($matapelajaran as $mp)
								<option value="{{$mp->id}}">{{$mp->nama}}</option>
							@endforeach
							</select>
						</div>

                        <div class="form-group{{$errors->has('nilai') ? 'has-error' : ''}}">
                            <label for="exampleInputEmail1">Nilai</label>
                            <input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai" value="{{old('nilai')}}">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            @if($errors->has('nilai'))
                                <span class="help-block">{{$errors->first('nilai')}}</span>
                            @endif
                        </div>
				

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
				</div>
			</div>
		</div>
		


    @stop

	@section('footer')
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script> -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

	<script>

		// Highcharts.chart('container', {
			
		Highcharts.chart('chartNilai', {
			chart: {
				type: 'column'
				// type: 'line'
				// type: 'pie'


			},
			title: {
				text: 'Laporan Nilai Siswa'
			},
			subtitle: {
				text: 'TURBO (Tunarungu Belajar Online)'
			},
			xAxis: {
				// categories: {{json_encode($categories)}},
				categories: {!!json_encode($categories)!!},
				// categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Nilai'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				// pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				// 	'<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [{
				name: 'Mapel',
				// data: [49.9, 71.5,80]
				data: {!!json_encode($data)!!}

			// }, {
			// 	name: 'New York',
			// 	data: [83.6, 78.8]

			// }, {
			// 	name: 'London',
			// 	data: [48.9, 38.8]

			// }, {
			// 	name: 'Berlin',
			// 	data: [42.4, 33.2]

			}]
		});

		//script jquery
		$(document).ready(function() {
        	// $('#username').editable();
			$('.nilai').editable();
    	});

	</script>
	@stop