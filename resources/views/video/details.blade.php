@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Mata Pelajaran : {{$data->nama_mapel}}</h3>
							<h3 class="panel-title">Tingkat : {{$data->nama_tingkat}}</h3>
                        </div>
                        <div class="panel-body">

                        <div class="col-md-12">
							<!-- PANEL NO PADDING -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><b>{{$data->nama}}</b></h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding bg-primary text-center">
									<!-- <div class="padding-top-30 padding-bottom-30">
										<i class="fa fa-thumbs-o-up fa-5x"></i>
										<h3>No Content Padding</h3>
									</div> -->
                                    <p></p>
                                    <iframe src="{{url('storage/video/'.$data->video)}}" style="width: 900px; height: 500px;"></iframe>
								</div>
                                <div class="panel-body">
									<p>Deskripsi : {{$data->deskripsi}}</p>
								</div>
								<div class="panel-footer">
									<h5>TURBO (Tunarungu Belajar Online)</h5>
								</div>
							</div>
							<!-- END PANEL NO PADDING -->
						</div>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

