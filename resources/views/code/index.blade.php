@extends('layout')
@section('title','Home')
@section('content')

    
    @if(session()->has('success'))
        <div class="alert alert-success mt-2">
            {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->has('Exist'))
        <div class="alert alert-danger mt-2">
            {{ session()->get('Exist') }}
        </div>
    @endif 

    <table class="table table-striped table-dark text-center">
        <tr>
          <th>Plate Number</th>
          <th>Plate letters</th>
          <th>QRcode</th>
          <th></th>
        </tr>
        @foreach ($codes as $code)
            <tr>
                <td>{{$code->busNum}}</td>
                <td>{{$code->busAlph}}</td>
                <td><a href="{{'code/'.$code->id}}">Get QR</a></td>
                <td><a href="{{'code/'.$code->id.'/edit'}}" class="btn btn-info" role="button">Edit</a></td>
            </tr>
            
        @endforeach
    </table>
    <a href="code/create" class="btn btn-success btn-lg" role="button">Create New</a>


@endsection