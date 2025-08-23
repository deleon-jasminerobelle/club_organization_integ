<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        $apiUrl = env('API_URL', 'http://pupt-registration.site');
        $apiKey = env('API_KEY');
        
        // Log the request for debugging
        Log::info('Login attempt', [
            'username' => $request->username,
            'api_url' => $apiUrl
        ]);
        
        $response = Http::withHeaders([
            'X-API-Key' => $apiKey,
            'Content-Type' => 'application/json',
        ])->post($apiUrl . '/login', [
            'email' => $request->username, 
            'password' => $request->password,
        ]);

        // Log the full API response for debugging
        Log::info('API Response', [
            'status' => $response->status(),
            'body' => $response->body(),
            'successful' => $response->successful()
        ]);

        if ($response->successful()) {
           
            return redirect('/index')->with('success', 'Login successful!');
        } else {
            
            $errorMessage = 'Invalid credentials.';
            
            try {
                $responseData = $response->json();
                if (isset($responseData['message'])) {
                    $errorMessage = $responseData['message'];
                } elseif (isset($responseData['error'])) {
                    $errorMessage = $responseData['error'];
                }
            } catch (\Exception $e) {
                
                $errorMessage = 'Authentication failed. Please check your credentials.';
            }
            
            return back()->withErrors(['login' => $errorMessage]);
        }
    }
    
  
    public function testApiConnection()
    {
        $apiUrl = env('API_URL', 'http://pupt-registration.site');
        $apiKey = env('API_KEY');
        
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
}
