@extends('layout')
@section('title','Show')
@section('content')
    <div class="d-flex justify-content-center">
        @foreach ($codes as $code)
        <h3>{{$code->busNum}} ⁃ {{$code->busAlph}}</h3>
        @endforeach
    </div>

    <div class="h-100 row align-items-center mt-2">
        {!! QrCode::size(400)->generate('http://127.0.0.1:8000/code/'.$qrcode) !!}
    </div>
@endsection