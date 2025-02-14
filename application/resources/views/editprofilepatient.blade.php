<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50 flex">

    <!-- Main Content -->
    <div class="flex-1">
        <!-- Header -->
        <header>
            @include('header')
        </header>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <!-- Update Form -->
        <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6">Personal Information</h2>

            <form action="{{ route('patient.update', ['id' => request()->route('id')]) }}" method="POST">
                @csrf
                @method('PUT') <!-- This converts POST to PUT -->

                <input type="hidden" name="id_user" value="{{ request()->route('id') }}">
                <input name="id_patient" value="{{ $patient->id_patient }}" class="hidden"> <!-- Hidden field for id_patient -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Full Name</label>
                        <input type="text" name="nom" value="{{ $patient->nom ?? '' }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Date of Birth</label>
                        <input type="date" name="date_naissance" value="{{ $patient->date_naissance ?? '' }}" class="form-input" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Weight (kg)</label>
                        <input type="number" name="poids" value="{{ $patient->poids ?? '' }}" class="form-input" step="0.1">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-600">Height (cm)</label>
                        <input type="number" name="taille" value="{{ $patient->taille ?? '' }}" class="form-input">
                    </div>
                </div>

                <button type="submit" class="mt-6 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

    <!-- Additional Styles -->
    <style>
        .form-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid rgb(212, 222, 244);
            border-radius: 0.375rem;
            margin-top: 0.25rem;
            outline: none;
            transition: border-color 0.2s ease-in-out;
        }

        .form-input:focus {
            border-color: rgb(105, 135, 199);
            box-shadow: 0 0 0 2px rgba(185, 197, 222, 0.2);
        }
    </style>

</body>
</html>
