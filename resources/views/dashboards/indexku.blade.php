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
										@foreach($siswa as $s)
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
                </div>
            </div>
        </div>
    </div>
@stop