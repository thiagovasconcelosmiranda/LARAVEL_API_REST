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
        $response = [];
       
        $imgOne = $request->file('imgOne');
        $imgTwo = $request->file('imgTwo');
        $imgThree = $request->file('imgThree');
        $imgFour = $request->file('imgFour');
      
        if($imgOne && $imgTwo && $imgThree && $imgFour){
            $one = $imgOne->store('gallery', 'public');
            $two =  $imgThree->store('gallery', 'public');
            $three = $imgTwo->store('gallery', 'public');
            $four = $imgFour->store('gallery', 'public');

          
        } 

            $gallery = new Gallery();
            $gallery->imgOne = $one;
            $gallery->imgTwo = $two;
            $gallery->imgThree = $two;
            $gallery->imgFour = $four;
            $gallery->company_id = $request->company_id;
            $gallery->save();
        
      
     return $gallery;
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $gallery = Gallery::where('company_id', $id)->get();
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
                "company_id" => $dados->company_id
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
