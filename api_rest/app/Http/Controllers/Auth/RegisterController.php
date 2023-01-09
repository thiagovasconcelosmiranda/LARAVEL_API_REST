<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request, User $user)
    {

        $dados = [];
         $userDate = $request->only('name', 'email',  'password', 'photo');

          $userDate['password'] = bcrypt($userDate['password']);

          $images = $request->file('photo');
          if($images){
            $userDate['photo'] = $result = $images->store('users','public');
         }

          if(!$user = $user->create($userDate)){
            $dados = response()
             ->json([
                'data' => [
                    'error' => 'Error to create anew user...'
                ]
          ]);

          }else{
             $dados = response()
             ->json([
               'data' => [
                   'user' => $user
               ]
             ]);


          }

        return $dados;

    }

}
