<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\schedule;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    private $schedule;
    public function __construct(schedule $schedule)
    {
        $this->schedule = $schedule;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->schedule->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resp =response()->json();
        $req = $this->schedule->create($request->all());

        if($req){
            $resp = response()
                 ->json([
                  'data' => 'create success'
            ]);
       }else{
           $resp = response()
                 ->json([
                  'error' => 'not create'
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
        return schedule::where('authClient_id', $id)->paginate();
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
        return schedule::where('id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return schedule::where('id', $id)->delete();
    }
}
