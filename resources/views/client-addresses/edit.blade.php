@extends('layouts.main')

@section('main-content')

<div class="card card-purple">
    <div class="card-header">
      <h3 class="card-title">Edit Client Address</h3>


    </div>

    <div class="card-body">

      <form action="{{route('client.addresses.update',['id'=>$clientAddress->id])}}" method="post">

        {{ csrf_field() }}

        <div class="form-group">
          <label>Address Type</label>
          <select class="form-control" name="address_type">
            @foreach ($addressTypes as $addressType)

            <option value="{{$addressType->id}}"

              @if ($addressType->id == $clientAddress->address_type_id)
                selected
              @endif
              >{{$addressType->name}}</option>

            @endforeach
          </select>
      </div>

          <div class="form-group">
              <label for="street">Street</label>
              <input name="street" type="text" class="form-control" id="street" placeholder="Street" value="{{$clientAddress->street}}" required>
          </div>



            <div class="form-group">
              <label for="city">City</label>
              <input name="city" type="text" class="form-control" id="city" placeholder="City" value="{{$clientAddress->city}}">
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
            <input name="zipcode" type="text" class="form-control" id="zipcode" value="{{$clientAddress->zipcode}}" placeholder="Zipcode" >
        </div>

          <div class="form-group">
            <label for="zipcode">Status</label>
           <select class="form-control" name="active">
                <option value="1" {{$clientAddress->active? "selected":""}}>Active</option>
                <option value="0" {{!$clientAddress->active? "selected":""}}>InActive</option>
            <select>
        </div>

        <div class="text-right">
          <button type="submit" class="btn btn-primary">Update Client's Address</button>

        </div>
      </form>


    </div>
</div>

@endsection()
