@extends('layouts.main')

@section('main-content')

<div class="card card-purple">
    <div class="card-header">
      <h3 class="card-title">Add Client Address</h3>

  
    </div>
    
    <div class="card-body">

      <h3 class="text-center text-purple">{{$client->name}}</h3>

      <form action="{{route('client.addresses.store')}}" method="post">
      
      {{ csrf_field() }}
        <input type="hidden" name="client_id" value="{{$client->id}}">
  
        <div class="form-group">
          <label>Address Type</label>
          <select class="form-control" name="address_type">
            @foreach ($addressTypes as $addressType)
           
            <option value="{{$addressType->id}}">{{$addressType->name}}</option>
                
            @endforeach
          </select>
      </div>
  
          <div class="form-group">
              <label for="street">Street</label>
              <input name="street" type="text" class="form-control" id="street" placeholder="Street"  required>
          </div>
  
          
  
            <div class="form-group">
              <label for="city">City</label>
              <input name="city" type="text" class="form-control" id="city" placeholder="City" >
          </div>
  
           
  
          <div class="form-group">
              <label>Province</label>
              <select class="form-control" name="state">
                @foreach ($states as $state)
                <option value="{{$state->abrev}}">{{$state->name}}</option>
                    
                @endforeach
              </select>
          </div>
          
         
  
          <div class="form-group">
            <label for="zipcode">Zipcode</label>
            <input name="zipcode" type="text" class="form-control" id="zipcode"  placeholder="Zipcode" >
        </div>
  
        <div class="text-right">
          <button type="submit" class="btn btn-primary">Save Client's Address</button>
  
        </div>
      </form>


    </div>
</div>

@endsection()
