<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $company;

    public function __construct(Company $company){
        $this->company = $company;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->company->paginate();
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
         $company = Company::where('client_id', $request->client_id)->get();
         foreach($company as $res){}

         if($res == ""){
            $req = $this->company->create($request->all());
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
                  'error' => 'Company already exists'
               ]);
        }

        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $companies = Company::where('client_id', $id)->get();

       foreach ($companies as $companie) {
            $res = $companie;
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
        Company::where('id', $id)->update($request->all());

        return Company::where('id', $id)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Company::where('id', $id)->delete();
    }
}
