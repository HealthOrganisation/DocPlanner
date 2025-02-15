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
    return response()->json($user);

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

        // Vérifier d'abord si l'ID de l'utilisateur existe dans la table "doctors"
        $doctor = \App\Models\Doctor::where('id_user', $user->id)->first();

        // Si l'utilisateur est un médecin, rediriger vers son profil
        if ($doctor) {
            return redirect()->route('doctor.profile'); // Redirection vers le profil du médecin
        }

        // Vérifier ensuite si l'ID de l'utilisateur existe dans la table "patients"
        $patient = \App\Models\Patient::where('id_user', $user->id)->first();

        // Si l'utilisateur est un patient, rediriger vers son profil
        if ($patient) {
            return redirect()->route('doctor'); // Redirection vers le profil du patient
        }

        // Si l'utilisateur n'est ni médecin ni patient, rediriger selon son rôle
        if ($user->role === 'doctor') {
            return redirect()->route('doctor.profile');
        } elseif ($user->role === 'patient') {
            return redirect()->route('patient.store');
        }

        // Si l'utilisateur n'est ni médecin ni patient
        return redirect()->route('home'); // Redirection vers la page d'accueil si l'utilisateur n'existe dans aucune des deux tables
    }

    // Si les identifiants sont incorrects
    return back()->with('error', 'Incorrect Email Or Password');
}



////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function destroy($id){

        $user = User::find($id);

        if(!$user){
            return response()->json(['message '=>' user introuvable'],404);
        }

        $user->delete();
            return response()->json(['message' => 'user delete avec succe']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); // Redirect to the home page after logging out
    }
}
