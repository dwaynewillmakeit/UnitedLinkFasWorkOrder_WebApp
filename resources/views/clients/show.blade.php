@extends('layouts.main')

@section('main-content')

<div class="card card-purple">
    <div class="card-header">
      <h3 class="card-title">{{$client->name}}</h3>

  
    </div>
    
    <div class="card-body">

      <div class="d-sm-flex align-items-center mb-4">
        <div class="ml-auto text-center mr-5">
          <a href="{{route('client.addresses.create',['client_id'=>$client->id])}}" class="btn btn-primary   ">
            <i class="fas fa-plus fa-10x" style="font-size:2rem"></i>
          
          </a>
         <p class="font-weight-bolder">Add Address</p>

        </div>
    </div>

      <div class="table-responsive">
        <table class="table mDataTable" id="">
            <thead class="bg-navy">
              <tr>
                <th class="font-weight-bold">Address Type</th>
                <th class="font-weight-bold">Street</th>
                <th class="font-weight-bold">City</th>
                <th class="font-weight-bold">Province</th>
                <th class="font-weight-bold">Zipcode</th>
                <th class="font-weight-bold">Created by</th>
                <th class="font-weight-bold">Date Created</th>
                <th class="font-weight-bold">Update by</th>
                <th class="font-weight-bold">Date Updated</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($client->addresses as $address)

                <tr>
                    <td>
                       <span class="font-weight-bold"> {{$address->type->name}} </span>
                    </td>
                    <td>{{$address->street}}</td>
                    <td>{{$address->city}}</td>
                    <td>{{$address->state}}</td>
                    <td>{{$address->zipcode}}</td>
                    <td>{{$address->createdBy->name}}</td>
                    <td>{{date('M d, Y',strtotime($address->created_at))}}</td>
                    <td>{{$address->updatedBy->name}}</td>
                    <td>{{date('M d, Y',strtotime($address->updated_at))}}</td>
                    <td><a href="{{route('client.addresses.edit',['id'=>$address->id])}}" class="btn btn-danger">Edit</a></td>
                  
                </tr>
                    
                @endforeach
     
              
            </tbody>
          </table>


      </div>
    </div>
</div>
    
@endsection