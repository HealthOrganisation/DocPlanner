<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Patient</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-blue-600 text-white p-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Espace Patient</h1>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>{{ $patient->nom }}</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
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

                    <nav class="space-y-2">
                        <button data-tab="profile" class="tab-btn active w-full text-left px-4 py-2 rounded-md flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Profil</span>
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Profile Content Area -->
            <div class="md:col-span-3">
                <!-- Profile Tab -->
                <div id="profile" class="tab-content active bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-6">Informations personnelles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Nom complet</label>
                            <p class="mt-1">{{ $patient->nom }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Date de naissance</label>
                            <p class="mt-1">{{ $patient->date_naissance }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Poids</label>
                            <p class="mt-1">{{ $patient->poids }} kg</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Taille</label>
                            <p class="mt-1">{{ $patient->taille }} cm</p>
                        </div>
                    </div>

                    <!-- Edit Button -->
                    <div class="mt-6">
                        <a href="{{ route('patients.editProfile', $patient->id) }}" class="bg-blue-600 text-white px-6 py-2 rounded-md">
                            Modifier Profil
                        </a>
                    </div>

                    <h3 class="text-xl font-semibold mb-6 mt-8">Rendez-vous : </h3>
                    <div>
                        @if($appointments->isEmpty())
                            <p>Aucun rendez-vous prévu.</p>
                        @else
                            <ul>
                                @foreach($appointments as $appointment)
                                    <li class="mb-2">
                                        <strong>{{ $appointment->phone }}</strong> {{ $appointment->email }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
