@extends('layouts.master')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-md-12"> -->
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

					</div>

					<div class="col-md-3">
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
								<span class="number">{{totalVideo()}}</span>
								<span class="title">Total Video</span>
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

					<div class="col-md-3">
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
								<span class="number">{{totalDocument()}}</span>
								<span class="title">Total Document</span>
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
@stop