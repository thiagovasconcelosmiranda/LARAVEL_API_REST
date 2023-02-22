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
         $userDate = $request->only('name', 'email',  'password');

          $userDate['password'] = bcrypt($userDate['password']);

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
                   'user' => 'sucess create'
               ]
             ]);


          }

        return $dados;

    }

}
