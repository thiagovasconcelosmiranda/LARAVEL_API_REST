<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Favorite;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Function_;

class FavoriteController extends Controller
{
    private $favorite;
    public function __construct(Favorite $favorite)
    {
     $this->favorite = $favorite;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->favorite->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Favorite::create($request->all());
         return $create;
    }

    /**
     * Display the specified resource.
    
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
       return Favorite::where('user_id', $id)->paginate();
       
        
        
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
        return Favorite::where('id', $id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Favorite::where('id', $id)->delete();
    }
}
