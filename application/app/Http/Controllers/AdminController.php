<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Patient;
use App\Models\Contactus;
use App\Models\Article;
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
        // Validate the form data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Custom condition for email = admin@gmail.com and password = 1234
        if ($credentials['email'] === 'admin@gmail.com' && $credentials['password'] === '1234') {
            // Manually log in the user (optional, if you want to maintain session)
            $admin = Admin::where('email', 'admin@gmail.com')->first();
            if ($admin) {
                Auth::guard('admin')->login($admin); // Log in the admin
                $request->session()->regenerate(); // Regenerate session
                return redirect()->route('admin.dashboard'); // Redirect to the admin dashboard
            }
        }

        // Attempt to log in the admin using Laravel's built-in authentication
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate(); // Regenerate session
            return redirect()->route('admin.dashboard'); // Redirect to the admin dashboard
        }

        // If login fails, return with an error message
        return back()->withErrors([
            'email' => 'Incorrect email or password.',
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
            'articles' => Article::count(),
        ];

        $doctors = Doctor::all();
        $users = User::all();
        $patients = Patient::all();
        $contacts = Contactus::all();
        $admins = Admin::all();
        $articles = Article::all();
        return view('admin.dashboard', compact('statistics', 'doctors', 'users', 'patients', 'contacts', 'admins', 'articles'));
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

    public function storeAdmin(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'role' => 'required|string|max:255',
        ]);

        // Hash the password
        $hashedPassword = Hash::make($request->password);

        // Create a new admin
        Admin::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => $hashedPassword,
            'role' => $request->role,
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.admins.index')->with('success', 'Admin created successfully.');
    }



    // Logout Admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    // Other methods (doctors, users, patients, contactus, admins)
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




    public function createAdminForm()
{
    return view('admin.admins.create'); // Ensure this view exists
}
}
