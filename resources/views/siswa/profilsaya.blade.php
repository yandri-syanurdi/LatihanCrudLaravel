@extends('layouts.master')

@section('header')
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
                                    <img src="{{auth()->user()->siswa->getAvatar()}}" class="img-circle" alt="Avatar" width="100px" height="100px">
										<h3 class="name">{{auth()->user()->siswa->nama_depan}} {{auth()->user()->siswa->nama_belakang}}</h3>
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
                                            <li>Nama Lengkap <span>{{auth()->user()->siswa->nama_depan}} {{auth()->user()->siswa->nama_belakang}}</span></li>
											<li>Jenis Kelamin <span>{{auth()->user()->siswa->jenis_kelamin}}</span></li>
											<li>Agama <span>{{auth()->user()->siswa->agama}}</span></li>
                                            <li>Alamat <span>{{auth()->user()->siswa->alamat}}</span></li>
											<li>Role <span>{{auth()->user()->role}}</span>
											<li>Email <span>{{auth()->user()->email}}</span></li>
                                            <li>
                                                 <!-- <div class="text-center"><a href="{{ URL::to('/auth()->user()->siswa/'.auth()->user()->siswa->id.'/edit') }}" class="btn btn-warning">Edit Profile</a></div> -->
												 <!-- <div class="text-center"><a href="{{ URL::to('/siswa/'.auth()->user()->siswa->id.'/edit') }}" class="btn btn-warning">Edit Profile</a></div> -->
												  <div class="text-center"><a href="{{ URL::to('/profilsaya/'.auth()->user()->siswa->id.'/edit') }}" class="btn btn-warning">Edit Profile</a></div>
                                            </li>
                                        </ul>
									</div>
									
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
									Tambah Nilai
								</button> -->
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
												<!-- <th>AKSI</th> -->
											</tr>
										</thead>
										<tbody>
											@foreach(auth()->user()->siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<!-- <td>{{$mapel->semester}}</td> -->
												<td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="{{ URL::to('/api/auth()->user()->siswa/'.auth()->user()->siswa->id.'/editnilai') }}" data-title="Masukkan nilai">{{$mapel->pivot->nilai}}</a></td>
												<td><a href="{{ URL::to('/guru/'.$mapel->guru_id.'/profile') }}">{{$mapel->guru->nama}}</a></td>
												<!-- <td><a href="{{ URL::to('/auth()->user()->siswa/'.auth()->user()->siswa->id.'/'.$mapel->id.'/deletenilai') }}" class="btn btn-primary btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Show</a></td>
												<td><a href="{{ URL::to('/auth()->user()->siswa/'.auth()->user()->siswa->id.'/'.$mapel->id.'/deletenilai') }}" class="btn btn-warning btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Edit</a></td> -->
												<!-- <td><a href="{{ URL::to('/auth()->user()->siswa/'.auth()->user()->siswa->id.'/'.$mapel->id.'/deletenilai') }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Delete</a></td> -->
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							
								<div class="panel">
								<!-- <h3> Tekan Ctrl+R untuk mereload Chart Nilai auth()->user()->siswa setelah nilai auth()->user()->siswa di edit</h3> -->
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




		


    @stop

	@section('footer')
	<script>

	</script>
	@stop