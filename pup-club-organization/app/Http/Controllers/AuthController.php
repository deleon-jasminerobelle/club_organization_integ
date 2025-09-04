<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    
  public function login(Request $request)
{
    // Validate login fields
    $request->validate([
        'username' => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    // Debug logging
    Log::info('Login attempt', [
        'email' => $request->username,
        'password_provided' => !empty($request->password),
    ]);

    // Attempt to find user by email
    $user = \App\Models\User::where('email', $request->username)->first();

    if ($user) {
        Log::info('User found', [
            'user_id' => $user->id,
            'user_email' => $user->email,
            'has_password' => !empty($user->password),
        ]);
        
        if (\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            Log::info('Password matches - authentication successful');
            
            // Authentication successful
            session([
                'user' => [
                    'id' => $user->id,
                    'username' => $user->email,
                    'name' => $user->name,
                    'authenticated' => true,
                ]
            ]);

            return redirect()->route('index')->with('success', 'Login successful!');
        } else {
            Log::warning('Password does not match');
        }
    } else {
        Log::warning('User not found with email: ' . $request->username);
    }

    // Authentication failed
    return back()->withErrors(['login' => 'Invalid email or password.']);
}


    public function testApiConnection()
    {
        $apiUrl = env('API_URL', 'https://pupt-registration.site');
        $apiKey = env('API_KEY');
        Log::info('AuthController@testApiConnection using API key', [
            'present' => !empty($apiKey),
            'preview' => is_string($apiKey) && strlen($apiKey) >= 10 ? substr($apiKey, 0, 4) . '...' . substr($apiKey, -6) : $apiKey,
        ]);
        
        try {
            
            $endpoints = ['/api/health', '/api/status', '/health', '/status', '/'];
            $results = [];
            
            foreach ($endpoints as $endpoint) {
                try {
                    $response = Http::withHeaders([
                        'X-API-Key' => $apiKey,
                    ])->timeout(5)->get($apiUrl . $endpoint);
                    
                    $results[$endpoint] = [
                        'status' => $response->status(),
                        'success' => $response->successful(),
                        'body' => substr($response->body(), 0, 200) 
                    ];
                } catch (\Exception $e) {
                    $results[$endpoint] = [
                        'error' => $e->getMessage(),
                        'status' => 'failed'
                    ];
                }
            }
            
            return response()->json([
                'api_url' => $apiUrl,
                'api_key_set' => !empty($apiKey),
                'endpoint_results' => $results
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'api_url' => $apiUrl,
                'api_key_set' => !empty($apiKey)
            ], 500);
        }
    }

    
    public function signup(Request $request)
    {
        $apiUrl = env('API_URL', 'https://pupt-registration.site');
        $apiKey = env('API_KEY');
        Log::info('AuthController@signup using API key', [
            'present' => !empty($apiKey),
            'preview' => is_string($apiKey) && strlen($apiKey) >= 10 ? substr($apiKey, 0, 4) . '...' . substr($apiKey, -6) : $apiKey,
        ]);

        // ADD STUDENT USER
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'first_name' => 'required|string|min:2|regex:/^[a-zA-Z\s]+$/',
            'last_name' => 'required|string|min:2|regex:/^[a-zA-Z\s]+$/',
            'student_number' => 'required|string',
            'program' => 'required|string',
            'year' => 'required|in:1st Year,2nd Year,3rd Year,4th Year',
            'section' => 'required|integer|between:1,10',
            'birthdate' => 'required|date|before_or_equal:' . Carbon::now()->subYears(15)->format('Y-m-d') . '|after_or_equal:' . Carbon::now()->subYears(100)->format('Y-m-d'),
        ], [
            'first_name.regex' => 'First name must contain only letters and spaces',
            'last_name.regex' => 'Last name must contain only letters and spaces',
            'year.in' => 'Year must be one of: 1st Year, 2nd Year, 3rd Year, 4th Year',
            'birthdate.before_or_equal' => 'You must be at least 15 years old',
            'birthdate.after_or_equal' => 'Age must be 100 years or less',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        Log::info('Signup attempt', [
            'email' => $request->email,
            'student_number' => $request->student_number,
            'api_url' => $apiUrl
        ]);

        try {
           
            Log::info('Sending data to external API', [
                'url' => $apiUrl . '/api/students',
                'data' => $request->all()
            ]);

            $response = Http::withHeaders([
                'X-API-Key' => $apiKey,
                'Content-Type' => 'application/json',
            ])->post($apiUrl . '/api/students', $request->all());

            // Login API
            Log::info('Signup API Response', [
                'status' => $response->status(),
                'body' => $response->body(),
                'successful' => $response->successful()
            ]);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Signup successful',
                    'data' => $response->json()
                ], 201);
            } else {
                $errorMessage = 'Signup failed. Please try again.';
                
                try {
                    $responseData = $response->json();
                    if (isset($responseData['message'])) {
                        $errorMessage = $responseData['message'];
                    } elseif (isset($responseData['error'])) {
                        $errorMessage = $responseData['error'];
                    }
                } catch (\Exception $e) {
                    
                    $errorMessage = 'Signup failed. Please check your information.';
                }
                
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage
                ], $response->status());
            }

        } catch (\Exception $e) {
            Log::error('Signup API Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Internal server error. Please try again later.'
            ], 500);
        }
    }
}
