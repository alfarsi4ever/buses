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
          <th>Bus Plate</th>
          <th>Name</th>
          <th>Phone</th>
          <th></th>
        </tr>
        @foreach ($labors as $labor)
            <tr>
                <td>{{$labor->code->busNum}} · {{$labor->code->busAlph}}</td>
                {{-- <td>{{$labor->code}}</td> --}}
                <td>{{$labor->name}}</td>
                <td>{{$labor->phone}}</td>
                <td><a href="{{'labor/'.$labor->id.'/edit'}}" class="btn btn-info" role="button">Edit</a></td>
            </tr>
        @endforeach
    </table>
    <a href="labor/create" class="btn btn-success btn-lg" role="button">Create New</a>


@endsection