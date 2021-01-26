@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Berita untuk Tunarungu</h3>
							<!-- <h3 class="panel-title">Tingkat Pelajaran : {{$data->nama_tingkat}}</h3> -->
                        </div>
                        <div class="panel-body">

                        <div class="col-md-12">
							<!-- PANEL NO PADDING -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><b>Judul : {{$data->judul}}</b></h3>
                                    <h3 class="panel-title">Tanggal : {{$data->tanggal}}</h3>
                                    <h3 class="panel-title">Lokasi : {{$data->tempat}}</h3>
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
                                    <iframe src="{{url('storage/berita/'.$data->video)}}" style="width: 900px; height: 500px;"></iframe>
									  <!-- <p>   <img src="{{url('storage/berita/'.$data->video)}}"  alt="Avatar" width="800px" height="500px"> </p> -->
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

