@extends('layouts.app')
@section('title','Traine')

{{-- @section('content','Trainer Create') --}}

@section('content')
<img src="../images/{{ $trainer->avatar }}" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 200px; height: 200px; ">
    <div class="text-center">
        <h5 class="card-title">{{ $trainer->nombre }}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> 
        <a href="{{ $trainer->slug }}/edit" class="btn btn-primary">Editar</a>
    </div>
@endsection




