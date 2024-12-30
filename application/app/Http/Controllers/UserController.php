<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{


////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:555' ,
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|string|max:555',
            ]
            );

        $user = User::create(
            [
                'name' => $request->name ,
                'email' =>  $request->email ,
                'password' => bcrypt( $request->password) ,
                'role' =>  $request->role ,

            ]
            );
         return response()->json($user,201);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////



public function index(){

    $user = User::all();
    return responce()->json($user);

}

////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function show($id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        return response()->json($user);
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function login(Request $request)
    {
        $v = $request->validate(
            [
                'email'=> 'required|email',
                'password'=> 'required',
            ]
            );
        if( Auth::attempt($v)) // methode compare les informations
        {
            $user = Auth::user(); // permet de récupérer les informations de l'utilisateur authentifié

            if($user->role === 'doctor'){
                return response()->json(['redirect'=> '/profildoctor', 'user' =>$user], 200);
            if($user->role === 'patient')
            {
                return response()->json(['redirect'=> '/profilpatient', 'user' => $user], 200);
            }
        
            return response()->json(['message' => 'Identifiants invalides'], 401);
            }
        }    
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function destroy($id){

        $user = User::find($id);

        if(!$user){
            return responce()->json(['message '=>' user introuvable'],404);
        }

        $user->delete();
            return responce()->json(['message' => 'user delete avec succe']);
    }
}
