<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\State;
use App\Models\Client;
use App\Models\ClientAddress;
use App\Models\ClientAddressType;

use Auth;

class ClientAddressController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function create($client_id)
    {
        //


        $client = Client::find($client_id);

        if(!$client)
        {
            return back()->with('failed','Failed to load Client record. Please refresh the page and try again');
        }




        $states = State::orderBy('name')->get();
        $addressTypes = ClientAddressType::orderBy('name')->get();

        return view('client-addresses.create',compact('client','states','addressTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate(
            [
                'client_id'        => 'required|integer',
                'address_type'     => 'required|integer',
                'street'           => 'required|string',
                'city'             => 'required|string',
                'state'            => 'required|string',
                'zipcode'          => 'required|string'
            ]);

            // dd($request->all());


        $client = Client::find($request->client_id);

        if(!$client)
        {
            return back()->with('failed','Failed to load Client record. Please try again');
        }

        $clientAddressType = ClientAddressType::where('id','=',$request->address_type)->first();

        // dd($request->address_type);

        if(!$clientAddressType)
        {
            return back()->with('failed','Invalid address type');
        }

        try{

            DB::transaction(function () use($request,$client) {

                $clientAddress = new ClientAddress();

                if($request->address_type == ClientAddressType::$BILLING_ADDRESS_ID)
                {
                    //Only one billing address at a time... Therefore we disable the others
                    $clientAddresses = ClientAddress::where(
                        [
                            ['client_id','=',$client->id],
                            ['address_type_id','=',$request->address_type],
                            ['active','=',1]
                        ])->get();

                        if(count($clientAddresses)>0)
                        {
                            foreach($clientAddresses as $address)
                            {
                                $address->active = false;
                                $address->save();
                            }

                        }

                }

                $clientAddress->address_type_id    = $request->address_type;
                $clientAddress->client_id        = $client->id;
                $clientAddress->street             = $request->street;
                $clientAddress->city               = $request->city;
                $clientAddress->state              = $request->state;
                $clientAddress->zipcode            = $request->zipcode;
                $clientAddress->created_by         = Auth::user()->id;
                $clientAddress->created_at         = date('Y-m-d h:i:s');
                $clientAddress->updated_by         = Auth::user()->id;
                $clientAddress->updated_at         = date('Y-m-d h:i:s');

                $clientAddress->save();

            });

        return redirect()->route('clients.show',['id'=>$client->id])->with('success','Client\'s address saved successfully');


        }catch(\Exception $e){

            return back()->with('failed','Failed to save client\'s address. Error message: '.$e->getMessage());
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
        $states = State::orderBy('name')->get();
        $clientAddress = ClientAddress::find($id);
        $addressTypes = ClientAddressType::orderBy('name')->get();

        if(!$clientAddress || !$addressTypes)
        {
            return back()->with('failed','Failed to locate address record');
        }


        return view('client-addresses.edit',compact('states','clientAddress','addressTypes'));
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

        // dd($request->all());
        $request->validate(
            [
                'address_type'     => 'required|integer',
                'street'           => 'required|string',
                'city'             => 'required|string',
                'state'            => 'required|string',
                'zipcode'          => 'required|string'
            ]);

            $clientAddress = ClientAddress::find($id);

            if(!$clientAddress)
            {
                return back()->with('failed','Failed to load address record. Please try again.');
            }

            try{

                DB::transaction(function () use($request,$clientAddress) {


                if(
                    $request->address_type == ClientAddressType::$BILLING_ADDRESS_ID
                    && !$clientAddress->active
                    && $request->active =='1'
                    )
                {
                    //Only one billing address at a time... Therefore we disable the others
                    $clientAddresses = ClientAddress::where(
                        [
                            ['address_type_id','=',$request->address_type],
                            ['active','=',1]
                        ])->get();

                        if(count($clientAddresses)>0)
                        {
                            foreach($clientAddresses as $address)
                            {
                                $address->active = false;
                                $address->save();
                            }

                        }

                }

                    $clientAddress->address_type_id    = $request->address_type;
                    $clientAddress->street             = $request->street;
                    $clientAddress->city               = $request->city;
                    $clientAddress->state              = $request->state;
                    $clientAddress->zipcode            = $request->zipcode;
                    $clientAddress->updated_by         = Auth::user()->id;
                    $clientAddress->updated_at         = date('Y-m-d h:i:s');
                    $clientAddress->active             = $request->active;

                    $clientAddress->save();
                });

                 return redirect()->route('clients.show',['id'=>$clientAddress->client_id])->with('success','Client\'s address updated successfully');


            }catch(\Exception $e)
            {
                return back()->with('failed','Failed to save client\'s address. Error message: '.$e->getMessage()." Line: " .$e->getLine());

            }



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
