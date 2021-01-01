@extends('layouts.main')

@section('main-content')

<div class="card">
    <h1 class="card-header bg-cb">Work Orders</h1>
       <div class="card-body">

         <div class="table-responsive border rounded p-1">
           <table class="table mDataTable">
             <thead class="bg-navy">
               <tr>
                 <th class="font-weight-bold">Issue Date</th>
                 <th class="font-weight-bold">Work Required</th>
                 <th class="font-weight-bold">Client</th>
                 <th class="font-weight-bold">Serivice Work Order</th>
                 <th class="font-weight-bold">Site Address</th>
                 <th class="font-weight-bold">Created By</th>
                 <th class="font-weight-bold">Date Created</th>
                 <th class="font-weight-bold"></th>


                 <th></th>
               </tr>
             </thead>
             <tbody>

                @foreach ($workOrders as $workOrder)

                <tr>
                    <td>{{date('M d, Y' , strtotime($workOrder->issue_date))}}</td>
                    <td>{{$workOrder->work_required}}</td>
                    <td>{{$workOrder->client->name}}</td>
                    <td>{{$workOrder->id}}</td>
                    <td>{{$workOrder->siteAddress->street.", ".$workOrder->siteAddress->city.", ".$workOrder->siteAddress->state.", ".$workOrder->siteAddress->zipcode}}</td>
                    <td>{{$workOrder->createdBy->name}}</td>
                    <td>{{date('M d, Y',strtotime($workOrder->created_at))}}</td>
                    <td><a href="#" class="btn btn-primary">View</a></td>

                </tr>

                @endforeach


             </tbody>
           </table>
         </div>

       </div>
   </div>

@endsection
