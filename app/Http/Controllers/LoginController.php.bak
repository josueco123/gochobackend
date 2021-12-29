<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //$email = 
        $user = User::where('users.email','=',$credentials['email'])->first();

        if($user != null){

            if(Hash::check($credentials['password'], $user->password)){

                $token = $request->session()->token();
                //$token = csrf_token();
    
                $data = [
                    'name' => $user->name,
                    'id'=> $user->id,
                    'token' => $token
                ];
                
    
                return $data; //echo utf8_encode(json_encode($user));
            }else{
    
                return ['error' => "clave incorrecta"];
            }

        }else{
            return ['error' => "El usuario no existe"];
        }
      
       
    }
}