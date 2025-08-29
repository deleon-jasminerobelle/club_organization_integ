<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club/Organization Portal - Signup</title>
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
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="container mx-auto max-w-md">
        <!-- Club/Organization Header -->
        <div class="text-center mb-8">
            <div class="flex flex-col items-center justify-center mb-4">
                <img src="{{ asset('images/pup_logo.png') }}" alt="PUP Logo" class="h-16 w-auto mb-4">
                <h1 class="text-3xl font-bold text-maroon text-center">PUP Clubs & Organizations</h1>
                <p class="text-maroon mt-2">Member Registration</p>
            </div>

        <!-- Signup Card -->
        <div class="bg-white rounded-xl shadow-2xl p-8 transform transition-all duration-300 hover:shadow-2xl">
            <h2 class="text-2xl font-bold text-center text-[#800000] mb-6">Create Your Account</h2>
            
            <!-- Success/Error Messages -->
            <div id="messageContainer" class="hidden mb-4 p-4 rounded-lg"></div>
            
            <form id="signupForm" class="space-y-4">
                @csrf
                
                <!-- Two-column layout for name fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- First Name Field -->
                    <div class="form-group">
                        <label for="first_name" class="block text-sm font-medium text-[#800000] mb-2">
                            <i class="fas fa-user mr-2"></i>First Name
                        </label>
                        <div class="relative">
                            <input type="text" id="first_name" name="first_name" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800000] focus:border-transparent transition-all duration-200 pl-10"
                                   placeholder="First name">
                            <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Minimum 2 characters, letters only</p>
                    </div>

                    <!-- Last Name Field -->
                    <div class="form-group">
                        <label for="last_name" class="block text-sm font-medium text-[#800000] mb-2">
                            <i class="fas fa-user mr-2"></i>Last Name
                        </label>
                        <div class="relative">
                            <input type="text" id="last_name" name="last_name" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800000] focus:border-transparent transition-all duration-200 pl-10"
                                   placeholder="Last name">
                            <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Minimum 2 characters, letters only</p>
                    </div>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email" class="block text-sm font-medium text-[#800000] mb-2">
                        <i class="fas fa-envelope mr-2"></i>Email
                    </label>
                    <div class="relative">
                        <input type="email" id="email" name="email" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800000] focus:border-transparent transition-all duration-200 pl-10"
                               placeholder="Enter your email">
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Student Number Field -->
                <div class="form-group">
                    <label for="student_number" class="block text-sm font-medium text-[#800000] mb-2">
                        <i class="fas fa-id-card mr-2"></i>Student Number
                    </label>
                    <div class="relative">
                        <input type="text" id="student_number" name="student_number" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800000] focus:border-transparent transition-all duration-200 pl-10"
                               placeholder="Enter your student number">
                        <i class="fas fa-id-card absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Program Field -->
                <div class="form-group">
                    <label for="program" class="block text-sm font-medium text-[#800000] mb-2">
                        <i class="fas fa-book mr-2"></i>Program
                    </label>
                    <div class="relative">
                        <input type="text" id="program" name="program" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800000] focus:border-transparent transition-all duration-200 pl-10"
                               placeholder="Enter your program">
                        <i class="fas fa-book absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Two-column layout for year and section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Year Field -->
                    <div class="form-group">
                        <label for="year" class="block text-sm font-medium text-[#800000] mb-2">
                            <i class="fas fa-calendar-alt mr-2"></i>Year
                        </label>
                        <div class="relative">
                            <select id="year" name="year" required 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800000] focus:border-transparent transition-all duration-200 pl-10 appearance-none">
                                <option value="">Select Year</option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                            </select>
                            <i class="fas fa-calendar-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>

                    <!-- Section Field -->
                    <div class="form-group">
                        <label for="section" class="block text-sm font-medium text-[#800000] mb-2">
                            <i class="fas fa-users mr-2"></i>Section
                        </label>
                        <div class="relative">
                            <input type="number" id="section" name="section" required min="1" max="10" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800000] focus:border-transparent transition-all duration-200 pl-10"
                                   placeholder="Section (1-10)">
                            <i class="fas fa-users absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Birthdate Field -->
                <div class="form-group">
                    <label for="birthdate" class="block text-sm font-medium text-[#800000] mb-2">
                        <i class="fas fa-calendar mr-2"></i>Birthdate
                    </label>
                    <div class="relative">
                        <input type="date" id="birthdate" name="birthdate" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#800000] focus:border-transparent transition-all duration-200 pl-10">
                        <i class="fas fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Must be 15-100 years old</p>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="signupButton" 
                        class="w-full bg-maroon hover:bg-red-800 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-maroon focus:ring-opacity-50">
                    <span id="buttonText">Create Account</span>
                    <div id="loadingSpinner" class="hidden">
                        <i class="fas fa-spinner fa-spin"></i> Creating Account...
                    </div>
                </button>

                <!-- Login Link -->
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        Already have an account? 
                        <a href="/login" class="text-maroon hover:text-red-800 font-semibold transition-colors duration-200">
                            Sign in here
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signupForm = document.getElementById('signupForm');
            const signupButton = document.getElementById('signupButton');
            const buttonText = document.getElementById('buttonText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const messageContainer = document.getElementById('messageContainer');

            // Form validation and submission
            signupForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Basic validation
                const inputs = signupForm.querySelectorAll('input[required], select[required]');
                let isValid = true;

                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('border-red-500');
                    } else {
                        input.classList.remove('border-red-500');
                    }
                });

                if (!isValid) {
                    showMessage('Please fill in all required fields', 'error');
                    return;
                }

                // Show loading state
                buttonText.classList.add('hidden');
                loadingSpinner.classList.remove('hidden');
                signupButton.disabled = true;

                try {
                    const formData = new FormData(signupForm);
                    const data = Object.fromEntries(formData.entries());

                    const response = await fetch('/api/students', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(data)
                    });

                    const result = await response.json();

                    if (response.ok) {
                        showMessage('Account created successfully!', 'success');
                        signupForm.reset();

                        // Redirect to login
                        window.setTimeout(() => window.location.href = "/login");
                    } else {
                        showMessage(result.message || 'Signup failed. Please try again.', 'error');
                    }
                } catch (error) {
                    showMessage('Network error. Please try again.', 'error');
                } finally {
                    // Reset loading state
                    buttonText.classList.remove('hidden');
                    loadingSpinner.classList.add('hidden');
                    signupButton.disabled = false;
                }
            });

            // Show message function
            function showMessage(message, type) {
                messageContainer.textContent = message;
                messageContainer.className = type === 'success' 
                    ? 'bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4' 
                    : 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4';
                messageContainer.classList.remove('hidden');
                
                // Auto-hide after 5 seconds
                setTimeout(() => {
                    messageContainer.classList.add('hidden');
                }, 5000);
            }

            // Real-time validation
            signupForm.querySelectorAll('input, select').forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value.trim()) {
                        this.classList.remove('border-red-500');
                    }
                });
            });
        });
    </script>
</body>
</html>
