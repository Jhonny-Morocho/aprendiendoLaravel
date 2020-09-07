@extends('layouts.app')
@section('title','Trainer Edit')

{{-- @section('content','Trainer Create') --}}

@section('content')
    <form action="/ProeditsClubMaterialDesaing/backend/public/trainers/{{ $trainer->slug }}" class="form-group mt-5" method="POST" enctype="multipart/form-data">
        {{-- //para poder enviar campo oculto --}}
        @method('PUT')
        @csrf
        <div class="form-group">
            <img src="../../images/{{ $trainer->avatar }}" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 200px; height: 200px; ">
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="" class="form-control" value="{{ $trainer->nombre }}">
        </div>
        <div class="form-group">
            <label for="">Abatar</label>
            <input type="file" name="avatar" id="" >
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection