<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-blue-600 text-white p-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Patient Portal</h1>
            <div class="flex items-center space-x-4">
                <button class="notification-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 cursor-pointer hover:text-gold-400">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <br>
    <br>
    <br>
    <br>

    <!-- Content Area -->
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <!-- Profile Tab -->
        <h3 class="text-xl font-semibold mb-6">Personal Information</h3>
        <form action="{{ route('patient.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-600">Full Name</label>
                    <input type="text" name="nom" class="mt-1 p-2 border rounded w-full focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Date of Birth</label>
                    <input type="date" name="date_naissance" class="mt-1 p-2 border rounded w-full focus:ring-2 focus:ring-blue-500" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-600">Weight (kg)</label>
                    <input type="number" name="poids" class="mt-1 p-2 border rounded w-full focus:ring-2 focus:ring-blue-500" step="0.1">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600">Height (cm)</label>
                    <input type="number" name="taille" class="mt-1 p-2 border rounded w-full focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <button type="submit" class="mt-6 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">
                Save
            </button>
        </form>
    </div>

    <style>
        /* Custom Styles */
        .tab-btn.active {
            background-color: #EBF5FF;
            color: #2563EB;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .tab-btn:hover:not(.active) {
            background-color: #F3F4F6;
        }
        .tab-btn {
            transition: all 0.2s ease-in-out;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            width: 100%;
            max-width: 32rem;
            position: relative;
        }
        .modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            cursor: pointer;
        }
        .form-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.375rem;
            margin-top: 0.25rem;
        }
        .form-input:focus {
            outline: none;
            border-color: #2563EB;
            box-shadow: 0 0 0 2px #2563EB;
        }
        @media (max-width: 768px) {
            .grid {
                gap: 1rem;
            }
            .modal-content {
                margin: 1rem;
                max-height: calc(100vh - 2rem);
                overflow-y: auto;
            }
        }
    </style>
</body>
</html>
