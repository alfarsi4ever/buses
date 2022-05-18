@extends('layout')
@section('title','Edit')
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
    <form action="/code/{{$id}}" method="POST">
        <div class="form-group">
          <label class="mt-2 font-weight-bold">Bus Number</label>
          <input type="text" name="busNum" class="form-control" placeholder="Bus Number">

          <label class="mt-2 font-weight-bold">Bus Letters</label>
          <input type="text" name="busAlph" class="form-control" placeholder="Bus Letters">

        </div>
            

        <button class=" btn btn-primary mt-2" type="submit">Submit</button>
        
            <h5 class="text-danger">{{$errors->first('busNum')}}</h5>
            <h5 class="text-danger">{{$errors->first('busAlph')}}</h5>
            @method('PATCH')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

@endsection