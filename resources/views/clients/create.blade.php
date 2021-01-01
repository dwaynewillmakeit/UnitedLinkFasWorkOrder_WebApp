@extends('layouts.main')

@section('main-content')

<div class="card card-purple">
    <div class="card-header">
      <h3 class="card-title">Add Client</h3>

  
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{route('clients.show')}}" method="POST">

          {{ csrf_field() }}
            <div class="form-group">
                <label for="client-name">Client Name</label>
                <input name="client_name" type="text" class="form-control" id="client-name" placeholder="Client Name" required>
            </div>

              <hr>

              <h3 class="text-indigo">Billing Address</h3>

              <br>

              <div class="form-group">
                <label for="billing-street">Street</label>
                <input name="billing_street" type="text" class="form-control" id="billing-street" placeholder="Street" required>
            </div>

            

              <div class="form-group">
                <label for="billing-city">City</label>
                <input name="billing_city" type="text" class="form-control" id="billing-city" placeholder="City">
            </div>

             

            <div class="form-group">
                <label>Province</label>
                <select class="form-control" name="billing_state">
                  @foreach ($states as $state)
                  <option value="{{$state->abrev}}">{{$state->name}}</option>
                      
                  @endforeach
                </select>
            </div>

            <div class="form-group">
              <label for="billing-zipcode">Zipcode</label>
              <input name="billing_zipcode" type="text" class="form-control" id="billing-zipcode" placeholder="Zipcode">
          </div>

            
            <hr>

            <h3 class="text-indigo">Site Address</h3>

            <br>
{{-- 
            <div class="form-check mb-3 ">
              <input type="checkbox" class="form-check-input" id="same-as-billing">
              <label class="form-check-label text-info" for="same-as-billing">Same as Billing Address</label>
            </div> --}}

            <div class="form-group">
              <label for="site-street">Street</label>
              <input name="site_street" type="text" class="form-control" id="site-street" placeholder="Street" required>
          </div>

          

            <div class="form-group">
              <label for="site-city">City</label>
              <input name="site_city" type="text" class="form-control" id="site-city" placeholder="City" required>
          </div>

           

          <div class="form-group">
              <label>Province</label>
              <select class="form-control" name="site_state">
                @foreach ($states as $state)
                <option value="{{$state->abrev}}">{{$state->name}}</option>
                    
                @endforeach
              </select>
          </div>

          <div class="form-group">
            <label for="site-zipcode">Zipcode</label>
            <input name="site_zipcode" type="text" class="form-control" id="site-zipcode" placeholder="Zipcode" required>
        </div>

          <div class="text-right mt-5">
            <button class="btn btn-primary">Create Client Account</button>
          </div>
     
          
        </form>


    </div>
    <!-- /.card-body -->
  </div>
    
@endsection