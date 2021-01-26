@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Artikel Belajar</h3>
                        </div>
                        <div class="panel-body">

                        <div class="col-md-12">
                        <div class="container">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Read Artikel</h4>
                                </div>
                                <div class="panel-body">
                                <h1>{!!$data->title!!}</h1>
                                <hr>
                                {!!$data->detail!!}
                                </div>
                            </div>
                            </div>  
						</div>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

