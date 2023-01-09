<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Geolocalization;
use Illuminate\Http\Request;

class GeolocalizationController extends Controller
{
    private $geolocalization;

    public function __construct(Geolocalization $geolocalization)
    {
        $this->geolocalization = $geolocalization;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->geolocalization->paginate();

        $res = "";
        $geolocalization = Geolocalization::where('client_id', $request->client_id)->get();
        foreach($geolocalization as $res)

        if($res == ""){
           $req = $this->geolocalization->create($request->all());
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
                 'error' => 'Geolocalization already exists'
              ]);
       }

       return $res;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->geolocalization->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $geolocalizatios = Geolocalization::where('companie_id', $id)->get();
          foreach($geolocalizatios as $geolocalizatio){
             $dados = $geolocalizatio;
          }
          return $dados;
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
        return Geolocalization::where('id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Geolocalization::where('id', $id)->delete();

    }
}
