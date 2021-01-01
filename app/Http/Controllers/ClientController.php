<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\State;
use App\Models\Client;
use App\Models\ClientAddress;
use App\Models\ClientAddressType;

use Auth;


class ClientController extends Controller
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
        $clients = Client::orderBy('name')->get();
        return view('clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::orderBy('name')->get();

       

        return view('clients.show',compact('states'));
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
                'client_name'         => 'required|string',
                'billing_street'        => 'required|string',
                'billing_city'          => 'required|string',
                'billing_state'         => 'required|string',
                'billing_zipcode'       => 'required|string',
                'site_street'           => 'required|string',
                'site_city'             => 'required|string',
                'site_state'            => 'required|string',
                'site_zipcode'          => 'required|string'
            ]);

            // dd($request->all());

            try{

                DB::transaction(function () use($request){
                   
                    $client = new Client();

                    $client->name = $request->client_name;
                    $client->created_by = Auth::user()->id;
                    $client->created_at = date('Y-m-d h:i:s');
                    $client->updated_by = Auth::user()->id;
                    $client->updated_at = date('Y-m-d h:i:s');

                    $client->save();

                    $billingAddressType = ClientAddressType::where('name','=','Billing')->first();

                    $billingAddress = new ClientAddress();

                    $billingAddress->address_type_id = $billingAddressType->id;
                    $billingAddress->client_id        = $client->id;
                    $billingAddress->street             = $request->billing_street;
                    $billingAddress->city               = $request->billing_city;
                    $billingAddress->state              = $request->billing_state;
                    $billingAddress->zipcode            = $request->billing_zipcode;
                    $billingAddress->created_by         = Auth::user()->id;
                    $billingAddress->created_at         = date('Y-m-d h:i:s');
                    $billingAddress->updated_by         = Auth::user()->id;
                    $billingAddress->updated_at         = date('Y-m-d h:i:s');

                    $billingAddress->save();


                    $siteAddressType = ClientAddressType::where('name','=','Site')->first();

                    $siteAddress = new ClientAddress();

                    $siteAddress->address_type_id = $siteAddressType->id;
                    $siteAddress->client_id        = $client->id;
                    $siteAddress->street             = $request->site_street;
                    $siteAddress->city               = $request->site_city;
                    $siteAddress->state              = $request->site_state;
                    $siteAddress->zipcode            = $request->site_zipcode;
                    $siteAddress->created_by         = Auth::user()->id;
                    $siteAddress->created_at         = date('Y-m-d h:i:s');
                    $siteAddress->updated_by         = Auth::user()->id;
                    $siteAddress->updated_at         = date('Y-m-d h:i:s');

                    $siteAddress->save();


                });

                return redirect()->route('clients')->with('success','Client\'s account created succesfully');


            }catch(\Exception $e){

                return back()->with('failed','Failed to create client\'s account. Error: '.$e->getMessage());
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
        $client = Client::find($id);

        return view('clients.show',compact('client'));
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
