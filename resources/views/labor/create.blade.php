@extends('layout')
@section('title','Create')
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
    <form action="/labor" method="POST">
        <div class="form-group">


            <label class="mt-2 font-weight-bold">Product status</label>
            <select name="Bus_id" id="active" class="form-control">
                <option value="" disabled>Select Bus</option>
                @foreach ($buses as $bus)    
                    <option value={{$bus->id}}>{{$bus->busNum}} . {{$bus->busAlph}} </option>
                @endforeach
            </select>
            <h5 class="text-danger">{{$errors->first('Bus_id')}}</h5>

          <label class="mt-2 font-weight-bold">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Name">
          <h5 class="text-danger">{{$errors->first('name')}}</h5>

          <label class="mt-2 font-weight-bold">Phone</label>
          <input type="text" name="phone" class="form-control" placeholder="Phone">
          <h5 class="text-danger">{{$errors->first('phone')}}</h5>

        </div>
            

        <button class=" btn btn-primary mt-2" type="submit">Submit</button>
        
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>


    @endsection