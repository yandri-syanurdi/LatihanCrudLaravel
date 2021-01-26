



@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        <!-- LEFT COLUMN -->
                        <div class="col-md-12">
                        <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                    <div class="profile-main">
                                    <!-- <img src="{{url('storage/admin/'.$siswa->profile)}}" class="img-circle" alt="Avatar" width="300px" height="300px"> -->
                                    <!-- <img src="{{url('images/'.$siswa->avatar)}}" class="img-circle" alt="Avatar" width="300px" height="300px"> -->
                                    <img src="{{auth()->user()->siswa->getAvatar()}}" class="img-circle" alt="Avatar" width="300px" height="300px">
                                    <!-- <iframe src="{{url('storage/event/'.$siswa->brosur)}}" style="width: 900px; height: 700px;"></iframe> -->
                                    <!-- <img src="{{url('storage/event/'.$siswa->brosur)}}" height="800px;" width="1300px;"> -->
                                    <!-- <img src="{{url('storage/event/'.$siswa->brosur)}}" height="800px;" width="1000px;"> -->
                                    <h3 class="name">{{auth()->user()->siswa->nama_depan}} {{auth()->user()->siswa->nama_belakang}}</h3>
                                    <span class="name">{{$siswa->alamat}}</span>
                                </div>
                                <div class="profile-stat">
                                <div class="row">
                                    <!-- <div class="col-md-6 stat-item">
                                        {{$siswa->tanggal_mulai}} <span>Tanggal Mulai</span>
                                    </div> -->
                                    <!-- <div class="col-md-6 stat-item">
                                        {{$siswa->tanggal_selesai}} <span>Tanggal Selesai</span>
                                    </div> -->
                                    <!-- <div class="col-md-4 stat-item">
                                        2174 <span>Points</span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    <!-- END PROFILE HEADER -->
                    <!-- PROFILE DETAIL -->
                    <div>
                    <div class="profile-detail">
                        <div class="col-md-6" >
                        <div class="profile-info">
                            <h4 class="heading">Basic Info</h4>
                            <ul class="list-unstyled list-justify">
                                <li>Nama Pengguna : {{auth()->user()->siswa->nama_depan}} {{auth()->user()->siswa->nama_belakang}}</li>
                                <!-- <li>Nomor Telepon    : {{$siswa->telpon}}</li> -->
                                <li>Agama     : {{auth()->user()->siswa->agama}}</li>
                                <li>Tanggal Lahir   :  {{auth()->user()->siswa->tgl_lahir}}</li>
                                <li>Jenis Kelamin    : {{auth()->user()->siswa->jenis_kelamin}}</li>
                                <li>Suku   :  {{auth()->user()->siswa->suku}}</li>
                                <li>Alamat Pengguna   : {{auth()->user()->siswa->alamat}}</li>
                                <li>Role  :{{auth()->user()->role}} </li>
								<li>Email : {{auth()->user()->email}}</li>
                                <br />
                                <li>
                                       
                                        <a href="{{ URL::to('/profilsaya/'.auth()->user()->siswa->id.'/edit') }}" class="btn btn-warning">Edit Profile</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                       

                        <!-- <div class="profile-info">
                            <h4 class="heading">About</h4>
                            <p>Buat suatu acara yang menyenangkan untuk menambah kreatifitas siswa.</p>
                        </div> -->

                        <!-- <div class="text-center"><a href="#" class="btn btn-primary">Edit Profile</a></div> -->
                    </div>
                    </div>
                    <!-- END PROFILE DETAIL -->
                     <div>
                        <div class="text-right">
                            <h4 class="heading">Social Links</h4>
                            <ul class="list-inline social-icons">
                                <li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="whatsapp-bg"><i class="fa fa-whatsapp"></i></a></li>
                                <li><a href="#" class="instagram-bg"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        </div>
                    
                </div>
                <!-- END LEFT COLUMN -->        
            </div>
        </div>
    </div>
</div>
@stop

