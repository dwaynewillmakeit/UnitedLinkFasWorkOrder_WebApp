@extends('layouts.main')

@section('main-content')

<div class="card card-purple">
    <div class="card-header">
      <h3 class="card-title">Clients</h3>

  
    </div>
    
    <div class="card-body">
        <div class="d-sm-flex align-items-center mb-4">
            <div class="ml-auto text-center mr-5">
              <a href="{{route('clients.create')}}" class="btn btn-primary   ">
                <i class="fas fa-plus fa-10x" style="font-size:2rem"></i>
              
              </a>
             <p class="font-weight-bolder">Add Client</p>

            </div>
        </div>
        <div class="table-responsive">
          <div class="table-responsive border rounded p-1">
              <table class="table mDataTable" id="">
                <thead class="bg-navy">
                  <tr>
                    <th class="font-weight-bold">Name</th>
                    {{-- <th class="font-weight-bold">Billing Address</th> --}}
                    <th class="font-weight-bold">Created by</th>
                    <th class="font-weight-bold">Date Created</th>
                    <th class="font-weight-bold">Update by</th>
                    <th class="font-weight-bold">Date Updated</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clients as $client)
  
                  <tr>
                      <td>{{$client->name}}</td>
                      {{-- <td></td> --}}
                      <td>{{$client->createdBy->name}}</td>
                      <td>{{date('M d, Y',strtotime($client->created_at))}}</td>
                      <td>{{$client->updatedBy->name}}</td>
                      <td>{{date('M d, Y',strtotime($client->updated_at))}}</td>
                      <td>
                        <div class="btn-group-vertical">
                          <a href="{{route('clients.edit',['id'=>$client->id])}}" class="btn btn-danger">Edit</a>
                          <a href="{{route('clients.show',['id'=>$client->id])}}" class="btn btn-primary">View</a>
  
                        </div>
                      </td>
                  </tr>
                      
                  @endforeach
                  
                </tbody>
              </table>
            </div>


        </div>
        
      

    </div>
    <!-- /.card-body -->
  </div>
    
@endsection

@section('scripts')
    @include('partials._datatable-scripts')
@endsection