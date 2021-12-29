<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$email = $request->get('email');
        try{
            $password = Hash::make($request->get('password'));
        
            $user = new User(array(
                'name'=>$request->get('name'),
                'email'=>$email,
                'password'=>$password,
                ));
                
            $user->save();

            //echo "Guardado con exito";
			
			$newuser = User::where('users.email','=',$email)->first();
		
			$token = csrf_token();
    
                $data = [
                    'name' => $newuser->name,
                    'id'=> $newuser->id,
                    'token' => $token
                ];
				
				 return $data;

        }catch (Exception $e) {
            $error  = 'Excepción capturada: '.  $e->getMessage();
			return ['error' => $error];
        }
        
		

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
