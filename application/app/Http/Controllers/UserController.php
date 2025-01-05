<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{


////////////////////////////////////////////////////////////////////////////////////////////////////////

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'role' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect('/login')->with('success', 'Account created successfully! Please log in.');
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
public function showLoginForm()
    {
        return view('login');
    }

    public function showRegistrationForm ()
    { $currentIndex=0;
        return view('HomePage');
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////

public function login(Request $request)
{
    // Validation des champs requis
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Récupération des identifiants
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Redirection selon le rôle de l'utilisateur
        if ($user->role === 'doctor') {
            return redirect()->route('doctor.profile'); // Redirection pour les médecins
        } elseif ($user->role === 'patient') {
            return redirect()->route('patient.dashboard'); // Redirection pour les patients
        }
    }

    // Si les identifiants sont incorrects
    return back()->with('error', 'Incorrect Email Or Password');
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
