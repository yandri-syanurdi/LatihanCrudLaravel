@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-md-12"> -->
					<div class="col-md-6">
						  <!-- <img src="{{asset('admin/assets/img/halow.jpeg')}}"  alt="Avatar" width="800px" height="750px"> -->
						  <img src="{{asset('admin/assets/img/halow.jpeg')}}"  alt="Avatar" style="position: relative; width:100%; height:100%; max-width:100%; max-height:100%;">

					</div>

					<div class="col-md-6">

					<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Rangking 5 besar</h3>
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
						</div>

					<div class="col-md-6">
						<div class="metric">
							<span class="icon"><i class="fa fa-user"></i></span>
							<p>
								<span class="number">{{totalSiswa()}}</span>
								<span class="title">Total Siswa</span>
							</p>
						</div>

						<div class="metric">
							<span class="icon"><i class="lnr lnr-camera-video"></i></span>
							<p>
								<a href="{{ URL::to('/allvideo') }}" ><span class="number">{{totalVideo()}}</span></a>
								<a href="{{ URL::to('/allvideo') }}" ><span class="title">Total Video</span></a>
							</p>
						</div>


						<div class="metric">
							<span class="icon"><i class="fa fa-calendar"></i></span>
							<p>
								<a href="{{ URL::to('/allpostingan') }}" ><span class="number">{{totalPostingan()}}</span></a>
								<a href="{{ URL::to('/allpostingan') }}" ><span class="title">Total Postingan</span></a>
							</p>
						</div>

						<!-- <div class="metric">
							<span class="icon"><i class="lnr lnr-picture"></i></span>
							<p>
								<span class="number">{{totalImage()}}</span>
								<span class="title">Total Image</span>
							</p>
						</div> -->

					</div>

					

					<div class="col-md-6">
						<div class="metric">
							<span class="icon"><i class="lnr lnr-user"></i></span>
							<p>
								<span class="number">{{totalGuru()}}</span>
								<span class="title">Total Guru</span>
							</p>
						</div>

						<div class="metric">
							<span class="icon"><i class="lnr lnr-file-empty"></i></span>
							<p>
								<a href="{{ URL::to('/alldocument') }}" ><span class="number"><span class="number">{{totalDocument()}}</span></a>
								<a href="{{ URL::to('/alldocument') }}" ><span class="title">Total Document</span></a>
							</p>
						</div>



						<div class="metric">
							<span class="icon"><i class="lnr lnr-calendar-full"></i></span>
							<p>
								<a href="{{ URL::to('/allevent') }}" ><span class="number">{{totalEvent()}}</span> </a>
								<a href="{{ URL::to('/allevent') }}" ><span class="title">Total Event</span></a>
							</p>
						</div>


						
						

						<!-- <div class="metric">
							<span class="icon"><i class="lnr lnr-music-note"></i></span>
							<p>
								<span class="number">{{totalAudio()}}</span>
								<span class="title">Total Audio</span>
							</p>
						</div> -->

						

						<!-- <div class="metric">
							<span class="icon"><i class="fa fa-download"></i></span>
							<p>
								<span class="number">{{totalGuru()}}</span>
								<span class="title">Total Guru</span>
							</p>
						</div> -->

					</div>

					

					</div>
					

                </div>
            </div>
        </div>
    </div>
@stop