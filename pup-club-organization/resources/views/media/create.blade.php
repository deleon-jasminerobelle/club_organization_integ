<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Media - PUP Clubs & Organizations</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .maroon {
            color: #800000;
        }
        .bg-maroon {
            background-color: #800000;
        }
    </style>
</head>
<body class="antialiased bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <img src="{{ asset('images/pup_logo.png') }}" alt="PUP Logo" class="h-10 w-auto mr-2">
                    <span class="text-lg font-semibold text-maroon">Clubs & Organizations</span>
                </div>
                <a href="{{ route('gallery') }}" class="text-maroon hover:text-red-800">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Gallery
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold text-maroon mb-6 text-center">Upload Media</h1>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                </div>
            @endif

            <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" id="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-maroon focus:border-transparent" placeholder="Enter media title">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-maroon focus:border-transparent" placeholder="Describe your media content"></textarea>
                </div>

                <div>
                    <label for="alt_text" class="block text-sm font-medium text-gray-700 mb-2">Alt Text</label>
                    <input type="text" name="alt_text" id="alt_text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-maroon focus:border-transparent" placeholder="Alternative text for accessibility">
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Media Type</label>
                    <select name="type" id="type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-maroon focus:border-transparent">
                        <option value="image">Image (JPG, PNG, GIF)</option>
                        <option value="video">Video (MP4, AVI, MOV)</option>
                        <option value="document">Document (PDF, DOC, DOCX)</option>
                        <option value="audio">Audio (MP3, WAV)</option>
                    </select>
                </div>

                <div>
                    <label for="file" class="block text-sm font-medium text-gray-700 mb-2">File Upload</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-maroon transition-colors">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                        <p class="text-sm text-gray-600 mb-2">Drag and drop your file here, or click to browse</p>
                        <input type="file" name="file" id="file" class="hidden" required>
                        <label for="file" class="cursor-pointer bg-maroon text-white px-6 py-2 rounded-lg hover:bg-red-800 transition-colors">
                            <i class="fas fa-upload mr-2"></i>Choose File
                        </label>
                        <p class="text-xs text-gray-500 mt-2">Max file size: 10MB</p>
                    </div>
                    <div id="file-name" class="text-sm text-gray-600 mt-2 hidden"></div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-maroon text-white py-3 px-6 rounded-lg font-semibold hover:bg-red-800 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-maroon">
                        <i class="fas fa-upload mr-2"></i>Upload Media
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Show selected file name
        document.getElementById('file').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            const fileNameDisplay = document.getElementById('file-name');
            
            if (fileName) {
                fileNameDisplay.textContent = 'Selected file: ' + fileName;
                fileNameDisplay.classList.remove('hidden');
            } else {
                fileNameDisplay.classList.add('hidden');
            }
        });

        // Drag and drop functionality
        const dropArea = document.querySelector('.border-dashed');
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            dropArea.classList.add('border-maroon', 'bg-maroon/10');
        }

        function unhighlight() {
            dropArea.classList.remove('border-maroon', 'bg-maroon/10');
        }

        dropArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            document.getElementById('file').files = files;
            
            const fileName = files[0]?.name;
            const fileNameDisplay = document.getElementById('file-name');
            
            if (fileName) {
                fileNameDisplay.textContent = 'Selected file: ' + fileName;
                fileNameDisplay.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>
