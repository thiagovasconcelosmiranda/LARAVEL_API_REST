<?php

namespace App\Http\Controllers\Api;
use App\Models\Api\addressCompanies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressCompaniesController extends Controller
{
    private $addressCompanies;
    public function __construct(addressCompanies $addressCompanies )
    {
      $this->addressCompanies = $addressCompanies;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return $this->addressCompanies->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $res ="";
         $address = addressCompanies::where('companie_id', $request->companie_id)->get();
         foreach($address as $res){}

         if($res == ""){
            $req = $this->addressCompanies->create($request->all());
            if($req){
               $res = response()
                 ->json([
                  'data' => 'Create success'
              ]);
            }else{
               $res = response()
                 ->json([
                  'error' => 'Not create'
               ]);
           }
        }else{
            $res = response()
                 ->json([
                  'error' => 'Address already exists'
               ]);
        }

        return $res;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $addressCompanies = addressCompanies::where('id', $id)->get();

        foreach($addressCompanies as $addressCompanie){
            $res = $addressCompanie;
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
        addressCompanies::where('id', $id)->update($request->all());
        return addressCompanies::where('id', $id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return addressCompanies::where('id', $id)->delete();
    }
}
