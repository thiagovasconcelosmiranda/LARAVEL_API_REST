<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){

         $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)){
            $dados = response()->json([
                'data'=> [
                   'error' => 'Invalid credentials'
                  ]
               ]);

          }else{
            //Gera o token
            $token = auth()->user()->createToken('auth_token');

            //Buscar id do usuário
            $id = auth()->user()->id;

            //Adiiona o token ao usuário
            $user = User::find($id);
            $user->remember_token = $token->plainTextToken;
            $user->save();

            $dados = response()->json([
                 'data'=> [
                    'token' => $token->plainTextToken
                 ]
                ]);
         };


        return $dados;

    }

    public function logout(){
         $id = auth()->user()->id;

          //Altera o token ao usuário
          $user = User::find($id);
          $user->remember_token = '';
          $user->save();

          //Deleta o token do usuário
          //auth()->user()->tokens()->delete(); //Remove todos os token do cliente.
          auth()->user()->currentAccessToken()->delete(); //Remove o token apenas o token da requisição atual.

          return response()->json([
                'message' => 'Success'
          ], 200);
    }

    public function refresh(Request $request)
    {
        //Busca o token atual do cliente
       return  User::where('remember_token', $request['token'])->paginate();



    }
}
