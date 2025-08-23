<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $response = Http::withHeaders([
            'X-API-Key' => env('API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('http://pupt-registration.site/api/auth/login', [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            // Handle successful login (e.g., store session token)
            return redirect('/')->with('success', 'Login successful!');
        } else {
            // Handle login failure
            return back()->withErrors(['login' => 'Invalid credentials.']);
        }
    }
}
