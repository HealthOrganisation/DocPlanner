<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    ///////////////////////////////////////////////////// Ajouter un patient
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'nom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'poids' => 'nullable|numeric',
            'taille' => 'nullable|numeric',
        ]);

        $patient = new Patient();
        $patient->id_user = $request->id_user;
        $patient->nom = $request->nom;
        $patient->date_naissance = $request->date_naissance;
        $patient->poids = $request->poids;
        $patient->taille = $request->taille;
        $patient->save();

        return redirect()->route('doctor')->with('success', 'Patient ajouté avec succès');
    }





    ///////////////////////////////////////////////////// Afficher tous les patients

    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }







    ///////////////////////////////////////////////////// Afficher un patient par ID

    public function show($id)
{
    // Récupérer le patient par ID
    $patient = Patient::findOrFail($id);

    // Vérifie si le patient appartient à l'utilisateur connecté
    if ($patient->id_user != auth()->id()) {
        return redirect()->route('home')->withErrors(['message' => 'Accès non autorisé']);
    }

    return view('editprofilepatient', compact('patient'));
}



    ///////////////////////////////////////////////////// Afficher le formulaire de création de profil patient

    public function create()
    {
        return view('patientProfile'); // Formulaire pour ajouter un patient
    }





    ///////////////////////////////////////////////////// Modifier un patient
    public function edit($id)
    {
        $patient = Patient::where('id_user', $id)->first();
    
        if (!$patient) {
            return redirect()->route('home')->withErrors('Profil non trouvé.');
        }
    
        return view('editprofilepatient', compact('patient'));
    }
    



    /////////////////////////////////////////////////////// Modifier un patient

    public function update(Request $request)
    {
        // Récupérer l'ID de l'utilisateur connecté
        $id_user = auth()->id();
    
        // Récupérer le patient associé à cet utilisateur
        $patient = Patient::where('id_user', $id_user)->first();
    
        // Si aucun patient n'est trouvé pour cet utilisateur, rediriger avec un message d'erreur
        if (!$patient) {
            return redirect()->route('home')->withErrors(['message' => 'Patient non trouvé pour cet utilisateur']);
        }
    
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'poids' => 'nullable|numeric',
            'taille' => 'nullable|numeric',
        ]);
    
        // Mettre à jour les données du patient
        $patient->nom = $request->nom;
        $patient->date_naissance = $request->date_naissance;
        $patient->poids = $request->poids;
        $patient->taille = $request->taille;
    
        // Sauvegarder les modifications
        $patient->save();
    
        // Rediriger vers la page de modification avec un message de succès
        return redirect()->route('editprofilepatient', ['id' => $id_user])
                         ->with('success', 'Profil mis à jour avec succès');
    }
    
    


    
    ///////////////////////////////////////////////////// Supprimer un patient

    public function destroy($id)
    {
        $patient = Patient::find($id);
        
        if (!$patient) {
            return response()->json(['message' => 'Patient non trouvé'], 404);
        }

        $patient->delete();
        return response()->json(['message' => 'Patient supprimé avec succès']);
    }



    public function showProfile()
    {
        return view('editprofilepatient');
    }


    public function showw($id)
    {
        // Assurez-vous que l'attribut de la clé primaire est correct
        $patient = Patient::findOrFail($id); // Utilisez findOrFail si la clé primaire est "id"
    
        // Retourner la vue avec les données du patient
        return view('showPat', compact('patient'));
    }
    
} 