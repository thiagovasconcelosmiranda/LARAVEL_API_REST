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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $image = $request->file('image');

       if($image){
          $file = $image->store('announcementsPhoto','public');
          $announcements = new Announcements();
          $announcements->title = $request->title;
          $announcements->descrition = $request->descrition;
          $announcements->company_id = $request->company_id;
          $announcements->image = $file;
          $announcements->save();
          if($announcements->save()){
             $response = response()
             ->json([
                'create sucess'
            ]);
          }else{
             $response = response()
             ->json([
                'data' => [
                    'error' => ' not create'
                ]
          ]);
          }
       }else{
         $response = response()
             ->json([
                'data' => [
                    'error' => 'image not create'
                ]
          ]);
        
       }

      
       
      return $response;
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
