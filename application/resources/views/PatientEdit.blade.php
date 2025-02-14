<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer Profil Patient</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
    <header class="bg-blue-600 text-white p-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Éditer Profil Patient</h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Sidebar -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex flex-col items-center mb-6">
                        <div class="w-32 h-32 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold">{{ $patient->nom }}</h2>
                    </div>
                </div>
            </div>

            <!-- Edit Form Content -->
            <div class="md:col-span-3">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-6">Modifier vos informations personnelles</h3>
                    <form action="{{ route('patients.updateProfile', $patient->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Nom complet</label>
                                <input type="text" name="nom" value="{{ old('nom', $patient->nom) }}" class="mt-1 p-2 border rounded-md w-full">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Date de naissance</label>
                                <input type="date" name="date_naissance" value="{{ old('date_naissance', $patient->date_naissance) }}" class="mt-1 p-2 border rounded-md w-full">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Poids</label>
                                <input type="number" name="poids" value="{{ old('poids', $patient->poids) }}" class="mt-1 p-2 border rounded-md w-full">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600">Taille</label>
                                <input type="number" name="taille" value="{{ old('taille', $patient->taille) }}" class="mt-1 p-2 border rounded-md w-full">
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
