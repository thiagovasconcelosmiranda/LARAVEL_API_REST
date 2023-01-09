<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\addressClient;
use Illuminate\Http\Request;

class AddressClientController extends Controller
{
    private $addressClient;
    public function __construct(addressClient $addressClient)
    {
       $this->addressClient = $addressClient;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->addressClient->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resp = response()->json();
        $address = addressClient::where('client_id', $request->client_id)->get();

        if(!$address){
            $req = $this->addressClient->create($request->all());

            if($req){
               $resp = response()
                 ->json([
                  'data' => 'Create success'
              ]);
            }else{
               $resp = response()
                 ->json([
                  'error' => 'Not create'
               ]);
           }
         }else{
            $resp = response()
            ->json([
             'error' => 'Address already exists'
          ]);
         }

        return $resp;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $addressClients = addressClient::where('id', $id)->get();

        foreach ($addressClients as $addressClient) {
            $res = $addressClient;
        }
        return $res;
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
        addressClient::where('id', $id)->update($request->all());

         return  addressClient::where('id', $id)->get();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return addressClient::where('id', $id)->delete();
    }
}
