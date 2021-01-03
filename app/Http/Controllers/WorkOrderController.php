<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WorkOrder;

use PDF;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workOrders = WorkOrder::get();

        return view('workorders.index', compact('workOrders'));
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
        //
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

    public function generatePdf(WorkOrder $workorder)
    {

        // dd($workorder);

        $this->saveSignature($workorder->site_rep_signature,'site-rep',$workorder->id);
        $this->saveSignature($workorder->technician_signature,'tech-rep',$workorder->id);


        // return view ('workorders.pdf.show',compact("workorder"));
        $pdf = PDF::loadView('workorders.pdf.show',compact('workorder'));

        return $pdf->stream('tutsmake.pdf');
    }



    public function saveSignature($signatureBlob,$name,$workorderID)
    {

        $data = base64_decode($signatureBlob);
        $image = imagecreatefromstring($data);

        imagejpeg($image, storage_path().'/app/public/signatures/'.$name.$workorderID.".jpg");
    }
}
