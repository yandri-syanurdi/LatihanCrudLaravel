@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$forum->judul}}</h3>
                            <p class="panel-subtitle">{{$forum->created_at->diffForHumans()}}</p>
                        </div>
                        <div class="panel-body">
                            {{$forum->konten}}
                            <hr>
                            <h3>Komentar</h3>
                            <ul class="list-unstyled activity-list">
                                <li>
                                    <img src="{{asset('assets/img/user1.png')}}" alt="Avatar" class="img-circle pull-left avatar">
                                    <p><a href="#">Michael</a> has achieved 80% of his completed tasks <span class="timestamp">20 minutes ago</span></p>
                                </li>
                                <li>
                                    <img src="{{asset('assets/img/user2.png')}}" alt="Avatar" class="img-circle pull-left avatar">
                                    <p><a href="#">Daniel</a> has been added as a team member to project <a href="#">System Update</a> <span class="timestamp">Yesterday</span></p>
                                </li>
                                <li>
                                    <img src="{{asset('assets/img/user3.png')}}" alt="Avatar" class="img-circle pull-left avatar">
                                    <p><a href="#">Martha</a> created a new heatmap view <a href="#">Landing Page</a> <span class="timestamp">2 days ago</span></p>
                                </li>
                                <li>
                                    <img src="{{asset('assets/img/user4.png')}}" alt="Avatar" class="img-circle pull-left avatar">
                                    <p><a href="#">Jane</a> has completed all of the tasks <span class="timestamp">2 days ago</span></p>
                                </li>
                                <li>
                                    <img src="{{asset('assets/img/user5.png')}}" alt="Avatar" class="img-circle pull-left avatar">
                                    <p><a href="#">Jason</a> started a discussion about <a href="#">Weekly Meeting</a> <span class="timestamp">3 days ago</span></p>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection