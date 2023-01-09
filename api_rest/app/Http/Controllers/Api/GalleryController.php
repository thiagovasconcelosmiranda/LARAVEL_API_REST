<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    private $gallery;
    public function __construct(Gallery $gallery)
    {
      $this->gallery = $gallery;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->gallery->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $imgOne = $request;
        /*
        $imgTwo = $request->file('imgTwo');
        $imgThree = $request->file('imgThree');
        $imgFour = $request->file('imgFour');


        if($imgOne && $imgTwo && $imgThree && $imgFour){
           $galleryOne = $imgOne->store('galleries','public');
           $galleryTwo = $imgTwo->store('galleries','public');
           $galleryThree = $imgThree->store('galleries','public');
           $galleryFour = $imgFour->store('galleries','public');
       }

       $dataGallery =[
        'imgOne'=> $galleryOne,
        'imgTwo'=> $galleryTwo,
        'imgThree'=>$galleryThree,
        'imgFour'=>$galleryFour,
        'client_id'=> $request->client_id
    ];
    */

        return $request['imgOne'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $gallery = Gallery::where('Client_id', $id)->get();

           $array = [
              'data' => $gallery
          ];

          foreach ($gallery as $dados) {
             $array = [
                'id'=> $dados->id,
                'imgOne' => $dados->imgOne,
                'imgTwo'=> $dados->imgTwo,
                'imgThree' => $dados->imgThree,
                'imgFour' => $dados->imgFour,
                "client_id" => $dados->client_id
             ];
          }

        return $array;

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
        return Gallery::where('id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     return Gallery::where('id', $id)->delete();
    }
}
