<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrder;
use App\Models\WorkOrderMaterial;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return response()->json([
        //     'status'    => 'success',
        //     'message'   => $request['workOrder']['billing_address_id']
        // ]);

        try
        {

          $workOrderId =   DB::transaction(function () use($request){
                

                $workOrder = WorkOrder::where('guid','=',$request['workOrder']['guid'])->first();

                if(!$workOrder)
                {
                    $workOrder = new WorkOrder();
                    $workOrder->first_uploaded = date('Y-m-d h:i:s');
                }

                $workOrder->guid                    = $request['workOrder']['guid'];
                $workOrder->billing_address_id      = $request['workOrder']['billing_address_id'];
                $workOrder->site_address_id         = $request['workOrder']['site_address_id'];
                $workOrder->client_id               = $request['workOrder']['client_id'];
                $workOrder->issue_date              = date('Y-m-d',strtotime($request['workOrder']['issue_date']));
                $workOrder->po_number               = $request['workOrder']['po_number'];
                $workOrder->requested_by            = $request['workOrder']['requested_by'];
                $workOrder->requested_by_tel        = $request['workOrder']['requested_by_tel'];
                $workOrder->person_to_see           = $request['workOrder']['person_to_see'];
                $workOrder->person_to_see_tel       = $request['workOrder']['person_to_see_tel'];
                $workOrder->service_type            = $request['workOrder']['service_type'];
                $workOrder->work_required           = $request['workOrder']['work_required'];
                $workOrder->work_details            = $request['workOrder']['work_details'];
                $workOrder->work_completed          = $request['workOrder']['work_completed'];
                $workOrder->number_of_technician    = $request['workOrder']['number_of_technician'];
                $workOrder->number_of_apprentice    = $request['workOrder']['number_of_apprentice'];
                $workOrder->hours                   = $request['workOrder']['hours'];
                $workOrder->travel_hrs              = $request['workOrder']['travel_hrs'];
                $workOrder->site_rep_signature      = base64_encode(implode($request['workOrder']['site_rep_signature']));
                $workOrder->technician_signature    = base64_encode(implode($request['workOrder']['technician_signature']));
                $workOrder->created_by              = $request['workOrder']['created_by'];
                $workOrder->created_at              = $request['workOrder']['created_at'];
                $workOrder->updated_by              = $request['workOrder']['updated_by'];
                $workOrder->updated_at              = $request['workOrder']['updated_at'];
                $workOrder->is_signed               = $request['workOrder']['is_signed'];
                $workOrder->is_synced               = $request['workOrder']['is_synced'];
                $workOrder->date_uploaded           = date('Y-m-d h:i:s');

                $workOrder->save();

                if(!empty($request['workOrderMaterialList']))
                {
                    foreach($request['workOrderMaterialList'] as $requestWorkOrderMaterial)
                    {
                        $workOrderMaterial = WorkOrderMaterial::where('guid','=',$requestWorkOrderMaterial['guid'])->first();
    
                        if(!$workOrderMaterial)
                        {
                            $workOrderMaterial = new WorkOrderMaterial();
                        }
    
                        $workOrderMaterial->guid                    = $requestWorkOrderMaterial['guid'];
                        $workOrderMaterial->work_order_id           = $workOrder->id;
                        $workOrderMaterial->material_description    = $requestWorkOrderMaterial['material_description'];
                        $workOrderMaterial->part_number             = $requestWorkOrderMaterial['part_number'];
                        $workOrderMaterial->work_order_guid         = $requestWorkOrderMaterial['work_order_guid'];
                        $workOrderMaterial->quantity                = $requestWorkOrderMaterial['quantity'];
                        $workOrderMaterial->created_at              = $request['workOrder']['created_at'];
                        $workOrderMaterial->updated_at              = $request['workOrder']['updated_at'];

                        $workOrderMaterial->save();

                    }
                }

                return $workOrder->id;


            });

            return response()->json(
                [
                    'status'    => 'success',
                    'message'   =>  $request['workOrder']['guid'],
                    'work_order_number' => $workOrderId
                ]
        );

        }catch(\Exception $e)
        {
            return response()->json([
                'status'    => 'failed',
                'message'   => $e->getMessage(). " Line: " .$e->getLine() 
            ]);
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
