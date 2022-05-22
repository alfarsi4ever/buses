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
    <button class="btn btn-primary my-3" onclick="window.location='/code'"> Back </button>
    <form action="/labor/{{$_here->id}}" method="POST">
        <div class="form-group">
            <div class="form-group">


                <label class="mt-2 font-weight-bold">Bus plate</label>
                <select name="Bus_id" id="active" class="form-control">
                    <option value="" disabled>Select Bus</option>
                    @foreach ($data as $bus)    
                        <option value={{$bus->id}}>{{$bus->code->busNum}} . {{$bus->code->busAlph}} </option>
                    @endforeach
                </select>
                <h5 class="text-danger">{{$errors->first('Bus_id')}}</h5>
    
              <label class="mt-2 font-weight-bold">Name</label>
              <input type="text" name="name" class="form-control" value={{$_here->name}} placeholder={{$_here->name}}>
              <h5 class="text-danger">{{$errors->first('name')}}</h5>
    
              <label class="mt-2 font-weight-bold">Phone</label>
              <input type="text" name="phone" class="form-control" value={{$_here->phone}} placeholder={{$_here->phone}}>
              <h5 class="text-danger">{{$errors->first('phone')}}</h5>
    
            </div>
                
    
            
            @method('PATCH')
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <button class=" btn btn-primary mt-2" type="submit">Submit</button>
    </form>

@endsection