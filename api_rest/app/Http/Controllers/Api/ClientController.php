<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $client;
    public function __construct(Client $client){
       $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->client->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $images = $request->file('file');
        if($images){
           $file = $images->store('users','public');
        }
        
        $client = new Client();
        $client->name = $request->name;
        $client->cpf = $request->cpf;
        $client->maritalStatus = $request->maritalStatus;
        $client->cell = $request->cell;
        $client->users_id = $request->users_id;
        $client->file = $file;
        $client->facebook = $request->facebook;
        $client->linkedin = $request->linkedin;
        $client->instagram = $request->instagram;
        $client->twitter = $request->twitter;
        
        if($client->save()){
         $response = response()
             ->json([
                'data' => [
                    'sucess' => 'create sucess'
                ]
          ]);

        }else{
            $response = response()
             ->json([
                'data' => [
                    'error' => ' not create'
                ]
          ]);

        }

        
        return $response;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $clients = Client::where('users_id', $id)->get();
        foreach ($clients as $client) {
            $dados = $client;
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

        return Client::where('id', $id)->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        return Client::where('id', $id)->get();
    }
}
