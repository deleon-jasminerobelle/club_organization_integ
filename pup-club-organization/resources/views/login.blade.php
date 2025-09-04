<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club/Organization Portal - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        maroon: '#800000',
                        gold: '#FFD700',
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-white min-h-screen flex items-center justify-center p-4">
    <div class="container mx-auto max-w-md">
        <!-- Club/Organization Header -->
        <div class="text-center mb-8">
            <div class="flex flex-col items-center justify-center mb-4">
                <img src="{{ asset('images/pup_logo.png') }}" alt="PUP Logo" class="h-16 w-auto mb-4">
                <h1 class="text-3xl font-bold text-maroon text-center">PUP Clubs & Organizations</h1>
                <p class="text-maroon mt-2">Member Login</p>
            </div>

        <!-- Login Card -->
        <div class="bg-white rounded-xl shadow-2xl p-8 transform transition-all duration-300 hover:shadow-2xl">
            <h2 class="text-2xl font-bold text-center text-[#800000] mb-6">Welcome Back</h2>
            
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form id="loginForm" action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Username Field -->
                <div class="form-group">
                    <label for="username" class="block text-sm font-medium text-[#800000] mb-2">
                        <i class="fas fa-envelope mr-2"></i>Email Address
                    </label>
                    <div class="relative">
                        <input type="email" id="username" name="username" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800000] focus:border-transparent transition-all duration-200 pl-10"
                               placeholder="Enter your email address">
                        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="block text-sm font-medium text-[#800000] mb-2">
                        <i class="fas fa-lock mr-2"></i>Password
                    </label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800000] focus:border-transparent transition-all duration-200 pl-10"
                               placeholder="Enter your password">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center mb-4">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-[#800000] bg-gray-100 border-gray-300 rounded focus:ring-[#800000] focus:ring-2 mr-2 cursor-pointer">
                    <label for="remember" class="text-sm text-[#800000] cursor-pointer hover:text-[#FFD700] transition-colors duration-200">Remember Me</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="loginButton" 
                        class="w-full bg-maroon hover:bg-red-800 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-maroon focus:ring-opacity-50">
                    <span id="buttonText">Sign In</span>
                    <div id="loadingSpinner" class="hidden">
                        <i class="fas fa-spinner fa-spin"></i> Signing in...
                    </div>
                </button>
            </form>
        </div>
    </div>

             <!-- Login Link -->
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="/signup" class="text-maroon hover:text-red-800 font-semibold transition-colors duration-200">
                            Sign up here
                        </a>
                    </p>
                </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const usernameInput = document.getElementById('username');
            const passwordInput = document.getElementById('password');
            const loginButton = document.getElementById('loginButton');
            const buttonText = document.getElementById('buttonText');
            const loadingSpinner = document.getElementById('loadingSpinner');

            // Form validation
            loginForm.addEventListener('submit', function(e) {
                let isValid = true;
                
                // Validate username
                if (!usernameInput.value.trim()) {
                    isValid = false;
                    usernameInput.classList.add('border-red-500');
                } else {
                    usernameInput.classList.remove('border-red-500');
                }

                // Validate password
                if (!passwordInput.value.trim()) {
                    isValid = false;
                    passwordInput.classList.add('border-red-500');
                } else {
                    passwordInput.classList.remove('border-red-500');
                }

                if (!isValid) {
                    e.preventDefault();
                } else {
                    // Show loading state
                    buttonText.classList.add('hidden');
                    loadingSpinner.classList.remove('hidden');
                    loginButton.disabled = true;
                }
            });

            // Real-time validation
            usernameInput.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('border-red-500');
                }
            });

            passwordInput.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('border-red-500');
                }
            });
        });
    </script>
</body>
</html>
