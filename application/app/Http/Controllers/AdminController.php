<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Patient;
use App\Models\Contactus;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Show Admin Login Form
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Handle Admin Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Show Admin Dashboard
    public function dashboard()
    {
        $statistics = [
            'doctors' => Doctor::count(),
            'users' => User::count(),
            'patients' => Patient::count(),
            'contacts' => Contactus::count(),
            'admins' => Admin::count(),
        ];

        $doctors = Doctor::all();
        $users = User::all();
        $patients = Patient::all();
        $contacts = Contactus::all();
        $admins = Admin::all();

        return view('admin.dashboard', compact('statistics', 'doctors', 'users', 'patients', 'contacts', 'admins'));
    }

    // Create a New Admin
    public function createAdmin(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        Admin::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin created successfully.');
    }

    // Logout Admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }


    public function doctors()
{
    $doctors = Doctor::all();
    return view('admin.doctors.index', compact('doctors'));
}

public function users()
{
    $users = User::all();
    return view('admin.users.index', compact('users'));
}

public function patients()
{
    $patients = Patient::all();
    return view('admin.patients.index', compact('patients'));
}

public function contactus()
{
    $contacts = Contactus::all();
    return view('admin.contactus.index', compact('contacts'));
}

public function admins()
{
    $admins = Admin::all();
    return view('admin.admins.index', compact('admins'));
}
}
