@extends('layouts.app')
@section('title','Trainer')

{{-- @section('content','Trainer Create') --}}

@section('content')
<div class="row">
    @foreach ($trainers as $trainer)
            <div class="col-sm mt-3">
                <div class="card text-center mt-5" style="width: 18rem;" >
                    <img src="images/{{ $trainer->avatar }}" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 100px; height: 100px; ">
                    <div class="card-body">
                    <h5 class="card-title">{{$trainer->nombre }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="trainers/{{ $trainer->slug }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
    @endforeach
</div>
@endsection




