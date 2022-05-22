@extends('layout')
@section('title','Show')
@section('content')
    <div class="d-flex justify-content-center">
        <h3>{{$data->busNum}} ⁃ {{$data->busAlph}}</h3>
    </div>

    <div class="h-100 row align-items-center mt-2">
        {!! QrCode::size(400)->generate('http://127.0.0.1:8000/code/'.$data->barCodeUrl) !!}
    </div>
@endsection