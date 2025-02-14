<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Rendez-vous</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100">

    <!-- Header -->
    <header class="bg-blue-600 text-white p-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Mes Rendez-vous</h1>
        </div>
    </header>

    <!-- Liste des Rendez-vous -->
    <div class="max-w-5xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">Liste des rendez-vous</h2>

        <!-- Table des rendez-vous -->
        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-left">Téléphone</th>
                    <th class="p-3 text-left">Email</th>
                </tr>
            </thead>
            <tbody>
    @foreach($appointments as $appointment)
        <tr>
            <td class="p-3">{{ $appointment->id }}</td> <!-- Affichage de l'ID -->
            <td class="p-3">{{ $appointment->availability->date }}</td> <!-- Affichage de la date de disponibilité -->
            <td class="p-3">{{ $appointment->phone }}</td> <!-- Affichage du téléphone -->
            <td class="p-3">{{ $appointment->email }}</td> <!-- Affichage de l'email -->
        </tr>
    @endforeach
</tbody>

        </table>
    </div>

</body>
</html>
