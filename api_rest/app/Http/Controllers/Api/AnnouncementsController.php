<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Announcements;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
   private $announcements;
    public function __construct(Announcements $announcements)
    {
    $this->announcements = $announcements;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->announcements->paginate();
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
        $announcements = Announcements::where('client_id', $request->client_id)->get();
        foreach($announcements as $res)

        if($res == ""){
           $req = $this->announcements->create($request->all());
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
                 'error' => 'Announcement already exists'
              ]);
       }

       return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $title
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        return Announcements::where([['title', 'like', '%'.$title.'%']])->paginate();
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
        return Announcements::where('id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Announcements::where('id', $id)->delete();
    }
}
